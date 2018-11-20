@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('CustomersController@updateCustomer') }}" method="post" id="updateCustomerForm">
    
            <fieldset>
        
                <legend>Edit Customer</legend>
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
                        <label>Customer Id</label>
                        <input type="text" class="form-control" name="customerId" id="customerId" value="{{ $customer->CustomerId }}" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $customer->Name }}" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ $customer->Address }}" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" id="city" value="{{ $customer->City }}" />
                    </div>
                    <div class="form-group col-md-2">
                        <label>State</label>
                        <select class="form-control" name="state" id="state" size="1">
                            @foreach($states as $state)
                                @if($customer->State === $state)
                                    <option value="{{$state}}" selected>{{$state}}</option>
                                @else
                                    <option value="{{$state}}">{{$state}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Zip</label>
                        <input type="text" class="form-control" name="zip" id="zip" value="{{ $customer->ZIP }}" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Phone (xxx-xxx-xxxx)</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $customer->Phone }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ $customer->Email }}" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Status</label><br />
                        @if($customer->Status === "Active")
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
                @if($customer->Status === "Active")
                    <a href="/customer/">Return to Active Customers</a>
                @else
                    <a href="/customer/inactiveIndex">Return to Inactive Customers</a>
                @endif
            </div>
        </div>
    </div>
</div>

@stop
