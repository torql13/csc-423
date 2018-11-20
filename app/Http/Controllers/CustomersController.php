<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\StoreCustomer;
use Illuminate\Http\Request;
use DB;

class CustomersController extends Controller
{
    public function index()
    {
        if(request()->has('sort'))
        {
            $customers = Customer::where('Status', 'Active')
                ->orderBy(request('sort'), 'ASC')
                ->simplePaginate(10);
        }
        else
        {
            $customers = Customer::where('Status', 'Active')->simplePaginate(10);
        }

        //empty string placeholder for search
        $search = "";
        
        return view('Customer/index', compact('customers', 'search'));
    }

    public function inactiveIndex()
    {
        if(request()->has('sort'))
        {
            $customers = Customer::where('Status', 'Inactive')
                ->orderBy(request('sort'), 'ASC')
                ->simplePaginate(10);
        }
        else
        {
            $customers = Customer::where('Status', 'Inactive')->simplePaginate(10);
        }

        //empty string placeholder for search
        $search = "";
        
        return view('Customer/inactiveIndex', compact('customers', 'search'));
    }

    public function viewCustomer($id)
    {
        $customer = Customer::where('CustomerId', $id)->firstOrFail();

        return view('Customer/viewCustomer', compact('customer'));
    }

    public function addCustomer(StoreCustomer $request)
    {
        $customer = $request->all();

        Customer::insert([
            'Name' => $customer['name'],
            'Address' => $customer['address'],
            'City' => $customer['city'],
            'State' => $customer['state'],
            'Zip' => $customer['zip'],
            'Phone' => $customer['phone'], 
            'Email' => $customer['email']
        ]);

        return redirect()->action('CustomersController@index');
    }

    public function editCustomer($id)
    {
        $customer = Customer::where('CustomerId', $id)->firstOrFail();

        return view('Customer/editCustomer', compact('customer'));
    }

    public function updateCustomer(StoreCustomer $request)
    {
        $customer = $request->all();

        Customer::where('CustomerId', $customer['customerId'])
            ->update([
                'Name' => $customer['name'],
                'Address' => $customer['address'],
                'City' => $customer['city'],
                'State' => $customer['state'],
                'Zip' => $customer['zip'],
                'Phone' => $customer['phone'], 
                'Email' => $customer['email'],
                'Status' => $customer['status']
            ]
        );
        
        return redirect()->action('CustomersController@index');
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::where([
            ['CustomerId', $id],
            ['Status', 'Active']
        ])->firstOrFail();

        $customer->Status = 'Inactive';
        $customer->save();

        //uncomment once customer purchase model created
        /**foreach($customer->purchases as $purchase)
        {
            //set each item belonging to vendor to 'Active' in Status field
            DB::table('customer_purchase')->where('CustomerId', $id)->update([
                'Status' => 'Inactive'
            ]);
        }*/

        return redirect()->action('CustomersController@index');
    }

    public function restoreCustomer($id)
    {
        $customer = Customer::where([
            ['CustomerId', $id],
            ['Status', 'Inactive']
        ])->firstOrFail();

        $customer->Status = 'Active';
        $customer->save();
        
        //uncomment once customer purchase model created
        /**foreach($customer->purchases as $purchase)
        {
            //set each item belonging to vendor to 'Active' in Status field
            DB::table('customer_purchase')->where('CustomerId', $id)->update([
                'Status' => 'Active'
            ]);
        }*/

        return redirect()->action('CustomersController@index');
    }

    public function searchActive(Request $request)
    {
        $search = $request->input('search');
        if(!$search)
        {
            return $this->index();
        }

        if(request()->has('sort'))
        {
            $customers = Customer::where([
                    ['CustomerId', 'like', '%' . $search . '%'],
                    ['Status', 'Active']
                ])
                ->orWhere([
                    ['Name', 'like', '%' . $search . '%'],
                    ['Status', 'Active']
                ])
                ->orderBy(request('sort'), 'ASC')
                ->paginate(10);
        }
        else
        {
            $customers = Customer::where([
                    ['CustomerId', 'like', '%' . $search . '%'],
                    ['Status', 'Active']
                ])
                ->orWhere([
                    ['Name', 'like', '%' . $search . '%'],
                    ['Status', 'Active']
                ])
                ->paginate(10);
        }

        return view('Customer/index', compact('customers', 'search'));
    }

    public function searchInactive(Request $request)
    {
        $search = $request->input('search');
        if(!$search)
        {
            return $this->inactiveIndex();
        }

        if(request()->has('sort'))
        {
            $customers = Customer::where([
                    ['CustomerId', 'like', '%' . $search . '%'],
                    ['Status', 'Inactive']
                ])
                ->orWhere([
                    ['Name', 'like', '%' . $search . '%'],
                    ['Status', 'Inactive']
                ])
                ->orderBy(request('sort'), 'ASC')
                ->paginate(10);
        }
        else
        {
            $customers = Customer::where([
                    ['CustomerId', 'like', '%' . $search . '%'],
                    ['Status', 'Inactive']
                ])
                ->orWhere([
                    ['Name', 'like', '%' . $search . '%'],
                    ['Status', 'Inactive']
                ])
                ->paginate(10);
        }

        return view('Customer/inactiveIndex', compact('customers', 'search'));
    }
}
