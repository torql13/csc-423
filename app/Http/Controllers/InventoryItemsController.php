<?php

namespace App\Http\Controllers;

use App\InventoryItem;
use Illuminate\Http\Request;
use DB;

class InventoryItemsController extends Controller
{
    public function index()
    {
        $items = DB::table('inventory_item')->simplePaginate(10);

        return view('InventoryItem/index', compact('items'));
    }

    public function getVendors()
    {
        $vendors = DB::table('vendor')->get();

        return view('InventoryItem/addItem', compact('vendors'));
    }

    public function insertNewItem(Request $request)
    {
        $newItem = $request->all();
        
        DB::table('inventory_item')->insert(
            ['Description' => $newItem['description'], 'Size' => $newItem['size'], 'Division' => $newItem['division'], 'Department' => $newItem['department'],
        'Category' => $newItem['category'], 'ItemCost' => $newItem['cost'], 'ItemRetail' => $newItem['retail'], 
        'ImageFileName' => $newItem['imgFileName'], 'VendorId' => $newItem['vendorId']]
        );

        return redirect()->action('InventoryItemsController@index');
    }
}
