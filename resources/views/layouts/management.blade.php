<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="img/fav.png" />

    <!-- Title -->
    <title>ERP</title>


    <!-- *************
   ************ Common Css Files *************
  ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/daterange.css') }}" />

    @yield('styles')
</head>

<body>
    <div class="container-fluid">


        <!-- Navigation start -->
        <nav class="navbar navbar-expand-lg custom-navbar">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#WafiAdminNavbar" aria-controls="WafiAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="WafiAdminNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active-page" href="#" id="dashboardsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-devices_other nav-icon"></i>
                            Dashboard
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dashboardsDropdown">
                            <li>
                                <a class="dropdown-item" href="index.html">Admin Dashboard</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="project-dashboard.html">Project Management</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="sales-dashboard.html">Sales Dashboard</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="crm-dashboard.html">CRM Dashboard</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="ecommerce-dashboard.html">Ecommerce Dashboard</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="quick-dashboard.html">Quick Dashboard</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="smart-dashboard.html">Smart Dashboard</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="helpdesk-dashboard.html">Help Desk Dashboard</a>
                            </li>
                            <li>
                                <a class="dropdown-toggle sub-nav-link active-page" href="#" id="layoutsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Layouts
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="layoutsDropdown">
                                    <li>
                                        <a class="dropdown-item active-page" href="default-layout.html">Default Layout</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="default-layout-light.html">Light Color Layout</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="fixed-layout.html">Fixed Layout</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="boxed-layout.html">Boxed Layout</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="card-options.html">Card Options</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="drag-drop-cards.html">Drag and Drop Cards</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-package nav-icon"></i>
                            {{ __('messages.stock_section') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="appsDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('garages.index') }}"> {{ __('messages.garage') }} </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('products.index') }}">{{ __('messages.product') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('category.index') }}">{{ __('messages.category') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('suppliers.index') }}">{{ __('messages.Supplier') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('requests.index') }}">{{ __('messages.request') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('stock.index') }}">{{ __('messages.stock') }}</a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-book-open nav-icon"></i>
                            {{ __('messages.garages_section') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('vehicle_types.index') }}">{{ __('messages.vehicles_types') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('vehicle.index') }}">{{ __('messages.vehicle') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('driver.index') }}">{{ __('messages.drivers') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('employee.index') }}">{{ __('messages.employee') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('service.index') }}">{{ __('messages.service') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('maintenance-control') }}">{{ __('messages.entry_exit_vehiule') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href={{ route('maintenance.index') }}>{{ __('messages.maintenance') }}</a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>
            <div class="header-items">


                <ul class="header-actions">
                    <li class="dropdown">
                        <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                            <i class="icon-box"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">

                            <ul class="header-tasks">
                                <li>
                                    <a class="dropdown-item" href="{{ route('change_locale', 'ar') }}">arabic</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('change_locale', 'en') }}">english</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                            <i class="icon-bell"></i>
                            <span class="count-label">8</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
                            <div class="dropdown-menu-header">
                                Notifications (40)
                            </div>
                            <ul class="header-notifications">
                                <li>
                                    <a href="#">
                                        <div class="user-img away">
                                            <img src="img/user21.png" alt="User" />
                                        </div>
                                        <div class="details">
                                            <div class="user-title">Abbott</div>
                                            <div class="noti-details">Membership has been ended.</div>
                                            <div class="noti-date">Oct 20, 07:30 pm</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-img busy">
                                            <img src="img/user10.png" alt="User" />
                                        </div>
                                        <div class="details">
                                            <div class="user-title">Braxten</div>
                                            <div class="noti-details">Approved new design.</div>
                                            <div class="noti-date">Oct 10, 12:00 am</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-img online">
                                            <img src="img/user6.png" alt="User" />
                                        </div>
                                        <div class="details">
                                            <div class="user-title">Larkyn</div>
                                            <div class="noti-details">Check out every table in detail.</div>
                                            <div class="noti-date">Oct 15, 04:00 pm</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                            <span class="user-name">Zyan Ferris</span>
                            <span class="avatar">ZF<span class="status busy"></span></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                            <div class="header-profile-actions">
                                <div class="header-user-profile">
                                    <div class="header-user">
                                        <img src="img/user.png" alt="Admin Template" />
                                    </div>
                                    <h5>Zyan Ferris</h5>
                                    <p>Admin</p>
                                </div>
                                <a href="user-profile.html"><i class="icon-user1"></i> My Profile</a>
                                <a href="account-settings.html"><i class="icon-settings1"></i> Account Settings</a>
                                <a href="login.html"><i class="icon-log-out1"></i> Sign Out</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="quick-settings-btn" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick Settings">
                            <i class="icon-list"></i>
                        </a>
                    </li>
                </ul>
                <!-- Header actions end -->
            </div>
        </nav>
        <!-- Navigation end -->


        <!-- *************
    ************ Main container start *************
   ************* -->
        <div class="main-container">


            <!-- Page header start -->
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Layouts</li>
                    <li class="breadcrumb-item active">Default Layout</li>
                </ol>

                <ul class="app-actions">
                    <li>
                        <a href="#" id="reportrange">
                            <span class="range-text"></span>
                            <i class="icon-chevron-down"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print">
                            <i class="icon-print"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download CSV">
                            <i class="icon-cloud_download"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Page header end -->


            <!-- Content wrapper start -->
            <div class="content-wrapper" @if (app()->isLocale('ar')) dir="rtl" style="text-align:right" @endif>

                @yield('content')


            </div>
            <!-- Content wrapper end -->


        </div>
        <!-- *************
    ************ Main container end *************
   ************* -->


        <!-- Footer start -->
        <footer class="main-footer">© Wafi 2020</footer>
        <!-- Footer end -->


    </div>

    <!-- Loading starts -->

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/custom-scrollbar.js') }}"></script>
    <script src="{{ asset('js/daterange.js') }}"></script>
    <script src="{{ asset('js/custom-daterange.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('script')
</body>

</html>
