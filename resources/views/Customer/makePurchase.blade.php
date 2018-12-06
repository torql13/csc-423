@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('CustomersController@insertPurchase') }}" method="post" id="makePurchaseForm">
    
            <fieldset>
        
                <legend>Log a Purchase</legend>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Customer</label>
                        @if($customer)
                            <input type="text" class="form-control" name="custId" id="custId" value="{{$customer->CustomerId}}" readonly />
                        @else
                            <select class="form-control" name="custId" id="custId">
                                @foreach($customers as $customer)
                                    <option value="{{$customer->CustomerId}}">{{$customer->CustomerId}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

                @if($store)
                    <div class="form-row" style="visibility:hidden;position:absolute">
                        <div class="form-group col-md-4">
                            <label>Store Id</label>
                            <input type="text" class="form-control" name="storeId" id="storeId" value="{{ $store->StoreId }}" readonly />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Store</label>
                            <input type="text" class="form-control" value="{{$store->StoreName}}" readonly />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Item</label>
                            <select class="form-control" name="itemId" id="itemId">
                                @foreach($store->items as $item)
                                    @if($item->ItemId == old('itemId'))
                                        <option value="{{$item->ItemId}}" selected>{{$item->ItemId}}</option>
                                    @else
                                        <option value="{{$item->ItemId}}">{{$item->ItemId}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Quantity</label>
                            <input type="text" class="form-control" name="quantity" id="quantity" value="{{old('quantity')}}" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="btn-toolbar col-md-5">
                            <input class="btn btn-primary" onclick="this.disabled=true;this.form.submit();"  type="submit" value="Submit" />
                            &nbsp;
                            <input class="btn btn-secondary" onclick="window.location.href='../'" type="reset" value="Reset" />
                        </div>
                    </div>
                @else
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Store</label>
                            <select class="form-control" name="storeId" id="storeId">
                                @foreach($stores as $store)
                                    <option value="{{$store->StoreId}}">{{$store->StoreName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="btn-toolbar col-md-5">
                            <input id="getItems" class="btn btn-primary" type="button" value="Select Item" />
                        </div>
                    </div>
                @endif
            </fieldset>
        </form>
        <div class="row mt-2">
            <div class="col-md-4">
                <a href="/customer/">Return to Active Customers</a>
            </div>
        </div>
    </div>
</div>

@stop