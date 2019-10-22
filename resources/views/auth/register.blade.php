@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        			<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
         
        <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
            <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                <span class="login100-form-title p-b-59">
                    Daftar Sekarang
                </span>
          
                <div class="wrap-input100 validate-input" data-validate="Nama depan harus diisi!">
                    <span class="label-input100">Nama Depan</span>
                    <input class="input100 @error('nama_depan') is-invalid @enderror" type="text"  name="nama_depan"  placeholder="Nama depan...">
                    <span class="focus-input100"></span>
                    @error('nama_depan')
                    <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                     @enderror           
                 </div>
                <div class="wrap-input100 validate-input" data-validate="Nama belakang harus diisi!">
                    <span class="label-input100">Nama Belakang</span>
                    <input class="input100 @error('nama_belakang') is-invalid @enderror" type="text" name="nama_belakang" placeholder="Nama belakang...">
                    <span class="focus-input100"></span>
                    @error('nama_belakang')
                    <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                     @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Format Email : emailkamu@email.com">
                    <span class="label-input100">Email</span>
                    <input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Alamat email...">
                    <span class="focus-input100"></span>
                    @error('email')
                    <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                     @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Nomor Ponsel harus diisi!">
                    <span class="label-input100">Nomor Ponsel</span>
                    <input class="input100 @error('password') is-invalid @enderror" type="text" name="nomor_ponsel" placeholder="Nomor ponsel...">
                    <span class="focus-input100"></span>
                    @error('nomor_ponsel')
                    <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                     @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password harus diisi ya">
                    <span class="label-input100">Password</span>
                    <input class="input100 @error('password') is-invalid @enderror" type="text" name="password" placeholder="*************">
                    <span class="focus-input100"></span>
                    @error('password')
                    <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                     @enderror
                </div>

                <div class="wrap-input100 validate-input" data-validate="Ulangi password harus diisi ya">
                    <span class="label-input100">Ulangi Password</span>
                    <input class="input100" type="text" name="password_confirmation" placeholder="*************">
                    <span class="focus-input100"></span>
                </div>

         

                <div class="container-login100-form-btn" style="margin-top:-20px">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" type="submit" >
                            Daftar
                        </button>
                    </div>
                </form>

                    <a href="/login" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                        Masuk
                        <i class="fa fa-long-arrow-right m-l-5"></i>
                    </a>
                </div>
        </div>
    </div>
</div>
@endsection
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('nama_depan') is-invalid @enderror" name="nama_depan" value="{{ old('nama_depan') }}" required autocomplete="name" autofocus>

                                @error('nama_depan')
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
@endsection --}}
