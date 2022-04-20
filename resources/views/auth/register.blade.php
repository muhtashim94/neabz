@extends('layouts.app')


@section('custom-css')
<style>
  /* main.py-4 {
    background-image: url(assets/images/eventImages/12.jpg);
    background-size: cover;
    background-repeat: no-repeat;
} */


img.ok12 {
    width: 100%;
}

#login09 .col-md-6.p-0 {
    position: absolute;
    background-color: #000000b0;
}

#login09 .pb-4, .py-4 {
    padding-bottom: 0px!important;
    padding-top: 0px!important;
}

#login09 .text-center {
    font-size: 56px;
    color: white;
}

#login09 label.col-md-4.col-form-label.text-md-right {
    color: white;
}

#login09 .col-md-6.p-0 {
    position: absolute;
    background-color: #000000b0;
    top: 30%;
    padding-top: 125px!important;
    padding-bottom: 125px!important;
}

#login09 .btn-primary {
    color: #fff;
    background-color: #d1410c;
    border-color: #d1410c;
}
#login09 input#email {
    border-radius: unset;
}
#login09 input#password {
    border-radius: unset;
}

#login09 .form-check-label {
    margin-bottom: 0;
    color: #d1410c;
}
</style>
@endsection

@section('content')
<div class="container-fluid" id="login09">
<div class="row justify-content-md-center align-bottom">
    <img class="ok12" src="assets/images/eventImages/125.png"></img>
        <div class="col-md-6 p-0">
            <div>
                <div class="text-center">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
