@extends('admin.layout.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{__('Create Category')}}</h1>
    <!-- <a href="template_admin/#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{route('admin.categories.store')}}">
    @csrf
    <div class="m-portlet__body">
        <div class="form-group m-form__group row">
            <label class="col-form-label col-lg-3 col-sm-12" for="exampleInputEmail1">{{__('Name')}}</label>
            <div class="col-lg-6 col-md-9 col-sm-12">
                <input type="text" name="name" class="form-control m-input" id="exampleInputEmail1">
            </div>
        </div>
    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
            <div class="row">
                <div class="col-lg-9 ml-lg-auto">
                    <button type="submit" class="btn btn-primary mt-2"> {{__('Create')}}</button>
                    <button type="reset" class="btn btn-secondary mt-2">{{__('Cancel')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection