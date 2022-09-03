<?php
require 'validation.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fabian Cathering</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <!-- My CSS -->
    <link rel="stylesheet" href="login_form.css" />

    <!-- My icon -->
    <link rel="shortcut icon" href="img/Restaurant_Premium_Food_Logo_Template-removebg-preview.png" type="image/x-icon" />

    <!-- Icon Footer -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  </head>
<body>

 <!-- Navbar -->
 <nav
      class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top bg-dark"
    >
      <div class="container">
        <a class="navbar-brand" href="#"
          ><img
            src="img/Restaurant_Premium_Food_Logo_Template-removebg-preview.png"
            alt="Logo"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="halaman_tumpeng.php">Menu Tumpeng</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="halaman_nasiBox.php">Menu Nasi Box</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#footer">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Card -->
<div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2>LOGIN</h2>
        <div class="underline-title"></div>
      </div>
      <form method="post" class="form">
        <label for="user-email" style="padding-top:13px">
            &nbsp;Username
          </label>
        <input id="user-email" class="form-content" type="text" name="username" required />
        <div class="form-border"></div>
        <label for="user-password" style="padding-top:22px">&nbsp;Password
          </label>
        <input id="user-password" class="form-content" type="password" name="password" required />
        <div class="form-border"></div>
        <input id="submit-btn" type="submit" name="submit" value="LOGIN" />
        <a href="register.php" id="signup">Don't have account yet?</a>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <section id="footer" class="footer">
      <footer class="bg-black text-white text-center pb-3">
        <!-- Grid container -->
        <div class="container p-4">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0 ">
              <h5 class="text-uppercase">Terhubung Dengan Kami :</h5>
              <!-- Instagram -->
              <a class="btn btn-floating m-1 btn-outline-light" href="https://www.instagram.com/fabianjc.jpeg/" role="button"
              ><i class="bi bi-instagram"></i
            ></a>
                <!-- Github -->
            <a class="btn btn-outline-light" href="https://github.com/fabs90" role="button"
              ><i class="bi bi-github"></i></a>
              <!-- Google -->
            <a class="btn btn-outline-light" href="https://m.facebook.com/fabian.juliansyah" role="button"
              ><i class="bi bi-facebook"></i></a>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
              <h5 class="text-uppercase">Pemesanan Dapat Juga Dilakukan Melalui :</h5>

              <p>
                📞 : 085899496182 (WA only)
                <br>
                ✉ : fabianjuliansyah89@gmail.com (Email)
                <br>
                🏠 : Jalan Cipta Guna, Bekasi
              </p>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2022 Copyright:
          <a class="text-white" href="index.html">fabian.cathering.com</a>
        </div>
        <!-- Copyright -->

      </footer>
  </section>
    <!-- Akhir Footer -->
</body>
  <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
</html>
