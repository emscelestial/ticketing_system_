
<body style="background: #ffffff">
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"></div>
                        <a class="nav-link {{Request::is ('admin/dashboard') ? 'active':'' }}" href="{{ url('admin/dashboard') }}">
                          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link {{Request::is ('admin/users') ? 'active':'' }}" href="{{ url('admin/users') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-person-fill-add" ></i></div>
                              Users
                          </a>

                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="bi bi-plus-circle-fill"></i></i></div>
                              Bookings
                          </a>



                        <a class="nav-link {{Request::is ('admin/passenger') ? 'active':'' }}" href="{{ url('admin/passenger') }}">
                            <div class="sb-nav-link-icon"><i  class="fas fa-users"></i></i></div>
                              Passengers
                          </a>

                          <a class="nav-link {{Request::is ('admin/schedule') ? 'active':'' }}" href="{{ url('admin/schedule') }}">
                            <div class="sb-nav-link-icon"><i  class="fas fa-users"></i></i></div>
                              Schedules
                          </a>





                    </div>
                </div>

            </nav>
        </div>





<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

