<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Alert;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function loginAction(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // check email
        $user = User::where('email', $fields['email'])->first();


        // check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'error' => true,
                'message' => 'Bed Creds'
            ]);
        }

        $response = [
            'error' => false,
            'user' => $user,
        ];


        return response($response);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete(); // Delete token (code is good, ignore error)
        return response(['message' => 'logged out']);
    }

    public function loginIndex()
    {
        return view('auth/login');
    }

    public function regisIndex()
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
            'phoneNumberRegis' => 'required|unique:users,phone_number',
            'addressRegis' => 'required',
            'nim' => 'required|unique:users,user_id'
        ]);


        $user = User::create([
            'user_name' => $request->nameRegis,
            'email' => $request->email,
            'password' =>  bcrypt($request->passwordRegis),
            'phone_number' =>  $request->phoneNumberRegis,
            'address' =>  $request->addressRegis,
            'user_id' =>  $request->nim,
        ]);

        Alert::success('Congrats', 'You\'ve Successfully Registered');
        return view('welcome');
    }
}
