<div class="col-lg-6 col-md-8 col-12">
    <div class="tab-content">
        <div class="tab-pane active" id="about">
            <div class="profile-about">
                <div class="tab-content-heading">
                    <h4>About</h4>
                    <a href="{{route('edit_profile')}}"><i class="far fa-edit"></i>@lang('Edit Info')</a>
                </div>
                <div class="about-dtp">
                    <div class="about-bg">
                        <ul>
                            <li>
                                <div class="dp-detail">
                                    <h6>@lang('Name')</h6>
                                    <p>{{ Auth::user()->name }}</p>
                                </div>
                            </li>
                            
                            <li>
                                <div class="dp-detail">
                                    <h6>@lang('Email')</h6>
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="dp-detail">
                                    <h6>@lang('Address')</h6>
                                    <p>{{ Auth::user()->address }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="dp-detail">
                                    <h6>@lang('Phone')</h6>
                                    <p>{{ Auth::user()->phone }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
