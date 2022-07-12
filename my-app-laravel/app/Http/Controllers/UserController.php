<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function __construct(User $user)
    // {
    //     $this->model = $user;
    // }

    public function index() 
    {
        // $users = $this->model->getUsers(
        //     $request->search ?? ''
        // );
        
        // return view('users.index', compact('users'));

        return view('users.index');

    }


    // public function store(StoreUpdateUserFormRequest $request) 
    // {
    //     // $user = new User;
    //     // $user->name = $request->name;
    //     // $user->email = $request->email;
    //     // $user->password = bcrypt($request->password);
    //     // $user->save();

    //     $data = $request->all();
    //     $data['password'] = bcrypt($request->password);

    //     if($request->image){        
    //     $file = $request['image'];
    //     $path = $file->store('profile', 'public');
    //     $data['image'] = $path;
    //     }

    //     $this->model->create($data);

    //     return redirect()->route('users.index');
    // }

    public function edit()
    {
        // if(!$user = $this->model->find($id))
        //     return redirect()->route('users.index');
        
        // return view('users.edit', compact('user'));
        return view('users.edit');
    }

    // public function update(StoreUpdateUserFormRequest $request, $id)
    // {
    //     if(!$user = $this->model->find($id))
    //         return redirect()->route('users.index');

    //     $data = $request->only('name', 'email');

    //     if($request->password)
    //         $data['password'] = bcrypt($request->password);

    //     $user->update($data);

    //     return redirect()->route('users.index');
    // }

}
