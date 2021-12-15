<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;


class SessionsController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store()
    {

        $attributes = request()->validate(
            [
            'email'=> 'required|email',
            'password'=>'required'
            ]

        );

        if (auth()->attempt($attributes))
        {
            return view('sessions.home');
        }

        //auth failed
//        ValidationException::withMessages([
//            'email'=>'Email Incorrect'
//        ]);
        else
        return redirect('register.register');

    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success','Goodbye!');
    }
}
