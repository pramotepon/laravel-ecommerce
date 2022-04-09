@extends('pages.layout.layout')
{{-- Head --}}
@section('head')
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
            width: 100%;
            height: 60vh;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

    </style>
@endsection

{{-- Header --}}
@section('header')
    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">Slide 1</div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
            <div class="swiper-slide">Slide 4</div>
            <div class="swiper-slide">Slide 5</div>
            <div class="swiper-slide">Slide 6</div>
            <div class="swiper-slide">Slide 7</div>
            <div class="swiper-slide">Slide 8</div>
            <div class="swiper-slide">Slide 9</div>
        </div>
        <div class="swiper-scrollbar"></div>
    </div>
@endsection

{{-- Main --}}
@section('main')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show alert-fix" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show alert-fix" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <article class="bg-white">
        <div class="container pt-4 pb-4 ">
            <h1 class="text-center">สินค้า</h1>

            <div class="card-container">
                @foreach ($products as $product)
                    <div class="product-card border">
                        <img src="{{ asset('images/products/'.$product->image) }}" alt="" width="100%">
                        <div class="ps-2 pe-2">
                            <h3 class="pt-3">{{ $product->name }}</h3>
                            <p>{{ substr($product->detail, 0, 120) }}
                                .....</p>
                            <p class="text-end">ราคา <span>{{ $product->price }}</span> บาท</p>
                        </div>
                        <div class="btn-group d-flex" role="group">
                            <a href="#" class="btn btn-primary w-100">ดูข้อมูล</a>
                            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-success w-100">ใส่รถเข็น</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </article>
@endsection

{{-- Script --}}
@section('script')
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            scrollbar: {
                el: ".swiper-scrollbar",
                hide: true,
            },
        });
    </script>
@endsection
