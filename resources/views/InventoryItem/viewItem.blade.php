@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
        <fieldset>
    
            <legend>View Item Information</legend>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Description</label>
                    <input type="text" class="form-control" value="{{ $indItem->Description }}" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label>Size</label>
                    <input type="text" class="form-control" value="{{ $indItem->Size }}" disabled>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Division</label>
                    <input type="text" class="form-control" value="{{ $indItem->Division }}" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Department</label>
                    <input type="text" class="form-control" value="{{ $indItem->Department }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label>Category</label>
                    <input type="text" class="form-control" value="{{ $indItem->Category }}" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label>Cost</label>
                    <input type="text" class="form-control" value="{{ $indItem->ItemCost }}" disabled>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Retail</label>
                    <input type="text" class="form-control" value="{{ $indItem->ItemRetail }}" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label>Image File Name</label>
                    <input type="text" class="form-control" value="{{ $indItem->ImageFileName }}" disabled>
                </div>
            </div>

             <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Vendor</label>
                    <select name="vendorId" id="vendorId" disabled>
                    @foreach($vendors as $vendor):
                        @if($vendor->VendorId == $indItem->VendorId)
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
                    @if($indItem->Status === "Active")
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
                    <a href="/item/editItem/{{ $indItem->ItemId }}" class="btn btn-secondary" style="width:7vw;">Edit</a>
                    &nbsp;
                    <a href="/item/deleteItem/{{ $indItem->ItemId }}" onclick="return confirm('Are you sure?');" class="btn btn-danger" style="width:7vw;">Delete</a>
                </div>
            </div>
    
        </fieldset>

        <div class="row mt-2">
            <div class="col-md-4">
                <a href="/item/">Return to Inventory Item Index</a>
            </div>
        </div>
    </div>
</div>

@stop
