<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="noodp">
  <link rel="canonical" href="https://cylare.online/">
  <meta itemprop="name" content="Cylare Management System">
  <meta property="og:title" content="Cylare Management System">
  <meta property="og:site_name" content="Cylare Management System">
  <meta property="og:type" content="website">
  <meta name="description" content="Website dengan sistem manajemen yang dibuat menggunakan laravel 10 dikembangkan oleh Kadek Lanang Lanusa Putera">
  <meta itemprop="description" content="Website dengan sistem manajemen yang dibuat menggunakan laravel 10 dikembangkan oleh Kadek Lanang Lanusa Putera">
  <meta property="og:description" content="Website dengan sistem manajemen yang dibuat menggunakan laravel 10 dikembangkan oleh Kadek Lanang Lanusa Putera">
  <meta name="keywords" content="cylare, lananglp, kadek lanang, kadek lanang lanusa, kadek lanang lanusa putera, lanang lanusa, lanang lanusa putera, contoh website laravel">
  <meta property="og:image" content="https://cylare.online/assets/img/logos/cylareLogo.png">
  <meta property="og:url" content="https://cylare.online/">
  <link rel="icon" type="image/png" href="https://cylare.online/assets/img/logos/cylareLogo.png">
  <title>
    Cylare Management System
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  {{-- <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script> --}}

  <link rel="preload" href="../assets/img/curved-images/curved-11.jpg" as="image">

  <style>
    .text-silver {
      color: #ccc;
    }
  </style>

</head>

