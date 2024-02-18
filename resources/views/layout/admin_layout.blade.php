<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Account Profile 1 | Able Pro Dashboard Template</title>
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
<link rel="stylesheet" href="{{ asset('fonts/tabler-icons.min.css') }}" />
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="{{ asset('fonts/feather.css') }}" />
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="{{ asset('fonts/fontawesome.css') }}" />
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="{{ asset('fonts/material.css"') }}" />
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}" id="main-style-link" />
<link rel="stylesheet" href="{{ asset('css/style-preset.css') }}" />

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
  <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
 <!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="#" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="{{ asset('images/logo-dark.svg') }}" />
        <span class="badge bg-light-success rounded-pill ms-2 theme-version"></span>
      </a>
    </div>
    <div class="navbar-content">
      {{-- profile card starts --}}
      <div class="card pc-user-card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <img src="{{ asset('images/user/avatar-1.jpg') }}" alt="user-image" class="user-avtar wid-45 rounded-circle" />
            </div>
            <div class="flex-grow-1 ms-3 me-2">
              <h6 class="mb-0">SINE Oussama</h6>
              <small>Administrator</small>
            </div>
            <a class="btn btn-icon btn-link-secondary avtar-s" data-bs-toggle="collapse" href="#pc_sidebar_userlink">
              <svg class="pc-icon">
                <use xlink:href="#custom-sort-outline"></use>
              </svg>
            </a>
          </div>
          <div class="collapse pc-user-links" id="pc_sidebar_userlink">
            <div class="pt-3">
              <a href="#!">
                <i class="ti ti-user"></i>
                <span>My Account</span>
              </a>
              <a href="#!">
                <i class="ti ti-settings"></i>
                <span>Settings</span>
              </a>
              <a href="#!">
                <i class="ti ti-lock"></i>
                <span>Lock Screen</span>
              </a>
              <form action="/users/logout" method="POST">
                <i class="ti ti-power"></i>
                @csrf
                <button type="submit">Logout</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{-- profile card ends --}}

      {{-- navigation starts --}}
      <ul class="pc-navbar">
        <li class="pc-item pc-caption">
          <label>Navigation</label>
          <i class="ti ti-dashboard"></i>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-status-up"></use>
              </svg>
            </span>
            <span class="pc-mtext">Dashboard</span>
            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
            <span class="pc-badge">2</span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="#">Default</a></li>
            <li class="pc-item"><a class="pc-link" href="#">Analytics</a></li>
          </ul>
        </li>

        <li class="pc-item pc-caption">
          <label>Application</label>
          <i class="ti ti-layout-kanban"></i>
        </li>

        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-shopping-bag"></use>
              </svg>
            </span>
            <span class="pc-mtext">Fournisseurs</span>
            <span class="pc-arrow">
              <i data-feather="chevron-right"></i>
            </span>
          </a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="/fournisseurs">List Des Fournisseur</a></li>
            <li class="pc-item"><a class="pc-link" href="/fournisseurs/create">Ajouter un Fournisseur</a></li>
          </ul>
        </li>

        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-shopping-bag"></use>
              </svg>
            </span>
            <span class="pc-mtext">Achats</span>
            <span class="pc-arrow">
              <i data-feather="chevron-right"></i>
            </span>
          </a>
          <ul class="pc-submenu">
            {{-- change the links for categories --}}
            <li class="pc-item"><a class="pc-link" href="/achats">Tous les achats</a></li>
            <li class="pc-item"><a class="pc-link" href="/achats/create">Nouvelle facture</a></li>
            <li class="pc-item"><a class="pc-link" href="/livraisons">Livraisons</a></li>
            <li class="pc-item"><a class="pc-link" href="/paiement_achats">Etat de Paiement Achats</a></li>
          </ul>
        </li>
        
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-shopping-bag"></use>
              </svg>
            </span>
            <span class="pc-mtext">Stocks</span>
            <span class="pc-arrow">
              <i data-feather="chevron-right"></i>
            </span>
          </a>
          <ul class="pc-submenu">
            {{-- change the links for categories --}}
            <li class="pc-item"><a class="pc-link" href="/stocks">Tous les stocks</a></li>
            <li class="pc-item"><a class="pc-link" href="/stocks/create">Nouveau stock</a></li>
          </ul>
        </li>
        
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-shopping-bag"></use>
              </svg>
            </span>
            <span class="pc-mtext">Produits</span>
            <span class="pc-arrow">
              <i data-feather="chevron-right"></i>
            </span>
          </a>
          <ul class="pc-submenu">
            {{-- change the links for categories --}}
            <li class="pc-item"><a class="pc-link" href="/produits">Tous les produits</a></li>
            <li class="pc-item"><a class="pc-link" href="/produits/create">Nouveau produit</a></li>
          </ul>
        </li>
        
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-shopping-bag"></use>
              </svg>
            </span>
            <span class="pc-mtext">Categories</span>
            <span class="pc-arrow">
              <i data-feather="chevron-right"></i>
            </span>
          </a>
          <ul class="pc-submenu">
            {{-- change the links for categories --}}
            <li class="pc-item"><a class="pc-link" href="/categories">Tous les categories</a></li>
            <li class="pc-item"><a class="pc-link" href="/categories/create">Nouveau categorie</a></li>
          </ul>
        </li>
        
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-shopping-bag"></use>
              </svg>
            </span>
            <span class="pc-mtext">Clients</span>
            <span class="pc-arrow">
              <i data-feather="chevron-right"></i>
            </span>
          </a>
          <ul class="pc-submenu">
            {{-- change the links for categories --}}
            <li class="pc-item"><a class="pc-link" href="/clients">Tous les Clients</a></li>
            <li class="pc-item"><a class="pc-link" href="/clients/create">Nouveau Client</a></li>
          </ul>
        </li>
        
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-shopping-bag"></use>
              </svg>
            </span>
            <span class="pc-mtext">Commandes</span>
            <span class="pc-arrow">
              <i data-feather="chevron-right"></i>
            </span>
          </a>
          <ul class="pc-submenu">
            {{-- change the links for categories --}}
            <li class="pc-item"><a class="pc-link" href="/commandes">Tous les Commandes</a></li>
            <li class="pc-item"><a class="pc-link" href="/commandes/create">Nouveau Commandes</a></li>
          </ul>
        </li>
        
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-shopping-bag"></use>
              </svg>
            </span>
            <span class="pc-mtext">Ventes</span>
            <span class="pc-arrow">
              <i data-feather="chevron-right"></i>
            </span>
          </a>
          <ul class="pc-submenu">
            {{-- change the links for categories --}}
            <li class="pc-item"><a class="pc-link" href="/ventes">Tous les Ventes</a></li>
            <li class="pc-item"><a class="pc-link" href="/ventes/create">Nouveau Ventes</a></li>
          </ul>
        </li>
        
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#custom-user-square"></use>
              </svg>
            </span>
            <span class="pc-mtext">Users</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span
          ></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="../application/account-profile.html">Account Profile</a></li>
            <li class="pc-item"><a class="pc-link" href="../application/social-media.html">Social media</a></li>
          </ul>
        </li>
      </ul>
      {{-- navigation ends --}}

    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end -->


 <!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
    <div class="me-auto pc-mob-drp">
      <ul class="list-unstyled">
        <!-- ======= Menu collapse Icon ===== -->
        <li class="pc-h-item pc-sidebar-collapse">
          <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="pc-h-item pc-sidebar-popup">
          <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="dropdown pc-h-item">
          <a
            class="pc-head-link dropdown-toggle arrow-none m-0 trig-drp-search"
            data-bs-toggle="dropdown"
            href="#"
            role="button"
            aria-haspopup="false"
            aria-expanded="false"
          >
            <svg class="pc-icon">
              <use xlink:href="#custom-search-normal-1"></use>
            </svg>
          </a>
          <div class="dropdown-menu pc-h-dropdown drp-search">
            <form class="px-3 py-2">
              <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . ." />
            </form>
          </div>
        </li>
      </ul>
    </div>          
    <!-- [Mobile Media Block end] -->

    <div class="ms-auto">
      <ul class="list-unstyled">
        <li class="dropdown pc-h-item">
          <a
            class="pc-head-link dropdown-toggle arrow-none me-0"
            data-bs-toggle="dropdown"
            href="#"
            role="button"
            aria-haspopup="false"
            aria-expanded="false"
          >
            <svg class="pc-icon">
              <use xlink:href="#custom-sun-1"></use>
            </svg>
          </a>
          <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
            <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
              <svg class="pc-icon">
                <use xlink:href="#custom-moon"></use>
              </svg>
              <span>Dark</span>
            </a>
            <a href="#!" class="dropdown-item" onclick="layout_change('light')">
              <svg class="pc-icon">
                <use xlink:href="#custom-sun-1"></use>
              </svg>
              <span>Light</span>
            </a>
            <a href="#!" class="dropdown-item" onclick="layout_change_default()">
              <svg class="pc-icon">
                <use xlink:href="#custom-setting-2"></use>
              </svg>
              <span>Default</span>
            </a>
          </div>
        </li>
        <li class="dropdown pc-h-item">
          <a
            class="pc-head-link dropdown-toggle arrow-none me-0"
            data-bs-toggle="dropdown"
            href="#"
            role="button"
            aria-haspopup="false"
            aria-expanded="false"
          >
            <svg class="pc-icon">
              <use xlink:href="#custom-setting-2"></use>
            </svg>
          </a>
          <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
            <a href="#!" class="dropdown-item">
              <i class="ti ti-user"></i>
              <span>My Account</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-settings"></i>
              <span>Settings</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-headset"></i>
              <span>Support</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-lock"></i>
              <span>Lock Screen</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-power"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</header>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pc-container">
  <div class="pc-content">
    @yield('admin_section')
  </div>
</div>

<!-- [ Main Content ] end -->
<footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
        <div class="row">
        <div class="col my-1">
            <p class="m-0"
            >Able Pro &#9829; crafted by Team <a href="https://themeforest.net/user/phoenixcoded" target="_blank">Phoenixcoded</a></p
            >
        </div>
        <div class="col-auto my-1">
            <ul class="list-inline footer-link mb-0">
            <li class="list-inline-item"><a href="../index.html">Home</a></li>
            <li class="list-inline-item"><a href="https://codedthemes.gitbook.io/able-pro-bootstrap/" target="_blank">Documentation</a></li>
            <li class="list-inline-item"><a href="https://phoenixcoded.authordesk.app/" target="_blank">Support</a></li>
            </ul>
        </div>
        </div>
    </div>
</footer>
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