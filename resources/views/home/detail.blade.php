@section('title', 'Amazing E-Grocery')
@extends('template.template')
@section('content')
<div class="d-flex flex-fill p-3 overflow-hidden container justify-content-start flex-wrap flex-column">
    <h2>{{ $item->item_name }}</h2>
    <div class="d-flex flex-row mt-4">
        <img src="{{ asset('assets/'.$item->item_image) }}" alt="" srcset="" style="width: 20%; height: 200px">
        <div class="ms-5">
            <h5>{{ __("message.Price")}}: {{ "Rp. ". number_format($item->price, 0, ',', '.').",-"; }}</h5>
            <p>
                {{ $item->item_desc}}
            </p>
        </div>
    </div>
    <form action="/buy" method="POST">
        @csrf
        <input type="text" value='{{ $item->item_id }}' name="itemId" hidden>
        <button class="btn btn-primary w-10 mt-4"> {{__("message.Buy")}}</button>
    </form>

</div>
@endsection


