<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        // $inventory =  Inventory::all();
        return view('inventory/index');
    }
}
