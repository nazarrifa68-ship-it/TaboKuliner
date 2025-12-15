<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = $this->calculateTotal($cart);
        
        return view('Pages.Customer.cart', compact('cart', 'total'));
    }

   public function add(Request $request)
{
    try {
        // Log untuk debugging
        \Log::info('Cart Add Request:', $request->all());

        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'image' => 'required',
            'calories' => 'required'
        ]);

        $cart = Session::get('cart', []);
        $id = $request->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id] = [
                'menu_id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'image' => $request->image,
                'calories' => $request->calories
            ];
        }

        Session::put('cart', $cart);

        \Log::info('Cart after add:', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Item berhasil ditambahkan ke keranjang',
            'cartCount' => count($cart),
            'cart' => $cart // untuk debugging
        ]);

    } catch (\Exception $e) {
        \Log::error('Cart Add Error: ' . $e->getMessage());
        
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ], 500);
    }
}

    public function update(Request $request)
    {
        $cart = Session::get('cart', []);
        $id = $request->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            Session::put('cart', $cart);

            $total = $this->calculateTotal($cart);
            $itemTotal = $cart[$id]['price'] * $cart[$id]['quantity'];

            return response()->json([
                'success' => true,
                'itemTotal' => $itemTotal,
                'total' => $total
            ]);
        }

        return response()->json(['success' => false], 404);
    }

    public function remove($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);

            $total = $this->calculateTotal($cart);

            return response()->json([
                'success' => true,
                'message' => 'Item berhasil dihapus',
                'total' => $total,
                'cartCount' => count($cart)
            ]);
        }

        return response()->json(['success' => false], 404);
    }

    public function clear()
    {
        Session::forget('cart');
        
        return response()->json([
            'success' => true,
            'message' => 'Keranjang berhasil dikosongkan'
        ]);
    }

    // Halaman Checkout
    public function checkout()
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong');
        }

        $subtotal = $this->calculateTotal($cart);
        $shipping = 10000;
        $serviceFee = 2000;
        $total = $subtotal + $shipping + $serviceFee;

        // Get user addresses
        $addresses = Auth::user()->addresses;
        $defaultAddress = Auth::user()->defaultAddress();

        return view('Pages.Customer.checkout', compact('cart', 'subtotal', 'shipping', 'serviceFee', 'total', 'addresses', 'defaultAddress'));
    }

public function processCheckout(Request $request)
{
    $request->validate([
        'address_id' => 'required|exists:addresses,id',
        'payment_method' => 'required|in:transfer,cod,ewallet',
        'notes' => 'nullable|string|max:500'
    ]);

    $cart = Session::get('cart', []);
    
    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong');
    }

    DB::beginTransaction();
    
    try {
        $subtotal = $this->calculateTotal($cart);
        $shipping = 10000;
        $serviceFee = 2000;
        $total = $subtotal + $shipping + $serviceFee;

        // Create Order
        $order = Order::create([
            'user_id' => Auth::id(),
            'address_id' => $request->address_id,
            'order_number' => Order::generateOrderNumber(),
            'subtotal' => $subtotal,
            'shipping_cost' => $shipping,
            'service_fee' => $serviceFee,
            'discount' => 0,
            'total_amount' => $total,
            'status' => 'pending',
            'payment_status' => 'unpaid',
            'payment_method' => $request->payment_method,
            'notes' => $request->notes
        ]);

        // Create Order Items
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['menu_id'] ?? null,
                'menu_name' => $item['name'],
                'menu_image' => $item['image'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity']
            ]);
        }

        // Clear cart
        Session::forget('cart');

        DB::commit();

        // Redirect ke halaman sukses
        return redirect()->route('order.success', $order->id);

    } catch (\Exception $e) {
        DB::rollback();
        return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}