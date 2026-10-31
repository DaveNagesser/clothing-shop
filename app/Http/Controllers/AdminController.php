<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $products = Product::latest()->get();
        return view('admin.index', compact('products'));
    }

    public function toggleAvailability(Product $product)
    {
        $product->purchased = $product->purchased > 0 ? 0 : 1;
        $product->save();

        return redirect()->route('admin.index');
    }
}
