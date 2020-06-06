@extends('admin.layout.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{__('Products')}}</h1>
    <!-- <a href="template_admin/#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm align-self-center">
        <i class="fa fa-plus-square" aria-hidden="true"></i> {{__('Create')}}
    </a>
</div>

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>{{__('ID')}}</th>
                <th>{{__('Name')}}</th>
                <th>{{__('Image')}}</th>
                <th>{{__('Category')}}</th>
                <th>{{__('Price')}}</th>
                <th>{{__('Description')}}</th>
                <th>{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td><img style="width: 200px" src="/storage/img/{{$product->image}}"></td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{route('admin.products.edit', ['product' => $product->slug])}}"><i class="fa fa-edit"></i></a>
                        <form action="{{route('admin.products.destroy', ['product' => $product->slug])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="fa fa-trash">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection