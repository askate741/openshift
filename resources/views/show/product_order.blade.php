@extends('tcrm.show')
@section('showData')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>產品名稱:&nbsp{{$product_order->product->product_name}}</strong></h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
                @if($product_order->quantity<0)
                    <a class="list-group-item"><strong>產品流向:</strong>&nbsp出貨</a>
                @else
                    <a class="list-group-item"><strong>產品流向:</strong>&nbsp進貨</a>
                @endif
                <a class="list-group-item"><strong>購買會員:</strong>&nbsp{{$product_order->member->devotee_name}}</a>
                <a class="list-group-item"><strong>原始價格:</strong>&nbsp{{$product_order->product->original_price}}</a>
                <a class="list-group-item"><strong>訂購數量:</strong>&nbsp{{preg_replace('/([^0-9])/i','',$product_order->quantity)}}</a>
                <a class="list-group-item"><strong>實際售價:</strong>&nbsp{{$product_order->actual_price}}</a>
                <a class="list-group-item"><strong>訂單日期:</strong>&nbsp{{$product_order->order_date}}</a>
            </div>
        </div>
    </div>
@stop