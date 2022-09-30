@extends('layout')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card bg-light shadow border-0 rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>

                        @if ($errors->has('email'))
                            <p class="text-danger mb-2 text-center">{{ $errors->first('email') }}</p>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="email" placeholder="Email" class="form-control" id="floatingInput" name="email" :value="old('email')" required autofocus>
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control"
                                       name="password" placeholder="Password"
                                       required autocomplete="current-password" >
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck"  name="remember">
                                <label class="form-check-label" for="rememberPasswordCheck">
                                    Remember me
                                </label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-dark text-uppercase fw-bold" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
