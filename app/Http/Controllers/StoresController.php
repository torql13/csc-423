<?php

namespace App\Http\Controllers;

use App\StoreLocation;
use DB;
use Illuminate\Http\Request;

class StoresController extends Controller
{  

    public function storeIndex()
    {
        $locationList = DB::table('retail_store')->simplePaginate(10);

        return view('StoreLocation.storeIndex', compact('locationList'));

    }

    public function viewLocation($id)
    {
        echo "test " . $id;
    }

    public function insertNewLocation()
    {
        $name = $_POST['storeName'];
        $addr = $_POST['storeAddress'];
        $city = $_POST['storeCity'];
        $state = $_POST['storeState'];
        $zip = $_POST['storeZip'];
        $phone = $_POST['storePhone'];
        $manager = $_POST['manager'];
        $storeCode = $_POST['storeCode'];

        DB::table('retail_store')->insert([
            ['StoreCode'=> $storeCode, 'StoreName' => $name, 'Address' => $addr, 'City' => $city, 'State' => $state,
            'Zip' => $zip, 'Phone' => $phone, 'ManagerName' => $manager]
        ]);
        return redirect()->action('StoresController@storeIndex');
    }

    public function deleteLocation($id)
    {
        DB::table('retail_store')->where('StoreId', $id)->delete();
        return redirect()->action('StoresController@storeIndex');
    }

    public function editLocation($id)
    {
        $storeLocation = DB::table('retail_store')->where('StoreId', $id)->first();
                
        return view('StoreLocation.editLocation', compact('storeLocation'));
    }

    public function updateLocation(Request $request)
    {
        $store = $request->all();

        DB::table('retail_store')->where('StoreId', $store['storeId'])
        ->update(['StoreCode' => $store['storeCode'], 'StoreName' => $store['storeName'], 'Address' => $store['storeAddress'], 'City' => $store['storeCity'],
        'State' => $store['storeState'], 'ZIP' => $store['storeZip'], 'Phone' => $store['storePhone'], 'ManagerName' => $store['manager']
        ]);
        
        return redirect()->action('StoresController@storeIndex');
    }
}
