<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // protected $products;

    // public function __construct(Product $products)
    // {
    //     $this->model = $products;
    // }

    public function index()
    {
        return view('products.index');
    }

    public function show()
    {
        return view('products.show');
    }
    
    public function edit()
    {
        return view('products.edit');
    }

    public function update()
    {

    }

    public function create()
    {
        return view('products.create');
    }

    public function store()
    {

    }

    public function destoy()
    {

    }
}
