<?php

namespace App\Http\Controllers;

use App\InventoryItem;
use DB;

class InventoryItemsController extends Controller
{
    public function index()
    {
        $items = DB::table('inventory_item')->simplePaginate(10);

        return view('InventoryItem/index', compact('items'));
    }

    public function addItem()
    {
        $items = DB::table('inventory_item');
        $vendors = DB::table('vendor');

        
    }
}
