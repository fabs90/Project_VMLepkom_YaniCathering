<?php
// Start session
require "validation.php";

// Cek apakah var session username sudah di set, kl belom balik ke landing page
if (!isset($_SESSION['username'])) {
    header("Location:login_form.php");
}

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
    <link rel="stylesheet" href="checkout.css" />

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
              <a class="nav-link active" href="home.php">Menu Tumpeng</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="home_nasibox.php">Menu Nasi Box</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#footer">Contact</a>
            </li>
            <li class="nav-item">
              <a class="me-4" href="logout.php"
                ><button class="tombol btn btn-outline-warning" type="submit" name="logout">
                  Logout
                </button></a
              >
            </li>
            <li class="nav-item">
              <a class="btn btn-floating mb-1 btn-outline-light" href="cart.php">
                <i class="bi bi-cart"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Form -->
    <div class="container">
<div class="row mx-5 justify-content-center" style="margin-top: 11rem; width: auto ;">
  <div class="mb-5 col-md-8">
    <div class="card mb-5">
      <div class="card-header py-3">
        <h5 class="my-3 my-lg-2 text-center">Details Form</h5>
        <div class="underline_title"></div>
      </div>
      <div class="card-body">
      <?php
// Cek apakah dari file validasi login terdapat error
if (count($success) > 0) {
    ?>
                              <div class="alert alert-success text-center">
                                  <?php
// Jika ada error tampilan error
    foreach ($success as $showsuccess) {
        echo $showsuccess;
    }
    ?>
                              </div>
                              <?php
}
?>
        <form method="POST" class="form" action="checkout.php">
            <!-- Nama Input -->
                  <div class="input-nama mb-3">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" id="nama" class="form-control" placeholder="Nama" name="nama" required />
                  </div>
              <!-- Email input -->
              <div class="input-email mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" class="form-control" placeholder="Email" name="email" required />
              </div>

              <!-- Number input -->
              <div class="input-phone mb-3">
                <label class="form-label" for="telpon">No. Telpon</label>
                <input type="number" id="telpon" class="form-control" placeholder="e.g 9999-9999-9999" name="nomor" required/>
              </div>

              <!-- Alamat input -->
              <div class="input-alamat mb-3">
                <label class="form-label" for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" rows="4" name="alamat" required></textarea>
              </div>

              <!-- Catatan Pemesanan -->
              <div class="input-note">
                    <label class="form-label" for="note">Catatan <span style="font-size:small;" class="mb-sm-2">(optional)</span></label>
                    <input type="text" id="note" class="form-control mb-4 mb-lg-3" placeholder="Catatan" name="catatan" />
                  </div>

              <!-- Radio button -->
              <label for="">Pembayaran :</label>
              <div class="input-check d-flex my-2 my-lg-2">
                <!-- Gopay -->
                <input class="form-check-input me-1" type="radio" id="gopay" name="bayar" value="gopay" required/>
                <label class="form-check-label me-2" for="gopay">
                  Gopay
                </label>
                <!-- Transfer Mbank -->
                <input class="form-check-input me-1" type="radio" id="tf_online" name="bayar" value="tf_online" required/>
                <label class="form-check-label me-2" for="tf_online">
                  Transfer M-Bank
                </label>
                <!-- Spay -->
                <input class="form-check-input me-1" type="radio" id="spay" name="bayar" value="shopee" required/>
                <label class="form-check-label" for="spay">
                  Shopee Pay
                </label>
              </div>

            <div class="button-checkout text-center my-4 my-lg-5">
            <input type="submit" value="Submit" name="kirim_data" class="tombol btn btn-warning">
            </div>

        </form>
          </div>
        </div>
      </div>
      </div>
    </div>
  <!-- Akhir Form -->

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