<body class="position-relative">

  @if (session('success'))
    <div id="myAlert" class="position-absolute rounded-3 top-0 end-0 mt-3 mx-3">
      <div class="mx-auto alert alert-info alert-dismissible fade show text-white shadow-lg border-0" role="alert" style="z-index: 1">
        <span class="alert-icon"><i class="fa fa-fw fa-check text-warning"></i></span>
        <span class="alert-text"><strong>Sukses</strong> 
          {{session('success')}}
        </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif
  @if (session('warning'))
    <div id="myAlert" class="position-absolute rounded-3 top-0 end-0 mt-3 mx-3">
      <div class="mx-auto alert alert-warning alert-dismissible fade show text-white shadow-lg border-0" role="alert" style="z-index: 1">
        <span class="alert-icon"><i class="fa fa-fw fa-check"></i></span>
        <span class="alert-text"><strong>Ops!</strong> 
          {{session('warning')}}
        </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif

  <!-- Navbar -->
  {{-- <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../pages/dashboard.html">
        Soft UI Dashboard
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">
              <i class="fa fa-chart-pie opacity-6  me-1"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="../pages/profile.html">
              <i class="fa fa-user opacity-6  me-1"></i>
              Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="../pages/sign-up.html">
              <i class="fas fa-user-circle opacity-6  me-1"></i>
              Sign Up
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="../pages/sign-in.html">
              <i class="fas fa-key opacity-6  me-1"></i>
              Sign In
            </a>
          </li>
        </ul>
        <li class="nav-item d-flex align-items-center">
          <a class="btn btn-round btn-sm mb-0 btn-outline-white me-2" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Online Builder</a>
        </li>
        <ul class="navbar-nav d-lg-block d-none">
          <li class="nav-item">
            <a href="https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-light">Free download</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> --}}




  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none mb-5 navbar-transparent">
    <div class="container">
      <a class="navbar-brand font-weight-bold ms-lg-0 ms-3 text-white d-flex align-items-center" href="../pages/dashboard.html">
        <img src="/assets/img/logos/cylareLogo.png" alt="cylareLogo.png" width="32" class="me-2"> Cylare Management System
      </a>
      <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav ms-auto ms-xl-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <button class="nav-link d-flex align-items-center me-2 active bg-transparent border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalSignIn"><i class="fa fa-chart-pie opacity-6  me-1"></i> Dashboard</button>
            {{-- <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">
              <i class="fa fa-chart-pie opacity-6  me-1"></i>
              Dashboard
            </a> --}}
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="#tentangSaya">
              <i class="fa fa-user opacity-6  me-1"></i>
              Tentang saya
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="#website">
              <i class="fas fa-globe opacity-6  me-1"></i>
              Website
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="#musik">
              <i class="fas fa-music opacity-6  me-1"></i>
              Musik
            </a>
          </li>
        </ul>
        {{-- <li class="nav-item d-flex align-items-center">
          <a class="btn btn-round btn-sm mb-0 btn-outline-white me-2" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Online Builder</a>
        </li> --}}
        {{-- <ul class="navbar-nav d-lg-block d-none">
          <li class="nav-item">
            <a href="https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-light">Free download</a>
          </li>
        </ul> --}}
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content mt-0">
    <section>
      <div class="page-header d-flex flex-column justify-content-center py-5" style="background: url(../assets/img/curved-images/curved-11.jpg); background-size: cover; background-position: center;">
        <span class="mask bg-gradient-dark opacity-9"></span>
        <div class="container mt-5 mb-0 mb-lg-5 py-3 py-lg-5">
          <div class="row">
            <div class="col-xl-7 d-flex flex-column justify-content-center">
              <h1 class="mb-3 ps-4 ps-lg-0 pe-3 h2 text-white">Mari bersama-sama menjelajahi perjalanan yang penuh makna</h1>
              <h2 class="mb-3 h6 text-white ms-4">- Kadek Lanang Lanusa Putera -</h2>
              <div class="mx-4 mb-4">
                <p class="text-silver">
                  Selamat datang di website Cylare, mari luangkan waktu sejenak untuk memperkenalkan diri, Cylare merupakan nama publik dari Kadek Lanang Lanusa Putera, di website ini saya cantumkan semua tentang diri saya agar anda mampu mengenal saya lebih jauh.
                </p>
                <p class="text-silver">
                  Mari jelajahi lebih lengkap dengan klik salah satu tombol dibawah ini.
                </p>
                <a class="btn btn-sm bg-gradient-info me-2" href="#">Jelajahi selengkapnya...</a>
                <button class="btn btn-sm bg-gradient-secondary" type="button" data-bs-toggle="modal" data-bs-target="#modalSignIn">Lihat tampilan Dashboard</button>
              </div>
            </div>
            <div class="d-none d-xl-block col-xl-5 d-flex flex-column justify-content-center align-items-center">
              <div class="position-relative w-100 h-100">
                <img src="../assets/img/lanang2.jpg" alt="lanang2.png" loading='lazy' class="position-absolute rounded-3 shadow" style="top: 45%; left: 80%; transform: translateX(-50%) translateY(-50%); width: 40%;">
                <img src="../assets/img/lanang3.jpg" alt="lanang3.png" loading='lazy' class="position-absolute rounded-3 shadow" style="top: 50%; left: 50%; transform: translateX(-50%) translateY(-25%); width: 40%;">
                <img src="../assets/img/lanang1.jpg" alt="lanang1.png" loading='lazy' class="position-absolute rounded-3 shadow" style="top: 60%; left: 45%; transform: translateX(-100%) translateY(-50%); width: 40%;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="tentangSaya" class="container">
      <div class="row px-4 py-5 my-4">
        <div class="col-lg-3 d-flex justify-content-center align-items-center">
          <h2 class="h3">Tentang Saya</h2>
        </div>
        <div class="col-lg-9 d-flex justify-content-center align-items-center">
          <p class="mb-0">Saya adalah Kadek Lanang Lanusa Putera, saya biasa dipanggil Lanang, nama publik saya adalah Cylare, saat ini umur saya 21 tahun, asal saya dari Bali, lebih tepatnya Br. Gulingan, Antosari, Selemadeg Barat, Tabanan, Bali, saya adalah orang yang menekuni di bidang teknologi, saya memiliki pengalaman lebih dari 1 tahun dalam pemrograman website, tak hanya itu, saya juga memiliki bakat dalam pembuatan musik elektronik (EDM).</p>
        </div>
      </div>
    </section>

    <section class="bg-gradient-dark">
      <div class="container text-center px-4 py-5">
        <div class="d-flex flex-column justify-content-center align-items-center mt-4">
          <h2 class="text-white h3">Apa saja yang telah saya pelajari?</h2>
          <p class="col-lg-7 text-silver text-center mb-0">Seperti yang telah saya katakan di bagian tentang saya, sudah lebih dari 1 tahun mendalami dunia pemrograman website, dan berikut ini merupakan bahasa pemrograman yang telah saya pelajari.</p>
        </div>
        <div class="row row-cols-3 mt-4 pt-4 d-flex justify-content-center">
          <div class="col-lg-2 mb-4">
            <div class="d-flex justify-content-center align-items-center px-4 mb-2">
              <div class="ratio ratio-1x1">
                <img src="../assets/img/logos/react.png" alt="react.png" draggable="false" class="img-fluid">
              </div>
            </div>
            <p class="text-silver text-center h5">React</p>
          </div>
          <div class="col-lg-2 mb-4">
            <div class="d-flex justify-content-center align-items-center px-4 mb-2">
              <div class="ratio ratio-1x1">
                <img src="../assets/img/logos/laravel.png" alt="laravel.png" draggable="false" class="img-fluid">
              </div>
            </div>
            <p class="text-silver text-center h5">Laravel</p>
          </div>
          <div class="col-lg-2 mb-4">
            <div class="d-flex justify-content-center align-items-center px-4 mb-2">
              <div class="ratio ratio-1x1">
                <img src="../assets/img/logos/html.png" alt="html.png" draggable="false" class="img-fluid">
              </div>
            </div>
            <p class="text-silver text-center h5">Html</p>
          </div>
          <div class="col-lg-2 mb-4">
            <div class="d-flex justify-content-center align-items-center px-4 mb-2">
              <div class="ratio ratio-1x1">
                <img src="../assets/img/logos/css.png" alt="css.png" draggable="false" class="img-fluid">
              </div>
            </div>
            <p class="text-silver text-center h5">CSS</p>
          </div>
          <div class="col-lg-2 mb-4">
            <div class="d-flex justify-content-center align-items-center px-4 mb-2">
              <div class="ratio ratio-1x1">
                <img src="../assets/img/logos/js.png" alt="js.png" draggable="false" class="img-fluid">
              </div>
            </div>
            <p class="text-silver text-center h5">Javascript</p>
          </div>
        </div>
      </div>
    </section>

    <section id="website" class="container my-5 pt-4 pt-lg-5">
      <div class="d-flex flex-column justify-content-center align-items-center">
        <h2 class="h3">Website apa saja yang telah saya kembangkan?</h2>
        <p class="col-lg-7 text-center mb-0">Berikut merupakan website yang telah saya kembangkan dari yang proyek pribadi hingga proyek untuk sebuah perusahaan, website ini merupakan hasil kerja keras saya selama setahun lebih mendalami dunia programan website.</p>
      </div>
      <div class="row g-3 mt-5 pt-5">
        <div class="col-lg-4">
          <div class="d-flex flex-column justify-content-center h-100">
            <h3 class="h4">SIA Alfa Prima</h3>
            <p>Sistem Informasi Akademik Alfa Prima merupakan salah satu website yang saya kembangkan dibagian Front End.</p>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="d-flex flex-column justify-content-center align-items-center position-relative w-100 h-100">
            <div style="padding: 5rem 0rem;">
              <div class="ratio ratio-16x9 position-absolute rounded-3 shadow" style="top: 40%; left: 0%; transform: translateY(-50%); width: 40%;">
                <img src="../assets/img/testimonial/alfa2.png" alt="alfa1.png" loading='lazy' class="rounded-3">
              </div>
              <div class="ratio ratio-16x9 position-absolute rounded-3 shadow" style="top: 40%; right: 0%; transform: translateY(-50%); width: 40%;">
                <img src="../assets/img/testimonial/alfa3.png" alt="alfa2.png" loading='lazy' class="rounded-3">
              </div>
              <div class="ratio ratio-16x9 position-absolute rounded-3 shadow" style="top: 60%; left: 50%; transform: translateX(-50%) translateY(-50%); width: 45%;">
                <img src="../assets/img/testimonial/alfa1.png" alt="alfa3.png" loading='lazy' class="rounded-3">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="musik" class="bg-gradient-dark" style="margin-top: 6rem;">
      <div class="container py-5">
        <div class="d-flex flex-column justify-content-center align-items-center my-3">
          <h2 class="text-white h3">Apakah ada keahlian lain selain pemrograman website?</h2>
          <p class="col-lg-7 text-silver text-center mb-0">Selain pemrograman website, saya memiliki bakat dalam membuat atau menciptakan musik elektronik (EDM), bukan hanya itu beberapa musik lokal ada beberapa saya remix, musik-musik yang telah saya buat saya posting semua di youtube.</p>
        </div>
        <div class="row justify-content-center mt-4 pt-4">
          <div class="col-lg-4">
            <div class="bg-dark shadow-lg" style="border-radius: 1.5rem 1.5rem 1rem 1rem;">
              <div class="position-relative py-5" style="background: url(../assets/img/curved-images/curved-11.jpg); border-radius: 1.25rem 1.25rem 0px 0px;">
                <div class="mask bg-gradient-dark opacity-9" style="border-radius: 1rem 1rem 0px 0px;"></div>
              </div>
              <div class="position-relative text-center px-3 pb-1" style="padding-top: 2.5rem;">
                <div class="position-absolute" style="top: -32px; left: 50%; transform: translateX(-50%);">
                  <img src="https://cylare.online/assets/img/logos/cylareLogo.png" alt="" class="img-fluid">
                </div>
                <h6 class="text-white mt-0">Cylare</h6>
                <p class="text-silver">@cylare_
                  ‧
                  413 subscriber
                  ‧
                  27 video</p>
                  <a href="http://www.youtube.com/@cylare_" target="blank_" class="btn btn-sm btn-danger w-100">Kunjungi Youtube</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex flex-column justify-content-center py-4">
            <p class="text-silver text-sm">Berikut salah satu musik remix buatan saya, mungkin menggunakan kata remix adalah salah besar karena saya mengambil vokal dari musik Dewa 19, jadi saya gunakan kata bootleg untuk musik ini.</p>
            <p class="text-white">Dewa 19 - Separuh Nafas (Deep House Version)</p>
              <audio controls>
                <source src="../assets/music/separuh_nafas.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
              </audio>
          </div>
        </div>
      </div>
    </section>

    
    {{-- <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Selamat datang!</h1>
              <p class="text-lead text-white">Bukan hal yang sulit ketika menemukan sesuatu yang berkaitan dengan sign in, lakukan hal tersebut.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5 class="mb-0 fw-semibold">Sign in</h5>
              </div>
              <div class="row px-xl-5 px-sm-4 px-3">
                <div class="col-3 ms-auto px-1">
                  <a class="btn btn-outline-light w-100" href="javascript:;">
                    <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink32">
                      <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="facebook-3" transform="translate(3.000000, 3.000000)" fill-rule="nonzero">
                          <circle fill="#3C5A9A" cx="29.5091719" cy="29.4927506" r="29.4882047"></circle>
                          <path d="M39.0974944,9.05587273 L32.5651312,9.05587273 C28.6886088,9.05587273 24.3768224,10.6862851 24.3768224,16.3054653 C24.395747,18.2634019 24.3768224,20.1385313 24.3768224,22.2488655 L19.8922122,22.2488655 L19.8922122,29.3852113 L24.5156022,29.3852113 L24.5156022,49.9295284 L33.0113092,49.9295284 L33.0113092,29.2496356 L38.6187742,29.2496356 L39.1261316,22.2288395 L32.8649196,22.2288395 C32.8649196,22.2288395 32.8789377,19.1056932 32.8649196,18.1987181 C32.8649196,15.9781412 35.1755132,16.1053059 35.3144932,16.1053059 C36.4140178,16.1053059 38.5518876,16.1085101 39.1006986,16.1053059 L39.1006986,9.05587273 L39.0974944,9.05587273 L39.0974944,9.05587273 Z" id="Path" fill="#FFFFFF"></path>
                        </g>
                      </g>
                    </svg>
                  </a>
                </div>
                <div class="col-3 px-1">
                  <a class="btn btn-outline-light w-100" href="javascript:;">
                    <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="apple-black" transform="translate(7.000000, 0.564551)" fill="#000000" fill-rule="nonzero">
                          <path d="M40.9233048,32.8428307 C41.0078713,42.0741676 48.9124247,45.146088 49,45.1851909 C48.9331634,45.4017274 47.7369821,49.5628653 44.835501,53.8610269 C42.3271952,57.5771105 39.7241148,61.2793611 35.6233362,61.356042 C31.5939073,61.431307 30.2982233,58.9340578 25.6914424,58.9340578 C21.0860585,58.9340578 19.6464932,61.27947 15.8321878,61.4314159 C11.8738936,61.5833617 8.85958554,57.4131833 6.33064852,53.7107148 C1.16284874,46.1373849 -2.78641926,32.3103122 2.51645059,22.9768066 C5.15080028,18.3417501 9.85858819,15.4066355 14.9684701,15.3313705 C18.8554146,15.2562145 22.5241194,17.9820905 24.9003639,17.9820905 C27.275104,17.9820905 31.733383,14.7039812 36.4203248,15.1854154 C38.3824403,15.2681959 43.8902255,15.9888223 47.4267616,21.2362369 C47.1417927,21.4153043 40.8549638,25.1251794 40.9233048,32.8428307 M33.3504628,10.1750144 C35.4519466,7.59650964 36.8663676,4.00699306 36.4804992,0.435448578 C33.4513624,0.558856931 29.7884601,2.48154382 27.6157341,5.05863265 C25.6685547,7.34076135 23.9632549,10.9934525 24.4233742,14.4943068 C27.7996959,14.7590956 31.2488715,12.7551531 33.3504628,10.1750144" id="Shape"></path>
                        </g>
                      </g>
                    </svg>
                  </a>
                </div>
                <div class="col-3 me-auto px-1">
                  <a class="btn btn-outline-light w-100" href="javascript:;">
                    <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="google-icon" transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                          <path d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267" id="Path" fill="#4285F4"></path>
                          <path d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667" id="Path" fill="#34A853"></path>
                          <path d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782" id="Path" fill="#FBBC05"></path>
                          <path d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769" id="Path" fill="#EB4335"></path>
                        </g>
                      </g>
                    </svg>
                  </a>
                </div>
                <div class="mt-2 position-relative text-center">
                  <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                    or
                  </p>
                </div>
              </div>
              <div class="card-body">
                <form action="/authenticate" method="post" role="form text-left">
                    @csrf
                  <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3">
                    <input name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" required>
                  </div>
                  <div class="mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required>
                  </div>
                  <div class="form-check form-check-info text-left">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                      I agree the <a href="javascript:;" class="text-info text-gradient font-weight-bolder">Terms and Conditions</a>
                    </label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Sign in</button>
                  </div>
                  <p class="text-center text-sm mt-3 mb-0">Belum punya akun? <a href="/register" class="text-info text-gradient font-weight-bolder">Sign up</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-4 mx-auto text-center">
            <button class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2 bg-transparent border-0" type="button" data-bs-toggle="modal" data-bs-target="#modalSignIn">Dashboard</button>
            <a href="#tentangSaya" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Tentang saya
            </a>
            <a href="#website" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Website
            </a>
            <a href="#musik" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Musik
            </a>
          </div>
          <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-dribbble"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-twitter"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-instagram"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-pinterest"></span>
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-github"></span>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script> Cylare.
            </p>
          </div>
        </div>
      </div>
    </footer>

    <div class="modal fade" id="modalSignIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body text-center p-5">
            <div class="card-header text-center pt-4">
              <p class="mb-4 h4 font-weight-bolder">Sign in</p>
            </div>
            <div class="row px-xl-5 px-sm-4 px-3">
              <div class="col-3 ms-auto px-1">
                <a class="btn btn-outline-light w-100" href="javascript:;">
                  <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink32">
                    <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g id="facebook-3" transform="translate(3.000000, 3.000000)" fill-rule="nonzero">
                        <circle fill="#3C5A9A" cx="29.5091719" cy="29.4927506" r="29.4882047"></circle>
                        <path d="M39.0974944,9.05587273 L32.5651312,9.05587273 C28.6886088,9.05587273 24.3768224,10.6862851 24.3768224,16.3054653 C24.395747,18.2634019 24.3768224,20.1385313 24.3768224,22.2488655 L19.8922122,22.2488655 L19.8922122,29.3852113 L24.5156022,29.3852113 L24.5156022,49.9295284 L33.0113092,49.9295284 L33.0113092,29.2496356 L38.6187742,29.2496356 L39.1261316,22.2288395 L32.8649196,22.2288395 C32.8649196,22.2288395 32.8789377,19.1056932 32.8649196,18.1987181 C32.8649196,15.9781412 35.1755132,16.1053059 35.3144932,16.1053059 C36.4140178,16.1053059 38.5518876,16.1085101 39.1006986,16.1053059 L39.1006986,9.05587273 L39.0974944,9.05587273 L39.0974944,9.05587273 Z" id="Path" fill="#FFFFFF"></path>
                      </g>
                    </g>
                  </svg>
                </a>
              </div>
              <div class="col-3 px-1">
                <a class="btn btn-outline-light w-100" href="javascript:;">
                  <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g id="apple-black" transform="translate(7.000000, 0.564551)" fill="#000000" fill-rule="nonzero">
                        <path d="M40.9233048,32.8428307 C41.0078713,42.0741676 48.9124247,45.146088 49,45.1851909 C48.9331634,45.4017274 47.7369821,49.5628653 44.835501,53.8610269 C42.3271952,57.5771105 39.7241148,61.2793611 35.6233362,61.356042 C31.5939073,61.431307 30.2982233,58.9340578 25.6914424,58.9340578 C21.0860585,58.9340578 19.6464932,61.27947 15.8321878,61.4314159 C11.8738936,61.5833617 8.85958554,57.4131833 6.33064852,53.7107148 C1.16284874,46.1373849 -2.78641926,32.3103122 2.51645059,22.9768066 C5.15080028,18.3417501 9.85858819,15.4066355 14.9684701,15.3313705 C18.8554146,15.2562145 22.5241194,17.9820905 24.9003639,17.9820905 C27.275104,17.9820905 31.733383,14.7039812 36.4203248,15.1854154 C38.3824403,15.2681959 43.8902255,15.9888223 47.4267616,21.2362369 C47.1417927,21.4153043 40.8549638,25.1251794 40.9233048,32.8428307 M33.3504628,10.1750144 C35.4519466,7.59650964 36.8663676,4.00699306 36.4804992,0.435448578 C33.4513624,0.558856931 29.7884601,2.48154382 27.6157341,5.05863265 C25.6685547,7.34076135 23.9632549,10.9934525 24.4233742,14.4943068 C27.7996959,14.7590956 31.2488715,12.7551531 33.3504628,10.1750144" id="Shape"></path>
                      </g>
                    </g>
                  </svg>
                </a>
              </div>
              <div class="col-3 me-auto px-1">
                <a class="btn btn-outline-light w-100" href="javascript:;">
                  <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g id="google-icon" transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                        <path d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267" id="Path" fill="#4285F4"></path>
                        <path d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667" id="Path" fill="#34A853"></path>
                        <path d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782" id="Path" fill="#FBBC05"></path>
                        <path d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769" id="Path" fill="#EB4335"></path>
                      </g>
                    </g>
                  </svg>
                </a>
              </div>
              <div class="mb-3 position-relative text-center">
                <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                  atau
                </p>
              </div>
            </div>
            <form action="/authenticate" method="post" role="form text-left">
              @csrf
            {{-- <div class="mb-3">
              <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="email-addon">
            </div> --}}
            <div class="mb-3">
              <input name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" required>
            </div>
            <div class="mb-3">
              <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required>
            </div>
            <div class="form-check form-check-info text-left">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
              <label class="form-check-label" for="flexCheckDefault">
                Saya menyetujui <a href="javascript:;" class="text-info text-gradient font-weight-bolder">Syarat dan Ketentuan</a>
              </label>
            </div>
            <div class="text-center">
              <button type="submit" class="btn bg-gradient-info w-100 my-3">Sign in</button>
            </div>
            <p class="text-center text-sm mt-3 mb-0">Belum punya akun? <a href="/register" class="text-info text-gradient font-weight-bolder">Sign up</a></p>
          </form>
          </div>
        </div>
      </div>
    </div>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>

  <script>
    const myAlert = document.getElementById("myAlert");
    setTimeout(() => {
        myAlert.classList.add("d-none");
    }, 3000);
  </script>
</body>

</html>