<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
    <li class="nav-item">
    <a class="nav-link" href="{{url('admin/dashboard')}}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">Categories</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/category')}}">Listing</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/category/create')}}">Add category</a></li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{url('admin/brands')}}">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">Brands</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{url('admin/colors')}}">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">Colors</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
        <i class="mdi mdi-chart-pie menu-icon"></i>
        <span class="menu-title">Products</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic2">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/products')}}">Listing</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/products/create')}}">Add Product</a></li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="pages/tables/basic-table.html">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Tables</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="pages/icons/mdi.html">
        <i class="mdi mdi-emoticon menu-icon"></i>
        <span class="menu-title">Icons</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
        <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
        <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
        <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
        <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="documentation/documentation.html">
        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
        <span class="menu-title">Documentation</span>
    </a>
    </li>
</ul>
</nav>
<!-- partial -->