<div class="col-lg-8 col-md-9 col-12">
    <div class="tab-content">
        <div class="tab-pane active" id="order-history">
            <div class="timeline">
                <div class="tab-content-heading">
                    <h4>@lang('My Order')</h4>
                </div>
                <div class="my-orders">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="my-checkout">
                                <div class="table-responsive">
                                    <table class="table  table-bordered">
                                        <thead>
                                            <tr>
                                                <td class="td-heading">@lang('Product')</td>
                                                <td class="td-heading">@lang('Quantity')</td>
                                                <td class="td-heading">@lang('Payment Method')</td>
                                                <td class="td-heading">@lang('Total Price')</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr>
                                                <td class="td-content">
                                                    @foreach ($order->orders as $detail)
                                                    <div class="name-dt">
                                                        <i><p>{{$detail->product->name}}</p></i>
                                                    </div>
                                                    @endforeach
                                                </td>
                                                <td class="td-content">
                                                    @foreach ($order->orders as $detail)
                                                    <div class="name-dt">
                                                        <i><p>{{$detail->quantity}}</p></i>
                                                    </div>
                                                    @endforeach
                                                </td>
                                                <td class="td-content">{{ $order->payment_method }}</td>
                                                <td class="td-content">{{ number_format($order->total_price) }} VNĐ</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
