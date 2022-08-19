<?php
require 'connection.php';

// Start session
session_start();

// (Klik Pesan dari halaman Landing Page)
// Jika tombol pesan display item klik
if (isset($_POST['kirim_awal'])) {
    // Pindah ke halaman home
    header("Location:home.php");
}

// (validasi Login)
if (isset($_POST['submit'])) {

    // Ambil input data dari form dan kasih sql injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query sql
    $sql = "SELECT * FROM login WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    // Cek apakah ada data di sql yg affected
    $num_row = mysqli_num_rows($result);

    // Jika ada data yg sama/affected,
    if ($num_row > 0) {

        // ubah data yg ada di db jadi assoc array
        while ($row = mysqli_fetch_assoc($result)) {
            $dbPass = $row['password'];
            $dbUsername = $row['username'];
        }

        // Cek apakah username dan password form sama dengan yg di db
        if ($username === $dbUsername && $password === $dbPass) {
            // Set $_SESSION['username]
            $_SESSION['username'] = $username;

            // Heading ke halaman home
            header("Location:home.php");
        }
    } else {
        echo "<script type='text/javascript'> alert('Wrong username/Password!'); document.location.href='login_form.php';</script>";
        exit();
    }
}

// (Validasi Add To Cart TUMPENG)
if (isset($_POST['kirim_tumpeng'])) {
    // Ambil data dari yg user klik
    $id = $_GET['id'];
    $nama = $_POST["nama"];
    $harga = number_format($_POST["harga"], 2);
    $jumlah_barang = $_POST["jumlah_barang"];

    // Kalau blom ada session_cart, buat array nya
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'][] = array(
            'id' => $id,
            'nama' => $nama,
            'harga' => $harga,
            'jumlah_barang' => $jumlah_barang,
        );
    } else {
        // Ambil semua ID saja dari array session_cart
        $SESSION_CART_ID = array_column($_SESSION['cart'], 'id');
        // Kalo id nya gaada di array, masukin ke array
        if (!in_array($id, $SESSION_CART_ID)) {
            $_SESSION['cart'][] = array(
                'id' => $id,
                'nama' => $nama,
                'harga' => $harga,
                'jumlah_barang' => $jumlah_barang,
            );
        }

    }

}

// (Validasi Add To Cart NASIBOX)
if (isset($_POST['kirim_nasibox'])) {
    // Ambil data dari yg user klik
    $id = $_GET['id'];
    $nama = $_POST["nama"];
    $harga = number_format($_POST["harga"], 2);
    $jumlah_barang = $_POST["jumlah_barang"];

    // Kalau blom ada session_cart, buat array nya
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'][] = array(
            'id' => $id,
            'nama' => $nama,
            'harga' => $harga,
            'jumlah_barang' => $jumlah_barang,
        );
    } else {
        // Ambil semua ID saja dari array session_cart
        $SESSION_CART_ID = array_column($_SESSION['cart'], 'id');
        // Kalo id nya gaada di array, masukin ke array
        if (!in_array($id, $SESSION_CART_ID)) {
            $_SESSION['cart'][] = array(
                'id' => $id,
                'nama' => $nama,
                'harga' => $harga,
                'jumlah_barang' => $jumlah_barang,
            );
        }

    }

}

// (Menghapus Item dari Cart)
if (isset($_GET["action"])) {
    if (isset($_GET['action']) == 'remove') {
        // Menangkap id dari url
        $id = $_GET["id"];
        // Loop array session_cart
        foreach ($_SESSION['cart'] as $key => $value) {
            // Jika value[id] == id di url
            if ($value['id'] == $id) {
                // Menghapus dgn cara unset key yg sesuai sama id
                unset($_SESSION['cart'][$key]);
                $success['delete'] = "Sucessfully Delete";
            }
        }
    }
}
