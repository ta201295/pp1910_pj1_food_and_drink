@extends('web.layout.app')
@section('title', 'Checkout')			
	
@section('content')
	<!--title-bar start-->
	<section class="title-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="left-title-text">
					<h3>@lang('Checkout')</h3>
					</div>
				</div>
				<div class="col-md-6">
					<div class="right-title-text">  
						<ul>
							<li class="breadcrumb-item"><a href="{{route('index')}}">@lang('Home')</a></li>
							<li class="breadcrumb-item active" aria-current="page">@lang('Checkout')</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--title-bar end-->	
	<!--partners start-->
	<form action="{{ route('checkout') }}" method="post" id="checkout-form">
		@csrf	
		<section class="all-partners">			
			<div class="container">
			@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
			@endif
			@if(Session::has('cart'))		
				<div class="row">					
					<div class="col-lg-8 col-md-8">
						<div class="my-checkout">
							<div class="your-order">
								<div><h4>Your Order</h4></div>
								@foreach($products as $product)
								<div class="order-d">
									<div class="item-dt-left">
										<span>{{ $product['item']['name'] }}</span>
										<p>{{ $product['qty'] }} X {{$product['item']['price']}} VND</p>
									</div>
									<div class="item-dt-right">
										<p>{{number_format($product['price'])}} VND</p>
									</div>			
								</div>
								@endforeach
								<div class="total-bill">
									<div class="total-bill-text">
										<h5>Total</h5>
									</div>
									<div class="total-bill-payment">
										<p>{{number_format($totalPrice)}} VND</p>
									</div>
								</div>	
							</div>
						</div>
						<div class="checkout-details">
							<div class="row">
								<div class="col-md-6">
									<div class="about-checkout">
										<img src="{{url('template_web/images/checkout/icon-1.svg')}}" alt="">
										<h4>Your Information is Safe</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut iaculis at metus vitae porta.</p>
									</div>							
								</div>
								<div class="col-md-6">
									<div class="about-checkout">
										<img src="{{url('template_web/images/checkout/icon-2.svg')}}" alt="">
										<h4>Secure Checkout</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut iaculis at metus vitae porta.</p>
									</div>							
								</div>
							</div>
						</div>
						<div class="note">
							<p><span>Note :</span>Order cancel in 5 minutes. Ut iaculis at metus vitae porta.</p>
						</div>
					</div>

					<div class="col-lg-4 col-md-4">					
						<div class="right-address">
							<h4>Address</h4>
							<form>
								<div class="form-group">
									<input type="text" name="delivery_address" class="video-form" id="addressInput" value="{{Auth::user()->address}}">							
								</div>						
							</form>
						</div>	
						<div class="right-payment-method">
							<h4>Payment Method</h4>
							<div class="single-payment-method">
								<div class="payment-method-name">
									<div class="custom-control custom-radio">
										<input type="radio" id="cashon" name="payment_method" value="cash" class="custom-control-input">
										<label class="custom-control-label" for="cashon">Cash On Delivery</label>
									</div>
								</div>
								<div class="payment-method-details" data-method="cash" style="">
									<p>Cash on delivery (COD) available. Card/Net banking acceptance subject to device availability.</p>
								</div>
							</div>
							<div class="single-payment-method">
								<div class="payment-method-name">
									<div class="custom-control custom-radio">
										<input type="radio" id="directbank" name="payment_method" value="bank" class="custom-control-input">
										<label class="custom-control-label" for="directbank">Credit/Debit Card</label>
									</div>
								</div>
								<div class="payment-method-details" data-method="bank">
									<div class="form-group">
										<label for="cardNumber">Card Details</label>
										<input type="text" class="video-form" id="cardNumber" name="card_number" placeholder="Card Number">																				
									</div>
									<div class="form-group">
										<input type="text" class="video-form" id="cardHolder" name="holder_name" placeholder="Holder Name">																				
									</div>
									<div class="accepted-check">
										<div class="accpet-checkbox">
											<input type="checkbox" id="c101" name="cb">
											<label for="c101">Agree to terms and conditions</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="right-contact-dt">
							<h4>Confirm</h4>
							<div class="form-group">
								<div class="input-field">
									<input type="text" name="customer_name" class="confirm-form" id="customer_name" value="{{auth()->user()->name}}">							
									<i class="far fa-user"></i>
								</div>
							</div>
							<div class="form-group">
								<div class="input-field">
									<input type="tel" name="customer_phone" class="confirm-form" id="telNumber" value="{{auth()->user()->phone}}">							
									<i class="fas fa-mobile-alt"></i>
								</div>
							</div>
						</div>
						<div class="checkout-btn">
							<button type="submit" class="chkout-btn btn-link">@lang('Checkout Now')</button>
						</div>
					</div>			
				</div>			
			</div>
			@endif	
		</section>
	</form>			
@endsection