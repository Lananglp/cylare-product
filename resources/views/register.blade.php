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
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
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

  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
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
          <div class="col-xl-10 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5 class="mb-0 fw-semibold">Register</h5>
              </div>
              <div class="row px-xl-5 px-sm-4 px-3">
              </div>
              <div class="card-body">
                <form class="row" action="/register" method="post" role="form text-left">
                    @csrf
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label>nama panggilan</label>
                      <input type="text" class="form-control" name="nama_panggilan" placeholder="Nama panggilan" required>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label>nama lengkap</label>
                      <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama lengkap" required>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label>Email</label>
                      <input name="email" type="email" class="form-control" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="col-lg-3 mb-3">
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select name="gender" class="form-select" required>
                        <option>Pilih</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-3 mb-3">
                    <div class="form-group">
                      <label>Telepon / Whatsapp</label>
                      <input type="number" class="form-control" name="no_hp" placeholder="+62" required>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label>Tempat lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat lahir" required>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label>Tanggal lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal lahir" required>
                    </div>
                  </div>
                  <div class="col-lg-12 mb-3">
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat" rows="2" required></textarea>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label>Validasi password</label>
                      <input type="password" class="form-control" name="validasi_password" placeholder="Password" required>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center align-items-center">
                    <div class="form-check form-check-info">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-info text-gradient font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-lg-auto w-100 my-4 mb-2">Simpan</button>
                  </div>
                  <p class="text-center text-sm mt-3 mb-0">Sudah memiliki akun? <a href="/" class="text-info text-gradient font-weight-bolder">Sign in</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-4 mx-auto text-center">
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Company
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              About Us
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Team
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Products
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Blog
            </a>
            <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Pricing
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
              </script> Soft by Creative Tim.
            </p>
          </div>
        </div>
      </div>
    </footer>
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