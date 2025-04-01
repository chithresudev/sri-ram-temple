@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <div class="row justify-content-end login-top ">
            <div class="card custom-card" style="width: 400px">
                {{-- <img src="{{ asset('images/logo.png') }}" Class="mx-auto d-block pt-4" alt="MDCRC" width="100"> --}}
                <div class="login card-body p-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if (session()->has('error'))
                            <span class="text-danger" role="alert">
                                <strong>{{ session('error') }}</strong>
                            </span>
                        @endif
                        <div class="custom-form form-group row">

                            <input id="email" type="text"
                                class="custom-input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                value="{{ old('email') }}" required placeholder="Username" autofocus>

                            <i class="material-icons">person_outline</i>
                            @if ($errors->has('email'))
                                <span class="d-block invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="custom-form form-group row">
                            <input id="password" type="password"
                                class="custom-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                required placeholder="Password">
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
                                {{ __('Go Temple') }}
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
            background-image: url({{ asset('images/kovil.jpg') }}) !important;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .login-top {
            padding-top: 115px !important;
        }

        .card {
            background: #00000094;
        }

        span {
            font-size: 12px;
        }

        main {
            padding: 0px;
        }
    </style>
@endpush
