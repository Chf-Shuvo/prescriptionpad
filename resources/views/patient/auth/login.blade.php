<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="{{ asset('backend/src/images/main_logo.png') }}" />
  <title>{{ env('APP_NAME') }}</title>
</head>

<body>
  @include('template.css')
  <div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <div class="brand-logo">
        <a href="{{ route('base') }}">
          <img src="{{ asset('backend/src/images/main_logo.png') }}" alt="" />
        </a>
      </div>
      <div class="login-menu">
        <a href="{{ route('doctor.login') }}"> Login as Doctor</a> || <a href="{{ route('pharmacy.login') }}"> Pharmacy</a> || <a href="{{ route('admin.login') }}"> Admin</a>
      </div>
    </div>
  </div>
  <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 col-lg-7">
          @if ($errors->has('email'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
          <img src="{{ asset('backend/src/images/patient_login_page.png') }}" alt="" />
        </div>
        <div class="col-md-6 col-lg-5">
          <div class="login-box bg-white box-shadow border-radius-10">
            <div class="login-title">
              <h2 class="text-center text-primary">Login To {{ env('APP_NAME') }}</h2>
            </div>
            <form action="{{ route('login') }}" method="post">
              @csrf
              <div class="input-group custom">
                <div class="input-group-prepend custom">
                  <span class="input-group-text"><i class="icon-copy dw dw-email1"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" placeholder="email" name="email" data-validation="required" />

              </div>
              <div class="input-group custom">
                <div class="input-group-prepend custom">
                  <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                </div>
                <input type="password" class="form-control form-control-lg" placeholder="**********" name="password" data-validation="length" data-validation-length="min6" />

              </div>
              <div class="row pb-30">
                <div class="col-12">
                  <div class="forgot-password">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modelId">Forgot Password</a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="input-group mb-0">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                  </div>
                  <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
                    OR
                  </div>
                  <div class="input-group mb-0">
                    <a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('register') }}">Register To Create Account</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Modal Content --}}
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <form action="{{ route('send.password.reset.link', 'patient') }}" method="post">
            @csrf
            <div class="form-row">
              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <label for="">Email:</label>
                <input type="email" name="email" class="form-control" data-validation="required">
              </div>
              <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <button type="submit" class="btn btn-success btn-sm float-right">send password reset link</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @include('template.js')
</body>

</html>
