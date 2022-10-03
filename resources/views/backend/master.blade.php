<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Dashboard | IMS - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesdesign" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    @yield('header-css')
</head>

<body data-topbar="dark">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">


@include('backend.page-topbar')

<!-- ========== Left Sidebar Start ========== -->
@include('backend.vertical-menu')
<!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

            @yield('page-content')
            <!-- End Page-content -->
            @include('backend.footer')
            </div>
            <!-- end main content-->
        </div>
    </div>
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
@include('backend.right-bar')
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@yield('bottom-js')
</body>

</html>
