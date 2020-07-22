<div class="col-lg-6 col-md-8 col-12">
    <div class="tab-content">
        <div class="tab-pane active" id="change-password">						
            <div class="timeline">
                <div class="tab-content-heading">
                    <h4>@lang('Change Password')</h4>
                    <a href="my_profile_dashbord.html"><i class="fas fa-angle-double-left"></i>@lang('Back to Profile')</a>
                </div>
                @if (session('error'))
                <div class="alert alert-danger" role="alert" style="text-align: center;">
                    {{ session('error') }}
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success" role="alert" style="text-align: center;">
                    {{ session('success') }}
                </div>
                @endif
                <div class="edit-profile">
                <form method="POST" action="{{ route('change_password') }}">
                @csrf										
                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            <label for="current_password">@lang('Current Password')</label>
                            <input type="password" class="video-form" name="current_password" id="currnet_password" placeholder="Enter Current Password" required="">	
                            
                            @if ($errors->has('current_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current_password') }}</strong>
                                </span>
                            @endif
                        </div>										
                        <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                            <label for="new_password">@lang('New Password')</label>
                            <input type="password" class="video-form" name="new_password" id="new_password" placeholder="Enter New Password" required="">

                            @if ($errors->has('new_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new_password') }}</strong>
                                </span>
                            @endif							
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirm">@lang('Confirm Password')</label>
                            <input type="password" class="video-form" name="new_password_confirm" id="new_password_confirm" placeholder="Enter Confirm Password" required="">							
                        </div>
                        <button type="submit" class="change-btn btn-link">@lang('Save')</button>
                    </form>
                </div>
            </div>							
        </div>
    </div>
</div>