<?php
require 'connection.php';
session_start();
$errors = array();

// (Klik Pesan dari halaman Landing Page)
// Jika tombol kirim awal di klik
if (isset($_POST['kirim_awal'])) {
    // Pindah ke halaman home
    header("Location:home.php");
}

// Validasi Login
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

// Validasi
