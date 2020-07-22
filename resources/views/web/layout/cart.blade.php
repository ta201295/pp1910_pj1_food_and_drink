@if(Session::has("cart") != null)
    <div class="select-items">
        <table>
            <tbody>
                @foreach(Session::get('cart')->items as $products)
                    <tr>
                        <td class="si-pic"><img style="width: 50px" src={{url('image/' . $products['item']->image) }} alt=""></td>
                        <td class="si-text">
                            <div class="product-selected">
                                <p>{{ number_format($products['item']->price) }} VNĐ x {{ $products['qty'] }}</p>
                                <h6>{{ $products['item']->name }}</h6>
                            </div>
                        </td>
                        <td class="si-close">
                            <button class="remove-btn" data-id="{{ $products['item']->id }}">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="select-total">
        <span>total:</span>
        <h5>{{ number_format(Session::get('cart')->totalPrice) }} VNĐ</h5>
        <input hidden type="number" id="total-quanty-cart" value="{{ Session::get('cart')->totalQty }}">
    </div>
@endif
<script>
    $("#change-item-cart .si-close button").on("click", function () {
        $.ajax({
            url: 'del-cart/'+$(this).data("id"),
            type: 'GET',
        }).done(function(response) {
            RenderCart(response);
        });
    });
    function RenderCart(response){
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        $("#total-quanty-show").text($("#total-quanty-cart").val());
    }
</script>
