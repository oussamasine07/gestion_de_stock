<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Register | Able Pro Dashboard Template</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Able Pro is trending dashboard template made using Bootstrap 5 design framework. Able Pro is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies.">
  <meta name="keywords" content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard">
  <meta name="author" content="Phoenixcoded">

  <!-- [Favicon] icon -->
  <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon">
 <!-- [Font] Family -->
<link rel="stylesheet" href="{{ asset('fonts/inter/inter.css') }}" id="main-font-link" />

<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="{{asset('fonts/tabler-icons.min.css')}}" />
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="{{asset('fonts/feather.css')}}" />
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="{{asset('fonts/fontawesome.css')}}" />
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="{{asset('fonts/material.css')}}" />
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="{{asset('css/style.css')}}" id="main-style-link" />
<link rel="stylesheet" href="{{asset('css/style-preset.css')}}" />

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>

  <nav class="navbar navbar-expand-md navbar-light default">
    <div class="container">
      <a class="navbar-brand" href="../index.html">
        <img src="{{ asset('images/logo-dark.svg') }}" alt="logo" />
      </a>
      <button
        class="navbar-toggler rounded"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-start">
          <li class="nav-item px-1 me-2 mb-2 mb-md-0">
            <a
              class="btn btn-icon btn-light-dark"
              href="/store/cart"
            >
              <i class="ti ti-shopping-cart"></i
            ></a>
          </li>
          <li class="nav-item px-1">
            <a class="nav-link" href="#">login</a>
          </li>
          <li class="nav-item">
            <a
              class="btn btn btn-success"
              target="_blank"
              href="#"
              >signup <i class="ti ti-external-link"></i
            ></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- [ Nav ] start -->

    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
        <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    @yield('home_section')

  

  <!-- [ Main Content ] end -->
  <!-- Required Js -->
  <script src="{{ asset('js/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('js/plugins/simplebar.min.js') }}"></script>
  <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/fonts/custom-font.js') }}"></script>
  <script src="{{ asset('js/config.js') }}"></script>
  <script src="{{ asset('js/pcoded.js') }}"></script>
  <script src="{{ asset('js/plugins/feather.min.js') }}"></script>
</body>
<!-- [Body] end -->

</html>