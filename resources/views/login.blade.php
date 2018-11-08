@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
        @if(isset($errorMessage))
            <div class="alert alert-danger col-md-4" role="alert">
                {{$errorMessage}}
            </div>
        @endif
    
        <form action="{{ action('VendorsController@login') }}" method="post" id="login">
    
            <fieldset>
        
                <legend>Login</legend>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Vendor Code</label>
                        <input type="text" class="form-control" name="vendorCode" id="vendorCode">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password">
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
                <a href="/">Return to Index</a>
            </div>
        </div>
    </div>
</div>
@stop