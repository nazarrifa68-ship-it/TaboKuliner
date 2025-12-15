<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'review' => 'required|string|min:10|max:1000',
            'order_id' => 'required|exists:orders,id',
        ], [
            'review.required' => 'Ulasan tidak boleh kosong.',
            'review.min' => 'Ulasan minimal 10 karakter.',
            'review.max' => 'Ulasan maksimal 1000 karakter.',
            'order_id.required' => 'Order ID diperlukan.',
            'order_id.exists' => 'Order tidak ditemukan.',
        ]);

        // Cek apakah user sudah pernah review order ini
        $existingReview = Review::where('user_id', Auth::id())
                                ->where('order_id', $request->order_id)
                                ->first();

        if ($existingReview) {
            return redirect()->back()->with('error', 'Anda sudah memberikan ulasan untuk pesanan ini.');
        }

        // Simpan review
        Review::create([
            'user_id' => Auth::id(),
            'order_id' => $request->order_id,
            'review' => $request->review,
        ]);

        return redirect()->back()->with('success', 'Terima kasih! Ulasan Anda telah berhasil dikirim.');
    }
}