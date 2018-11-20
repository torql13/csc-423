@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
        <fieldset>
    
            <legend>View Item Information</legend>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Description</label>
                    <input type="text" class="form-control" value="{{ $item->Description }}" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label>Size</label>
                    <input type="text" class="form-control" value="{{ $item->Size }}" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Division</label>
                    <input type="text" class="form-control" value="{{ $item->Division }}" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Department</label>
                    <input type="text" class="form-control" value="{{ $item->Department }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label>Category</label>
                    <input type="text" class="form-control" value="{{ $item->Category }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label>Cost</label>
                    <input type="text" class="form-control" value="{{ $item->ItemCost }}" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Retail</label>
                    <input type="text" class="form-control" value="{{ $item->ItemRetail }}" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label>Image File Name</label>
                    <input type="text" class="form-control" value="{{ $item->ImageFileName }}" disabled>
                </div>
            </div>

             <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Vendor</label>
                    <select name="vendorId" id="vendorId" disabled>
                    @foreach($vendors as $vendor):
                        @if($vendor->VendorId == $item->VendorId)
                            <option value="{{$vendor->VendorId}}" selected>{{$vendor->VendorName}}</option>
                        @else
                            <option value="{{$vendor->VendorId}}">{{$vendor->VendorName}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Status</label><br />
                    @if($item->Status === "Active")
                        <input type="radio" name="status" value="Active" disabled checked> Active 
                        <input type="radio" name="status" value="Inactive" disabled> Inactive 
                    @else
                        <input type="radio" name="status" value="Active" disabled> Active 
                        <input type="radio" name="status" value="Inactive" disabled checked> Inactive 
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="btn-toolbar col-md-5">
                    <a href="/item/editItem/{{ $item->ItemId }}" class="btn btn-secondary">Edit</a>
                    &nbsp;
                    <a href="/item/deleteItem/{{ $item->ItemId }}" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a>
                </div>
            </div>
    
        </fieldset>

        <div class="row mt-2">
            <div class="col-md-4">
                @if($item->Status === "Active")
                    <a href="/item/">Return to Active Inventory Items</a>
                @else
                    <a href="/item/inactiveIndex">Return to Inactive Inventory Items</a>
                @endif
            </div>
        </div>
    </div>
</div>

@stop
