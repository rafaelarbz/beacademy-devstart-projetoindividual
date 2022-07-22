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

    public function edit($id)
    {
        if(!$product = $this->model->find($id))
        return redirect()->route('products.index');
    
        return view('products.edit', compact('product'));
    }

    public function update(StoreUpdateProductFormRequest $request, $id)
    {
        if(!$product = $this->model->find($id))
        return redirect()->route('products.index');

        $data = $request->only('name', 'category', 'brand', 'cost', 'price', 'quantity', 'description');

        if($request->image){        
            $file = $request['image'];
            $path = $file->store('profile', 'public');
            $data['image'] = $path;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('edit', 'Produto editado com sucesso!');;
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

        return redirect()->route('products.index')->with('store', 'Produto adicionado com sucesso!');;
    }

    public function destroy($id)
    {
        if(!$product = $this->model->find($id))
            return redirect()->route('products.index');

        $product->delete();

        return redirect()->route('products.index')->with('destroy', 'Produto removido com sucesso!');;
    }
}
