<?php
// Start session
require 'validation.php';

// Cek apakah var session username sudah di set, kl belom balik ke landing page
if (!isset($_SESSION['username'])) {
    header("Location:login_form.php");
}

ob_start();

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
    <link rel="stylesheet" href="home.css" />

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
              <a class="nav-link active" href="#home">Menu Nasi Box</a>
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
  <h1 class="mb-3 h2">Nasi Box</h1>
  <p>
  Nasi kotak dengan cita rasa khas Indonesia, praktis & higienis
  </p>
  </div>
</div>
    </section>
    <!-- Akhir jumbotron -->
<!-- Display Tumpeng -->
<section class="display-tumpeng">
    <div class="container-fluid">
      <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
$result = mysqli_query($conn, "SELECT * FROM nasibox_product");
while ($row = mysqli_fetch_assoc($result)) {?>
<form action='home_nasibox.php?id=<?=$row['id']?>' method="post">
            <div class="card mb-3">
              <img
                src="img/<?=$row['image']?>"
                class="card-img-top"
                alt="menu_2"
                style="height: 350px; width:100%;"
              />
              <div class="card-body">
                <h4 class="card-title"><?=$row['name']?></h4>
                <h6 class="card-text">
                <?=$row['description']?>
                </h6>
                <h5 class="card-text">Rp. <?=number_format($row['price'], 3)?></h5>

                <!-- Mengambil Data Spesifik suatu barang kemudian dikirim ke validation lewat input hidden -->
                <input type="hidden" name="nama" value="<?=$row['name']?>" >
                <input type="hidden" name="harga" value="<?=$row['price']?>" >
                <input type="number" name="jumlah_barang" value="1" class="form-control mb-2">

                 <a href=""><button type="submit" name="kirim_nasibox" class="btn btn-warning tombol">Pesan</button></a>
              </div>
            </div>


</form>

<?php
}
?>
      </div>
    </div>
</section>
    <!-- Akhir display tumpeng -->

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

<?php
ob_end_flush();
?>