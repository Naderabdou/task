<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('dashboard/app-assets/images/png/logo.png') }}" width="150px" alt="">
                </a>

            </li>

        </ul>
    </div>
    <div class="divider"></div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ isActiveRoute('admin.home') }}"><a class="d-flex align-items-center"
                    href="{{ route('admin.home') }}"><i data-feather="home"></i><span
                        class="menu-title text-truncate">الصفحة الرئيسية</span></a>
            </li>
        </ul>



        {{-- categories --}}
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="nav-item {{ areActiveRoutes(['admin.categories.index', 'admin.categories.create', 'admin.categories.edit']) }}">
                <a class="d-flex align-items-center" href="{{ route('admin.categories.index') }}">
                    <i data-feather="box">
                    </i>
                    <span class="menu-title text-truncate"> اقسام المشاريع</span></a>
            </li>
        </ul>


        {{-- servicesCategories --}}
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="nav-item {{ areActiveRoutes(['admin.servicesCategories.index', 'admin.servicesCategories.create', 'admin.servicesCategories.edit']) }}">
                <a class="d-flex align-items-center" href="{{ route('admin.servicesCategories.index') }}">
                    <i data-feather="box">
                    </i>
                    <span class="menu-title text-truncate">اقسام الخدمات</span></a>
            </li>
        </ul>

        {{-- services --}}
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="nav-item {{ areActiveRoutes(['admin.services.index', 'admin.services.create', 'admin.services.edit']) }}">
                <a class="d-flex align-items-center" href="{{ route('admin.services.index') }}">
                    <i data-feather="box">
                    </i>
                    <span class="menu-title text-truncate"> الخدمات</span></a>
            </li>
        </ul>


        {{--  projects --}}
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="nav-item {{ areActiveRoutes(['admin.projects.index', 'admin.projects.create', 'admin.projects.edit']) }}">
                <a class="d-flex align-items-center" href="{{ route('admin.projects.index') }}">
                    <i data-feather="box">
                    </i>
                    <span class="menu-title text-truncate"> المشاريع</span></a>
            </li>
        </ul>
        {{--  blogs --}}
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li
                class="nav-item {{ areActiveRoutes(['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit']) }}">
                <a class="d-flex align-items-center" href="{{ route('admin.blogs.index') }}">
                    <i data-feather="box">
                    </i>
                    <span class="menu-title text-truncate"> المدونه</span></a>
            </li>
        </ul>




        {{-- settings --}}
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ isActiveRoute('admin.settings.create') }}"><a class="d-flex align-items-center"
                    href="{{ route('admin.settings.create') }}"><i data-feather="settings"></i><span
                        class="menu-title text-truncate">الاعدادات</span></a>
            </li>
        </ul>

    </div>
</div>
<!-- END: Main Menu-->
