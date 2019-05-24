<?php

namespace App\Traits;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

trait storeUser
{
    public function store_user(Request $request){
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);
        if(isset($request->image)){
            $user->image = $request->image->store('users');
            $user->save();
        }
        
        return $user;
    }
}
