@extends('admin.layout.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{__('Category')}}</h1>
    <!-- <a href="template_admin/#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm align-self-center">
        <i class="fa fa-plus-square" aria-hidden="true"></i> {{__('Create')}}
    </a>
</div>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>{{__('ID')}}</th>
                <th>{{__('Name')}}</th>
                <th>{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{route('admin.categories.edit', ['category' => $category->id])}}"><i class="fa fa-edit"></i></a>
                        <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="post">
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