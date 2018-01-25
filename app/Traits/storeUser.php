<?php

namespace Dentist\Traits;

use Dentist\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

trait storeUser
{
    public function store_user(Request $request){
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return $user;
    }
}
