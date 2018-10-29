@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('InventoryItemsController@insertNewItem') }}" method="post" id="addItemForm">
    
            <fieldset>
        
                <legend>Add Item</legend>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" id="description">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Size</label>
                        <input type="text" class="form-control" name="size" id="size"/>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Division</label>
                        <input type="text" class="form-control" name="division" id="division">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Department</label>
                        <input type="text" class="form-control" name="department" id="department">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Category</label>
                        <input type="text" class="form-control" name="category" id="category">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Cost</label>
                        <input type="text" class="form-control" name="cost" id="cost">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Retail</label>
                        <input type="text" class="form-control" name="retail" id="retail">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Image File Name</label>
                        <input type="text" class="form-control" name="imgFileName" id="imgFileName">
                    </div>
                </div>

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
                    <div class="btn-toolbar col-md-5">
                        <input class="btn btn-primary" type="submit" value="Submit" />
                        &nbsp;
                        <input class="btn btn-secondary" type="reset" value="Reset" />
                    </div>
                </div>
        
            </fieldset>
        </form>
        <div class="row mt-2">
            <div class="col-md-4">
                <a href="/item">Return to Item Index</a>
            </div>
        </div>
    </div>
</div>

@stop
