@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
        <fieldset>
    
            <legend>View Store Information</legend>

            <div class="form-row" style="visibility:hidden;position:absolute">
                <div class="form-group col-md-4">
                    <label>Store Id</label>
                    <input type="text" class="form-control" value="{{ $storeLocation->StoreId }}" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Store Code</label>
                    <input type="text" class="form-control" value="{{ $storeLocation->StoreCode }}" disabled />
                </div>
                <div class="form-group col-md-4">
                    <label>Store Name</label>
                    <input type="text" class="form-control" value="{{ $storeLocation->StoreName }}" disabled />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Address</label>
                    <input type="text" class="form-control" value="{{ $storeLocation->Address }}" disabled />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>City</label>
                    <input type="text" class="form-control" value="{{ $storeLocation->City }}" disabled />
                </div>
                <div class="form-group col-md-2">
                    <label>State</label>
                    <input type="text" class="form-control" value="{{ $storeLocation->State }}" disabled />
                </div>
                <div class="form-group col-md-2">
                    <label>Zip</label>
                    <input type="text" class="form-control" value="{{ $storeLocation->ZIP }}" disabled />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Phone</label>
                    <input type="text" class="form-control" value="{{ $storeLocation->Phone }}" disabled />
                </div>
                <div class="form-group col-md-4">
                    <label>Manager</label>
                    <input type="text" class="form-control" value="{{ $storeLocation->ManagerName }}" disabled />
                </div>
            </div>

            <div class="form-row">
                <div class="btn-toolbar col-md-5">
                    <a href="/storeLocations/editLocation/{{ $storeLocation->StoreId }}" class="btn btn-secondary" style="width:7vw;">Edit</a>
                    &nbsp;
                    <a href="/storeLocations/deleteLocation/{{ $storeLocation->StoreId }}" onclick="return confirm('Are you sure?');" class="btn btn-danger" style="width:7vw;">Delete</a>
                </div>
            </div>
    
        </fieldset>

        <div class="row mt-2">
            <div class="col-md-4">
                <a href="/storeLocations/">Return to Store Index</a>
            </div>
        </div>
    </div>
</div>

@stop
