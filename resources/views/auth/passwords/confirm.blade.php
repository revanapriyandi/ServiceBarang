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
                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf
                                <div class="divider d-flex align-items-center my-4">
                                    <div class="text-center fw-bold mx-3 mb-0 h5">{{ __('Confirm Password') }}</div>
                                </div>

                                <p class="mb-4">{{ __('Please confirm your password before continuing.') }}</p>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label for="password" class="col-form-label">{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="text-center text-lg-start mt-4 pt-2">
                                    <button type="submit" class="btn btn-primary" style="background-color: #060a6f">
                                        {{ __('Confirm Password') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
