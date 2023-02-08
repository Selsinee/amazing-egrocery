@section('title', 'Amazing E-Grocery')
@extends('template.template')
@section('content')
<div class="d-flex flex-fill p-3 overflow-hidden container flex-column">
    <h1 class="form-title">{{__("message.Login")}}</h1>

    @if ($errors->any())
        <p class="btn btn-danger">{{ $errors->first() }}</p>
    @endif

    <form action="{{ url('loginuser') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="d-flex mt-2 flex-column">
            <div class="mb-3 row">
                <label for="email" class="col-sm-3 col-form-label no-wrap">Email</label>
                <div class="col-sm-9">
                <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-3 col-form-label no-wrap">{{__("message.Password")}}</label>
                <div class="col-sm-9">
                <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>

        </div>

        <div class="d-flex flex-column justify-content-center mt-3">
            <button type="submit" class="btn btn-primary w-10">{{ __("message.Submit")}}</button>
            <a href="/register" class="text-center mt-1">{{ __("message.Go Register")}}</a>
        </div>


    </form>

</div>
@endsection


