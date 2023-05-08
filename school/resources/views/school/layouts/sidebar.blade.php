<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('school.dashboard', ['slug' => $auth->slug]) }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('school.articles', ['slug' => $auth->slug]) }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Articles</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('school.addarticle', ['slug' => $auth->slug]) }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Add New Article</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('school.staff', ['slug' => $auth->slug]) }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">School Staff</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Aricles</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('school.addarticle', ['slug' => $auth->slug]) }}">Add New Article</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('school.articles', ['slug' => $auth->slug]) }}">Articles List</a></li>
                    </li>
                </ul>
            </div>
        </li> --}}
    </ul>
</nav>
