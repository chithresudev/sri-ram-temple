@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-end login-top">
            <div class="card custom-card">
              {{-- <img src="{{ asset('images/logo.png') }}" Class="mx-auto d-block pt-4" alt="MDCRC" width="100"> --}}
              <div class="login card-body p-5">
              <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @if (session()->has('error'))
                      <span class="text-danger" role="alert">
                        <strong>{{ session('error') }}</strong>
                      </span>
                    @endif
                      @if ($errors->has('username'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                       @endif

                  <div class="custom-form form-group row">
                    <input id="username" type="text" class="custom-input {{ $errors->has('username') ? ' is-invalid' : '' }}" name="email" value="{{ old('username') }}" required autofocus placeholder="Username">
                    <i class="material-icons">person_outline</i>
                    {{-- <span class="focus-input"></span> --}}
                  </div>


                <div class="custom-form form-group row">
                  <input id="password" type="password" class="custom-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                  {{-- <span class="focus-input"></span> --}}
                <i class="material-icons">lock</i>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                        @endif
                    </div>
                      <div class="form-group row mb-0">
                        <button type="submit" class="border-radius btn-orange btn orange w-100">
                            {{ __('Login to temple') }}
                        </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

@push('styles')
  <style>
    body {
        background-image: url({{ asset('images/kovil.png') }})!important;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        }

        .login-top{
          padding-top: 115px!important;
        }
        .card {
          background: #00000094;
        }

        span{
          font-size: 12px;
        }

        main {
          padding: 0px;
        }
  </style>
@endpush
