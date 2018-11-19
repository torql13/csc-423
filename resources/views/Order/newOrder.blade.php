@extends('layouts.main')

@section('content')

<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('OrdersController@createNewOrder') }}" method="post" id="addOrderForm">
    
            <fieldset>
        
                <legend>Create a New Order</legend>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Vendor</label>
                        <select name="vendorId" id="vendorId">
                        @foreach($vendors as $vendor):
                            <option value="{{$vendor->VendorId}}">{{$vendor->VendorName}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Store</label>
                        <select name="storeId" id="storeId">
                        @foreach($stores as $store):
                            <option value="{{$store->StoreId}}">{{$store->StoreName}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="btn-toolbar col-md-5">
                        <input class="btn btn-primary" type="submit" value="Submit" />
                        &nbsp;
                        <input class="btn btn-secondary" onclick="resetForms()" type="reset" value="Reset" />
                    </div>
                </div>
        
            </fieldset>
        </form>
        <div class="row mt-2">
            <div class="col-md-4">
                <a href="/order/">Return to Order Index</a>
            </div>
        </div>
    </div>
</div>

@stop
