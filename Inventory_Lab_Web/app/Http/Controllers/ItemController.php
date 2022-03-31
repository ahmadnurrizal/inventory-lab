<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        return view('item/index');
    }

    public function getItems(Request $request)
    {
        if ($request->ajax()) {
            $items = Item::latest()->get();
            return DataTables::of($items)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    $button = '<a data-id="' . $item->id . '" class="edit btn btn-info btn-sm" onclick=edit_data($(this))><i class="far fa-edit"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a data-id="' . $item->id . '" onclick=delete_data($(this)) class="btn btn-sm btn-danger">Delete</a>';
                    return $button;
                })->addColumn('image', function ($item) {
                    $imagePath = url('images/' . $item->image_path);
                    return '<img src="' . $imagePath . '" border="0" width="200" class="img-rounded" align="center" />';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
    }

    public function show($id)
    {
        return Item::find($id);
    }

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
}
