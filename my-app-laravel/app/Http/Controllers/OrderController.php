<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $user;
    protected $product;
    protected $order;

    public function __construct(User $user, Product $product, Order $order)
    {
        $this->user = $user;
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

    public function buyIndex() 
    {
        $orders = Order::where([
            'status' => 'BUY',
            'user_id' => Auth::id()
        ])->orderBy('id', 'desc')->paginate(10);

        return view('cart.purchases', compact('orders'));
    }

    public function add($id)
    {
        if(!$product = Product::find($id))
            return redirect()->route('products.index');

        $checkIdProduct = OrderController::checkUniqueIdProduct($id);

        if($checkIdProduct >= 1) {
            return OrderController::addQuantity($checkIdProduct);
        }
    
        $user = Auth::id();   
        $total = $product->price;

        Order::create([
            'user_id' => $user,
            'product_id' => $id,
            'status' => 'RE',
            'unit' => 1,
            'total' => $total
        ]);

        return redirect()->route('products.index')->with('add', 'Produto adicionado com sucesso!');
    }

    public function buy($id)
    {
        if(!$order = Order::find($id))
            return redirect()->route('products.index');
        
        $order->update([
            'status' => 'BUY',
        ]);

        return redirect()->route('products.index')->with('buy', 'Compra finalizada com sucesso!');
    }

    public function destroy($id)
    {
        if(!$order = Order::find($id))
            return redirect()->route('products.index');

        $order->delete();

        return redirect()->route('products.index')->with('destroy', 'Produto removido com sucesso!');;
    }

    public function addQuantity($id)
    {
        if(!$order = Order::find($id))
            return redirect()->route('product.index');
        
        $quantity = $order->unit;
        $quantity++;

        $product = Product::find( $order->product_id);

        $price = $product->price;

        $total = $quantity * $price;

        $order->update([
            'unit' => $quantity,
            'total' => $total
        ]);

        return redirect()->route('cart.index')->with('update', 'Quantidade atualizada com sucesso!');;

    }

    public function removeQuantity($id)
    {
        if(!$order = Order::find($id))
            return redirect()->route('product.index');
        
        $quantity = $order->unit;

        if($quantity == 1) {
            return  OrderController::destroy($id);
        }

        $quantity--;

        $product = Product::find( $order->product_id);

        $price = $product->price;

        $total = $quantity * $price;

        $order->update([
            'unit' => $quantity,
            'total' => $total
        ]);

        return redirect()->route('cart.index')->with('update', 'Quantidade atualizada com sucesso!');;

    }

    public function checkUniqueIdProduct ($id)
    {
        $orders = Order::where([
            'status' => 'RE',
            'user_id' => Auth::id()
        ])->get();
        
        foreach($orders as $order) {
            if($order->product_id == $id){
                return $order->id;
            }
        }
        return $order = 0;

    }
}
