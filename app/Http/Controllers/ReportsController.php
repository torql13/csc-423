<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\StoreLocation;
use App\InventoryItem;
use App\Order;
use App\OrderDetail;
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

    public function overstockedReport(Request $request)
    {
        $id = $request['storeId'];
        $overstockThreshold = $request['overstockThreshold'];
        $inventoryItems = Inventory::where('StoreId', $id)->get();
        $store = StoreLocation::where('StoreId', $id)->first();
        $items = InventoryItem::get();

        return view('Reports.overstockedReport', compact('inventoryItems', 'store', 'items', 'overstockThreshold', 'id'));
    }

    public function enterStartAndEndDates($id)
    {
        $storeId = $id;
        return view('Reports.enterStartAndEndDates', compact('storeId'));
    }

    public function itemsDeliveredInTimeFrameReport(Request $request)
    {
        $id = $request['storeId'];
        $startDate = $request['startDate'];
        $endDate = $request['endDate'];
        $inventoryItems = Inventory::where('StoreId', $id)->get();
        $store = StoreLocation::where('StoreId', $id)->first();
        $items = InventoryItem::get();
        $orders = Order::where('StoreId', $id)->where('Status', 'Delivered')->where('DateTimeOfFulfillment', '>=', $startDate)
                        ->where('DateTimeOfFulfillment', '<=', $endDate)->get();
        $orderDetails = OrderDetail::get();

        return view('Reports.itemsDeliveredInTimeFrame', compact('id', 'startDate', 'endDate', 'inventoryItems', 'orders', 'orderDetails', 'items', 'store'));
    }
}