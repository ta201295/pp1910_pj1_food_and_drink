@extends('web.layout.app')
@section('title', 'Products')
@section('content')
<section class="title-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="left-title-text">
                <h3>@lang('Search')</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-title-text">
                    <ul>
                        <li class="breadcrumb-item"><a href="{{route('index')}}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('Search')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="order-food-online">
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="all-meal">
                        <div class="top">
                            <a href="{{route('product_detail', ['slug' => $product->slug])}}"><div class="bg-gradient"></div></a>
                            <div class="top-img">
                                <img src="{{ url('image/' . $product->image) }}" alt="">
                            </div>
                            <div class="logo-img">
                                <img src="{{url('template_web/images/homepage/meals/logo-1.jpg')}}" alt="">
                            </div>
                            <div class="top-text">
                                <div class="heading"><h4><a href="{{route('product_detail', ['slug' => $product->slug])}}">{{ $product->name }}</a></h4></div>
                                <div class="sub-heading">
                                <p>{{ number_format($product->price) }} VNĐ</p>
                                </div>
                            </div>
                        </div>
                        <div class="bottom">
                            <div class="bottom-text">
                                <div class="delivery"><i class="fas fa-shopping-cart"></i>@lang('Delivery Free : Free')</div>
                                <div class="time"><i class="far fa-clock"></i>@lang('Delivery Time : 30 Min')</div>
                                <div class="star">
                                    <i class="" type="hidden"></i>
                                    <div class="comments"><a href="{{route('product_addToCart', $product->id)}}">@lang('Add to cart') <i class="fas fa-shopping-cart"></i></a></div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="meal-btn">
            {{-- <a href="#" class="m-btn btn-link">Show All</a> --}}
        </div>
    </div>
</section>
@endsection
