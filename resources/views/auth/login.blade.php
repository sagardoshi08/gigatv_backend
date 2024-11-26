@extends('layouts.app')
@section('content')
<div class="logo">
    <img
    src="{{ asset('image/gigalogo.png') }}"
    srcset="">
</div>

<div class="row justify-content-center ">
    <div class="col-md-6">
        <h1 class="heding">Login to G.I.A.G. Show Feed</h1>


        <div class="card mx-4 login-details">
            <div class="card-body p-4">
                <h1>{{ trans('panel.site_title') }}</h1>
                @if(session('message'))
                    <div class="alert alert-info" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <!-- <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span> -->
                        </div>

                        <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                       

                        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <div class="input-group-prepend">
                        <span class="eye-icon">  <i class="fa-solid fa-eye"></i></span>
                        </div>
                    </div>

                   

                    <div class="row">
                        <div class="login-btn">
                            <button type="submit" class="btn px-4">
                                {{ trans('global.login') }}
                            </button>
                        </div>
                      
                    </div>
                </form>
            </div>
        </div>
        <!-- <div class="forgot">
        @if(Route::has('password.request'))
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                    {{ trans('global.forgot_password') }}
                                </a><br>
                            @endif
                            @if(Route::has('password.request'))
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                    {{ trans('global.forgot_password') }}
                                </a><br>
                            @endif

                        </div> -->
    </div>
</div>
@endsection
