@section('title', 'Amazing E-Grocery')
@extends('template.template')
@section('content')
<div class="d-flex flex-fill p-3 overflow-hidden container justify-content-center">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">{{ __("message.Account")}}</th>
                <th scope="col">{{ __("message.Action")}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->first_name.' '.$user->last_name.' - '.$user->role_name}}</td>
                    <td>
                        <div class="d-flex flex-row">
                            <a href="/update/{{$user->id}}" class="btn btn-secondary">{{ __("message.Update Role")}}</a>
                            <a href="/delete/{{$user->id}}" class="btn btn-danger ms-4">{{ __("message.Delete")}}</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection


