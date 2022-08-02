<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserFormRequest;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request) 
    {
        $users = $this->model->getUsers(
            $request->search ?? ''
        );

        $usersCount = $this->model->get();
        
        return view('users.index', compact('users', 'usersCount'));
    }

    public function edit($id)
    {
        if(!$user = $this->model->find($id))
            return redirect()->route('products.index');
        
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserFormRequest $request, $id)
    {
        if(!$user = $this->model->find($id))
            return redirect()->route('products.index');

        $data = $request->only('name', 'email');

        if($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data);

        return redirect()->route('products.index')->with('edit', 'Dados atualizados com sucesso!');
    }

}
