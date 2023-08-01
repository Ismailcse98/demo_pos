<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="index3.html" class="brand-link">
<img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
<span class="brand-text font-weight-light">POS</span>
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
<img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image" loading="lazy">
</div>
<div class="info">
 <a href="#" class="d-block">Md. Ismail</a>
</div>
</div>

<div class="form-inline">
<div class="input-group" data-widget="sidebar-search">
<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-sidebar">
<i class="fas fa-search fa-fw"></i>
</button>
</div>
</div>
</div>

<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


<li class="nav-item">
    <a href="{{route('home')}}" class="nav-link @yield('dashboard')">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
    Dashboard
    <i class="right fas fa-angle-left"></i>
    </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('units.index')}}" class="nav-link @yield('units')">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Units
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('suppliers.index')}}" class="nav-link @yield('supplier')">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Supplier
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('purchases.index')}}" class="nav-link @yield('purchase')">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Purchase Product
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{route('purchases-order.index')}}" class="nav-link @yield('purchase_order')">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Purchase Order
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('logout') }}" class="nav-link btn btn-danger btn-block" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >

    {{ __('Logout') }}

    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

</li>


</ul>
</nav>

</div>

</aside>