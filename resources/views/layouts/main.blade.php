<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nanno's Foods</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .error{
            border:1px solid red;
        }
    </style>
</head>
<body>
    @include('layouts.nav')
    @yield('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript">

        $( document ).ready(function() 
        {
            $('input').on('click', function(){
                $(this).removeClass('error');
            })

            if(!$('td').length){
                $('table').append('<tr><td colspan="25">There aren\'t any records to display.</td></tr>');
            }
        });

        function resetForms()
        {
            $('input:text').each(function () 
            {
                if(!($(this).parent().parent().css('visibility') == 'hidden'))
                {
                    $(this).attr('value', '');
                }
            });
        }

        function validateFormVendor()
        {
            valid = true;

            var vendorCodeRegex =  /^[0-9]{1,10}$/;
			var vendorNameRegex = /^[A-Za-z0-9',\s\.-]+$/;
			var addressRegex = /^[A-Za-z0-9',\s\.-]+$/;
			var cityRegex = /^[A-Za-z0-9',\s\.-]+$/;
			var stateRegex = /^[A-Za-z]{2}$/;
			var zipRegex = /^[0-9]{5}$/;
			var phoneRegex = /^[0-9]{10}$/;
			var contactPersonNameRegex = /^[A-Z-a-z-'\s]+$/;
			var passwordRegex = /^[A-Za-z0-9\.,@]{5,20}$/;

            if(!vendorCodeRegex.test($('#vendorCode').val()))
            {
                valid = false;
                $('#vendorCode').addClass('error');
            }
            if(!vendorNameRegex.test($('#vendorName').val()))
            {
                valid = false;
                $('#vendorName').addClass('error');
            }
            if(!addressRegex.test($('#vendorAddress').val()))
            {
                valid = false;
                $('#vendorAddress').addClass('error');
            }
            if(!cityRegex.test($('#vendorCity').val()))
            {
                valid = false;
                $('#vendorCity').addClass('error');
            }
            if(!stateRegex.test($('#vendorState').val()))
            {
                valid = false;
                $('#vendorState').addClass('error');
            }
            if(!zipRegex.test($('#vendorZip').val()))
            {
                valid = false;
                $('#vendorZip').addClass('error');
            }
            if(!phoneRegex.test($('#vendorPhone').val()))
            {
                valid = false;
                $('#vendorPhone').addClass('error');
            }
            if(!contactPersonNameRegex.test($('#contactPerson').val()))
            {
                valid = false;
                $('#contactPerson').addClass('error');
            }
            if(!passwordRegex.test($('#password').val()))
            {
                valid = false;
                $('#password').addClass('error');
            }

            if(!valid)
            {
                alert('Please fill in fields in required format.')
                return false;
            }
            return true;
        }

        function validateFormItem()
        {
            valid = true;

            var descriptionRegex =  /^[A-Za-z]{1,25}$/;
			var sizeRegex = /^[A-Za-z0-9\s]{1,10}$/;
			var divDepCatRegex = /^[A-Za-z0-9',\s\.-]+$/;
			var costRegex = /^[0-9\.,]{1,10}$/;
			var retailRegex = /^[0-9\.,]{1,10}$/;
			var imgFileRegex = /^[A-Za-z0-9\./\s-]{1,50}$/;
			
            if(!descriptionRegex.test($('#description').val()))
            {
                valid = false;
                $('#description').addClass('error');
            }
            if(!sizeRegex.test($('#size').val()))
            {
                valid = false;
                $('#size').addClass('error');
            }
            if(!divDepCatRegex.test($('#division').val()))
            {
                valid = false;
                $('#division').addClass('error');
            }
            if(!divDepCatRegex.test($('#department').val()))
            {
                valid = false;
                $('#department').addClass('error');
            }
            if(!divDepCatRegex.test($('#category').val()))
            {
                valid = false;
                $('#category').addClass('error');
            }
            if(!costRegex.test($('#cost').val()))
            {
                valid = false;
                $('#cost').addClass('error');
            }
            if(!retailRegex.test($('#retail').val()))
            {
                valid = false;
                $('#retail').addClass('error');
            }
            if(!imgFileRegex.test($('#imgFileName').val()))
            {
                valid = false;
                $('#imgFileName').addClass('error');
            }

            if(!valid)
            {
                alert('Please fill in fields in required format.')
                return false;
            }
            return true;
        }

        function validateFormRetailStore()
        {
            valid = true;

            var storeCodeRegex =  /^[0-9]{1,10}$/;
			var storeNameRegex = /^[A-Za-z0-9',\s\.-]+$/;
			var addressRegex = /^[A-Za-z0-9',\s\.-]+$/;
			var cityRegex = /^[A-Za-z0-9',\s\.-]+$/;
			var stateRegex = /^[A-Za-z]{2}$/;
			var zipRegex = /^[0-9]{5}$/;
			var phoneRegex = /^[0-9]{10}$/;
			var managerRegex = /^[A-Z-a-z-'\s]+$/;
			
            if(!storeCodeRegex.test($('#storeCode').val()))
            {
                valid = false;
                $('#storeCode').addClass('error');
            }
            if(!storeNameRegex.test($('#storeName').val()))
            {
                valid = false;
                $('#storeName').addClass('error');
            }
            if(!addressRegex.test($('#storeAddress').val()))
            {
                valid = false;
                $('#storeAddress').addClass('error');
            }
            if(!cityRegex.test($('#storeCity').val()))
            {
                valid = false;
                $('#storeCity').addClass('error');
            }
            if(!stateRegex.test($('#storeState').val()))
            {
                valid = false;
                $('#storeState').addClass('error');
            }
            if(!zipRegex.test($('#storeZip').val()))
            {
                valid = false;
                $('#storeZip').addClass('error');
            }
            if(!phoneRegex.test($('#storePhone').val()))
            {
                valid = false;
                $('#storePhone').addClass('error');
            }
            if(!managerRegex.test($('#manager').val()))
            {
                valid = false;
                $('#manager').addClass('error');
            }

            if(!valid)
            {
                alert('Please fill in fields in required format.')
                return false;
            }
            return true;
        }

        
        
    </script>
</body>
</html>