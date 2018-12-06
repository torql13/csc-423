@extends('layouts.main')

@section('content')
  @if(session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
  @endif
  <div class="container">
    <div class="row">
      <div class="mt-2 mb-2">
        <h2 class="display-4">Homepage</h2>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">Vendor</h2>
            <p class="card-text">
              Supplies Inventory Items to Retail Stores
              <ul>
                <li><a href="/vendor/addVendor">Add a Vendor</a></li>
              </ul>
            </p>
          </div>
          <div class="card-footer">
            <a href="/vendor/" class="btn btn-primary">Manage Vendors</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">Inventory Item</h2>
            <p class="card-text">
            Items supplied by the Vendors that go to Retails Stores
            <ul>
              <li><a href="/item/addItem">Add an Inventory Item</a></li>
            </ul>
            </p>
          </div>
          <div class="card-footer">
            <a href="/item/" class="btn btn-primary">Manage Inventory Items</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">Retail Store</h2>
            <p class="card-text">
            The entity that recieves Inventory Items from Vendors and also orders more Inventory Items when running low
            <ul>
              <li><a href="/storeLocations/addLocation">Add a Retail Store</a></li>
            </ul>
            </p>
          </div>
          <div class="card-footer">
            <a href="/storeLocations/" class="btn btn-primary">Manage Retail Stores</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">Orders</h2>
            <p class="card-text">
            Manage Orders from Stores to be delivered
            <ul>
              <li><a href="/order/newOrder">Create a New Order</a></li>
            </ul>
            </p>
          </div>
          <div class="card-footer">
            <a href="/order/" class="btn btn-primary">Manage Orders</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">Customers</h2>
            <p class="card-text">
            Manage Customers who make purchases at Stores
            <ul>
              <li><a href="/customer/addCustomer">Create a New Customer</a></li>
              <li><a href="/customer/makePurchase">Log a Customer's Purchase</a></li>
            </ul>
            </p>
          </div>
          <div class="card-footer">
            <a href="/customer/" class="btn btn-primary">Manage Customers</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">Reports</h2>
              <li><a href="/report/topTenReturned">Top Ten Items Returned Within Timeframe</a></li>
            </ul>
            </p>
          </div>
          <div class="card-footer">
            <a href="/customer/" class="btn btn-primary">Manage Customers</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop