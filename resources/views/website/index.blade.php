@extends('website.layouts.app')
@section('content')

@section('styles')
<style>
    .call-modal {
        border-radius: 24px;
    }

    .call-icon {
        width: 90px;
        height: 90px;
        margin: auto;
        border-radius: 50%;
        background: linear-gradient(135deg, #22c55e, #16a34a);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 34px;
    }

    .btn-call-now{
        display:inline-block;
        background: #22c55e;
        color:#fff;
        text-decoration:none;
        padding:14px 35px;
        border-radius:50px;
        font-weight:600;
        transition:.3s;
    }

    .shadow-card {
        background: #fff;
        box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.5);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .shadow-card:hover {
        transform: translateY(-5px);
    }

    .featured__controls ul {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .featured__filter {
        margin-top: 30px !important;
        margin-bottom: 10px !important;
    }

    .featured__filter_column {
        padding-bottom: 5px !important;
    }

    @media (max-width: 768px) {
        .featured__controls {
            margin-bottom: 15px;
        }

        .featured__controls ul {
            display: flex;
            overflow-x: auto;
            flex-wrap: nowrap;
            justify-content: flex-start;
            padding: 20px 0px;
        }

        .featured__controls ul::-webkit-scrollbar {
            display: none;
        }

        .featured__controls ul li {
            flex: 0 0 auto;
        }

        .featured__filter {
            margin-top: 0px !important;
            margin-bottom: 5px !important;
        }

        .featured__filter_column {
            padding-bottom: 5px !important;
        }
    }
</style>
@endsection

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="heroCarousel" class="carousel slide" data-ride="carousel" data-interval="4000" data-pause="false">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/web/img/hero/fruits.png') }}" class="d-block w-100 rounded" alt="Fruits">
                        </div>

                        <div class="carousel-item">
                            <img src="{{ asset('assets/web/img/hero/vegetables.png') }}" class="d-block w-100 rounded" alt="Vegetables">
                        </div>

                        <div class="carousel-item">
                            <img src="{{ asset('assets/web/img/hero/chicken-meat.png') }}" class="d-block w-100 rounded" alt="Meat">
                        </div>

                        <div class="carousel-item">
                            <img src="{{ asset('assets/web/img/hero/meal.png') }}" class="d-block w-100 rounded" alt="Meat">
                        </div>

                        <div class="carousel-item">
                            <img src="{{ asset('assets/web/img/hero/seafood.png') }}" class="d-block w-100 rounded" alt="Meat">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
{{--<section class="categories bg-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Categories</h2>
                </div>
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg featured__controls" data-setbg="{{asset('assets/web/img/categories/fruits.png')}}">
                            <h5><a href="#products" class="category-link" data-filter=".fruit">Fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('assets/web/img/categories/veg.png')}}">
                            <h5><a href="#products" class="category-link" data-filter=".vegetable">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('assets/web/img/categories/meat.png')}}">
                            <h5><a href="#products" class="category-link" data-filter=".meat">Fresh Meat</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('assets/web/img/categories/drinks.png')}}">
                            <h5><a href="#products" class="category-link" data-filter=".drinks">Drinks</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('assets/web/img/categories/grocery.png')}}">
                            <h5><a href="#products" class="category-link" data-filter=".grocery">Grocery</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('assets/web/img/categories/seafood.png')}}">
                            <h5><a href="#products" class="category-link" data-filter=".seafood">Seafood</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad my-2" id="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h4>Categories</h4>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li data-filter=".fruit">
                            <div class="d-block rounded" style="width: 75px; height: 75px">
                                <div class="shadow-card">
                                    <img src="{{ asset('assets/web/img/icons/fruits.png') }}" class="rounded">
                                </div>
                            </div>
                        </li>
                        <li data-filter=".vegetable">
                            <div class="d-block rounded" style="width: 75px; height: 75px">
                                <div class="shadow-card">
                                    <img src="{{ asset('assets/web/img/icons/vegetable.png') }}" class="rounded">
                                </div>
                            </div>
                        </li>
                        <li data-filter=".meat">
                            <div class="d-block rounded" style="width: 75px; height: 75px">
                                <div class="shadow-card">
                                    <img src="{{ asset('assets/web/img/icons/meat.png') }}" class="rounded">
                                </div>
                            </div>
                        </li>
                        <li data-filter=".drinks">
                            <div class="d-block rounded" style="width: 75px; height: 75px">
                                <div class="shadow-card">
                                    <img src="{{ asset('assets/web/img/icons/drinks.png') }}" class="rounded">
                                </div>
                            </div>
                        </li>
                        <li data-filter=".grocery">
                            <div class="d-block rounded" style="width: 75px; height: 75px">
                                <div class="shadow-card">
                                    <img src="{{ asset('assets/web/img/icons/grocery.png') }}" class="rounded">
                                </div>
                            </div>
                        </li>
                        <li data-filter=".seafood">
                            <div class="d-block rounded" style="width: 75px; height: 75px">
                                <div class="shadow-card">
                                    <img src="{{ asset('assets/web/img/icons/seafood.png') }}" class="rounded">
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <div class="col-lg-12 featured__filter_column">
                <div class="section-title">
                    <h4>Featured Products</h4>
                </div>
            </div>
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-4 col-6 mix {{ $product->category_name }}">
                <div class="featured__item py-2 bg-light rounded" style="border: 1px solid #e1e1e1;">
                    <div class="featured__item__pic set-bg" data-setbg="{{ $product->image_url }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="tel:+923000055563"><i class="fa fa-phone"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="tel:+923000055563">{{ $product->name }}</a></h6>
                        <h5>Rs.{{ $product->price }}/{{ $product->unit }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="modal fade" id="callModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content call-modal">

            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fa fa-close"></i>
                </button>
            </div>

            <div class="modal-body text-center pt-0">

                <div class="call-icon">
                    <i class="fa fa-phone"></i>
                </div>

                <h3 class="mt-3 mb-2">Call Us</h3>

                <p class="text-muted mb-4">
                    Our team is available to assist you.
                </p>

                <h3 class="p-3 text-dark font-weight-bold" style="color: #000">
                    +92 300 0055563
                </h3>
                <div class="d-flex justify-content-center gap-2">
                    <div class="mx-1">
                        <a href="tel:+923000055563" class="btn-call-now">
                            <i class="fa fa-phone me-2"></i>
                            Phone
                        </a>
                    </div>
                    
                    <div class="mx-1">
                        <a href="https://wa.me/923000055563" target="_blank" class="btn-call-now">
                            <i class="fa fa-whatsapp me-2"></i>
                            WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featured Section End -->

<!-- Latest Product Section Begin -->
{{--<section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('assets/web/img/latest-product/lp-1.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('assets/web/img/latest-product/lp-2.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('assets/web/img/latest-product/lp-3.jpg')}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('assets/web/img/latest-product/lp-1.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('assets/web/img/latest-product/lp-2.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('assets/web/img/latest-product/lp-3.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('assets/web/img/latest-product/lp-1.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('assets/web/img/latest-product/lp-2.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('assets/web/img/latest-product/lp-3.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('assets/web/img/latest-product/lp-1.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('assets/web/img/latest-product/lp-2.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('assets/web/img/latest-product/lp-3.jpg')}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                                        <div class="latest-product__text">
                                            <h4>Review Products</h4>
                                            <div class="latest-product__slider owl-carousel">
                                                <div class="latest-prdouct__slider__item">
                                                    <a href="#" class="latest-product__item">
                                                        <div class="latest-product__item__pic">
                                                            <img src="{{asset('assets/web/img/latest-product/lp-1.jpg')}}" alt="">
                                                        </div>
                                                        <div class="latest-product__item__text">
                                                            <h6>Crab Pool Security</h6>
                                                            <span>$30.00</span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="latest-product__item">
                                                        <div class="latest-product__item__pic">
                                                            <img src="{{asset('assets/web/img/latest-product/lp-2.jpg')}}" alt="">
                                                        </div>
                                                        <div class="latest-product__item__text">
                                                            <h6>Crab Pool Security</h6>
                                                            <span>$30.00</span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="latest-product__item">
                                                        <div class="latest-product__item__pic">
                                                            <img src="{{asset('assets/web/img/latest-product/lp-3.jpg')}}" alt="">
                                                        </div>
                                                        <div class="latest-product__item__text">
                                                            <h6>Crab Pool Security</h6>
                                                            <span>$30.00</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="latest-prdouct__slider__item">
                                                    <a href="#" class="latest-product__item">
                                                        <div class="latest-product__item__pic">
                                                            <img src="{{asset('assets/web/img/latest-product/lp-1.jpg')}}" alt="">
                                                        </div>
                                                        <div class="latest-product__item__text">
                                                            <h6>Crab Pool Security</h6>
                                                            <span>$30.00</span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="latest-product__item">
                                                        <div class="latest-product__item__pic">
                                                            <img src="{{asset('assets/web/img/latest-product/lp-2.jpg')}}" alt="">
                                                        </div>
                                                        <div class="latest-product__item__text">
                                                            <h6>Crab Pool Security</h6>
                                                            <span>$30.00</span>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="latest-product__item">
                                                        <div class="latest-product__item__pic">
                                                            <img src="{{asset('assets/web/img/latest-product/lp-3.jpg')}}" alt="">
                                                        </div>
                                                        <div class="latest-product__item__text">
                                                            <h6>Crab Pool Security</h6>
                                                            <span>$30.00</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                </div>
            </div>
        </div>
</section>--}}
<!-- Latest Product Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Banner Begin -->
<div class="banner mb-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="section-title">
                    <h2>We Have</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="banner__pic">
                    <img src="{{asset('assets/web/img/banner/banner-1.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                <div class="banner__pic">
                    <img src="{{asset('assets/web/img/banner/banner-2.png')}}" alt="">
                </div>
            </div>
            <div class="col-12 mt-1">
                <div class="section-title">
                    <h2>Summer Special</h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="banner__pic">
                    <video
                        autoplay
                        muted
                        loop
                        playsinline
                        width="100%"
                        height="auto">
                        <source src="{{ asset('assets/web/img/banner/header-banners.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Blog Section Begin -->
{{--<section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{asset('assets/web/img/blog/blog-1.jpg')}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{asset('assets/web/img/blog/blog-2.jpg')}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{asset('assets/web/img/blog/blog-3.jpg')}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>--}}
<!-- Blog Section End -->

@section('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.category-link', function(e) {
            e.preventDefault();

            let filter = $(this).data('filter');

            $('html, body').animate({
                scrollTop: $('#products').offset().top
            }, 500);

            $('.featured__controls li[data-filter="' + filter + '"]').click();
        });
    });
</script>
@endsection

@endsection