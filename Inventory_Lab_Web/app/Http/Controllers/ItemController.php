<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

/**
 * @authenticated
 *
 * APIs for managing Items
 */

class ItemController extends Controller
{

    /**
   * @OA\Get(
   *      path="/item/index",
   *      summary="Get the pages of Items",
   *      description="Returns routes for items.page",
   *      @OA\Response(
   *          response=200,
   *          description="Successful operation",
   *       ),
   *      @OA\Response(
   *          response=401,
   *          description="Unauthenticated",
   *      ),
   *      @OA\Response(
   *          response=403,
   *          description="Forbidden"
   *      )
   *     )
   */
    public function index()
    {
        return view('item/index');
    }

    /**
    * @OA\Get(
    *      path="/items/{id}",
    *      summary="API for showing DataTables of Items",
    *      description="Returns DataTables of items data",
    *      @OA\RequestBody(
    *          required=true,
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

    public function getItems(Request $request)
    {
        if ($request->ajax()) {
            $items = Item::latest()->get();
            return DataTables::of($items)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    $button = '<a data-id="' . $item->item_id . '" class="edit btn btn-info btn-sm" onclick=edit_data($(this))><i class="far fa-edit"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-id="' . $item->item_id . '" onclick=delete_data($(this)) class="btn btn-sm btn-danger">Delete</a>';
                    return $button;
                })->addColumn('image', function ($item) {
                    $imagePath = url('images/' . $item->image_url);
                    return '<img src="' . $imagePath . '" border="0" width="200" class="img-rounded" align="center" />';
                })
                ->rawColumns(['image', 'action'])
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
        return Item::find($id);
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
        $item = $request->all();
        // var_dump($request);
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:1024'
        ]);

        // create new uniq name of image
        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'stored_location' => $request->stored_location,
            'category' => $request->category,
            'image_path' => $newImageName,
        ]);

        // saving image to /public/images directory
        $request->image->move(public_path('images'), $newImageName);

        return response()->json([
            "error" => false,
            "message" => "Successfuly Added item Data!"
        ]);
    }

    public function uploadFile(Request $request)
    {
    }

    public function updateStatus($id, $status)
    {

        $item = Item::where('id', $id)->get();

        if ($item != null) {
            $item->status = $status;
            $item->save();
            return response()->json([
                "error" => false,
                "message" => "Successfuly update item"
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $Item = Item::find($id);
            $Item->delete();
        } catch (Exception $e) {
            return response()->json(["error" => true, "message" => $e->getMessage()]);
        }
        return response()->json(["error" => false, "message" => "Successfuly Deleted Item!"]);
    }
}
