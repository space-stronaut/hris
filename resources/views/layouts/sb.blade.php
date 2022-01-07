<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body id="page-top">
    <style>
        #map { height: 180px; }
    </style>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HRIS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if (Auth::user()->role->name == 'administrator')
                            <a class="collapse-item" href="{{ route('role.index') }}">Role Management</a>
                        @endif
                        @if (Auth::user()->role->name == 'administrator' || Auth::user()->role->name == 'direksi' || Auth::user()->role->name == 'hrd' || Auth::user()->role->name == 'manajemen')
                            <a class="collapse-item" href="{{ route('user.index') }}">Users</a>
                        @endif
                        @if (Auth::user()->role->name == 'administrator' || Auth::user()->role->name == 'direksi' || Auth::user()->role->name == 'hrd' || Auth::user()->role->name == 'manajemen')
                        <a href="{{ route('payroll.index') }}" class="collapse-item">Payroll</a>
                        @endif
                        @if (Auth::user()->role->name == 'administrator' || Auth::user()->role->name == 'direksi' || Auth::user()->role->name == 'hrd' || Auth::user()->role->name == 'manajemen')
                        <a class="collapse-item" href="{{ route('office.index') }}">Office Management</a>
                        @endif
                        @if (Auth::user()->role->name == 'administrator' || Auth::user()->role->name == 'direksi' || Auth::user()->role->name == 'hrd' || Auth::user()->role->name == 'manajemen')
                        <a href="{{ route('partnerships.index') }}" class="collapse-item">Partnership</a>
                        @endif
                    </div> 
                </div>
            </li>
            

            <!-- Nav Item - Utilities Collapse Menu -->
            @if (Auth::user()->role->name == 'administrator' || Auth::user()->role->name == 'karyawan' || Auth::user()->role->name == 'hrd' || Auth::user()->role->name == 'manajemen' || Auth::user()->role->name == 'administrasi')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Absensi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('attendance.index') }}">Absensi</a>
                    </div>
                </div>
            </li>
            @endif

            @if (Auth::user()->role->name == 'administrator' || Auth::user()->role->name == 'hrd' || Auth::user()->role->name == 'manajemen' || Auth::user()->role->name == 'administrasi')
            <li class="nav-item {{ Request::is('journal') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('journal.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Journal</span></a>
            </li>
            @endif
            @if (Auth::user()->role->name == 'administrator' || Auth::user()->role->name == 'karyawan' || Auth::user()->role->name == 'hrd' || Auth::user()->role->name == 'manajemen')
            <li class="nav-item {{ Request::is('cuti') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('cuti.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Pengajuan cuti dan lembur</span></a>
            </li>
            @endif

            @if (Auth::user()->role->name == 'administrator' || Auth::user()->role->name == 'direksi' || Auth::user()->role->name == 'hrd' || Auth::user()->role->name == 'manajemen')
            <li class="nav-item {{ Request::is('assets') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('assets.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Asset</span></a>
            </li>
            @endif

            @if (Auth::user()->role->name == 'administrator' || Auth::user()->role->name == 'hrd' || Auth::user()->role->name == 'manajemen' || Auth::user()->role->name == 'administrasi')
            <li class="nav-item {{ Request::is('legalitas') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('legalitas.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Legalitas</span></a>
            </li>
            @endif

            @if (Auth::user()->role->name == 'administrator' || Auth::user()->role->name == 'hrd' || Auth::user()->role->name == 'manajemen' || Auth::user()->role->name == 'administrasi')
            <li class="nav-item {{ Request::is('paklarings') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('paklarings.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Paklaring</span></a>
            </li>
            @endif

            @if (Auth::user()->role->name != 'karyawan')
            <li class="nav-item {{ Request::is('rab') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('rab.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>RAB</span></a>
            </li>
            @endif

            @if (Auth::user()->role->name != 'karyawan')
            <li class="nav-item {{ Request::is('reimburstment') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('reimburstment.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Reimbursment</span></a>
            </li>
            @endif

            @if (Auth::user()->role->name != 'karyawan')
            <li class="nav-item {{ Request::is('bpjs') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('bpjs.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>BPJS</span></a>
            </li>
            @endif

            @if (Auth::user()->role->name == 'administrator' || Auth::user()->role->name == 'hrd' || Auth::user()->role->name == 'manajemen' || Auth::user()->role->name == 'administrasi')
            <li class="nav-item {{ Request::is('cooperation') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('cooperation.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Cooperation</span></a>
            </li>
            @endif


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ Storage::url(Auth::user()->poto_profile) }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script>
    var map = L.map('map').fitWorld();
    var latlong = document.getElementById('latlong')

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        tileSize: 512,
        id: 'mapbox/streets-v11',
        draggable : false,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1Ijoicm9uYWxkNjc4IiwiYSI6ImNrdm9xMjI3bTRpbzQzMXMxcnlpNnc4MWkifQ.t_L5Ga66YjpSjvpotglbhg'
    }).addTo(map);

    map.locate({setView: true, maxZoom: 16, draggable : false});

    function onLocationFound(e) {
        var radius = e.accuracy;

        L.marker(e.latlng).addTo(map)
            .bindPopup("You are within " + radius + " meters from this point").openPopup();

        L.circle(e.latlng, radius).addTo(map);
        latlong.value = `Lat, Long : ${e.latlng.lat}, ${e.latlng.lng}`
        latlong.dispatchEvent(new Event('input'))
    }

    map.on('locationfound', onLocationFound);

    function onLocationError(e) {
        alert(e.message);
    }

    map.on('locationerror', onLocationError);
    // var mymap = L.map('map').setView([51.505, -0.09], 13);
    // var mymap = L.map('map', {doubleClickZoom: true, draggable : false}).locate({setView: true, maxZoom: 16});
    // L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    //     maxZoom: 18,
    //     id: 'mapbox/streets-v11',
    //     tileSize: 512,
    //     zoomOffset: -1,
    //     accessToken: 'pk.eyJ1Ijoicm9uYWxkNjc4IiwiYSI6ImNrdm9xMjI3bTRpbzQzMXMxcnlpNnc4MWkifQ.t_L5Ga66YjpSjvpotglbhg'
    // }).addTo(mymap);

    // var circle = L.circle([51.508, -0.11], {
    //     color: 'red',
    //     fillColor: '#f03',
    //     fillOpacity: 0.5,
    //     radius: 500
    // }).addTo(mymap);

    // var latlong = document.getElementById('latlong')

    // mymap.on('click', function(e) {
    //     // alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
    //     latlong.value = `Lat, Long : ${e.latlng.lat}, ${e.latlng.lng}`
    //     latlong.dispatchEvent(new Event('input'))
    // });

    // let mymap = L.map('map').fitWorld()

    // L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    //     maxZoom: 18,
    //     // id: 'mapbox/streets-v11',
    //     tileSize: 512,
    //     zoomOffset: -1,
    //     // accessToken: 'pk.eyJ1Ijoicm9uYWxkNjc4IiwiYSI6ImNrdm9xMjI3bTRpbzQzMXMxcnlpNnc4MWkifQ.t_L5Ga66YjpSjvpotglbhg'
    // }).addTo(mymap);

    // map.locate({setView: true, maxZoom : 16})

    // function onLocationFound(e) {
    //     var radius = e.accuracy;

    //     L.marker(e.latlng).addTo(map)
    //         .bindPopup("You are within " + radius + " meters from this point").openPopup();

    //     L.circle(e.latlng, radius).addTo(map);
    //     latlong.value = `Lat, Long : ${e.latlng.lat}, ${e.latlng.lng}`
    //     latlong.dispatchEvent(new Event('input'))
    // }

    // mymap.on('locationfound', onLocationFound);

    // function onLocationError(e) {
    //     alert(e.message);
    // }

    // mymap.on('locationerror', onLocationError);



// latlong.dispatchEvent(new Event('input'))
</script>

</body>

</html>