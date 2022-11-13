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
          <img src="{{ asset('backend/src/images/admin_login_page.png') }}" alt="" />
        </div>
        <div class="col-md-6 col-lg-5">
          <div class="login-box bg-white box-shadow border-radius-10">
            <div class="login-title">
              <h2 class="text-center text-primary">Reset Your Password</h2>
            </div>
            <form action="{{ route('password.reset.update') }}" method="post">
              @csrf
              @method('PATCH')
              <input type="hidden" value="{{ $user_type }}" name="user_type">
              <input type="hidden" value="{{ decrypt($user_email) }}" name="user_email">
              <div class="input-group custom">
                <div class="input-group-prepend custom">
                  <span class="input-group-text"><i class="icon-copy dw dw-padlock1"></i></span>
                </div>
                <input type="password" class="form-control form-control-lg" placeholder="**********" name="password" data-validation="required" />
              </div>
              <div class="input-group custom">
                <div class="input-group-prepend custom">
                  <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                </div>
                <input type="password" class="form-control form-control-lg" placeholder="**********" name="password_confirm" data-validation="length" data-validation-length="min6"
                  onkeyup="checkPassword(event)" /> <br>
              </div>
              <small id="password_message" class="text-danger mb-3">Password did not match</small>
              <div class="row">
                <div class="col-sm-12">
                  <div class="input-group mb-0">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Reset Password</button>
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
  <script>
    function checkPassword(event) {
      let password = $("input[name='password']").val();
      let current_password = event.target.value;
      console.log(current_password);
      if (password === current_password) {
        $("#password_message").removeClass('text-danger');
        $("#password_message").addClass('text-success');
        $("#password_message").text('Password Matched!');
      } else {
        $("#password_message").removeClass('text-success');
        $("#password_message").addClass('text-danger');
        $("#password_message").text('Password did not match!');
      }
    }
  </script>
</body>

</html>
