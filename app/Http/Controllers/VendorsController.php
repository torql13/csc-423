<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use DB;

class VendorsController extends Controller
{
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
        Vendor::where('VendorId', $id)->update([
            'Status' => 'Inactive'
        ]);

        return redirect()->action('VendorsController@index');
    }

    public function restoreVendor($id)
    {
        Vendor::where('VendorId', $id)->update([
            'Status' => 'Active'
        ]);

        return redirect()->action('VendorsController@index');
    }

    public function editVendor($id)
    {
        $indVendor = Vendor::where('VendorId', $id)->first();
        $defaultState = $indVendor->State;
        $states = ['AL','AK','AZ','AR','CA','CO','CT','DE','DC','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI',
                    'MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VT',
                    'VA','WA','WV','WI','WY'];
        
        return view('/Vendor/editVendor', compact('indVendor', 'defaultState', 'states'));
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
                'Password' => $vendor['password'],
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

        Vendor::insert([
            'VendorCode' => $newVendor['vendorCode'],
            'VendorName' => $newVendor['vendorName'],
            'Address' => $newVendor['vendorAddress'],
            'City' => $newVendor['vendorCity'],
            'State' => $newVendor['vendorState'],
            'Zip' => $newVendor['vendorZip'],
            'Phone' => $newVendor['vendorPhone'], 
            'ContactPersonName' => $newVendor['contactPerson'],
            'Password' => $newVendor['password'],
        ]);

        return redirect()->action('VendorsController@index');
    }
}
