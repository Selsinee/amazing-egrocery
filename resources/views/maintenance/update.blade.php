@section('title', 'Amazing E-Grocery')
@extends('template.template')
@section('content')
<div class="d-flex flex-fill p-3 overflow-hidden container flex-column">
    <h3>{{ $user->first_name.' '.$user->last_name}}</h3>
    <form action="{{ url('/updaterole')}}" enctype="multipart/form-data" method="POST" >
        @csrf
        <label for="role" class="col-sm-3 col-form-label no-wrap">{{ __("message.Role")}}</label>
        <div class="col-sm-9">
            <select class="form-select" id="role" name="role">
                @foreach ($roles as $role)
                    <option value="{{ $role->role_id }}" {{ $role->role_id == $user->role_id ? 'selected' : ''}}>{{ $role->role_name}}</option>
                @endforeach
            </select>
        </div>
        <input type="text" value='{{ $user->id }}' hidden name="userId">
        <button class="btn btn-primary mt-5">{{ __("message.Save")}}</button>
    </form>

</div>
@endsection


