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

      </div>
    </div>
  </div>
  <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 col-lg-7">
          <img src="{{ asset('backend/src/images/patient_register_page.png') }}" alt="" />
        </div>
        <div class="col-md-6 col-lg-5">
          <div class="login-box bg-white box-shadow border-radius-10">
            <div class="login-title">
              <h2 class="text-center text-primary">Register for {{ env('APP_NAME') }}</h2>
            </div>
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="input-group custom">
                <div class="input-group-prepend custom">
                  <span class="input-group-text"><i class="icon-copy dw dw-user"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" placeholder="First Name" name="first_name" data-validation="required" />
              </div>
              <div class="input-group custom">
                <div class="input-group-prepend custom">
                  <span class="input-group-text"><i class="icon-copy dw dw-smartphone1"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" placeholder="Phone Number" name="phone" data-validation="number" />
              </div>
              <div class="input-group custom">
                <div class="input-group-prepend custom">
                  <span class="input-group-text"><i class="icon-copy dw dw-user"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" placeholder="Last Name" name="last_name" data-validation="required" />
              </div>
              <div class="input-group custom">
                <div class="input-group-prepend custom">
                  <span class="input-group-text"><i class="icon-copy dw dw-email1"></i></span>
                </div>
                <input type="text" class="form-control form-control-lg" placeholder="patient@example.com" name="email" data-validation="required" />
              </div>
              <div class="input-group custom">
                <div class="input-group-prepend custom">
                  <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                </div>
                <input type="password" class="form-control form-control-lg" placeholder="**********" name="password" data-validation="length" data-validation-length="min6" />
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="input-group mb-0">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('template.js')
</body>

</html>
