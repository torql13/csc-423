<nav class="navbar navbar-dark navbar-expand-md bg-dark">
    <div class="container-fluid">
        @if(!session()->has('VendorId'))
            <a class="navbar-brand" href="/">Nanno's Foods</a>
        @else
            <a class="navbar-brand" href="/order/viewVendorOrders">Nanno's Foods</a>
        @endif
      
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    @if(!session()->has('VendorId'))
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/vendor">Vendor</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/item">Items</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/storeLocations">Stores</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/order">Orders</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/customer">Customers</a></li>
                    @else
                        <li class="nav-item" role="presentation"><a class="nav-link" href="/order/viewVendorOrders">View Orders</a></li>
                    @endif
                </ul>
                <ul class="navbar-nav ml-auto">
                    @if(session('VendorId'))
                        <li class="nav-item">
                        <span style="color:white;">Logged in as {{ session('VendorName') }}. <u><a href='/logout' style="color:white;">Logout</a></u></span>
                        </li>
                    @else
                        <li class="nav-item">
                        <a href="/login"><i class="material-icons" style="font-size:36px;color:white;">person</i></a>
                        </li>
                    @endif
                </ul>
            </div>
    </div>
</nav>