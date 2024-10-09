@extends('layouts.navbar')
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            @foreach (DB::table('kategoris')->get() as $item)
                                <li><a href="{{ route('kategori.show', $item->id) }}">{{ $item->kategori }}</a></li>
                            @endforeach

                        </ul>
                    -</div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                @foreach ($sosmed as $sosm)
                                <h5>{{ '+' . $sosm->telepon}}</h5>
                                @endforeach
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                        <div class="hero__item set-bg" data-setbg="{{ asset('images/' . $galleries->image) }}">
                            <div class="hero__text">
                                {{-- <img src="{{ asset($galleries->image) }}" alt=""> --}}
                                <span>{{ $galleries->title }}</span>
                                <h2>{{ $galleries->slogan }}</h2>
                                <p>{{ $galleries->deskripsi }}</p>
                                <a href="" class="primary-btn">SHOP NOW</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->



    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->
@endsection
