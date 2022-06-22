<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Exception;

class UserController extends Controller
{
    public function backendUserIndex()
    {
        return view('backendUser/index');
    }

    public function borrowerUserIndex()
    {
        return view('borrowerUser/index');
    }

    public function getBackendUsers(Request $request)
    {
        if ($request->ajax()) {
            $users = User::where('role', '<>', 'Mahasiswa')->orWhereNull('role')->get();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $button = '<a data-id="' . $user->user_id . '" class="edit btn btn-info btn-sm" onclick=edit_data($(this))><i class="far fa-edit"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-id="' .$user->user_id . '" onclick=delete_data($(this)) class="btn btn-sm btn-danger">Delete</a>';
                    return $button;
                })->addColumn('role', function($user){
                  return $user->role;
                })
                ->rawColumns(['role','action'])
                ->make(true);
        }
    }

    public function getBorrowerUsers(Request $request)
    {
        if ($request->ajax()) {
            $users = User::where('role', '=', 'Mahasiswa')->orWhereNull('role')->get();
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $button = '<a data-id="' . $user->user_id . '" class="edit btn btn-info btn-sm" onclick=edit_data($(this))><i class="far fa-edit"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-id="' . $user->user_id . '" onclick=delete_data($(this)) class="btn btn-sm btn-danger">Delete</a>';
                    return $button;
                })->addColumn('role', function($user){
                  return $user->role;
                })
                ->rawColumns(['role','action'])
                ->make(true);
        }
    }


    /**
    * @OA\Get(
    *      path="/items/{id}",
    *      summary="API for showing Items based on id",
    *      description="Returns an item data",
    *      @OA\Parameter(
    *           name: "id",
    *           description="Project id",
    *           required=true,
    *           in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful operation",
    *          @OA\JsonContent(ref="#/components/schemas/Items")
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      )
    * )
    */
    public function show($id)
    {
        return User::find($id);
    }
    /**
     * @OA\Post(
     *      path="/items",
     *      summary="Store new item",
     *      description="Returns item data",
     *      @OA\RequestBody(
     *          required=true,
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *     @OA\JsonContent(ref="#/components/schemas/Items")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *      @OA\Response(
     *          error=false
     *          message="Successfuly Added item Data!"
     *     )
     * )
     */

    public function store(Request $request)
    {
      try {
        $user = $request->all();
        User::create([
            'user_name' => $request->item_name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'role' => $request->role,
        ]);
        return response()->json([
            "error" => false,
            "message" => "Successfuly Added User Data!"
        ]);
      } catch (\Exception $e) {
        return response()->json([
            "error" => true,
            "message" => $e,
        ]);
      }
    }

    public function update(Request $request, $id)
    {
      try {
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);

        return response()->json([
            "error" => false,
            "message" => "Successfuly update User!"
        ]);
      } catch (\Exception $e) {
        return response()->json([
            "error" => true,
            "message" => $e,
        ]);
      }
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
        } catch (Exception $e) {
            return response()->json(["error" => true, "message" => $e->getMessage()]);
        }
        return response()->json(["error" => false, "message" => "Successfuly Deleted User!"]);
    }

}
