<?php

namespace App\Http\Controllers;

use App\StoreLocation;
use DB;
use Illuminate\Http\Request;

class StoresController extends Controller
{  

    public function storeIndex()
    {
        $locationList = StoreLocation::simplePaginate(10);

        return view('StoreLocation.storeIndex', compact('locationList'));

    }

    public function viewLocation($id)
    {
        $storeLocation = StoreLocation::where('StoreId', $id)->first();       
        return view('StoreLocation.viewLocation', compact('storeLocation'));
    }

    public function insertNewLocation(Request $request)
    {
        $store = $request->all();

        StoreLocation::insert(['StoreCode' => $store['storeCode'], 'StoreName' => $store['storeName'], 'Address' => $store['storeAddress'], 'City' => $store['storeCity'],
        'State' => $store['storeState'], 'ZIP' => $store['storeZip'], 'Phone' => $store['storePhone'], 'ManagerName' => $store['manager']
        ]);
        return redirect()->action('StoresController@storeIndex');
    }

    public function deleteLocation($id)
    {
        StoreLocation::where('StoreId', $id)->delete();
        return redirect()->action('StoresController@storeIndex');
    }

    public function editLocation($id)
    {
        $storeLocation = StoreLocation::where('StoreId', $id)->first();       
        return view('StoreLocation.editLocation', compact('storeLocation'));
    }

    public function updateLocation(Request $request)
    {
        $store = $request->all();

        StoreLaction::where('StoreId', $store['storeId'])
        ->update(['StoreCode' => $store['storeCode'], 'StoreName' => $store['storeName'], 'Address' => $store['storeAddress'], 'City' => $store['storeCity'],
        'State' => $store['storeState'], 'ZIP' => $store['storeZip'], 'Phone' => $store['storePhone'], 'ManagerName' => $store['manager']
        ]);
        
        return redirect()->action('StoresController@storeIndex');
    }
}
