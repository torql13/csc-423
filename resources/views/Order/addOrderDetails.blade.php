@extends('layouts.main')

@section('content')


<div class="container mt-4 offset-md-3">
    <div class="well">
    
        <form action="{{ action('OrderDetailsController@insertOrderAndDetails') }}" method="post" id="addOrderDetailsForm">
    
            <fieldset>
        
                <legend>Add items to Order</legend>

                <div class="form-row" style="visibility:hidden;position:absolute">
                    <div class="form-group col-md-4">
                        <label>Number of Items</label>
                        <input type="text" class="form-control" name="numItems" id="numItems" value="1">
                    </div>
                </div>

                <div class="form-row" style="visibility:hidden;position:absolute">
                    <div class="form-group col-md-4">
                        <label>VendorId</label>
                        <input type="text" class="form-control" name="vendorId" id="vendorId" value="{{ $newOrder['vendorId'] }}">
                    </div>
                </div>

                <div class="form-row" style="visibility:hidden;position:absolute">
                    <div class="form-group col-md-4">
                        <label>StoreId</label>
                        <input type="text" class="form-control" name="storeId" id="storeId" value="{{ $newOrder['storeId'] }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>items</label>
                        <select name="itemId0" id="itemId0">
                        @foreach($items as $item):
                            <option value="{{$item->ItemId}}">{{$item->Description}}</option>
                        @endforeach
                        </select>
                        <label>Quantity</label>
                        <input type="text" name="quantity0" id="quantity0" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label>Add another Item to this Order</label>
                        <input class="btn btn-primary" onclick="addItems()" type="button" value="Add" />
                    </div>
                </div>

                <div id="itemForms"> </div>


                <div class="form-row">
                    <div class="btn-toolbar col-md-5">
                        <input class="btn btn-primary" type="submit" value="Submit" />
                        &nbsp;
                        <input class="btn btn-secondary" onclick="resetForms()" type="reset" value="Reset" />
                    </div>
                </div>
        
            </fieldset>
        </form>
        <div class="row mt-2">
            <div class="col-md-4">
                <a href="/order/">Return to Order Index</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var numItems = 1;
    function addItems()
    {
        console.log("test")
            $("#itemForms").append(
                '<div class="form-row">' +
                    '<div class="form-group col-md-8">' +
                        '<label>Item</label>' +
                            '<select name="itemId' + numItems + '" id="itemId' + numItems + '">' +
                                '@foreach($items as $item):' +
                                 '<option value="{{$item->ItemId}}">{{$item->Description}}</option>' + 
                                '@endforeach' +
                            '</select>' +
                            '<label>Quantity</label>' + 
                            '<input type="text" name="quantity' + numItems + '" id="quantity' + numItems + '" />' +
                    '</div>' + 
                '</div>'
            );
            numItems++;
            document.getElementById('numItems').value = numItems;
    }   
</script>
@stop
