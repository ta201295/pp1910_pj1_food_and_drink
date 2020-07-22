@extends('web.layout.app')
@section('title', 'My Order')
@section('content')
    @include('web.user.title_bar')
    <section class="all-profile-details">
        <div class="container">
            <div class="row">
                @include('web.user.menu')

                @include('web.user.order.main')
            </div>
        </div>
    </section>
@endsection
