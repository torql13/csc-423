@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('VendorsController@insertNewVendor') }}" onsubmit='return validateFormVendor()' method="post" id="addVendorForm">
    
            <fieldset>
        
                <legend>Add Vendor</legend>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Vendor Code</label>
                        <input type="text" class="form-control" name="vendorCode" id="vendorCode">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Vendor Name</label>
                        <input type="text" class="form-control" name="vendorName" id="vendorName"/>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Address</label>
                        <input type="text" class="form-control" name="vendorAddress" id="vendorAddress">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>City</label>
                        <input type="text" class="form-control" name="vendorCity" id="vendorCity">
                    </div>
                    <div class="form-group col-md-2">
                        <label>State</label>
                        <input type="text" class="form-control" name="vendorState" id="vendorState">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Zip</label>
                        <input type="text" class="form-control" name="vendorZip" id="vendorZip">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Phone (xxx-xxx-xxxx)</label>
                        <input type="text" class="form-control" name="vendorPhone" id="vendorPhone">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Contact</label>
                        <input type="text" class="form-control" name="contactPerson" id="contactPerson">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password">
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
                <a href="/vendor/">Return to Vendor Index</a>
            </div>
        </div>
    </div>
</div>

@stop
