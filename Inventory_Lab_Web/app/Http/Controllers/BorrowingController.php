<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\BorrowingItem;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function borrowingIndex()
    {
      return view('/borrowing/index');
    }

    public function returningIndex()
    {
      return view('/returning/index');
    }

    public function getBorrowing(Request $request, $flag)
    {
      if ($request->ajax()) {
        $borrowing = null;
        if($flag == "returning"){
          $borrowings = Borrowing::with('items', 'user')->where('status', '=', 'Returned')->orWhereNull('status')->get();
        }else if ($flag == "borrowing"){
          $borrowings = Borrowing::with('items', 'user')->where('status', '!=', 'Returned')->orWhereNull('status')->get();
        }
        return DataTables::of($borrowings)
            ->addIndexColumn()
            ->addColumn('user_name', function($borrowing){
              return User::find($borrowing->user_id)->user_name;
            })
            ->addColumn('items', function($borrowing){
              $strings = "";
              foreach ($borrowing->items as $item) {
                $strings .= $item->item_name ." (.$item->item_id.), ";
              }
              return $strings;
            })
            ->addColumn('action', function ($borrowing) {
                $button = '<a data-id="' . $borrowing->borrowing_id . '" class="edit btn btn-success btn-sm" id="btn-invoice"> <i class="bi bi-receipt"></i> Invoice </a>';
                $button .= '&nbsp;&nbsp;';
                return $button;
            })->addColumn('status', function($borrowing){
              return $borrowing->status;
            })
            ->rawColumns(['user_name','items','status','action'])
            ->make(true);
      }
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

    public function invoice(Request $request, $id){
      $borrowing = json_decode(Borrowing::with('items', 'user')->get()->find($id));
      return view('borrowing/invoice')
                ->with('borrowing', $borrowing);
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
