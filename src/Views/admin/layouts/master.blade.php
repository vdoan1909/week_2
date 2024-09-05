<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>
        Task 2 |
        @yield('title')
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= $_ENV['BASE_URL'] ?>assets/admin/images/favicon.ico">

    <!-- jsvectormap css -->
    <link href="<?= $_ENV['BASE_URL'] ?>assets/admin/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet"
        type="text/css" />

    <!--Swiper slider css-->
    <link href="<?= $_ENV['BASE_URL'] ?>assets/admin/libs/swiper/swiper-bundle.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Layout config Js -->
    <script src="<?= $_ENV['BASE_URL'] ?>assets/admin/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= $_ENV['BASE_URL'] ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= $_ENV['BASE_URL'] ?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= $_ENV['BASE_URL'] ?>assets/admin/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= $_ENV['BASE_URL'] ?>assets/admin/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Header -->
        @include('admin.layouts.header')
        <!-- Header End -->

        <!-- ========== App Menu ========== -->
        <!-- Left Sidebar -->
        @include('admin.layouts.left')
        <!-- Left Sidebar End -->

        <div class="main-content">
            <!-- Page-content -->
            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')

                </div>
            </div>
            <!-- End Page-content -->

            @include('admin.layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= $_ENV['BASE_URL'] ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $_ENV['BASE_URL'] ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= $_ENV['BASE_URL'] ?>assets/admin/libs/node-waves/waves.min.js"></script>
    <script src="<?= $_ENV['BASE_URL'] ?>assets/admin/libs/feather-icons/feather.min.js"></script>
    <script src="<?= $_ENV['BASE_URL'] ?>assets/admin/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= $_ENV['BASE_URL'] ?>assets/admin/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="<?= $_ENV['BASE_URL'] ?>assets/admin/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="<?= $_ENV['BASE_URL'] ?>assets/admin/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="<?= $_ENV['BASE_URL'] ?>assets/admin/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="<?= $_ENV['BASE_URL'] ?>assets/admin/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="<?= $_ENV['BASE_URL'] ?>assets/admin/js/pages/dashboard-ecommerce.init.js"></script>

    <!-- App js -->
    <script src="<?= $_ENV['BASE_URL'] ?>assets/admin/js/app.js"></script>
</body>

</html>
