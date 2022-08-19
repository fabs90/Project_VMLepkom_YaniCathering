<?php
session_start();

// Kalo var session username blom di set, balik ke halaman landing page
if (!isset($_SESSION['username'])) {
    echo "<script type='text/javascript'> alert('Sorry, you don't have an access. Login First!'); document.location.href='index.html';</script>";
    exit();
}
