<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{config('app.name')}}</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link href="../fontawesome-free/css/all.css" rel="stylesheet">

  <script src="https://kit.fontawesome.com/367ecf7a9a.js" crossorigin="anonymous"></script>


  <link rel="stylesheet" type="text/css" href="../fonts/vendor/font-awesome/all.css">

  <!-- Custom styles for this template -->
  <link href="css/coming-soon.min.css" rel="stylesheet">

</head>

<body>

  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="mp4/bg.mp4" type="video/mp4">
  </video>

  <div class="masthead">
    <div class="masthead-bg" ></div>
    <div class="container h-100" >
      <div class="row h-100">
        <div class="col-12 my-auto">
          <div class="masthead-content text-white py-5 py-md-0">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                      <div class="col-lg-8 col-md-8 col-sm-8">
                          <li class="fa fa-user col-lg-3 col-md-3 col-sm-3"></li>
                          <label for="username" class="col-md-8 col-form-label text-md-right" placeholder="{{ __('Username') }}">{{ __('Username') }}</label>
                      </div>
                      <div class="col-md-8">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-lg-8 col-md-8 col-sm-8">
                          <li class="fa fa-key col-lg-3 col-md-3 col-sm-3"></li>
                          <label for="password" class="col-md-8 col-form-label text-md-right" placeholder="{{ __('Password') }}">{{ __('Password') }}</label>
                      </div>
                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row col-lg-12 col-md-12 col-sm-12">
                        <div class="form-check col-lg-4 col-md-4 col-sm-12">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-12">
                          <div>
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Login') }}
                              </button>
                          </div>
                      </div>
                    </div>
                  <div class="row col-lg-12 col-md-12 col-sm-12">
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

  <div class="social-icons">
    <ul class="list-unstyled text-center mb-0">
      <li class="list-unstyled-item">
        <a href="#">
          <i class="fa fa-facebook-f"></i>
        </a>
      </li>
      <li class="list-unstyled-item">
        <a href="#">
          <i class="fab fa-facebook-f"></i>
        </a>
      </li>
      <li class="list-unstyled-item">
        <a href="#">
          <i class="fa fa-instagram"></i>
        </a>
      </li>
    </ul>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/dist/jquery.min.js"></script>
  <script src="../vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/coming-soon.min.js"></script>

</body>

</html>
