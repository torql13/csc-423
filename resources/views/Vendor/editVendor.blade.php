@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('VendorsController@updateVendor') }}" onsubmit='return validateFormVendor()' method="post" id="updateVendorForm">
    
            <fieldset>
        
                <legend>Edit Vendor</legend>

                <div class="form-row" style="visibility:hidden;position:absolute">
                    <div class="form-group col-md-4">
                        <label>Vendor Id</label>
                        <input type="text" class="form-control" name="vendorId" id="vendorId" value="{{ $indVendor->VendorId }}">
                    </div>
                </div>

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
                        <label>Phone (xxx-xxx-xxxx)</label>
                        <input type="text" class="form-control" name="vendorPhone" id="vendorPhone" value="{{ $indVendor->Phone }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Contact</label>
                        <input type="text" class="form-control" name="contactPerson" id="contactPerson" value="{{ $indVendor->ContactPersonName }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Status</label><br />
                        @if($indVendor->Status === "Active")
                            <input type="radio" name="status" value="Active" checked> Active 
                            <input type="radio" name="status" value="Inactive"> Inactive 
                        @else
                            <input type="radio" name="status" value="Active"> Active 
                            <input type="radio" name="status" value="Inactive" checked> Inactive 
                        @endif
                    </div>
                    <!-- <div class="form-group col-md-4">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" id="password" value="{{ $indVendor->Password }}">
                    </div> -->
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
                @if($indVendor->Status === "Active")
                    <a href="/vendor/">Return to Active Vendors</a>
                @else
                    <a href="/vendor/inactiveIndex">Return to Inactive Vendors</a>
                @endif
            </div>
        </div>
    </div>
</div>

@stop
