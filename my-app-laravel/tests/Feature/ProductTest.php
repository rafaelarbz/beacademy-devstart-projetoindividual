<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_product_create()
    {
        $response = $this->post('/login', [
            'email' => 'rafaelarabeloeng@gmail.com',
            'password' => 'senhasenha'
        ]);

        $this->actingAs(Auth::user());

        $response = Product::create([
            'name' => 'Test',
            'description' => 'test',
            'quantity' => '200',
            'price' => '99.99',
            'image' => 'image/xxxxxx',
            'cost' => '99.99',
            'brand' => 'test',
            'category' => 'test'
        ]);
        
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function test_product_update()
    {
        $response = $this->post('/login', [
            'email' => 'rafaelarabeloeng@gmail.com',
            'password' => 'senhasenha'
        ]);
        
        $this->actingAs(Auth::user());

        $product = new Product();
        $product->name = 'Test';
        $product->description = 'test';
        $product->quantity = 200;
        $product->price = '99.99';
        $product->image = 'image/xxxxxx';
        $product->cost = '99.99';
        $product->brand = 'test';
        $product->category = 'test';

        $product->save();

        $response = $product->update([
            'name' => 'Test Edit',
            'description' => 'test edit',
            'quantity' => '20',
            'price' => '99.9',
            'image' => 'image/eeee',
            'cost' => '99.9',
            'brand' => 'test edit',
            'category' => 'test edit'
        ]);
        
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function test_product_delete()
    {
        $response = $this->post('/login', [
            'email' => 'rafaelarabeloeng@gmail.com',
            'password' => 'senhasenha'
        ]);
        
        $this->actingAs(Auth::user());

        $product = new Product();
        $product->name = 'Test';
        $product->description = 'test';
        $product->quantity = 200;
        $product->price = '99.99';
        $product->image = 'image/xxxxxx';
        $product->cost = '99.99';
        $product->brand = 'test';
        $product->category = 'test';

        $product->save();

        $response = $product->delete();
        
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

}