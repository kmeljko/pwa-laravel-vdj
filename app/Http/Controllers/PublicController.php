<?php

namespace App\Http\Controllers;

use App\Models\Product; // ili model po tvojoj temi
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        // Prikazujemo istaknute proizvode
        $featuredProducts = Product::where('featured', true)->get();

        return view('public.home', compact('featuredProducts'));
    }

    public function catalog()
    {
        $products = Product::all();

        return view('public.catalog', compact('products'));
    }

    public function productDetail($id)
    {
        $product = Product::findOrFail($id);

        return view('public.product_detail', compact('product'));
    }

    public function contact()
    {
        return view('public.contact');
    }
}
