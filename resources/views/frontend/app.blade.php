<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BPR Multidhana Bersama</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/tema/assets/img/favicon.png" rel="icon">
  <link href="/tema/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/tema/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/tema/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/tema/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/tema/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/tema/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/tema/assets/css/style.css" rel="stylesheet">
  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.html">BPR Multidhana Bersama</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          {{-- <li><a class="active " href="/">Beranda</a></li>
          <li><a href="/fitur">Fitur</a></li>
          <li><a href="/tim">Tim</a></li>
          <li><a href="/partner">Partner</a></li>
          <li><a href="/hubungikami">Hubungi Kami</a></li> --}}
          <li><a href="/login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->

  @yield('header')
 
  <!-- End Hero -->

  <main id="main">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/tema/assets/vendor/aos/aos.js"></script>
  <script src="/tema/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/tema/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/tema/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/tema/assets/js/main.js"></script>

</body>

</html>