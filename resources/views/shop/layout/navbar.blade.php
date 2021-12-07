<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#index"><h2>Sixteen <em>Clothing</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link @yield('navbar home')" href="{{route('shop.index')}}">Home
                            <span class="sr-only sr">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('navbar products')">
                        <a class="nav-link" href="{{route('shop.products')}}">Our Products</a>
                    </li>
                    <li class="nav-item @yield('navbar about')">
                        <a class="nav-link" href="{{route('shop.about')}}">About Us</a>
                    </li>
                    <li class="nav-item @yield('navbar contact')">
                        <a class="nav-link" href="{{route('shop.contact')}}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
