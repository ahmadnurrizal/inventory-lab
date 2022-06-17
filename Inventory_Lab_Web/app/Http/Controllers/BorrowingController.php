<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function view()
    {
        // code here
    }

    public function loadForm()
    {
        // code herez
    }

    public function getAll()
    {
        // code here
    }

    public function checkUserData(Request $req)
    {
        $req->validate([
            'idNumberRegis' => 'required',
            'passwordRegis' => 'required'
        ]);
        $user = User::where('id', $req->idNumberRegis)->first();
        // dd($user);
        // return $user;
        if ($user != null) {
            return response()->json([
                "error" => false,
                "message" => "Confirmed"
            ]);
        } else {
            return response()->json([
                "error" => true,
                "message" => "ID number or password doesn't match"
            ]);
        }
    }

    public function borrowItems(Request $req)
    {
        dd($req->all());
    }

    public function update($id)
    {
        // code here
    }

    public function delete($id)
    {
        // code here
    }
}
