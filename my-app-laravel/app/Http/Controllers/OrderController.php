<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $client;
    protected $product;
    protected $order;

    public function __construct(User $client, Product $product, Order $order)
    {
        $this->client = $client;
        $this->product = $product;
        $this->order = $order;
    }

    public function index()
    {
        $orders = Order::where([
            'status' => 'RE',
            'user_id' => Auth::id()
        ])->orderBy('product_id', 'desc')->paginate(10);

        return view('cart.index', compact('orders'));
    }

    public function add($id)
    {
        if(!$product = Product::find($id))
            return redirect()->route('products.index');
        
        $user = Auth::id();
        
        Order::create([
            'user_id' => $user,
            'product_id' => $id,
            'status' => 'RE'
        ]);

        return redirect()->route('products.index')->with('add', 'Produto adicionado com sucesso!');
    }

    public function buy(Request $request, $id)
    {
        if(!$order = Order::find($id))
            return redirect()->route('products.index');
        
        $user = Auth::id();

        $data = $request;

        $order->update($data);
        
        // $order = $this->model->update([
        //     'user_id' => $user,
        //     'product_id' => $id,
        //     'unit' => $quantity,
        //     'status' => 'BUY'
        // ]);

        return redirect()->route('products.index')->with('add', 'Compra finalizada com sucesso!');
    }

    public function destroy($id)
    {
        if(!$order = Order::find($id))
            return redirect()->route('products.index');

        $order->delete();

        return redirect()->route('products.index')->with('destroy', 'Produto removido com sucesso!');;
    }
}
