<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use DB;

class VendorsController extends Controller
{
    public function index()
    {
        $shortenVendorList = DB::table('vendor')->simplePaginate(5);
        $shortenLocationList = DB::table('retail_store')->simplePaginate(5);

        return view('index', compact('shortenVendorList', 'shortenLocationList'));
    }

    public function deleteVendor($id)
    {
        DB::table('vendor')->where('VendorId', $id)->delete();

        return redirect()->action('VendorsController@index');
    }

    public function editVendor($id)
    {
        $indVendor = DB::table('vendor')->where('VendorId', $id)->first();
        
        return view('/Vendor/editVendor', compact('indVendor'));
    }

    public function updateVendor(Request $request)
    {
        $vendor = $request->all();

        DB::table('vendor')->where('VendorId', $vendor['vendorId'])
            ->update(['VendorName' => $vendor['vendorName'], 'Address' => $vendor['vendorAddress'], 'City' => $vendor['vendorCity'],
            'State' => $vendor['vendorState'], 'Zip' => $vendor['vendorZip'], 'Phone' => $vendor['vendorPhone'], 
            'ContactPersonName' => $vendor['contactPerson'], 'Password' => $vendor['password']]);
        
        return redirect()->action('VendorsController@index');
    }

    public function viewVendor($id)
    {
        $indVendor = DB::table('vendor')->where('VendorId', $id)->first();

        return view('/Vendor/viewVendor', compact('indVendor'));
    }

    public function insertNewVendor(Request $request)
    {

        $newVendor = $request->all();

        DB::table('vendor')->insert(
            ['VendorCode' => $newVendor['vendorCode'], 'VendorName' => $newVendor['vendorName'], 'Address' => $newVendor['vendorAddress'], 'City' => $newVendor['vendorCity'],
        'State' => $newVendor['vendorState'], 'Zip' => $newVendor['vendorZip'], 'Phone' => $newVendor['vendorPhone'], 
        'ContactPersonName' => $newVendor['contactPerson'], 'Password' => $newVendor['password']]
        );

        return redirect()->action('VendorsController@index');
    }
}
