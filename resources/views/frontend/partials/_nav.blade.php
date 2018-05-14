<!--Double navigation-->
<header>
    @include('frontend.sidebars.left_sidebar')
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav" style="background-color: #22404f">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
        </div>
        <!-- Breadcrumb-->
        <div class="breadcrumb-dn mr-auto">
            <p><a href="">{{ trans('navs.frontend.blog') }}</a></p>
        </div>
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/home"><span class="clearfix d-none d-sm-inline-block white-text">
                  {{ trans('navs.frontend.home') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/about" class="nav-link"> <span class="clearfix d-none d-sm-inline-block white-text">
                  {{ trans('navs.frontend.about') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/contact" class="nav-link"> <span class="clearfix d-none d-sm-inline-block white-text">
                  {{ trans('navs.frontend.contact') }}</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle white-text" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ trans('navs.frontend.page') }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    @foreach($pages as $page)
                    <a class="dropdown-item" href="{{ route('frontend.frontend.page', $page->page_slug)}}">{{ $page->title }}</a>
                    @endforeach
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.Navbar -->
</header>
