<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use Illuminate\Http\Request;
use DB;
use DateTime;

class OrderDetailsController extends Controller
{
    public function insertOrderAndDetails(Request $request)
    {
        $details = $request->all();
        $now = new DateTime();
        //start working on loop to add all the items to the order
        //$orderId = $details['orderId'];
        $count = $details['numItems'];

        DB::table('order')->insert(
            [
                'VendorId' => $details['vendorId'],
                'StoreId' => $details['storeId'],
                'DateTimeOfOrder' => $now,
                'Status' => 'Pending'
            ]
        );

        $order = DB::table('order')->get()->last();
        
        for ($i = 0; $i < $count; $i++)
        {
            OrderDetail::insert(
            [
                'OrderId' => $order->OrderId,
                'ItemId' => $details['itemId'.$i], 
                'QuantityOrdered' => $details['quantity'.$i]
            ]
            );
        }
        return redirect()->action('OrdersController@index');
    }

    public function addDetailsExistingOrder($id)
    {
        $order = DB::table('order')->where('OrderId', $id)->first();
       // $vendor = DB::table('vendor')->get()->where('VendorId', $order['VendorId']);
       $vendorId = $order->VendorId;
        //$items = DB::table('inventory_item')->get()->where('VendorId', $order['VendorId']);
        $items = DB::table('inventory_item')->get()->where('VendorId', $vendorId);

        return view('/Order/addDetailsExistingOrder', compact('order', 'vendorId', 'items'));
    }

    public function updateDetailsExistingOrder(Request $request)
    {
        $details = $request->all();
        $count = $details['numItems'];

        for ($i = 0; $i < $count; $i++)
        {
            OrderDetail::insert(
            [
                'OrderId' => $details['orderId'],
                'ItemId' => $details['itemId'.$i], 
                'QuantityOrdered' => $details['quantity'.$i]
            ]
            );
        }
        return redirect()->action('OrdersController@index');
    }

   /*  public function viewOrder($id)
    {
        $indOrder = Order::where('OrderId', $id)->first();
        $vendors = DB::table('vendor')->get()->where('Status', 'Active');
        $stores = DB::table('retail_store')->get();
        $orderDetails = DB::table('order_detail')->get()->where('OrderId', $id);

        return view('/Order/viewOrder/', compact('indOrder', 'vendors', 'stores', 'orderDetails'));
    } */
}