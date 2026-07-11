@section('styles')
    <style>
        .header__top {
            background-color: #fff !important;
        }
        .header__logo a{
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }
        .bg-site-dark {
            background-color: #0d2d6c !important;
        }


    </style>
@endsection
<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="{{ asset('assets/web/img/logo.png') }}" alt=""></a>
    </div>
    {{--<div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>--}}
    {{--<div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="{{ asset('assets/web/img/language.png') }}" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="#">Shop Details</a></li>
                    <li><a href="#">Shoping Cart</a></li>
                    <li><a href="#">Check Out</a></li>
                    <li><a href="#">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>--}}
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> info@navsons.com</li>
            <li>Free Shipping for all Orders over Rs.999</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<header class="header bg-light mb-3">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li class="text-white"><i class="fa fa-envelope text-white"></i> <a href="mailto:info@navsons.com" class="text-white">info@navsons.com</a></li>
                            <li class="text-white">Free Shipping for all Orders over Rs.999</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#" class="text-white"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="text-white"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="text-white"><i class="fa fa-linkedin"></i></a>
                            <a href="#" class="text-white"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        {{--<div class="header__top__right__language">
                            <img src="{{ asset('assets/web/img/language.png') }}" alt="">
                            <div class="text-white">English</div>
                            <span class="arrow_carrot-down text-white"></span>
                            <ul>
                                <li class="text-white"><a href="#">Spanis</a></li>
                                <li class="text-white"><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            <a href="#" class="text-white"><i class="fa fa-user"></i> Login</a>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">

    <!-- Desktop -->
    <div class="container d-none d-lg-block">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="#">
                        <img src="{{ asset('assets/web/img/logo.png') }}"
                            width="150"
                            class="img-fluid"
                            alt="">
                    </a>
                </div>
            </div>

            <!-- Search -->
            <div class="col-lg-6">
                <div class="hero__search__form">
                    <form action="#">
                        <input type="text" placeholder="Search...">
                        <button type="submit" class="site-btn">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Phone -->
            <div class="col-lg-3">
                <div class="hero__search__phone__text d-flex justify-content-end flex-column align-items-end"> 
                    <h5>
                        <a href="tel:+923000055563" class="text-dark fw-bold">+92-300-0055563</a>
                    </h5>
                    <span>
                        <a href="tel:+923000055563" class="text-dark">
                            Timings: <span class="font-weight-bold">9AM - 7PM</span>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile & Tablet -->
    <div class="mobile-header d-lg-none">
        <div class="d-flex align-items-center px-3 py-2">

            <!-- Search -->
            <div class="flex-grow-1">
                <form action="#" class="mobile-search-form">
                    <input type="text" placeholder="Search...">
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Hamburger -->
            <button class="btn text-white ms-2 humberger__open">
                <i class="fa fa-bars fa-lg"></i>
            </button>

        </div>
    </div>

</div>
</header>