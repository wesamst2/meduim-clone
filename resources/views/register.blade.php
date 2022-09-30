@extends('layout')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card bg-light shadow border-0 rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="text-danger m-0 text-center">{{ $error }}</p>
                            @endforeach
                        @endif
                        <form class="mt-2" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="Name" class="form-control" id="nameInput" name="name" :value="old('name')" required autofocus>
                                <label for="nameInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" placeholder="Email" class="form-control" id="emailInput" name="email" :value="old('email')" required autofocus>
                                <label for="emailInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="passwordInput"
                                       name="password" placeholder="Password"
                                       required autocomplete="current-password" >
                                <label for="passwordInput">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control"  id="confirmPasswordInput"
                                       name="password_confirmation" placeholder="Confirm Password"
                                       required autocomplete="current-password" >
                                <label for="confirmPasswordInput">Confirm Password</label>
                            </div>

                            <div class="d-grid">
                                <a class="text-muted mb-2" href="{{ route('login') }}">
                                    <small>{{ __('Already have an account?') }}</small>
                                </a>
                                <button class="btn btn-dark text-uppercase fw-bold" type="submit">{{ __('Register') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
