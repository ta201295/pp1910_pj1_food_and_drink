@extends('web.layout.app')
@section('title', $product->name)

@section('content')
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                    <h3>@lang('Product Detail')</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">  
                        <ul>
							<li class="breadcrumb-item"><a href="{{route('index')}}">@lang('Home')</a></li>
                            <li class="breadcrumb-item"><a href="{{route('product')}}">@lang('Products')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="all-partners">			
		<div class="container">		
			<div class="row">					
				<div class="col-lg-8 col-md-8">
					<div id="sync1" class="owl-carousel owl-theme">
						<div class="item">
                        <img src="/storage/img/{{$product->image}}" alt="">
						</div>				
					</div>
					<div class="resto-meal-dt">
						<div class="right-side-btns">
						<form class="foodstars" action="{{route('product_star')}}" id="addStar" method="POST">
						   {{ csrf_field() }}
						   <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
							<div class="ratings">
								@for($i = 1; $i < 6; $i++)
									<input type="radio" name="point" id="rating" 
									class="@if($product->rates[0]->point >= $i) fullStar  @endif" value="{{ $i }}">
								@endfor
							</div>
							<br/>	
								@lang('Average Rating') : <span id='avgrating_'> {{  $product->rates->avg('point') }} </span>
						</form>									
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="right-side">
						<div class="new-heading t-bottom">
							<h1>{{$product->name}}</h1>
						</div>
						<div class="about-meal">
							<h4>Description</h4>
							<p>{{$product->description}}</span></p>
							<a href="javascript:;" onclick="myFunction()" id="readBtn">@lang('See All')</a>
						</div>					
						<div class="price">
							<span>{{$product->price}} VNĐ</span>
						</div>
						<div class="dt-detail">
							<ul>
								<li>
									<div class="delivery"><i class="fas fa-shopping-cart"></i>@lang('Delivery Free : Fre')e</div>
								</li>
								<li>
									<div class="time"><i class="far fa-clock"></i>@lang('Delivery Time : 30 Min')</div>
								</li>
							</ul>
						</div>
						<div class="Qty">
							<h4> Qty</h4>
							 <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="minus-btn btn-sm" id="minus-btn"><i class="fas fa-minus-square"></i></button>
                                </div>
                                <input type="number" id="qty_input" class="qty-control" value="1" min="1">
                                <div class="input-group-prepend">
                                    <button class="add-btn btn-sm" id="plus-btn"><i class="fas fa-plus-square"></i></button>
                                </div>
                            </div>
						</div>
						<div class="total-cost">
							<div class="total-text">
								<h5>@lang('Total')</h5>
							</div>
							<div class="total-price">
								<p>$17.00</p>
							</div>
						</div>
						<div class="order-now-check">
							<button class="on-btn btn-link" onclick="">@lang('Order Now')</button>
						</div>
					</div>
						
				</div>
			</div>			
		</div>
	</section>
@endsection