<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()
            ->orderBy('category_name')
            ->get();

        $categoryId = $request->input('category');

        $query = Product::with('category');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%");
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        $products = $query->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::query()->orderBy('category_name')->get();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'brand' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'required|string',
        ]);

        $product = new Product;
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->image = $validated['image'];
        $product->brand = $validated['brand'];
        $product->category_id = $validated['category_id'];

        $product->save();
        $request->user()->products()->attach($product->id);

        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Request $request, Product $product)
    {
        $categories = Category::query()->orderBy('category_name')->get();
        $ownProduct = $request->user()->products()->where('products.id', $product->id)->exists();
        abort_unless($ownProduct, 403);

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'brand' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'required|string',
        ]);

        $product->update($validated);
        return redirect()->route('dashboard');
    }

    public function delete(Request $request, Product $product)
    {
        $ownProduct = $request->user()->products()->where('products.id', $product->id)->exists();
        abort_unless($ownProduct, 403);

        $product->delete();
        return redirect()->route('dashboard');
    }

    public function showProfile(Request $request)
    {
        $user = $request->user();

        $products = $user->products()->get();
        return view('dashboard', compact('user', 'products'));
    }
}
