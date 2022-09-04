<?php
require 'connection.php';
$errors = array();
$success = array();
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
        if ($username === $dbUsername && password_verify($password, $dbPass)) {
            // Set $_SESSION['username]
            $_SESSION['username'] = $username;

            // Heading ke halaman home
            header("Location:home.php");
        } else {
            echo "<script type='text/javascript'> alert('Wrong username/Password!'); document.location.href='login_form.php';</script>";
            exit();
        }
    } else {
        echo "<script type='text/javascript'> alert('Wrong username/Password!'); document.location.href='login_form.php';</script>";
        exit();
    }
}

// (Validasi Register)
if (isset($_POST['kirim_regist'])) {
    // Mengambil input data dari form regist
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Cek apakah sudah ada data yg sama dengan data yg diinput user
    $result = mysqli_query($conn, "SELECT * FROM login where username = '$username' and email = '$email'");

    // Cek ada berapa row yg affected
    $num_row = mysqli_num_rows($result);

    // Kalo tidak ada data yg sama
    if ($num_row == 0) {

        // Ubah password yg diinput user jadi hash
        $password = mysqli_real_escape_string($conn, password_hash($_POST["password"], PASSWORD_DEFAULT));

        // sql ambil semua data sesuai password
        $sql = mysqli_query($conn, "SELECT * FROM login where password = '$password'");

        // Cek apakah sudah ada data dgn password seperti yg di regist
        $num_row_pass = mysqli_num_rows($sql);

        // Jika tidak ada password yg sama baru insert data
        if ($num_row_pass == 0) {

            // Query sql insert ke db
            $sql = mysqli_query($conn, "INSERT INTO login(username, password, email) VALUES ('$username','$password', '$email')");

            if ($sql) {
                echo "<script type='text/javascript'> alert('Account Successfully created'); document.location.href='register.php';</script>";
                exit();
            } else {
                echo "<script type='text/javascript'> alert('Failed to create data'); document.location.href='register.php';</script>";
                exit();
            }
        } else {
            echo "<script type='text/javascript'> alert('Data already exist!'); document.location.href='register.php';</script>";
            exit();
        }

    } else {
        echo "<script type='text/javascript'> alert('Username/Email already exist!'); document.location.href='register.php';</script>";
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
            }
        }
    }
}

// (Validasi tombol checkout)
if (isset($_POST['checkout'])) {
    // Jika array session cart tdk kosong pindah halaman
    if ($_SESSION['cart']) {
        header("Location:checkout.php");
    } else {
        echo "<script type='text/javascript'> alert('Cart is empty!'); document.location.href='cart.php';</script>";
    }
}

// (Validasi Tombol Submit di halaman checkout)
// Cek apakah tombol checkout sudah di klik
if (isset($_POST['kirim_data'])) {
    // Ambil data dari input user sekalian anti sql injection
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nomor = $_POST['nomor'];
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $catatan = mysqli_real_escape_string($conn, $_POST['catatan']);
    $cara_bayar = mysqli_real_escape_string($conn, $_POST['bayar']);

    // Sql query
    $query = "INSERT INTO data_pembeli(nama, email, no_telepon, alamat, catatan, bayar) VALUES ('$nama','$email','$nomor','$alamat','$catatan','$cara_bayar')";

    $sql = mysqli_query($conn, $query);

    if ($sql) {
        $success['kirim'] = "Data Has Been Sent, We'll Contact You Further";
    } else {
        $errors['kirim'] = "Data Failed To Be Sent, Resend";
    }

}
