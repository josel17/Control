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
                            <div class="d-flex justify-content-center">
                                <div class="col-lg-5 col-md-6 col-sm-4 col-4 d-flex justify-content-center " >
                                    <input type="submit" class="btn btn-dark" name="login" value="{{ __('Log in') }}" >
                                </div>
                                <div class="col-lg-7 col-md-6 col-sm-8 col-8">

                                    <div class="checkbox">
                                        <label class="">
                                            <div class="icheckbox_flat-green" style="position: relative;">
                                                <input type="checkbox" class="flat icheckbox_flat-green" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="position: absolute; ">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> {{ __(' Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <section class="login_content">
                    <div class="justify-content-center text-center" >
                        <h1><i class="fa fa-paw"></i> ControlApp!</h1>
                          <p>©2021 All Rights Reserved. <strong>Jose Escobar</strong></p>
                        </div>
                </section>
            </div>
        </div>
      </div>
@endsection

@push('styles')
    <link href="../vendor/iCheck/skins/flat/green.css" rel="stylesheet">
    <style type="text/css">

    </style>
@endpush

@push('scripts')

    <script src="../vendor/iCheck/icheck.min.js"></script>
@endpush