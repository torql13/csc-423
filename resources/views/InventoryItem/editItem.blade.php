@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('InventoryItemsController@updateItem') }}" onsubmit='return validateFormItem()' method="post" id="addItemForm">
    
            <fieldset>
        
                <legend>Edit Inventory Item</legend>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Division</label>
                        <select class="form-control" name="division" id="division">
                        @foreach($divisions as $div)
                            @if($div->Name === $item->Division)
                                <option value="{{$div->Name}}" selected>{{$div->Name}}</option>
                            @else
                                <option value="{{$div->Name}}">{{$div->Name}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Category</label>
                        <select class="form-control" name="category" id="category">
                        @foreach($categories as $cat)
                            @if($cat->Name === $item->Category)
                                <option value="{{$cat->Name}}" selected>{{$cat->Name}}</option>
                            @else
                                <option value="{{$cat->Name}}">{{$cat->Name}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Department</label>
                        <input type="text" class="form-control" name="department" id="department" value="{{ $item->Department }}">
                    </div>
                    <div class="form-group col-md-4">
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
                        <select class="form-control" name="imgFileName" id="imgFileName">
                            @foreach($images as $image)
                                @if($image->Path === $item->ImageFileName)
                                    <option value="images/{{$image->Path}}" selected>{{$image->Path}}</option>
                                @else
                                    <option value="images/{{$image->Path}}">{{$image->Path}}</option>
                                @endif
                            @endforeach
                        </select>
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
                    <div class="form-group col-md-4">
                        <label>Status</label><br />
                        @if($item->Status === "Active")
                            <input type="radio" name="status" value="Active" checked> Active 
                            <input type="radio" name="status" value="Inactive"> Inactive 
                        @else
                            <input type="radio" name="status" value="Active"> Active 
                            <input type="radio" name="status" value="Inactive" checked> Inactive 
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="btn-toolbar col-md-5">
                        <input class="btn btn-primary" onclick="this.disabled=true;this.form.submit();" type="submit" value="Submit" />
                        &nbsp;
                        <input class="btn btn-secondary" onclick="resetForms()" type="reset" value="Reset" />
                    </div>
                </div>
        
            </fieldset>
        </form>
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
