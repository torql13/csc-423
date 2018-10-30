@extends('layouts.main')

@section('content')
  <div class="jumbotron">
      <div class="container">
      <h1 class="display-3">Nanno's Foods</h1>
      <p>Nanno's Foods is a system that is meant to help executives manage their inventory items, 
      order more from vendors, and generate reports</p>
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
            <a href="/vendor/" class="btn btn-primary">Vendor Index</a>
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
            <a href="/item/" class="btn btn-primary">Inventory Item Index</a>
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
            <a href="/storeLocations/" class="btn btn-primary">Retail Store Index</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop