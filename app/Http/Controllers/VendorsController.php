<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use DB;

class VendorsController extends Controller
{
    private $ss = "ThisTotallyIsntASecret";

    public function index()
    {
        $vendorList = Vendor::where('Status', 'Active')->simplePaginate(10);

        return view('/Vendor/index', compact('vendorList'));
    }

    public function inactiveIndex()
    {
        $vendorList = Vendor::where('Status', 'Inactive')->simplePaginate(10);
        
        return view('/Vendor/inactiveIndex', compact('vendorList'));
    }

    public function deleteVendor($id)
    {
        $vendor = Vendor::find($id);

        Vendor::where('VendorId', $id)->update([
            'Status' => 'Inactive'
        ]);

        foreach($vendor->items as $item)
        {
            //set each item belonging to vendor to 'Inactive' in Status field
            DB::table('inventory_item')->where('VendorId', $id)->update([
                'Status' => 'Inactive'
            ]);
        }

        return redirect()->action('VendorsController@index');
    }

    public function restoreVendor($id)
    {
        $vendor = Vendor::find($id);

        Vendor::where('VendorId', $id)->update([
            'Status' => 'Active'
        ]);

        foreach($vendor->items as $item)
        {
            //set each item belonging to vendor to 'Active' in Status field
            DB::table('inventory_item')->where('VendorId', $id)->update([
                'Status' => 'Active'
            ]);
        }

        return redirect()->action('VendorsController@index');
    }

    public function editVendor($id)
    {
        $indVendor = Vendor::where('VendorId', $id)->first();
        
        return view('/Vendor/editVendor', compact('indVendor'));
    }

    public function updateVendor(Request $request)
    {
        $vendor = $request->all();

        Vendor::where('VendorId', $vendor['vendorId'])
            ->update([
                'VendorName' => $vendor['vendorName'],
                'Address' => $vendor['vendorAddress'],
                'City' => $vendor['vendorCity'],
                'State' => $vendor['vendorState'],
                'Zip' => $vendor['vendorZip'],
                'Phone' => $vendor['vendorPhone'], 
                'ContactPersonName' => $vendor['contactPerson'],
                // 'Password' => $vendor['password'],
                'Status' => $vendor['status']
            ]);
        
        return redirect()->action('VendorsController@index');
    }

    public function viewVendor($id)
    {
        $indVendor = Vendor::where('VendorId', $id)->first();

        return view('/Vendor/viewVendor', compact('indVendor'));
    }

    public function insertNewVendor(Request $request)
    {

        $newVendor = $request->all();

        $hashedPass = $this->hashPassword($newVendor['password']);

        Vendor::insert([
            'VendorCode' => $newVendor['vendorCode'],
            'VendorName' => $newVendor['vendorName'],
            'Address' => $newVendor['vendorAddress'],
            'City' => $newVendor['vendorCity'],
            'State' => $newVendor['vendorState'],
            'Zip' => $newVendor['vendorZip'],
            'Phone' => $newVendor['vendorPhone'], 
            'ContactPersonName' => $newVendor['contactPerson'],
            'Password' => $hashedPass
        ]);

        return redirect()->action('VendorsController@index');
    }

    private function hashPassword($plainTextPass)
    {
        $initialhash = sha1($plainTextPass);
        $finalhash = sha1($initialhash.$this->ss);
        return $finalhash;
    }
}
