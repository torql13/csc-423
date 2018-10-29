@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
        <fieldset>
    
            <legend>View Vendor Information</legend>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Vendor Code</label>
                    <input type="text" class="form-control" value="{{ $indVendor->VendorCode }}" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label>Vendor Name</label>
                    <input type="text" class="form-control" value="{{ $indVendor->VendorName }}" disabled>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Address</label>
                    <input type="text" class="form-control" value="{{ $indVendor->Address }}" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>City</label>
                    <input type="text" class="form-control" value="{{ $indVendor->City }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label>State</label>
                    <input type="text" class="form-control" value="{{ $indVendor->State }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label>Zip</label>
                    <input type="text" class="form-control" value="{{ $indVendor->ZIP }}" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Phone</label>
                    <input type="text" class="form-control" value="{{ $indVendor->Phone }}" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label>Manager</label>
                    <input type="text" class="form-control" value="{{ $indVendor->ContactPersonName }}" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="btn-toolbar col-md-5">
                    <a href="/vendor/editVendor/{{ $indVendor->VendorId }}" class="btn btn-secondary" style="width:7vw;">Edit</a>
                    &nbsp;
                    <a href="/vendor/deleteVendor/{{ $indVendor->VendorId }}" onclick="return confirm('Are you sure?');" class="btn btn-danger" style="width:7vw;">Delete</a>
                </div>
            </div>
    
        </fieldset>

        <div class="row mt-2">
            <div class="col-md-4">
                <a href="/vendor/">Return to Vendor Index</a>
            </div>
        </div>
    </div>
</div>

@stop
