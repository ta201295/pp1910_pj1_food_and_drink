@extends('web.layout.app')
@section('title', 'Products')
@section('content')

@include('web.products.title')

<section class="all-partners">
    <div class="container">
        <div class="row">
            @include('web.products.filter')
            @include('web.products.main')
        </div>
    </div>
</section>

@endsection
