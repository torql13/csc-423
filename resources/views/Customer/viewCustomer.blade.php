@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
        <fieldset>
    
            <legend>View Customer Information</legend>

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{ $customer->Name }}" disabled>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Address</label>
                    <input type="text" class="form-control" value="{{ $customer->Address }}" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>City</label>
                    <input type="text" class="form-control" value="{{ $customer->City }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label>State</label>
                    <input type="text" class="form-control" value="{{ $customer->State }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label>Zip</label>
                    <input type="text" class="form-control" value="{{ $customer->ZIP }}" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Phone</label>
                    <input type="text" class="form-control" value="{{ $customer->Phone }}" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{ $customer->Email }}" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Status</label>
                    <input type="text" class="form-control" value="{{ $customer->Status }}" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="btn-toolbar col-md-5">
                    <a href="/customer/editCustomer/{{ $customer->CustomerId }}" class="btn btn-secondary">Edit</a>
                    &nbsp;
                    <a href="/customer/deleteCustomer/{{ $customer->CustomerId }}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a>
                </div>
            </div>
    
        </fieldset>

        <div class="row mt-2">
            <div class="col-md-4">
                @if($customer->Status === "Active")
                    <a href="/customer/">Return to Active Customers</a>
                @else
                    <a href="/customer/inactiveIndex">Return to Inactive Customers</a>
                @endif
            </div>
        </div>
    </div>
</div>

@stop
