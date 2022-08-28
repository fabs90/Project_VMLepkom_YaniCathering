<?php
// Start session
require 'validation.php';

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
    <link rel="stylesheet" href="cart.css" />

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

    <!-- Jumbotron -->
    <section class="jumbotron" id="home">
        <div class="container-fluid text-center pt-10">
    <div class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-black">
  <h1 class="mb-3 h2">Cart</h1>
  <p>
    Daftar barang yang kamu pesan :
  </p>
  </div>
</div>
    </section>
    <!-- Akhir jumbotron -->

<!-- Display Cart -->
<div class="table-responsive-sm">
  <table class="table">
  <?php
// Deklrasi variabel total = 0
$total = 0;

$output = "";

$output .= "
    <table class='table table-bordered  table-striped'>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
        <th>Aksi</th>
    </tr>

";
if (!empty($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $key) {
        $output .= "
        <tr>
            <td>" . $key['id'] . "</td>
            <td>" . $key['nama'] . "</td>
            <td>Rp. " . number_format($key['harga'], 3) . "</td>
            <td>" . $key['jumlah_barang'] . "</td>
            <td>Rp. " . number_format($key['jumlah_barang'] * $key['harga'], 3) . "</td>
            <td>
                <a href='cart.php?action=remove&id=" . $key['id'] . "'>
                <button class='btn btn-danger btn-block'>Remove</button>
                </a>
            </td>
        </tr>
        ";

        $total += $key['jumlah_barang'] * $key['harga'];
    }

    $output .= "
    <tr>
        <td colspan='3'></td>
        <td></b>Total Price</b></td>
        <td>Rp. " . number_format($total, 3) . "</td>
    </tr>

    ";
}

echo $output;
?>
  </table>
</div>
<!-- Akhir Display Cart -->


<!-- Button Checkout -->
<div class="container-fluid text-center">
<button class="checkout btn btn-warning">Checkout</button>
</div>
<!-- Akhir button checkout -->

    <!-- Footer -->
    <section id="footer" class="footer">
      <footer class="bg-black text-white text-center pb-3">
        <!-- Grid container -->
        <div class="container p-4">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0 ">
              <h5 class="text-uppercase">Connected with us :</h5>
              <!-- Instagram -->
              <a class="btn btn-floating m-1 btn-outline-light" href="https://www.instagram.com/fabianjc.jpeg/" role="button"
              ><i class="bi bi-instagram"></i
            ></a>
                <!-- Github -->
            <a class="btn btn-outline-light" href="https://github.com/fabs90" role="button"
              ><i class="bi bi-github"></i></a>
              <!-- Facebook -->
            <a class="btn btn-outline-light" href="https://m.facebook.com/fabian.juliansyah" role="button"
              ><i class="bi bi-facebook"></i></a>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
              <h5 class="text-uppercase">Contact : </h5>

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
