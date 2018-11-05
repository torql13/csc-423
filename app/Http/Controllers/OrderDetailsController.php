<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use Illuminate\Http\Request;
use DB;
use DateTime;

class OrderDetailsController extends Controller
{
    public function getOrderAndItems()
    {

        $items =  DB::table('inventory_item')->where('VendorId', $vendor)->get();
        
        return view('OrderDetail/addOrderDetails', compact('vendor', 'items'));
    }

    public function insertOrderDetails(Request $request)
    {
        $details = $request->all();
        //start working on loop to add all the items to the order
        $orderId = $details['orderId'];
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

    public function viewOrder($id)
    {
        $indOrder = Order::where('OrderId', $id)->first();
        $vendors = DB::table('vendor')->where('Status', 'Active')->get();
        $stores = DB::table('retail_store')->get();

        return view('/Order/viewOrder', compact('indOrder', 'vendors', 'stores'));
    }
}