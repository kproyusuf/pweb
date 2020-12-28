@extends('layouts.pemilik')


<section class="hero" style="margin-top: 150px">
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
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
            <div class="col-lg-9">
                <div class="hero__item set-bg" data-setbg="/images/bag.jpg"
                    style="background-image: url(&quot;/images/bag.jpg&quot;);">
                    <div class="hero__text">
                        <span>Pekerjaan</span>
                        <h2>Bidang <br>Argoindustri</h2>
                        <p style="color: aliceblue">Lowongan Pekerjaan Terbaru</p>
                        {{-- <a href="#" class="primary-btn">DAFTAR SEKARANG</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
