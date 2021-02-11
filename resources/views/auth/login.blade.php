@extends('layouts.app')

@section('content')
    <div class="login container d-flex justify-content-center">
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrappe col-lg-12 d-flex justify-content-center" >
            <div class="animate form login_form col-lg-4 col-md-9 col-sm-12 col-12">
                <section class="login_content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1 class="d-flex justify-content-center">Inicio de sesion</h1>
                        @foreach ($errors->all() as $error)
                             <div class="is-invalid">{{$error}}</div>
                        @endforeach
                        <div class="p-2">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="{{ __('Username') }}"  />
                        </div>
                        <div class="p-2">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" placeholder="{{ __('Password') }}">
                        </div>
                        <div class="p-4">
                            <div class="clearfix"></div>
                            <div class="d-flex justify-content-center" >
                                <div class="col-lg-5 col-md-6 col-sm-4 col-4 d-flex justify-content-center" >
                                    <input type="submit" class="btn btn-dark btn-sm" name="login" value="{{ __('Log in') }}" >
                                </div>
                                <div class="col-lg-7 col-md-6 col-sm-8 col-8">
                                    <input class="icheckbox_flat-green checked " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{ __(' Remember Me') }}
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <div class="animate form login_form d-flex justify-content-center">
                    <!--<p class="change_link">New to site?-->
                   <!-- <a href="#signup" class="to_register"> Create Account </a>-->
                    </p>
                    <div class="clearfix"></div>
                    <br>
                    <div>
                    <h1><i class="fa fa-circle-square"></i> ControlApp!</h1>
                    <p>©2020 Todos los derechos reservados. <br><strong>Jose Escobar</strong></p>
                </div>
            </div>
            </div>


        </div>
      </div>
    </div>
@endsection