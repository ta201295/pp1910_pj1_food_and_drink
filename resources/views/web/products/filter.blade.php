<div class="col-lg-3 col-md-4">
    <div class="filters partner-bottom">
        <div class="filter-heading">
            <h3>@lang('Categories')</h3>
        </div>
        <div class="nav nav-pills nav-stacked nav-tabs ui vertical menu fluid">
            @foreach ($categories as $category)
                <a href="{{route('productcategory', $category->id)}}" class="item user-tab cursor-pointer">{{$category->name}}</a>
            @endforeach
        </div>
    </div>
</div>
