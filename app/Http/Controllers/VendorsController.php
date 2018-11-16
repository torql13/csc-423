<?php

namespace App\Http\Controllers;

use App\Vendor;
use App\Http\Requests\StoreVendor;
use App\Http\Requests\ChangePassword;
use Illuminate\Http\Request;
use DB;

class VendorsController extends Controller
{
    public function index()
    {
        if(request()->has('sort'))
        {
            $vendorList = Vendor::where('Status', 'Active')->orderBy(request('sort'), 'ASC')->simplePaginate(10);
        }
        else
        {
            $vendorList = Vendor::where('Status', 'Active')->simplePaginate(10);
        }

        $search = "";

        return view('/Vendor/index', compact('vendorList', 'search'));
    }

    public function inactiveIndex()
    {

        if(request()->has('sort'))
        {
            $vendorList = Vendor::where('Status', 'Inactive')->orderBy(request('sort'), 'ASC')->simplePaginate(10);
        }
        else
        {
            $vendorList = Vendor::where('Status', 'Inactive')->simplePaginate(10);
        }
        
        $search = "";

        return view('/Vendor/inactiveIndex', compact('vendorList', 'search'));
    }

    public function deleteVendor($id)
    {
        $vendor = Vendor::where([
            ['VendorId', $id],
            ['Status', 'Active']
        ])->firstOrFail();

        $vendor->Status = 'Inactive';
        $vendor->save();

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
        $vendor = Vendor::where([
            ['VendorId', $id],
            ['Status', 'Inactive']
        ])->firstOrFail();

        $vendor->Status = 'Active';
        $vendor->save();

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
        $indVendor = Vendor::where('VendorId', $id)->firstOrFail();
        
        return view('/Vendor/editVendor', compact('indVendor'));
    }

    public function updateVendor(StoreVendor $request)
    {
        $vendor = $request->all();

        Vendor::where('VendorId', $vendor['vendorId'])
            ->update([
                'VendorCode' => $vendor['vendorCode'],
                'VendorName' => $vendor['vendorName'],
                'Address' => $vendor['vendorAddress'],
                'City' => $vendor['vendorCity'],
                'State' => $vendor['vendorState'],
                'Zip' => $vendor['vendorZip'],
                'Phone' => $vendor['vendorPhone'], 
                'ContactPersonName' => $vendor['contactPerson'],
                'Status' => $vendor['status']
            ]
        );
        
        return redirect()->action('VendorsController@index');
    }

    public function viewVendor($id)
    {
        $indVendor = Vendor::where('VendorId', $id)->firstOrFail();

        return view('/Vendor/viewVendor', compact('indVendor'));
    }

    public function insertNewVendor(StoreVendor $request)
    {
        
        $newVendor = $request->validated();

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

    public function searchActive(Request $request)
    {
        $search = $request->input('search');

        if(request()->has('sort'))
        {
            $vendorList = Vendor::where([
                ['VendorName', 'like', '%' . $search . '%'],
                ['Status', 'Active']
            ])
            ->orWhere([
                ['VendorCode', 'like', '%' . $search . '%'],
                ['Status', 'Active']
            ])
            ->orderBy(request('sort'), 'ASC')
            ->paginate(10);
        }
        else
        {
            $vendorList = Vendor::where([
                ['VendorName', 'like', '%' . $search . '%'],
                ['Status', 'Active']
            ])
            ->orWhere([
                ['VendorCode', 'like', '%' . $search . '%'],
                ['Status', 'Active']
            ])
            ->paginate(10);
        }

        return view('Vendor/index', compact('vendorList', 'search'));
    }

    public function searchInactive(Request $request)
    {
        $search = $request->input('search');

        if(request()->has('sort'))
        {
            $vendorList = Vendor::where([
                ['VendorName', 'like', '%' . $search . '%'],
                ['Status', 'Inactive']
            ])
            ->orWhere([
                ['VendorCode', 'like', '%' . $search . '%'],
                ['Status', 'Inactive']
            ])
            ->orderBy(request('sort'), 'ASC')
            ->paginate(10);
        }
        else
        {
            $vendorList = Vendor::where([
                ['VendorName', 'like', '%' . $search . '%'],
                ['Status', 'Inactive']
            ])
            ->orWhere([
                ['VendorCode', 'like', '%' . $search . '%'],
                ['Status', 'Inactive']
            ])
            ->paginate(10);
        }

        return view('Vendor/inactiveIndex', compact('vendorList', 'search'));
    }
    public function changePassword(ChangePassword $request)
    {
        $newVendor = $request->all();

        $storedPass = Vendor::where('VendorId', $newVendor['vendorId'])->pluck('Password')[0];
        
        if($this->hashPassword($newVendor['oldPass']) == $storedPass)
        {
            Vendor::where('VendorId', $newVendor['vendorId'])
                ->update([
                    'Password' => $this->hashPassword($newVendor['newPass'])
                ]
            );
            return redirect()->action('VendorsController@index');
        }
        else
        {
            return redirect("vendor/changePassword/" . $newVendor['vendorId'])
                ->with('error', 'The old password entered was incorrect.');
        }
    }

    public function login(Request $request)
    {
        $loginData = $request->all();

        $hashedPass = $this->hashPassword($loginData['password']);

        $record = Vendor::where([
            ['VendorCode', $loginData['vendorCode']],
            ['Password', $hashedPass]
        ])->first();
        
        if($record)
        {
            //$request->session()->put('VendorId', $record->VendorId);
            session([
                'VendorId' => $record->VendorId,
                'VendorName' => $record->VendorName,
                'VendorCode' => $record->VendorCode,
                'Password' => $record->Password
            ]);

            // echo session('VendorId');

            //temperary so I dont overfill the session
            // $request->session()->flush();

            return redirect('/order/viewVendorOrders');
        }
        else
        {
            return view('/login')->with('error', 'Username or Password is incorrect.');
        }
    }
}
