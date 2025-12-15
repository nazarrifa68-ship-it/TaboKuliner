<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Halaman sukses setelah checkout
    public function success($orderId)
    {
        $order = Order::with(['items', 'address'])->findOrFail($orderId);
        
        // Pastikan order milik user yang login
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('Pages.Customer.order-success', compact('order'));
    }

    // Submit review
    public function submitReview(Request $request, $orderId)
    {
        $request->validate([
            'rating_text' => 'required|in:Sangat Puas,Puas,Cukup Puas,Kurang Puas,Tidak Puas',
            'comment' => 'required|string|min:10|max:500'
        ]);

        $order = Order::findOrFail($orderId);
        
        // Pastikan order milik user yang login
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Cek apakah sudah pernah review
        $existingReview = Review::where('order_id', $orderId)
                                ->where('user_id', Auth::id())
                                ->first();

        if ($existingReview) {
            return back()->with('error', 'Anda sudah memberikan ulasan untuk pesanan ini');
        }

        // Buat review
        Review::create([
            'order_id' => $orderId,
            'user_id' => Auth::id(),
            'rating_text' => $request->rating_text,
            'comment' => $request->comment
        ]);

        return back()->with('success', 'Terima kasih! Ulasan Anda berhasil dikirim');
    }
}