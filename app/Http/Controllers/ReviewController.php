<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\AbstractList;

class ReviewController extends Controller
{
    public function create(Request $request, Product $product)
    {
        $productCount = $request->user()->products()->count();

        if ($productCount < 3) {
            return redirect()->route('products.show', $product)->with('error', 'You must post 3 products to write a review.');
        }

        return view('reviews.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {

        $productCount = $request->user()->products()->count();

        if ($productCount < 3) {
            return redirect()->route('products.show', $product)->with('error', 'You must post 3 products to write a review.');
        }
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        Review::create([
            'users_id' => $request->user()->id,
            'products_id' => $product->id,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        return redirect()->route('products.show', $product);
    }
}
