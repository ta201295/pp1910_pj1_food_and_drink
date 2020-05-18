@extends('admin.layout.app')

@section('content')
<form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{route('admin.categories.update', ['category_id' => $category->id])}}">
        
        @csrf
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12" for="exampleInputEmail1">Name</label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control m-input" id="example">
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions">
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                        <button type="reset" class="btn btn-secondary mt-2">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection