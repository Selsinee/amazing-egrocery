@section('title', 'Amazing E-Grocery')
@extends('template.template')
@section('content')
<div class="d-flex flex-fill p-3 overflow-hidden container justify-content-start flex-column">
    <div class="d-flex flex-wrap flex-row">
        @foreach ($items as $i)
            <div class="col-2 mx-3">
                <div class="card my-2" style="width: 12rem; height: 13rem">
                    <img src="{{ asset('assets/'.$i->item_image) }}"
                        style="width: 100%; height: 100px" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h4 class="my-2">{{ $i->item_name }}</h4>
                        <a href="{{ url("detail/".$i->item_id)}}">{{ __("message.Detail")}}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $items->links() }}
    </div>

</div>
@endsection


