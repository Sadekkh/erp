<!doctype html>
<html lang="en">

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

    <!-- Loading starts -->
    <div>
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Loading ends -->


    <!-- *************
   ************ Header section start *************
  ************* -->

    <!-- Header start -->
    <header class="header">
        <div class="logo-wrapper">

            <a href="#" class="quick-links-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="Quick Links">
                <i class="icon-menu1"></i>
            </a>
        </div>
        <div class="header-items">

            <ul class="header-actions">

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
    </header>
    <!-- Header end -->

    <!-- Screen overlay start -->
    <div class="screen-overlay"></div>
    <!-- Screen overlay end -->

    <!-- Quicklinks box start -->
    <div class="quick-links-box">
        <div class="quick-links-header">
            Quick Links
            <a href="#" class="quick-links-box-close">
                <i class="icon-circle-with-cross"></i>
            </a>
        </div>

        <div class="quick-links-wrapper">
            <div class="fullHeight">
                <div class="quick-links-body">
                    <div class="container-fluid p-0">
                        <div class="row less-gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <a href="documents.html" class="quick-tile blue">
                                    <i class="icon-file-text"></i>
                                    Documents
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="crm-dashboard.html" class="quick-tile secondary">
                                    <i class="icon-pie-chart1"></i>
                                    CRM
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="ecommerce-dashboard.html" class="quick-tile blue">
                                    <i class="icon-shopping-cart1"></i>
                                    Ecommerce
                                </a>
                            </div>
                        </div>
                        <div class="row less-gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <a href="gallery2.html" class="quick-tile photos lg">
                                    Photos
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="tasks.html" class="quick-tile">
                                    <i class="icon-check-circle"></i>
                                    Tasks
                                </a>
                                <a href="calendar-external-draggable.html" class="quick-tile blue">
                                    <i class="icon-calendar1"></i>
                                    Events
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="chat.html" class="quick-tile blue">
                                    <i class="icon-message-circle"></i>
                                    Chat
                                </a>
                                <a href="default-layout.html" class="quick-tile">
                                    <i class="icon-grid"></i>
                                    Layout
                                </a>
                            </div>
                        </div>
                        <div class="row less-gutters">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="custom-alerts.html" class="quick-tile secondary">
                                    <i class="icon-alert-triangle"></i>
                                    Alerts
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="google-maps.html" class="quick-tile blue">
                                    <i class="icon-map-pin"></i>
                                    Maps
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="https://www.gmail.com" target="_blank" class="quick-tile white">
                                    <i class="icon-drafts"></i>
                                    Gmail
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="https://www.youtube.com" target="_blank" class="quick-tile secondary">
                                    <i class="icon-youtube"></i>
                                    Youtube
                                </a>
                            </div>
                        </div>
                        <div class="row less-gutters">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="user-profile.html" class="quick-tile">
                                    <i class="icon-account_circle"></i>
                                    Profile
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="contacts.html" class="quick-tile">
                                    <i class="icon-phone"></i>
                                    Contacts
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="account-settings.html" class="quick-tile">
                                    <i class="icon-settings1"></i>
                                    Settings
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <a href="login.html" class="quick-tile">
                                    <i class="icon-lock2"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quicklinks box end -->

    <!-- Quick settings start -->
    <div class="quick-settings-box">
        <div class="quick-settings-header">
            <div class="date-container">Today <span class="date" id="today-date"></span></div>
            <a href="#" class="quick-settings-box-close">
                <i class="icon-circle-with-cross"></i>
            </a>
        </div>
        <div class="quick-settings-body">
            <div class="fullHeight">
                <div class="quick-setting-list">
                    <h6 class="title">Events</h6>
                    <ul class="list-items">
                        <li>
                            <div class="list-title">Product Launch</div>
                            <div class="list-location">10:00 AM</div>
                        </li>
                        <li>
                            <div class="list-title">Team Meeting</div>
                            <div class="list-location">01:30 PM</div>
                        </li>
                        <li>
                            <div class="list-title">Q&A Session</div>
                            <div class="list-location">02:30 PM</div>
                        </li>
                    </ul>
                </div>
                <div class="quick-setting-list">
                    <h6 class="title">Notes</h6>
                    <ul class="list-items">
                        <li>
                            <div class="list-title">Refreshing the list</div>
                            <div class="list-location">03:15 PM</div>
                        </li>
                        <li>
                            <div class="list-title">Not able to click on button</div>
                            <div class="list-location">03:18 PM</div>
                        </li>
                    </ul>
                </div>
                <div class="quick-setting-list">
                    <h6 class="title">Quick Settings</h6>
                    <ul class="set-priority-list">
                        <li>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked id="systemUpdates">
                                <label class="custom-control-label" for="systemUpdates">System Updates</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="noti">
                                <label class="custom-control-label" for="noti">Notifications</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick settings end -->

    <!-- *************
   ************ Header section end *************
  ************* -->


    <!-- Container fluid start -->
    <div class="container-fluid">


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
            <div class="content-wrapper" dir="rtl">
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
    <!-- Container fluid end -->

    <!-- *************
   ************ Required JavaScript Files *************
  ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
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
