@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('StoresController@insertNewLocation') }}" onsubmit='return validateFormRetailStore()' method="post" id="addLocationForm">
    
            <fieldset>
        
                <legend>Insert a New Store Location</legend>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Store Code</label>
                        <input type="text" class="form-control" name="storeCode" id="storeCode" />
                    </div>
                    <div class="form-group col-md-4">
                        <label>Store Name</label>
                        <input type="text" class="form-control" name="storeName" id="storeName" />
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Address</label>
                        <input type="text" class="form-control" name="storeAddress" id="storeAddress" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>City</label>
                        <input type="text" class="form-control" name="storeCity" id="storeCity" />
                    </div>
                    <div class="form-group col-md-2">
                        <label>State</label>
                        <input type="text" class="form-control" name="storeState" id="storeState" />
                    </div>
                    <div class="form-group col-md-2">
                        <label>Zip</label>
                        <input type="text" class="form-control" name="storeZip" id="storeZip" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="storePhone" id="storePhone" />
                    </div>
                    <div class="form-group col-md-4">
                        <label>Manager</label>
                        <input type="text" class="form-control" name="manager" id="manager" />
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
