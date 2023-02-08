@section('title', 'Profile')
@extends('template.template')
@section('content')
<div class="d-flex flex-fill p-3 overflow-hidden container flex-column">

    <form action="" enctype="multipart/form-data" method="POST" >
        @csrf
        <div class="d-flex flex-row mt-2">
            <div class="d-flex flex-fill">
                <img src="{{ asset('assets/'.$user->display_picture_link) }}" alt="" style="width: 300px;">
            </div>
            <div class="d-flex flex-fill flex-column me-3">

                <div class="mb-3 row">
                    <label for="firstName" class="col-sm-3 col-form-label no-wrap">{{ __("message.First Name")}}</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $user->first_name }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-3 col-form-label no-wrap">Email</label>
                    <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="mb-3 row align-items-center">
                    <label for="" class="col-sm-3 col-form-label no-wrap">{{ __("message.Gender")}}</label>
                    <div class="col-sm-4 form-check">
                        <label class="form-check-label" for="male">
                            {{__("message.Male")}}
                        </label>
                        <input class="form-check-input" type="radio"
                        value="2" name="gender" id="male" {{ $user->gender_id == 2 ? 'checked' : ''}}>
                    </div>
                    <div class="col-sm-4 form-check">
                        <label class="form-check-label" for="female">
                            {{__("message.Female")}}
                        </label>
                        <input class="form-check-input" value="1" type="radio" name="gender" id="female" {{ $user->gender_id == 1 ? 'checked' : ''}}>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="password" class="col-sm-3 col-form-label no-wrap">{{__("message.Password")}}</label>
                    <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>

            </div>
            <div class="d-flex flex-fill flex-column">
                <div class="mb-3 row">
                    <label for="lastName" class="col-sm-3 col-form-label no-wrap">{{__("message.Last Name")}}</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="lastName" name="lastName" value={{ $user->last_name }}>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="role" class="col-sm-3 col-form-label no-wrap">{{__("message.Role")}}</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="role" value={{ $user->role_name }} disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="displayPicture" class="col-sm-3 col-form-label no-wrap">{{__("message.Display Picture")}}</label>
                    <div class="col-sm-9">
                    <input class="form-control" type="file" id="displayPicture" name="displayPicture" value={{ $user->display_picture_link }}>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="confirmPassword" class="col-sm-3 col-form-label no-wrap">{{__("message.Confirm Password")}}</label>
                    <div class="col-sm-9">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column justify-content-center mt-3">
            <button type="submit" class="btn btn-primary">{{__("message.Save")}}</button>
        </div>


    </form>

</div>
@endsection


