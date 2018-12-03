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

    public function enterOverstockThreshold($id)
    {
        $storeId = $id;
        return view('Reports.enterOverstockThreshold', compact('storeId'));
    }

    public function overstockedReport()
    {
        $id = $_POST['storeId'];
        $overstockThreshold = $_POST['overstockThreshold'];
        $inventoryItems = Inventory::where('StoreId', $id)->get();
        $store = StoreLocation::where('StoreId', $id)->first();
        $items = InventoryItem::get();

        return view('Reports.overstockedReport', compact('inventoryItems', 'store', 'items', 'overstockThreshold', 'id'));
    }
}