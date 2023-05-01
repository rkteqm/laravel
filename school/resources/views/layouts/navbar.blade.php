<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="{{ url('/') }}">SCHOOLWEB</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="active" href="{{ url('/') }}">Home</a></li>
                <li><a href="">Courses</a></li>
                <li><a href="">Trainers</a></li>

                <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                    class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        @auth
            <a href="{{ route('dashboard') }}" class="get-started-btn">Staff Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="get-started-btn">Staff login</a>
        @endauth

        @auth('school')
            <a href="{{ route('school.dashboard', ['slug' => Auth::guard('school')->user()->slug]) }}"
                class="get-started-btn">School Dashboard</a>
        @else
            <a href="{{ route('school.login') }}" class="get-started-btn">School Admin</a>
        @endauth

        @auth('admin')
            <a href="{{ route('admin.dashboard') }}" class="get-started-btn">Admin Dashboard</a>
        @else
            <a href="{{ route('admin.login') }}" class="get-started-btn">Super Admin</a>
        @endauth
    </div>
</header><!-- End Header -->
