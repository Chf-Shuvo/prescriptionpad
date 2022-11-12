<!DOCTYPE html>
<html>

<head>
  <!-- Basic Page Info -->
  <meta charset="utf-8" />
  <title>{{ env('APP_NAME') }}</title>
  <!-- Site favicon -->
  <link rel="icon" type="image/png" href="{{ asset('backend/src/images/main_logo.png') }}" />
  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  @include('template.css')
</head>

<body>
  @include('template.navbar')

  @include('template.rightbar')

  @yield('sidebar')

  <div class="mobile-menu-overlay"></div>

  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      @yield('content')
    </div>
  </div>

  <!-- welcome modal end -->
  @include('template.js')
</body>

</html>
