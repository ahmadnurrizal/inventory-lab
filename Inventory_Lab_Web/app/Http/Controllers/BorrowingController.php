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
        $item = $req->all();
        // var_dump($item);
        $req->validate([
            'idNumberRegis' => 'required|numeric',
            'passwordRegis' => 'required'
        ]);

        $user = User::where('id', $req->idNumberRegis)->get();

        if ($user != null) {
            if ($user->password == $req->passwordRegis) {
                return $user;
            } else {
                return response()->json([
                    "error" => true,
                    "message" => "Password doesn't match"
                ]);
            }
        } else {
            return response()->json([
                "error" => true,
                "message" => "Password doesn't exist"
            ]);
        }
    }

    public function create()
    {
        // code here
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
