@extends('web.layout.app')
@section('title', 'Shopping Cart')

@section('content')
	<!--title-bar start-->
	<section class="title-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="left-title-text">
					<h3>@lang('Shopping Cart')</h3>
					</div>
				</div>
				<div class="col-md-6">
					<div class="right-title-text">
						<ul>
							<li class="breadcrumb-item"><a href="{{route('index')}}">@lang('Home')</a></li>
							<li class="breadcrumb-item active" aria-current="page">@lang('Shopping Cart')</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--title-bar end-->
	<!--partners start-->
	<section class="all-partners">
		<div class="container">
		@if(Session::has('cart'))
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<div class="my-checkout">
						<div class="table-responsive">
							<table class="table  table-bordered">
								<thead>
									<tr>
										<td class="td-heading">@lang('Product')</td>
										<td class="td-heading">@lang('Qty')</td>
										<td class="td-heading">@lang('Price')</td>
										<td class="td-heading">@lang('Action')</td>
									</tr>
								</thead>
								@foreach($products as $product)
								<tbody>
									<tr>
										<td>
											<div class="checkout-thumb">
												<a href="{{route('product_detail', $product['item']['slug'] )}}">
													<img src="{{url('image' . '/' . $product['item']['image'])}}" class="img-responsive" alt="thumb" title="thumb">
												</a>
											</div>
											<div class="name">
												<a href="{{route('product_detail', $product['item']['slug'] )}}"><h4>{{ $product['item']['name'] }}</h4></a>
												<div class="star">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="far fa-star"></i>
													<span>4.5</span>
												</div>
											</div>
										</td>
										<td class="td-content">{{ $product['qty'] }}</td>
										<td class="td-content" >{{number_format($product['price'])}} VND</td>
										<td><a href="{{route('product_delCart', $product['item']['id'])}}"><button class="remove-btn">Remove</button></a></td>
									</tr>
								</tbody>
								@endforeach
								<tbody>
									<tr>
										<td colspan="4">
											<h3 class="text-right">Total <ins>@if(Session::has('cart')) {{number_format($totalPrice)}} VND @endif</ins></h3>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="checkout-btn">
						<a href="{{route('checkout')}}"><button type="submit" class="chkout-btn btn-link">Checkout Now</button></a>
					</div>
				</div>
			</div>
		@else
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<h2>@lang('No Items In Cart!')</h2>
				</div>
			</div>
		@endif
		</div>
	</section>
	<!--partners end-->
@endsection
