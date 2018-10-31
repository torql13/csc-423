@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('InventoryItemsController@updateItem') }}" onsubmit='return validateFormItem()' method="post" id="addItemForm">
    
            <fieldset>
        
                <legend>Edit Inventory Item</legend>

                <div class="form-row" style="visibility:hidden;position:absolute">
                    <div class="form-group col-md-4">
                        <label>Item Id</label>
                        <input type="text" class="form-control" name="itemId" id="itemId" value="{{ $item->ItemId }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $item->Description }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Size</label>
                        <input type="text" class="form-control" name="size" id="size" value="{{ $item->Size }}"/>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Division</label>
                        <input type="text" class="form-control" name="division" id="division" value="{{ $item->Division }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Department</label>
                        <input type="text" class="form-control" name="department" id="department" value="{{ $item->Department }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Category</label>
                        <input type="text" class="form-control" name="category" id="category" value="{{ $item->Category }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Cost</label>
                        <input type="text" class="form-control" name="cost" id="cost" value="{{ $item->ItemCost }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Retail</label>
                        <input type="text" class="form-control" name="retail" id="retail" value="{{ $item->ItemRetail }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Image File Name</label>
                        <input type="text" class="form-control" name="imgFileName" id="imgFileName" value="{{ $item->ImageFileName }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Vendor</label>
                        <select name="vendorId" id="vendorId">
                        @foreach($vendors as $vendor)
                            @if($vendor->VendorId === $item->VendorId)
                                <option value="{{$vendor->VendorId}}" selected>{{$vendor->VendorName}}</option>
                            @else
                                <option value="{{$vendor->VendorId}}">{{$vendor->VendorName}}</option>
                            @endif
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
                <a href="/item/">Return to Item Index</a>
            </div>
        </div>
    </div>
</div>

@stop
