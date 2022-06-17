<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function regis()
    {
        return view('auth/register');
    }

    public function regisAction(Request $request)
    {
        // dd($request->all());
        $fields = $request->validate([
            'nameRegis' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'passwordRegis' => 'required|string',
            'phoneNumberRegis' => 'required',
            'addressRegis' => 'required'
        ]);


        $user = User::create([
            'name' => $request->nameRegis,
            'email' => $request->email,
            'password' =>  $request->passwordRegis,
            'phone' =>  $request->phoneRegis,
            'address' =>  $request->addressRegis,
        ]);

        // // creating token
        $token = $user->createToken('myapptoken')->plainTextToken;

        return view('dashboard');
    }
}
