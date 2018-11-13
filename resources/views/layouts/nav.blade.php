<nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="/">Nanno's Foods</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="nav">
        @if(!session()->has('VendorId'))
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/vendor">Vendor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/item">Items</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/storeLocations">Stores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/order">Orders</a>
            </li>
          </ul>
        @else
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/order/viewVendorOrders">View Orders</a>
            </li>
          </ul>
        @endif
        <ul class="navbar-nav navbar-right">
          @if(!session()->has('VendorId'))
            <li class="nav-item">
              <a href="/login"><i class="material-icons" style="font-size:36px;color:white;">person</i></a>
            </li>
          @else
            <li class="nav-item">
              <span style="color:white;">Logged in as <a href='/logout' style="color:white;">{{ session('VendorName') }}</a></span>
            </li>
          @endif
        </ul>
      </div>
    </nav>