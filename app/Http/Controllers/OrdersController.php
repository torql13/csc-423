<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Inventory;
use App\ReturnToVendor;
use App\ReturnToVendorDetail;
use App\Http\Requests\StoreOrder;
use Illuminate\Http\Request;
use DB;
use DateTime;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('Status', '!=', "Returned")->orderBy('Status', 'DESC')->simplePaginate(10);
        $search = "";

        return view('Order/index', compact('orders', 'search'));
    }

    public function getVendorsAndStores()
    {
        $vendors = DB::table('vendor')->where('Status', 'Active')->get();
        $items = DB::table('inventory_item')->where('Status', 'Active')->get();
        $stores =  DB::table('retail_store')->where('Status', 'Active')->get();

        return view('Order/newOrder', compact('vendors', 'stores', 'items'));
    }

    public function createNewOrder(StoreOrder $request)
    {
        $newOrder = $request->all();
        $now = new DateTime();


        $vendorId = $newOrder['vendorId'];
        $items = DB::table('inventory_item')->where([
            ['VendorId', $vendorId],
            ['Status', 'Active']
        ])->get();

        return view('Order/addOrderDetails', compact('vendorId', 'items', 'newOrder'));
    }

    public function viewVendorOrders()
    {
        $orders = Order::where('VendorId', session('VendorId'))->orderBy('Status', 'DESC')->simplePaginate(10);

        return view('Order/viewVendorOrders', compact('orders'));
    }

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
            $existingItem = Inventory::where('ItemId', $detail['ItemId'])->where('StoreId', $order['StoreId'])->get();

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

        }

        return redirect('/order');
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

    public function singleOrderReturn($id)
    {
        $returnToVendorDetail = [];
        $inventoryUpdate = [];

        $now = new DateTime();

        $order = Order::where('OrderId', $id)->first();

        $orderDetails = OrderDetail::where('OrderId', $id)->get();
        
        $notEnough = false;

        foreach($orderDetails as $detail)
        {
            $inventory = Inventory::where('StoreId', $order['StoreId'])->where('ItemId', $detail['ItemId'])->first();

            $tempQuantity = $inventory['QuantityInStock'] - $detail['QuantityOrdered'];

            if($tempQuantity < 0)
            {
                //error
                $notEnough = true;
            }
            else
            {

                $returnDetail[0] = $detail['ItemId'];
                $returnDetail[1] = $detail['QuantityOrdered'];
                array_push($returnToVendorDetail, $returnDetail);

                $inventoryDetail[0] = $order['StoreId'];
                $inventoryDetail[1] = $detail['ItemId'];
                $inventoryDetail[2] = $tempQuantity;
                array_push($inventoryUpdate, $inventoryDetail);
            }
        }

        if(!$notEnough)
        {
            foreach($inventoryUpdate as $update)
            {
                Inventory::where('StoreId', $update[0])->where('ItemId', $update[1])->update([
                    'QuantityInStock' => $update[2]
                ]);
            }

            Order::where('OrderId', $id)->update([
                'status' => 'Returned'
            ]);
    
            ReturnToVendor::insert([
                'VendorId' => $order['VendorId'],
                'StoreId' => $order['StoreId'],
                'DateTimeOfReturn' => $now
            ]);
    
            $returnId = ReturnToVendor::where('VendorId', $order['VendorId'])
                ->where('StoreId', $order['StoreId'])
                ->where('DateTimeOfReturn', $now)
                ->first();
                
            foreach($returnToVendorDetail as $insert)
            {
                ReturnToVendorDetail::insert([
                    'ReturnToVendorId' => $returnId->ReturnToVendorId,
                    'ItemId' => $insert[0],
                    'QuantityReturned' => $insert[1]
                ]);

            }
            
            return redirect()->back()->with("success", "Order Successfully Returned");
        }
        else
        {
            return redirect()->back()->with("error", "Not Enough Inventory to Return");
        }
        
    }
}