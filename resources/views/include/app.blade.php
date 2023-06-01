

<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Stranger</title>
  <!-- jquery link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  @yield('pageSpecificCSS')
 
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('asset/css/app.min.css')}}">
  <!-- Template CSS -->
  <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('asset/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('asset/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href='asset/img/favicon.ico' />
  <!-- <link rel="stylesheet" href="asset/bundles/summernote/summernote-bs4.css"> -->
  <link rel="stylesheet" href="{{asset('asset/bundles/codemirror/lib/codemirror.css')}}">
  <link rel="stylesheet" href=" {{asset('asset/bundles/codemirror/theme/duotone-dark.css')}} ">
  <link rel="stylesheet" href=" {{asset('asset/bundles/jquery-selectric/selectric.css')}}">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" />
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script>  var user_type = {{session('user_type')}};
    </script>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          
        
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">  <span class="d-sm-none d-lg-inline-block btn btn-light">Logout</span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              
              <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout 
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('index')}}"> <img alt="image" src=" {{asset('asset/img/logo.png')}}" class="header-logo" /> <span
                class="logo-name">Stranger</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown ">
              <a href="{{route('index')}}" class="nav-link"><i class="fas fa-tachometer-alt pt-1"></i><span>Dashboard</span></a>
            </li>

            <li class="">
              <a href="{{route('users')}}" class="nav-link"><i class="fas fa-users"></i><span>Users</span></a>
            </li> 

            <li class="">
              <a href="{{route('fackuser')}}" class="nav-link"><i class="fas fa-surprise"></i><span>Fack Users</span></a>
            </li> 

            <li class="">
              <a href="{{route('report')}}" class="nav-link"><i class="fab fa-cuttlefish"></i><span>Report</span></a>
            </li> 
            
            <li class="">
              <a href="{{route('package')}}" class="nav-link"><i class="fas fa-box-open"></i><span>Package</span></a>
            </li> 

        <li class="dropdown">
          <a href="{{ route('setting') }}" ><i class="fas fa-cog  pt-1"></i><span>Setting</span></a>
        </li>

        
          </ul>
        </aside>
      </div>

     
      <!-- Main Content -->
      <div class="main-content">

      @yield('content')
      <form action="">
        <input type="hidden" id="user_type" value="{{session('user_type')}}">
      </form>
    
    </div>
      
    </div>
  </div>
  <footer class="main-footer">
        <div class="footer-left">
          <a href="">Retry Tech</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>

<!-- General JS Scripts -->

<script src="{{asset('asset/js/app.min.js ')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous"></script>
    <!-- JS Libraies -->
    <script src="{{asset('asset/bundles/datatables/datatables.min.js ')}}"></script>
    <script src=" {{asset('asset/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('asset/bundles/jquery-ui/jquery-ui.min.js ')}}"></script>
    <!-- Page Specific JS File -->
    <script src=" {{asset('asset/js/page/datatables.js')}}"></script>
    <!-- Template JS File -->
    <script src="{{asset('asset/js/scripts.js')}}" ></script>
    <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    </script>
    <!-- Custom JS File -->
    <script src="{{asset('asset/bundles/summernote/summernote-bs4.js ')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>