<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use DB;

class VendorsController extends Controller
{
    public function index()
    {
        $vendorList = DB::table('vendor')->simplePaginate(10);

        return view('/Vendor/index', compact('vendorList'));

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

        $vendorId = DB::table('vendor')->where('VendorCode', $vendor['vendorCode'])->pluck('VendorId');

        echo $vendorId;

        DB::table('vendor')->where('VendorId', $vendorId)
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

    public function insertNewVendor()
    {
        $name = $_POST['vendorName'];
        $addr = $_POST['vendorAddress'];
        $city = $_POST['vendorCity'];
        $state = $_POST['vendorState'];
        $zip = $_POST['vendorZip'];
        $phone = $_POST['vendorPhone'];
        $contactPerson = $_POST['contactPerson'];
        $password = $_POST['password']; 
        $vendorCode = $_POST['vendorCode'];

        DB::table('vendor')->insert([
            ['VendorCode'=> $vendorCode, 'VendorName' => $name, 'Address' => $addr, 'City' => $city, 'State' => $state,
            'Zip' => $zip, 'Phone' => $phone, 'ContactPersonName' => $contactPerson, 'Password' => $password]
        ]);
        return redirect()->action('VendorsController@index');
    }
}
