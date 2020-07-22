@extends('web.layout.app')

@section('content')
<!--title-bar start-->
@include('web.user.title_bar')
<!--title-bar end-->	
<!--my-account-tabs start-->
<section class="all-profile-details">
    <div class="container">
        <div class="row">
            @include('web.user.menu')
            
            @include('web.user.about.main')
        </div>
    </div>
</section>
<!--my-account-tabs end-->    
@endsection