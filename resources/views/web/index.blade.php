@extends('web.layout.app')
@section('title', 'Nature Food')
@section('content')
<!--banner start-->
<section class="block-preview">
    <div class="cover-banner" style="background-image: url('template_web/images/homepage/banner.jpg')"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="left-text-b">
                    <h1 class="title">Choose, Order and Checkout</h1>
                    <h6 class="exeption">Specify your address to suggest you the fast delivery</h6>
                    <p>Get our services from 24 hours.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--banner end-->

<!--order-food-online-in-your-area start-->
<section class="order-food-online">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="new-heading">
                    <h1> @lang('Order Food Online In Your Area') </h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="all-meal">
                        <div class="top">
                            <a href="{{route('product_detail', ['slug' => $product->slug])}}"><div class="bg-gradient"></div></a>
                            <div class="top-img">
                                <img src="{{url('image' . '/' . $product->image) }}" alt="">
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
                                    <div class="comments"><a onclick="AddCart({{ $product->id }})" href="javascript:">@lang('Add to cart') <i class="fas fa-shopping-cart"></i></a></div>
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
