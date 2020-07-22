@extends('web.layout.app')
@section('title', $product->name)
@section('css')
    <link href="{{url('template_web/css/rating.css')}}" rel="stylesheet">
@endsection
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
            <div id="app">
			    <div class="row">
				<div class="col-lg-6 col-md-6">
					<div id="sync1" class="owl-carousel owl-theme">
						<div class="item">
                        <img src="{{url('image' . '/' . $product->image) }}" alt="">
						</div>
					</div>
					<div class="resto-meal-dt">
						<div class="right-side-btns">
                            <star-rating :rating="{{$product->getStarRating()}}" :read-only="true" :star-size="30"></star-rating>
						</div>
					</div>

                    <div class="all-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class ="nav-item" role="presentation">
                                <a class="nav-link active" aria-controls="reviews" role="tab" data-toggle="tab">{{__('Reviews')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="reviews">
                                @if (Auth::check())
                                    <div class="comment-post"> 
                                        <form action="{{ route('review') }}" method="post" >
                                            @csrf
                                            <div class="post-items">
                                                <div class="img-dp">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="select-rating">
                                                    <h4>{{__('Your Rating')}} :</h4>
                                                    <div class="ratings">
                                                        @for($i = 1; $i < 6; $i++)
                                                            <input type="radio" name="rating" id="rating"  value="{{ $i }}">
                                                        @endfor
                                                    </div>
                                                </div>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <textarea type="text" class="rating-input" name="comment" id="comment" placeholder="Write your review"></textarea>
                                                <input class="rating-btn btn-link" type="submit" value="Save Review">
                                            </div>
                                        </form>
                                    </div>
                                @else 
                                    <div class="review-product">
                                        Login to review
                                    </div>
                                @endif
                                <div class="main-comments bm-margin" id="comment-review">
                                    <div class="rating-1">
                                        @forelse($product->reviews as $review)
                                            <div class="user-detail-heading">
                                                <a><img src="{{ url('image/'. $review->user[0]->avatar) }}" alt=""></a>
                                                <h4>{{ $review->user[0]->name }}</h4>
                                            </div>
                                            <div class="reply-time">
                                                <p><i class="far fa-clock"></i>{{ $review->created_at->toDayDateTimeString() }}</p>
                                            </div>
                                            <div class="comment-description">
                                                <star-rating :rating="{{ $review->rating }}" :read-only="true" :show-rating="false" :star-size="20"></star-rating>
                                                <p>{{ $review->comment }}</p>
                                            </div>
                                            @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="right-side">
						<div class="new-heading t-bottom">
							<h1>{{$product->name}}</h1>
						</div>
						<div class="about-meal">
							<h4>{{__('Description')}}</h4>
							<p>{{$product->description}}</p>
						</div>
						<div class="price">
							<span>{{number_format($product->price)}} VNĐ</span>
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
						<div class="order-now-check">
							<a onclick="AddCart({{ $product->id }})" href="javascript:"><button class="on-btn btn-link" >@lang('Add to cart')</button></a>
						</div>
					</div>
				</div>
			</div>
            </div>
		</div>
	</section>
    <script src="{{url('js/app.js')}}"></script>
@endsection
@section('script')
    <script src="{{ url('template_web/js/rating.js') }}"></script>
@endsection
