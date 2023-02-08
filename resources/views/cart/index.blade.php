@section('title', 'Cart')
@extends('template.template')
@section('content')
<div class="d-flex flex-fill p-3 overflow-hidden container flex-column">

    <h1 class="form-title">{{__("message.Cart")}}</h1>
    <div class="d-flex flex-column">
        @foreach ($cart as $item)
           <div class="row mb-2 mt-2">
                <div class="col-sm-3 align-items-center d-flex">
                    <img src="{{ asset('assets/'.$item->item_image) }}" alt="" style="width: 250px">
                </div>
                <div class="col-sm-3 align-items-center d-flex">
                    <p>{{ $item->item_name }}</p>
                </div>
                <div class="col-sm-3 align-items-center d-flex">
                    <p>{{ "Rp. ". number_format($item->price, 0, ',', '.').",-"; }}</p>
                </div>
                <div class="col-sm-3 align-items-center d-flex">
                    <form action="/deleteitem" method="POST">
                        @csrf
                        <input type="text" name="orderId" value={{ $item->order_id}} hidden>
                        <button href="" class="btn btn-warning">{{__("message.Delete")}}</button>
                    </form>

                </div>
            </div>
        @endforeach
        @if ($cart->count() > 0)
            <div class="d-flex justify-content-end flex-row me-5">
                <h4>TOTAL: {{ "Rp. ". number_format($total, 0, ',', '.').",-"; }}</h4>
                <a href="{{ url('/checkout')}}" class="btn btn-primary ms-5">Checkout</a>
            </div>
        @else
            <h4>{{__("message.NoItem")}}</h4>
        @endif

    </div>



</div>
@endsection


