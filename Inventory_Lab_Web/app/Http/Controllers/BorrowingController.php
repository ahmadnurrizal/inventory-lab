<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\BorrowingItem;
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
        $user = User::where('user_id', $req->idNumberRegis)->first();
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
        $borrowing = Borrowing::create([
            'user_id' => $req->nim_borrow,
            'return_at' => $req->date
        ]);
        foreach ($req->itemList as $item) {
            BorrowingItem::create([
                'borrowing_id' =>  $borrowing->borrowing_id,
                'item_id' => $item
            ]);
        }
        // dd($req->all());
        return view('admin.dashboard');
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
