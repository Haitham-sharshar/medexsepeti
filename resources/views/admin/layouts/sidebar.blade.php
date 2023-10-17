<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color" style="height: 1000px" >
    <div class="mobile-sidebar-header d-md-none">
        <div class="header-logo">
            <a href="/admin"><img src="{{asset('medex.jpg')}}" width="60" alt="logo"></a>
        </div>
    </div>
    <div class="sidebar-menu-content" >
        <ul class="nav nav-sidebar-menu sidebar-toggle-view">

            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><img src="{{asset('category.png')}}" alt="" width="30px" height="30px" style="margin: 0 10px 0 10px"><span>Categories</span></a>
                <ul class="nav sub-group-menu @if(request()->path() == 'admin/category' || request()->path() == 'admin/category/create' )sub-group-active" @endif>
            <li class="nav-item">
                <a href="{{route('admin.category.create')}}" class="nav-link @if(request()->path() == 'admin/category/create')menu-active" @endif><i class="fas fa-angle-right"></i>Add</a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.category.index')}}" class="nav-link @if(request()->path() == 'admin/category')menu-active" @endif><i class="fas fa-angle-right"></i>All Categories</a>
            </li>
        </ul>
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><img src="{{asset('product.png')}}" alt="" width="30px" height="30px" style="margin: 0 10px 0 10px"><span>Products</span></a>
                <ul class="nav sub-group-menu @if(request()->path() == 'admin/products' || request()->path() == 'admin/products/create' )sub-group-active" @endif>
                    <li class="nav-item">
                        <a href="{{route('admin.products.create')}}" class="nav-link @if(request()->path() == 'admin/products/create')menu-active" @endif><i class="fas fa-angle-right"></i>Add</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.products.index')}}" class="nav-link @if(request()->path() == 'admin/products')menu-active" @endif><i class="fas fa-angle-right"></i>All Products</a>
                    </li>
                </ul>


    </div>
</div>
