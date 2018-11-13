<?php

namespace App\Http\Controllers;

use App\InventoryItem;
use Illuminate\Http\Request;
use DB;

class InventoryItemsController extends Controller
{
    public function index()
    {
        if(request()->has('sort'))
        {
            $items = InventoryItem::where('inventory_item.Status', 'Active')
                ->join('vendor', 'vendor.VendorId', '=', 'inventory_item.VendorId')
                ->orderBy(request('sort'), 'ASC')
                ->simplePaginate(10);
        }
        else
        {
            $items = InventoryItem::where('Status', 'Active')->simplePaginate(10);
        }

        //empty string placeholder for search
        $search = "";
        
        return view('InventoryItem/index', compact('items', 'search'));
    }

    public function inactiveIndex()
    {

        if(request()->has('sort'))
        {
            $items = InventoryItem::where('inventory_item.Status', 'Inactive')
                ->whereHas('vendor', function($query){
                    $query->where('Status', 'Active');
                })
                ->join('vendor', 'vendor.VendorId', '=', 'inventory_item.VendorId')
                ->orderBy(request('sort'), 'ASC')
                ->simplePaginate(10);
        }
        else
        {
            $items = InventoryItem::where('Status', 'Inactive')
            ->whereHas('vendor', function($query){
                $query->where('Status', 'Active');
            })
            ->simplePaginate(10);
        }
        
        //empty string placeholder for search
        $search = "";

        return view('InventoryItem/inactiveIndex', compact('items', 'search'));
    }

    public function getExtraDetails()
    {
        $vendors = DB::table('vendor')->where('Status', 'Active')->get();
        if(!$vendors->count())
        {
            session(['emptyVendor' => '1']);
            return $this->index();
        }
        //pull divisions and categories from the divisions and categories arrays in inventory item model
        $divisions = DB::table('divisions')->get();
        $categories = DB::table('categories')->get();
        return view('InventoryItem/addItem', compact('vendors', 'divisions', 'categories'));
    }

