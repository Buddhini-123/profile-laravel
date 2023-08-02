<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    @include('blade-user.include.head.user-list-head')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('blade-user.include.header.user-list-nav')
    @include('blade-user.include.header.user-list-defaultlist')
    @include('blade-user.include.header.user-list-otherlist')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('blade-user.include.menu.left-menu')
    <!-- END: Main Menu-->
    <div class="app-content content ">
        <!-- BEGIN: Content-->
        @yield('content')
        <!-- END: Content-->
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('blade-user.include.footer.user-list-footer')
    <!-- END: Footer-->


    @include('blade-user.include.script.user-list-script')
</body>
<!-- END: Body-->

</html>
