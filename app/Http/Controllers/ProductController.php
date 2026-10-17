<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $list = ['1', '2', '3'];
        return view('products.index', compact('list'));
    }

    public function create()
    {
        return view('products.create');
    }

    //
    public function store(Request $request) //info uit form halen
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0'
        ]); //data validatie

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();

        return redirect()->route('products.index');

    }
}
