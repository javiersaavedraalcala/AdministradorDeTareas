<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    
    public function index()
    {   
        $users = User::all();

        return view('adminUsers')->with('users', $users);
    }

  
    public function store(UserRequest $request)
    {   
        $user = User::create([
            'name' => $request->name, 
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]); 
        $users = User::all();

        return view('adminUsers', ['users' => $users]);
    }

   
    public function edit(User $user)
    {

        return view('editUser')->with('user', $user);
    } 

 
    public function update(Request $request, User $user)
    {
        if($request->password != null) {

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);
        }else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role
            ]);
        }


        return back()->with('status', 'Datos actualizados correctamente');
    }

   
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
