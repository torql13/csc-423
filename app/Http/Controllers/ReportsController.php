<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\StoreLocation;
use App\InventoryItem;
use App\Order;
use App\OrderDetail;
use App\ReturnToVendor;
use App\ReturnToVendorDetail;
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

    public function itemsDeliveredInTimeFrameReport(Request $request)
    {
        $id = $request['storeId'];
        $startDate = $request['startDate'];
        $endDate = $request['endDate'];
        $inventoryItems = Inventory::where('StoreId', $id)->get();
        $store = StoreLocation::where('StoreId', $id)->first();
        $items = InventoryItem::get();
        $orders = Order::where('StoreId', $id)->get();
        $orderDetails = OrderDetail::get();

        return view('Reports.itemsDeliveredInTimeFrame', compact('id', 'startDate', 'endDate', 'inventoryItems', 'orders', 'orderDetails', 'items', 'store'));
    }

    public function topTenItemsReturned(Request $request)
    {
        $datepicker = $request->all();
        $items = [];
        $quantity = [];
        $final = [];
        $keys = [];
        
        $returnToVendor = ReturnToVendor::where('DateTimeOfReturn', '<=', $datepicker['endDate'])
            ->where('DateTimeOfReturn', '>=', $datepicker['startDate'])
            ->where('VendorId', $datepicker['vendorId'])
            ->get();
        
        foreach($returnToVendor as $row)
            array_push($items, ReturnToVendorDetail::where('ReturnToVendorId', $row['ReturnToVendorId'])->get());
        
        foreach($items as $item)
        {
            foreach($item as $subItem)
            {
                if(isset($quantity[$subItem['ItemId']]) && $quantity[$subItem['ItemId']])
                {
                    $quantity[$subItem['ItemId']] += $subItem['QuantityReturned'];
                }
                else
                {
                    $quantity[$subItem['ItemId']] = $subItem['QuantityReturned'];
                }

                array_push($keys, $subItem['ItemId']);
                
            }
        }

        for($i=0; $i<$quantity.length; $i++)
        {
            $item = InventoryItem::where('ItemId', $keys[$i])->first();
        }
            dd($num);
            
            array_push($final, $item);
        

       dd($final);
        
    }
}