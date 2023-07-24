@extends('layouts.guest')

@section('content')
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div class="card ">
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="divider d-flex align-items-center my-4">
                                    <div class="text-center fw-bold mx-3 mb-0 h5">{{ __('Reset Password') }}</div>
                                </div>

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label for="email" class="col-form-label ">{{ __('Email Address') }}</label>

                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="text-center text-lg-start mt-4 pt-2">
                                    <button type="submit" class="btn btn-primary" style="background-color: #060a6f">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
