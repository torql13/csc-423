<?php

namespace App\Http\Controllers;

use App\Customer;
use App\StoreLocation;
use App\Http\Requests\StoreCustomer;
use Illuminate\Http\Request;
use DB;
use DateTime;

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
        $states = ['AL','AK','AZ','AR','CA','CO','CT','DE','DC','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI',
                    'MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VT',
                    'VA','WA','WV','WI','WY'];

        return view('Customer/editCustomer', compact('customer', 'states'));
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

    public function makePurchase($custId = null, $storeId = null)
    {
        if($custId)
        {
            $customer = Customer::where([
                ['CustomerId', $custId],
                ['Status', 'Active']
            ])->firstOrFail();
            $customers = "";
        }
        else
        {
            $customer = "";
            $customers = Customer::where('Status', 'Active')->get();
            if(!$customers->count())
            {
                return redirect()->back()->with('error', 'There are no active customers.');
            }
        }

        if($storeId)
        {
            $store = StoreLocation::where([
                ['StoreId', $storeId],
                ['Status', 'Active']
            ])->firstOrFail();
            $stores = "";
        }
        else
        {
            $store = "";
            $stores = StoreLocation::where('Status', 'Active')->has('items')->get();
            if(!$stores->count())
            {
                return redirect()->back()->with('error', 'There are no active stores.');
            }
        }

        return view('Customer/makePurchase', compact('customer', 'customers', 'stores', 'store'));
    }

    public function insertPurchase(Request $request)
    {
        $custId = $request['custId'];
        $storeId = $request['storeId'];
        $itemId = $request['itemId'];
        $quantity = $request['quantity'];
        
        if(!$quantity || $quantity < 1)
        {
            return redirect()->back()->withInput()->with('error', 'Quantity must be a number greater than 0.');
        }

        $store = StoreLocation::where('StoreId', $storeId)->firstOrFail();
        
        $stock = 0;
        
        //get the inventory's stock of the item
        foreach($store->items as $item)
        {
            if($item->ItemId == $itemId)
            {
                $stock = $item->pivot->QuantityInStock;
                break;
            }
        }

        //if current item's stock is 0, throw error saying out of stock
        if($stock == 0)
        {
            return redirect()->back()->withInput()->with('error', 'This item is currently out of stock.');
        }
        elseif($stock < $quantity) //if current item's stock is less than the quantity submitted, throw error on form
        {
            return redirect()->back()->withInput()->with('error', 'Quantity must not exceed the current item stock.');
        }

        $stock -= $quantity;

        DB::table('inventory')->where([
            ['StoreId', $storeId],
            ['ItemId', $itemId]
        ])->update([
            'QuantityInStock' => $stock
        ]);

        $now = new DateTime();

        DB::table('customer_purchase')->insert([
            'CustomerId' => $custId,
            'ItemId' => $itemId,
            'StoreId' => $storeId,
            'QuantityPurchased' => $quantity,
            'DateTimeOfPurchase' => $now
        ]);
        
        return redirect()->action('CustomersController@index')->with('success', 'Customer purchase has been logged.');
    }

    public function viewPurchases($id)
    {
        $customer = Customer::where([
            ['CustomerId', $id],
            ['Status', 'Active']
        ])->firstOrFail();

        $purchases = DB::table('customer_purchase')->where('CustomerId', $id)->simplePaginate(10);

        $stores = StoreLocation::get();

        return view('Customer/viewPurchases', compact('customer', 'purchases', 'stores'));
    }
}