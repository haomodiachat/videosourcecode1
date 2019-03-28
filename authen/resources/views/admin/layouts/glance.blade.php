<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<!-- head -->
@include('admin.partials.head')
<!-- //head -->
<body class="cbp-spmenu-push">
<div class="main-content">
@include('admin.partials.sidebar')
    <!--left-fixed -navigation-->

    <!-- header-starts -->
@include('admin.partials.header')
    <!-- //header-ends -->
    <!-- main review start-->
    <div id="page-wrapper">
        <div class="main-page">
            @yield('content')
        </div>

    </div>
    <!-- footer -->
@include('admin.partials.footer')
    <!-- //footer -->

</div>

<!-- new added graphs chart js-->
<!-- main-js -->
@include('admin.partials.main-js')
<!-- //main-js -->

</body>
</html>