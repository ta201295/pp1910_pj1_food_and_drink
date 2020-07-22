@extends('web.layout.app')
@section('title', 'Account')
@section('content')

@include('web.user.title_bar')
<!--my-account-tabs start-->
<section class="all-profile-details">
    <div class="container">
        <div class="row">
            @include('web.user.menu')

            @include('web.user.about.index')
        </div>
    </div>
</section>
<!--my-account-tabs end-->
@endsection
