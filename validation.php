<?php
require 'connection.php';
session_start();

// (Klik Pesan dari halaman Landing Page)
// Jika tombol kirim awal di klik
if (isset($_POST['kirim_awal'])) {
    // Pindah ke halaman home
    header("Location:home.php");
}
