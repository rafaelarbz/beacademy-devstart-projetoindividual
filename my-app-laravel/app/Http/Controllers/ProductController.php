<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $products;

    public function __construct(Product $products)
    {
        $this->model = $products;
    }

    public function index()
    {
        $products = Product::paginate(5);

        return view('products.index', compact('products'));
    }
}
