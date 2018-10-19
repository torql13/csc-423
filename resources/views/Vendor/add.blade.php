@extends('layouts.main')

@section('content')
<div class="addVendor">
    <table align="center">
        <tr>
            <td> Vendor Code: </td>
            <td> <input type="text" name="vendorCode" id="vendorCode" /> </td>
        </tr>
        <tr>
            <td> Vendor Name: </td>
            <td> <input type="text" name="vendorName" id="vendorName" /> </td>
        </tr>
        <tr>
            <td> Address: </td>
            <td> <input type="text" name="vendorAddress" id="vendorAddress" /> </td>
        </tr>
        <tr>
            <td> City: </td>
            <td> <input type="text" name="vendorCity" id="vendorCity" /> </td>
            <td> State: </td>
            <td> <input type="text" name="vendorState" id="vendorState" /> </td>
            <td> ZIP: </td>
            <td> <input type="text" name="vendorZip" id="vendorZip" /> </td>
        </tr>
        <tr>
            <td> Phone: </td>
            <td> <input type="text" name="vendorPhone" id="vendorPhone" /> </td>
        </tr>
        <tr>
            <td> <input type="submit" value="Submit" /> </td>
            <td> <input type="reset" value="Reset" /> </td>
        </tr>
    </table>
@stop