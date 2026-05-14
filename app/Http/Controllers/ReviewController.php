<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::with(['customer', 'order']);

        if ($request->rating) {
            $query->where('rating', $request->rating);
        }

        if ($request->search) {
            $query->whereHas('order', function($q) use ($request) {
                $q->where('invoice_code', 'like', '%' . $request->search . '%');
            })->orWhereHas('customer', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        $reviews = $query->latest()->get();
        return view('owner.review.index', compact('reviews'));
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return back()->with('success', 'Review berhasil dihapus!');
    }
}