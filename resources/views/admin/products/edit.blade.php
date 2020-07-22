@extends('admin.layout.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{__('Edit')}}</h1>
</div>

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{route('admin.products.update', ['product' => $product->slug])}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{__('Name')}}<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="name" value="{{ $product->name }}" class="form-control col-md-7 col-xs-12">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">{{__('Price')}} <span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="price" value="{{ $product->price }}" class="form-control col-md-7 col-xs-12">
        </div>
    </div>
    <div class="form-group">
        <label for="select_categories" class="control-label col-md-3 col-sm-3 col-xs-12">{{__('Category')}}</label>
        <select class="form-control col-md-7 col-xs-12" id="select_categories" name="category_id">
            @foreach ($categories as $category)
            <option  value="{{$category->id}}" @if ($category->id == old('category_id')) selected @endif>{{$category->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('category_id'))
        <span class="help-block text-danger"><strong>{{ $errors->first('category_id') }}</strong></span>
        @endif
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('Image')</label>
        <div class="input-group col-lg-6 col-md-9 col-sm-12">
            <input class="image_file" type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="image" id="image_file">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">{{__('Description')}}</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea name="description" class="form-control col-md-7 col-xs-12">{{ $product->description }}</textarea>
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button class="btn btn-primary" type="button">{{__('Cancel')}}</button>
            <button class="btn btn-primary" type="reset">{{__('Reset')}}</button>
            <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
        </div>
    </div>
</form>
@endsection