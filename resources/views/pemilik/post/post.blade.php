@extends('layouts.pemilik')


<section class="breadcrumb-section set-bg" style="margin-top: 150px" data-setbg="/assets/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{ $category->name }}</h2>
                    <div class="breadcrumb__option">
                        <a href="/pencari-dashboard">Home</a>
                        <span>Lowongan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hero hero-normal" style="margin-top: 25px">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>{{ $category->name }}</span>
                    </div>
                    <ul>
                        @php
                        $category = App\Models\Category::where('status','!=','2')->get();
                        @endphp
                        <li> @foreach ($category as $category_nav_item)
                            <a href="{{ url('posts/'.$category_nav_item->url) }}">
                                {{ $category_nav_item->name }}
                            </a>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    {{-- <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>
                            <li><a href="{{ URL::current() }}">All</a></li>
                            <li><a href="{{ URL::current()."?sort=salary_asc" }}">Gaji - Terendah ke Tertinggi</a></li>
                            <li><a href="{{ URL::current()."?sort=salary_desc" }}">Gaji - Tertinggi ke Terendah</a></li>
                            <li><a href="{{ URL::current()."?sort=newest" }}">Terbaru</a></li>
                        </ul>
                    </div> --}}
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Lowongan Terbaru</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    @foreach ($worker as $witem)
                                    <a href="{{ asset('posts/'.$witem->category->url.'/'.$witem->url) }}"
                                        class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('uploads/worker/'.$witem->img_thumb) }}"
                                                style="width: 125px" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{!! $witem->user->name !!}</h6>
                                            <span>{!! $witem->field_work !!}</span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    @foreach ($worker as $witem)
                                    <a href="{{ asset('posts/'.$witem->category->url.'/'.$witem->url) }}"
                                        class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ asset('uploads/worker/'.$witem->img_thumb) }}"
                                                style="width: 125px" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{!! $witem->user->name !!}</h6>
                                            <span>{!! $witem->field_work !!}</span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>Kategori</span> Pekerja</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($worker as $witem)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('uploads/worker/'.$witem->img_thumb) }}">
                                <ul class="product__item__pic__hover">
                                    <li><a
                                            href="{{ asset('posts/'.$witem->category->url.'/'.$witem->url) }}">Detail</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{ asset('posts/'.$witem->category->url.'/'.$witem->url) }}">{!!
                                        $witem->user->name !!}</a></h6>
                                <h5>{!! $witem->field_work !!}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
