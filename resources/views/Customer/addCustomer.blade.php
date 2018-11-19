@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('CustomersController@addCustomer') }}" method="post" id="addCustomerForm">
    
            <fieldset>
        
                <legend>Add Customer</legend>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name"/>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" id="address">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" id="city">
                    </div>
                    <div class="form-group col-md-2">
                        <label>State</label>
                        <input type="text" class="form-control" name="state" id="state">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Zip</label>
                        <input type="text" class="form-control" name="zip" id="zip">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Phone (xxx-xxx-xxxx)</label>
                        <input type="text" class="form-control" name="phone" id="phone">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" id="email">
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
                <a href="/customer/">Return to Active Customers</a>
            </div>
        </div>
    </div>
</div>

@stop
