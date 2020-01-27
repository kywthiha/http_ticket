<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.date.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/http_ticket/admin/css/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/http_ticket/admin/setting/account.php" class="brand-link">
            <img src="https://img.icons8.com/bubbles/50/000000/bus.png" alt="Admin" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Admin</span>
        </a>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/http_ticket/admin/booking/booking_list.php" class="nav-link">
                        <i class="nav-icon fa fa-bus"></i>
                        <p>
                            Booking
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/http_ticket/admin/schedule/schedule_list.php" class="nav-link">
                        <i class="nav-icon fa fa-bus"></i>
                        <p>
                            Schedule
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/http_ticket/admin/bus_operator/bus_operator_list.php" class="nav-link">
                        <i class="nav-icon fa fa-bus"></i>
                        <p>

                            Bus Operator
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/http_ticket/admin/bus/bus_list.php" class="nav-link">
                        <i class="nav-icon fa fa-bus"></i>
                        <p>
                            Bus
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/http_ticket/admin/city/city_list.php" class="nav-link">
                        <i class="nav-icon fa fa-bus"></i>
                        <p>
                            City
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/http_ticket/admin/bus_route/route_list.php" class="nav-link">
                        <i class="nav-icon fa fa-bus"></i>
                        <p>
                            Route
                        </p>
                    </a>
                </li>
                <?php
                function getAdmin()
                {
                    if (isset($_SESSION['auth'], $_SESSION['staff'])) {
                        return $_SESSION['staff']['role'];
                    }else{
                        die("Un authorise access");
                    }
                }
                if(getAdmin() == "admin"):
                ?>
                <li class="nav-item">
                    <a href="/http_ticket/admin/setting/staff_list.php" class="nav-link">
                        <i class="nav-icon fa fa-bus"></i>
                        <p>
                            Staff
                        </p>
                    </a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="/http_ticket/admin/auth/log_out.php" class="nav-link">
                        <i class="nav-icon fa fa-bus"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">




