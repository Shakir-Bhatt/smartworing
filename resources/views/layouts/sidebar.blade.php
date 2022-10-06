<!--=============== Left side Start ================-->
@php
    $routeName = explode('.',\Route::currentRouteName())[0];
@endphp
<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item {{($routeName == 'property.list' || $routeName == 'property.create' )  ? 'active':''}}" data-item='property'>
                <a class="nav-item-hold" href="">
                    <i class="nav-icon i-Library"></i>
                    <span class="nav-text">Poperty</span>
                </a>
                <div class="triangle"></div>
            </li>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->
         <ul class="childNav" data-parent="property" style="display: none;">
           
            <li class="nav-item">
                <a href="{{route('property.list')}}" class="{{$routeName == 'property.list' ? 'open' : ''}}">
                    <i class="nav-icon i-File"></i>
                    <span class="item-name">List Property</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('property.create')}}" class="{{$routeName == 'property.create' ? 'open' : ''}}">
                    <i class="nav-icon i-Edit"></i>
                    <span class="item-name">Add Property</span>
                </a>
            </li>
            
        </ul>
        
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
