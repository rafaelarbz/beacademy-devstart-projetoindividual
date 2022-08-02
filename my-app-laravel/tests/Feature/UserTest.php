<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_user()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->actingAs($user);
        
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function test_user_register()
    {
        $user = User::factory()->create();
        $response = $this->post('/register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password
        ]);

        $this->actingAs($user);
        
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function test_user_update()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $this->actingAs($user);

        $response = $this->put("/users/$user->id", [
            'name' =>  'Test Update',
            'email' => 'testupdate@email.com',
            'password' => 'password'
        ]);
        
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

}