    public function insertNewItem(Request $request)
    {
        $newItem = $request->all();
        
        InventoryItem::insert(
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
        $item = InventoryItem::where('ItemId', $id)->firstOrFail();
        if($item->vendor->Status === 'Inactive')
        {
            session(['noItem' => '1']);
            return redirect()->action('InventoryItemsController@index');
        }
        $vendors = DB::table('vendor')->where('Status', 'Active')->get();

        //pull divisions and categories data from the divisions and categories tables
        $divisions = DB::table('divisions')->get();
        $categories = DB::table('categories')->get();

        return view('/InventoryItem/editItem', compact('item', 'vendors', 'divisions', 'categories'));
    }

    public function updateItem(Request $request)
    {
        $item = $request->all();

        InventoryItem::where('ItemId', $item['itemId'])->update(
            [
                'Description' => $item['description'],
                'Size' => $item['size'],
                'Division' => $item['division'],
                'Department' => $item['department'],
                'Category' => $item['category'],
                'ItemCost' => $item['cost'],
                'ItemRetail' => $item['retail'], 
                'ImageFileName' => $item['imgFileName'],
                'VendorId' => $item['vendorId'],
                'Status' => $item['status']
            ]
        );
        
        return redirect()->action('InventoryItemsController@index');
    }

    public function deleteItem($id)
    {
        $item = InventoryItem::where([
            ['ItemId', $id],
            ['Status', 'Active']
        ])->firstOrFail();
        if($item->vendor->Status === "Inactive")
        {
            session(['noItem' => '1']);
            return redirect()->action('InventoryItemsController@index');
        }

        InventoryItem::where('ItemId', $id)->update([
            'Status' => 'Inactive'
        ]);

        return redirect()->action('InventoryItemsController@index');
    }

    public function restoreItem($id)
    {
        //get item matching the id given or 404 if no match
        $item = InventoryItem::where([
            ['ItemId', $id],
            ['Status', 'Inactive']
        ])->firstOrFail();
        //if item doesn't exist, write noItem as true into session and redirect to index;
        //   an alert will be shown
        /*if(!$item)
        {
            session(['noItem' => '1']);
            return redirect()->action('InventoryItemsController@index');
        }*/

        //get the vendor the item belongs to via model link
        $vendor = $item->vendor;

        //if the vendor for this item is inactive, write noItem as true into session and 
        //   redirect to index; an alert will be shown
        if($vendor->Status === 'Inactive')
        {
            session(['noItem' => '1']);
            return redirect()->action('InventoryItemsController@index');
        }

        InventoryItem::where('ItemId', $id)->update([
            'Status' => 'Active'
        ]);

        return redirect()->action('InventoryItemsController@index');
    }

    public function viewItem($id)
    {
        $indItem = InventoryItem::where('ItemId', $id)->firstOrFail();
        if($indItem->vendor->Status === 'Inactive')
        {
            session(['noItem' => '1']);
            return redirect()->action('InventoryItemsController@index');
        }

        $vendors = DB::table('vendor')->get();

        return view('/InventoryItem/viewItem', compact('indItem', 'vendors'));
    }
    
    public function searchActive(Request $request)
    {
        $search = $request->input('search');

        if(request()->has('sort'))
        {
            $items = InventoryItem::where([
                ['Description', 'like', '%' . $search . '%'],
                ['inventory_item.Status', 'Active']
            ])
            ->orWhere([
                ['ItemId', 'like', '%' . $search . '%'],
                ['inventory_item.Status', 'Active']
            ])
            ->orWhere([
                ['vendor.VendorName', 'like', '%' . $search . '%'],
                ['inventory_item.Status', 'Active']
            ])
            ->join('vendor', 'vendor.VendorId', '=', 'inventory_item.VendorId')
            ->orderBy(request('sort'), 'ASC')
            ->paginate(10);
        }
        else
        {
            $items = InventoryItem::where([
                ['Description', 'like', '%' . $search . '%'],
                ['inventory_item.Status', 'Active']
            ])
            ->orWhere([
                ['ItemId', 'like', '%' . $search . '%'],
                ['inventory_item.Status', 'Active']
            ])
            ->orWhere([
                ['vendor.VendorName', 'like', '%' . $search . '%'],
                ['inventory_item.Status', 'Active']
            ])
            ->join('vendor', 'vendor.VendorId', '=', 'inventory_item.VendorId')
            ->paginate(10);
        }
        return view('InventoryItem/index', compact('items', 'search'));
    }

    public function searchInactive(Request $request)
    {
        $search = $request->input('search');

        if(request()->has('sort'))
        {
            $items = InventoryItem::where([
                ['Description', 'like', '%' . $search . '%'],
                ['inventory_item.Status', 'Inactive']
            ])
            ->orWhere([
                ['ItemId', 'like', '%' . $search . '%'],
                ['inventory_item.Status', 'Inactive']
            ])
            ->orWhere([
                ['vendor.VendorName', 'like', '%' . $search . '%'],
                ['inventory_item.Status', 'Inactive']
            ])
            ->join('vendor', 'vendor.VendorId', '=', 'inventory_item.VendorId')
            ->orderBy(request('sort'), 'ASC')
            ->paginate(10);
        }
        else
        {
            $items = InventoryItem::where([
                ['Description', 'like', '%' . $search . '%'],
                ['inventory_item.Status', 'Inactive']
            ])
            ->orWhere([
                ['ItemId', 'like', '%' . $search . '%'],
                ['inventory_item.Status', 'Inactive']
            ])
            ->orWhere([
                ['vendor.VendorName', 'like', '%' . $search . '%'],
                ['inventory_item.Status', 'Inactive']
            ])
            ->join('vendor', 'vendor.VendorId', '=', 'inventory_item.VendorId')
            ->paginate(10);
        }

        return view('InventoryItem/inactiveIndex', compact('items', 'search'));
    }
}