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
            [
                'Description' => $newItem['description'],
                'Size' => $newItem['size'],
                'Division' => $newItem['division'],
                'Department' => $newItem['department'],
                'Category' => $newItem['category'],
                'ItemCost' => $newItem['cost'],
                'ItemRetail' => $newItem['retail'], 
                'ImageFileName' => $newItem['imgFileName'],
                'VendorId' => $newItem['vendorId']
            ]
        );

        return redirect()->action('InventoryItemsController@index');
    }

    public function editItem($id)
    {
        $item = DB::table('inventory_item')->where('ItemId', $id)->first();
        $vendors = DB::table('vendor')->get();

        return view('/InventoryItem/editItem', compact('item', 'vendors'));
    }

    public function updateItem(Request $request)
    {
        $item = $request->all();

        DB::table('inventory_item')->where('ItemId', $item['itemId'])->update(
            [
                'Description' => $item['description'],
                'Size' => $item['size'],
                'Division' => $item['division'],
                'Department' => $item['department'],
                'Category' => $item['category'],
                'ItemCost' => $item['cost'],
                'ItemRetail' => $item['retail'], 
                'ImageFileName' => $item['imgFileName'],
                'VendorId' => $item['vendorId']
            ]
        );
        
        return redirect()->action('InventoryItemsController@index');
    }

    public function deleteItem($id)
    {
        DB::table('inventory_item')->where('ItemId', $id)->delete();

        return redirect()->action('InventoryItemsController@index');
    }
}