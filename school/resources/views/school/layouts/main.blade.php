@include('school.layouts.header')
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('school.layouts.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        @include('school.layouts.settings')
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('school.layouts.sidebar')
        <!-- partial -->
        <!-- main-panel start -->
        @yield('main-section')
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

@include('school.layouts.footer')
