@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
    
            <fieldset>
        
                <legend>View Order Information</legend>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Order Id</label>
                        <input type="text" name="orderId" id="orderId" value="{{$indOrder->OrderId}}" disabled>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Vendor Id</label>
                        <select name="vendorId" id="vendorId" disabled>
                        @foreach($vendors as $vendor):
                        @if($vendor->VendorId == $indOrder->VendorId)
                            <option value="{{$vendor->VendorId}}" selected>{{$vendor->VendorName}}</option>
                        @else
                            <option value="{{$vendor->VendorId}}">{{$vendor->VendorName}}</option>
                        @endif
                        @endforeach
                        </select>
                    </div>
                </div>

                 <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Store Id</label>
                        <select name="storeId" id="storeId" disabled>
                        @foreach($stores as $store):
                            @if($store->StoreId == $indOrder->StoreId)
                                <option value="{{$store->StoreId}}" selected>{{$store->StoreName}}</option>
                            @else
                                <option value="{{$store->StoreId}}" >{{$store->StoreName}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Status</label>
                        <input type="text" class="form-control" name="status" id="status" value="{{ $indOrder->Status }}" disabled />
                    </div>
                    <div class="form-group col-md-4">
                        <label>Date and Time of Order</label>
                        <input type="text" class="form-control" name="dateTimeOfOrder" id="dateTimeOfOrder" value="{{ $indOrder->DateTimeOfOrder }}" disabled />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>ItemId</th>
                                <th>QuantityOrdered</th>
                            </tr>
                            @foreach ($orderDetails as $orderDetail)
                            <tr>
                                <td>{{$orderDetail->ItemId}}</a></td>
                                <td>{{$orderDetail->QuantityOrdered}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                @if(!session()->has('VendorId'))
                    <div class="form-row">
                        <div class="btn-toolbar col-md-5">
                            <a href="/order/editOrder/{{ $indOrder->OrderId }}" class="btn btn-secondary">Edit</a>
                            &nbsp;
                            <a href="/order/deleteOrder/{{ $indOrder->OrderId }}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                @endif
        
            </fieldset>
        </form>
        <div class="row mt-2">
            <div class="col-md-4">
                @if(!session()->has('VendorId'))
                    <a href="/order/">Return to Order Index</a>
                @else
                    <a href="/order/viewVendorOrders">Return to Vendor Orders Index</a>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
