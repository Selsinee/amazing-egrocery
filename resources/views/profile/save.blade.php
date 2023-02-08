@section('title', 'Amazing E-Grocery')
@extends('template.template')
@section('content')
<div class="d-flex flex-fill p-3 overflow-hidden container justify-content-center">
    <div class="d-flex ratio ratio-1x1 border-5 border border-primary rounded-circle" style="width: 550px">
        <div class="d-flex flex-column align-items-center justify-content-center p-3 text-center">
            <h2>{{__("message.Saved")}}</h2>
            <a href="{{url('/home')}}">{{__("message.Go Home")}}</a>
        </div>
    </div>

</div>
@endsection


