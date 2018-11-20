@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('StoresController@updateLocation') }}" onsubmit='return validateFormRetailStore()' method="post" id="editLocationForm">
    
            <fieldset>
        
                <legend>Edit Store Location</legend>
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
                        <label>Store Id</label>
                        <input type="text" class="form-control" name="storeId" id="storeId" value="{{ $storeLocation->StoreId }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Store Name</label>
                        <input type="text" class="form-control" name="storeName" id="storeName" value="{{ $storeLocation->StoreName }}"/>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Address</label>
                        <input type="text" class="form-control" name="storeAddress" id="storeAddress" value="{{ $storeLocation->Address }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>City</label>
                        <input type="text" class="form-control" name="storeCity" id="storeCity" value="{{ $storeLocation->City }}">
                    </div>
                    <div class="form-group col-md-2">
                    <label>State</label>
                    <select class="form-control" name="storeState" id="storeState" size="1">
                        @foreach($states as $state)
                            @if($defaultState === $state)
                                <option value="{{$state}}" selected>{{$state}}</option>
                            @else
                                <option value="{{$state}}">{{$state}}</option>
                            @endif
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Zip</label>
                        <input type="text" class="form-control" name="storeZip" id="storeZip" value="{{ $storeLocation->ZIP }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Phone (xxx-xxx-xxxx)</label>
                        <input type="text" class="form-control" name="storePhone" id="storePhone" value="{{ $storeLocation->Phone }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Manager</label>
                        <input type="text" class="form-control" name="manager" id="manager" value="{{ $storeLocation->ManagerName }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Status</label><br />
                        @if($storeLocation->Status === "Active")
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
                <a href="/storeLocations/">Return to Store Index</a>
            </div>
        </div>
    </div>
</div>

@stop
