<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use DB;

class VendorsController extends Controller
{
    public function index()
    {
        $vendorList = DB::table('vendor')->where('Status', 'Active')->simplePaginate(10);

        return view('/Vendor/index', compact('vendorList'));
    }

    public function inactiveIndex()
    {
        $vendorList = DB::table('vendor')->where('Status', 'Inactive')->simplePaginate(10);
        
        return view('/Vendor/inactiveIndex', compact('vendorList'));
    }

    public function deleteVendor($id)
    {
        DB::table('vendor')->where('VendorId', $id)->update([
            'Status' => 'Inactive'
        ]);

        return redirect()->action('VendorsController@index');
    }

    public function restoreVendor($id)
    {
        DB::table('vendor')->where('VendorId', $id)->update([
            'Status' => 'Active'
        ]);

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
            ->update([
                'VendorName' => $vendor['vendorName'],
                'Address' => $vendor['vendorAddress'],
                'City' => $vendor['vendorCity'],
                'State' => $vendor['vendorState'],
                'Zip' => $vendor['vendorZip'],
                'Phone' => $vendor['vendorPhone'], 
                'ContactPersonName' => $vendor['contactPerson'],
                'Password' => $vendor['password'],
                'Status' => $vendor['status']
            ]);
        
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

        DB::table('vendor')->insert([
            'VendorCode' => $newVendor['vendorCode'],
            'VendorName' => $newVendor['vendorName'],
            'Address' => $newVendor['vendorAddress'],
            'City' => $newVendor['vendorCity'],
            'State' => $newVendor['vendorState'],
            'Zip' => $newVendor['vendorZip'],
            'Phone' => $newVendor['vendorPhone'], 
            'ContactPersonName' => $newVendor['contactPerson'],
            'Password' => $newVendor['password'],
            'Status' => 'Active'
        ]);

        return redirect()->action('VendorsController@index');
    }
}
