@include('layouts.staff.header')
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('layouts.staff.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        @include('layouts.staff.settings')
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('layouts.staff.sidebar')
        <!-- partial -->
        <!-- main-panel start -->
        @yield('main-section')
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

@include('layouts.staff.footer')
