<section class="title-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="left-title-text">
                <h3>@lang('My Account')</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-title-text">
                    <ul>
                        <li class="breadcrumb-item"><a href="{{route('index')}}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('My Account')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="my-account">
    <div class="profile-bg">
        <img src="{{url('template_web/images/profile/bg-img.jpg')}}" alt="Responsive image">
        <div class="my-Profile-dt">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="profile-dpt">
                            <img style="width: 100%" src="{{url('image/' . auth()->user()->avatar) }}" alt="">
                        </div>
                        <div class="profile-all-dt">
                            <div class="profile-name-dt">
                                <h1>{{Auth::user()->name}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
