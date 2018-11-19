<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Inventory;
use Illuminate\Http\Request;
use DB;
use DateTime;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('Status', '!=', "Returned")->orderBy('Status', 'DESC')->simplePaginate(10);
        $search = "";

        return view('order/index', compact('orders', 'search'));
    }

    public function getVendorsAndStores()
    {
        $vendors = DB::table('vendor')->get()->where('Status', 'Active');
        $items = DB::table('inventory_item')->get();
        $stores =  DB::table('retail_store')->get();

        return view('Order/newOrder', compact('vendors', 'stores', 'items'));
    }

    public function createNewOrder(Request $request)
    {
        $newOrder = $request->all();
        $now = new DateTime();


        $vendorId = $newOrder['vendorId'];
        $items = DB::table('inventory_item')->get()->where('VendorId', $vendorId);
        //$order = Order::get()->last();
        return view('Order/addOrderDetails', compact('vendorId', 'items', 'newOrder'));
        //return redirect()->action('OrderDetailsController@getOrderAndItems');
    }

    public function viewVendorOrders()
    {
        $orders = Order::where('VendorId', session('VendorId'))->orderBy('Status', 'DESC')->simplePaginate(10);

        return view('order/viewVendorOrders', compact('orders'));
    }

    /* public function editOrder($id)
    {
        $order = Order::where('OrderId', $id)->first();
        $vendors = DB::table('vendor')->get()->where('Status', 'Active');
        $stores = DB::table('retail_store')->get();

        return view('/Order/editOrder', compact('order', 'vendors', 'stores'));
    } */

    /* public function updateOrder(Request $request)
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
    }*/

    /* public function deleteOrder($id)
    {
        Order::where('OrderId', $id)->delete();

        return redirect()->action('OrdersController@index');
    } */

    public function viewOrder($id)
    {
        $indOrder = Order::where('OrderId', $id)->first();
        $vendors = DB::table('vendor')->get()->where('Status', 'Active');
        $stores = DB::table('retail_store')->get();
        $orderDetails = DB::table('order_detail')->get()->where('OrderId', $id);

        return view('Order/viewOrder', compact('indOrder', 'vendors', 'stores', 'orderDetails'));
    }
    
    public function processDelivery($id)
    {
        $order = Order::where('OrderId', $id)->first();

        $orderDetails = OrderDetail::where('OrderId', $id)->get();

        foreach($orderDetails as $detail)
        {
            $existingItem = Inventory::where('ItemId', $detail['ItemId'])->get();

            if(!count($existingItem))
            {
                Inventory::insert([
                    'StoreId' => $order['StoreId'],
                    'ItemId' => $detail['ItemId'],
                    'QuantityInStock' => $detail['QuantityOrdered']
                ]);
            }
            else
            {
                $quantity = $existingItem[0]['QuantityInStock'];

                $totalQuantity = $quantity + $detail['QuantityOrdered'];

                Inventory::where('ItemId', $detail['ItemId'])->update([
                    'QuantityInStock' => $totalQuantity
                ]);
            }

            $now = new DateTime();

            Order::where('OrderId', $id)->update([
                'Status' => 'Delivered',
                'DateTimeOfFulfillment' => $now
            ]);

            return redirect('/order');
        }
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        if(!$search)
        {
            return $this->index();
        }
        $orders = Order::where('OrderId', 'like', '%' . $search . '%')
            ->paginate(10);
        return view('Order.index', compact('orders', 'search'));
    }
}