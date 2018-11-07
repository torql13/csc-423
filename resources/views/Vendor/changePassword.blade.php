@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('VendorsController@changePassword') }}" method="post" id="changePassword">
    
            <fieldset>
        
                <legend>Change Password</legend>

                <div class="form-row" style="visibility:hidden;position:absolute">
                    <div class="form-group col-md-4">
                        <label>Vendor Id</label>
                        <input type="text" class="form-control" name="vendorId" id="vendorId" value="{{ $vendorId }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Old Password</label>
                        <input type="text" class="form-control" name="oldPass" id="oldPass">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>New Password</label>
                        <input type="text" class="form-control" name="newPass" id="newPass">
                    </div>
                </div>

                <div class="form-row">
                    <div class="btn-toolbar col-md-5">
                        <input class="btn btn-primary" onclick="this.disabled=true;this.form.submit();" type="submit" value="Submit" />
                    </div>
                </div>
        
            </fieldset>
        </form>
        <div class="row mt-2">
            <div class="col-md-4">
                <a href="/vendor/">Return to Vendors</a>
            </div>
        </div>
    </div>
</div>
@stop