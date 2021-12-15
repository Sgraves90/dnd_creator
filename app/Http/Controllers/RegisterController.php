<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\ValidationException;
//use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.register');
    }
    public function store()
    {
        $attributes = request()->validate(
        [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]
        );
        $attributes['password']=bcrypt($attributes['password']);
        User::create($attributes);
    }

}
