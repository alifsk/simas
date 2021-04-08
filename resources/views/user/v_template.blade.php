<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SiMas | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('user/include.css')
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    <!-- =======================================================
  * Template Name: eBusiness - v2.2.0
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body data-spy="scroll" data-target="#navbar-example">

    <!-- ======= Header ======= -->
    @include('user/include.menu')
    <!-- End Header -->

    <!-- ======= Slider Section ======= -->
    @include('user/include.slider')
    <!-- End Slider -->

    <main id="main">

        @yield('content')

    </main><!-- End #main -->

    @include('user/include.footer')

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    @include('user/include.javascript')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    @yield('extendsjs')
</body>

</html>