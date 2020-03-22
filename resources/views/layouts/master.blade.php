<!DOCTYPE html>
<html>
<head>
    @include('layouts._head')
</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
@include('layouts._topNav')
<!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
@include('layouts._leftNav')
<!-- Left Sidebar End -->

    <!-- Start right Content here -->

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
            @yield('content')
            <!-- End Row -->
            </div> <!-- container -->

        </div> <!-- content -->

        @include('layouts._footer')

    </div>
    <!-- End Right content here -->

</div>
<!-- END wrapper -->

@include('layouts._script')
@yield('scheduleAjaxRequest')
</body>
</html>