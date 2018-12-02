<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\StoreLocation;
use App\InventoryItem;
use Illuminate\Http\Request;
use DB;

class ReportsController extends Controller
{
    public function inventoryReport($id)
    {
        $inventoryItems = Inventory::where('StoreId', $id)->get();
        $store = StoreLocation::where('StoreId', $id)->first();
        $items = InventoryItem::get();
        
        return view('Reports.inventoryReport', compact('inventoryItems', 'store', 'items'));
    }
}