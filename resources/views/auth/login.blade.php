@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>

        <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title p-b-59">
                    Masuk
                </span>

                <div class="wrap-input100 validate-input" data-validate="Masukan Nomor Ponsel atau Email">
                    <span class="label-input100">Nomor Ponsel atau Email</span>
                    <input class="input100 @error('identity') is-invalid @enderror" type="text" name="identity"
                        placeholder="Nomor Ponsel atau Email">
                    <span class="focus-input100"></span>
                    @if ($errors->has('nomor_ponsel') || $errors->has('email'))
                    <span class="form-text text-danger">
                        <small>{{ $errors->first('nomor_ponsel') ?: $errors->first('email') }}</small>
                    </span>
                @endif
                </div>

                <div class="wrap-input100 validate-input" data-validate="Masukan Password">
                    <span class="label-input100">Password</span>
                    <input class="input100 @error('password') is-invalid @enderror" type="password" name="password"
                        placeholder="*************">
                    <span class="focus-input100"></span>
                    @error('password')
                    <div class="text-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="container-login100-form-btn" style="margin-top:-20px">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" type="submit">
                            Masuk
                        </button>
                    </div>
            </form>

            <a href="/register" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                Daftar
                <i class="fa fa-long-arrow-right m-l-5"></i>
            </a>
            <a href="{{ route('password.request') }}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                Lupa Password
            </a>
        </div>
    </div>
</div>
</div>
{{-- {{url()->full()}}
{{ Request::get('message') }} --}}

@endsection
@section('js')

    <script>
    $(document).ready(function () {
        console.log("ready")
        params = "{{ Request::get('message') }}";
        if(params == 1){
            alert('Anda Berhasil Daftar, Silakan Login')
        }

    }); 
    
    </script>
@endsection

