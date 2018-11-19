<?php

namespace App\Http\Controllers;

use App\StoreLocation;
use App\Http\Requests\StoreRetailStore;
use DB;
use Illuminate\Http\Request;

class StoresController extends Controller
{  

    public function storeIndex()
    {
        if(request()->has('sort'))
        {
            $locationList = StoreLocation::orderBy(request('sort'), 'ASC')->simplePaginate(10);
        }
        else
        {
            $locationList = StoreLocation::simplePaginate(10);
        }

        //fill search variable with empty text
        $search = "";

        return view('StoreLocation.storeIndex', compact('locationList', 'search'));

    }

    public function viewLocation($id)
    {
        $storeLocation = StoreLocation::where('StoreId', $id)->firstOrFail();       
        return view('StoreLocation.viewLocation', compact('storeLocation'));
    }

    public function insertNewLocation(StoreRetailStore $request)
    {
        $store = $request->all();

        StoreLocation::insert([
            'StoreCode' => $store['storeCode'],
            'StoreName' => $store['storeName'],
            'Address' => $store['storeAddress'],
            'City' => $store['storeCity'],
            'State' => $store['storeState'],
            'ZIP' => $store['storeZip'],
            'Phone' => $store['storePhone'],
            'ManagerName' => $store['manager']
        ]);
        return redirect()->action('StoresController@storeIndex');
    }

    public function deleteLocation($id)
    {
        $storeLocation = StoreLocation::where('StoreId', $id)->firstOrFail();
        $storeLocation->delete();

        return redirect()->action('StoresController@storeIndex');
    }

    public function editLocation($id)
    {
        $storeLocation = StoreLocation::where('StoreId', $id)->firstOrFail();       
        return view('StoreLocation.editLocation', compact('storeLocation'));
    }

    public function updateLocation(StoreRetailStore $request)
    {
        $store = $request->all();

        StoreLocation::where('StoreId', $store['storeId'])
        ->update([
            'StoreName' => $store['storeName'],
            'Address' => $store['storeAddress'],
            'City' => $store['storeCity'],
            'State' => $store['storeState'],
            'ZIP' => $store['storeZip'],
            'Phone' => $store['storePhone'],
            'ManagerName' => $store['manager']
        ]);
        
        return redirect()->action('StoresController@storeIndex');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if(request()->has('sort'))
        {
            $locationList = StoreLocation::where('StoreCode', 'like', '%' . $search . '%')
            ->orWhere('StoreName', 'like', '%' . $search . '%')
            ->orderBy(request('sort'), 'ASC')
            ->paginate(10);
        }
        else
        {
            $locationList = StoreLocation::where('StoreCode', 'like', '%' . $search . '%')
            ->orWhere('StoreName', 'like', '%' . $search . '%')
            ->paginate(10);
        }
        return view('StoreLocation.storeIndex', compact('locationList', 'search'));
    }
}
