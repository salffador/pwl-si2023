<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index() : view
    {

        $product = new Product;
        $products = $product->get_product()
                            ->latest()
                            ->paginate(10);

        //render view with products
        return view('products.index', compact('products'));
}
}