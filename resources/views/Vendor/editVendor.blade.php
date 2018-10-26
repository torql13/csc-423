@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="well">
    
        <form action="{{ action('VendorsController@updateVendor') }}" method="post" id="addVendorForm">
    
            <fieldset>
        
                <legend>Edit Vendor</legend>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Vendor Code</label>
                        <input type="text" class="form-control" name="vendorCode" id="vendorCode" value="{{ $indVendor->VendorCode }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Vendor Name</label>
                        <input type="text" class="form-control" name="vendorName" id="vendorName" value="{{ $indVendor->VendorName }}"/>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Address</label>
                        <input type="text" class="form-control" name="vendorAddress" id="vendorAddress" value="{{ $indVendor->Address }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>City</label>
                        <input type="text" class="form-control" name="vendorCity" id="vendorCity" value="{{ $indVendor->City }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>State</label>
                        <input type="text" class="form-control" name="vendorState" id="vendorState" value="{{ $indVendor->State }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Zip</label>
                        <input type="text" class="form-control" name="vendorZip" id="vendorZip" value="{{ $indVendor->ZIP }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="vendorPhone" id="vendorPhone" value="{{ $indVendor->Phone }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Contact</label>
                        <input type="text" class="form-control" name="contactPerson" id="contactPerson" value="{{ $indVendor->ContactPersonName }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" id="password" value="{{ $indVendor->Password }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-1">
                        <input class="btn btn-primary" type="submit" value="Submit" />
                    </div>
                    <div class="form-group col-md-1">
                        <input class="btn btn-secondary" type="reset" value="Reset" />
                    </div>
                </div>
        
            </fieldset>
        </form>
        <div class="row">
            <div class="col-md-4">
                <a href="/vendor/">Return to Vendor Index</a>
            </div>
        </div>
    </div>
</div>

@stop
