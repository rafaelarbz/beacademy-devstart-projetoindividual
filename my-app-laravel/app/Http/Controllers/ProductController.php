<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(Product $products)
    {
        $this->model = $products;
    }

    public function index(Request $request)
    {
        $products = $this->model->getProducts(
            $request->search ?? ''
        );
        
        return view('products.index', compact('products'));
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

    public function store(StoreUpdateProductFormRequest $request)
    {
        $data = $request->all();

        if($request->image){        
        $file = $request['image'];
        $path = $file->store('products', 'public');
        $data['image'] = $path;
        }

        $this->model->create($data);

        return redirect()->route('products.index');
    }

    public function destoy()
    {

    }
}
