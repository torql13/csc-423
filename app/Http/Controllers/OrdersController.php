<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use DB;
use DateTime;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::simplePaginate(10);

        return view('order/index', compact('orders'));
    }

    public function getVendorsAndStores()
    {
        $vendors = DB::table('vendor')->get()->where('Status', 'Active');
        $stores =  DB::table('retail_store')->get();

        return view('Order/newOrder', compact('vendors', 'stores'));
    }

    public function createNewOrder(Request $request)
    {
        $newOrder = $request->all();
        $now = new DateTime();
        
        Order::insert(
            [
                'VendorId' => $newOrder['vendorId'],
                'StoreId' => $newOrder['storeId'],
                'DateTimeOfOrder' => $now,
                'Status' => 'Pending'
            ]
        );

        $vendorId = $newOrder['vendorId'];
        $items = DB::table('inventory_item')->get()->where('VendorId', $vendorId);
        $order = Order::get()->last();
        return view('Order/addOrderDetails', compact('vendorId', 'items', 'order'));
        //return redirect()->action('OrderDetailsController@getOrderAndItems');
    }

    public function editOrder($id)
    {
        $order = Order::where('OrderId', $id)->first();
        $vendors = DB::table('vendor')->get()->where('Status', 'Active');
        $stores = DB::table('retail_store')->get();

        return view('/Order/editOrder', compact('order', 'vendors', 'stores'));
    }

    public function updateOrder(Request $request)
    {
        $order = $request->all();

        Order::where('OrderId', $order['orderId'])->update(
            [
                'VendorId' => $order['vendorId'],
                'StoreId' => $order['storeId'],
                'DateTimeOfOrder' => $order['dateTimeOfOrder'],
                'Status' => 'Pending',
                'DateTimeOfFulfillment' => $order['dateTimeOfFullfilment']
            ]
        );
        
        return redirect()->action('OrdersController@index');
    }

    public function deleteOrder($id)
    {
        Order::where('OrderId', $id)->delete();

        return redirect()->action('OrdersController@index');
    }

    public function viewOrder($id)
    {
        $indOrder = Order::where('OrderId', $id)->first();
        $vendors = DB::table('vendor')->get()->where('Status', 'Active');
        $stores = DB::table('retail_store')->get();

        return view('/Order/viewOrder', compact('indOrder', 'vendors', 'stores'));
    }
}