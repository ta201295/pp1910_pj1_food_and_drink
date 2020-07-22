@extends('admin.layout.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{__('Order')}}</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>@lang('Order ID')</th>
                <th>@lang('Customer Name')</th>
                <th>@lang('Customer Phone')</th>
                <th>@lang('Delivery Address')</th>
                <th>@lang('Payment Method')</th>
                <th>@lang('Total Price')</th>
                <th>@lang('Created At')</th>
                <th>@lang('Action')</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_phone }}</td>
                    <td>{{ $order->delivery_address }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ number_format($order->total_price) }} VNĐ</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" ><i class="fa fa-trash" ></i>
                            <form action="{{route('admin.orders.delete', ['order' => $order->id])}}" method="delete">
                                @csrf
                            </form>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
