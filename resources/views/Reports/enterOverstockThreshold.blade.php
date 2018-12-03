@extends('layouts.main')

@section('content')
<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('ReportsController@overstockedReport') }}" method="post" id="overstockedInventoryForm">
    
            <fieldset>
        
                <legend>Enter a threshold for overstocked items</legend>

                <div class="form-row" style="visibility:hidden;position:absolute">
                    <div class="form-group col-md-4">
                        <label>StoreId</label>
                        <input type="text" class="form-control" name="storeId" id="storeId" value="{{$storeId}}">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Overstock Threshold</label>
                        <input type="text" class="form-control" name="overstockThreshold" id="overstockThreshold" />
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
    </div>
</div>
@stop