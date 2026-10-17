<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
}

public function index()
{
    $greeting = 'welcome gast';
    return view('about-us', compact('greeting'));
}
