<?php
    //  22 12 2021
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "carty";
    // buat koneksi dengan database MySQL
    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$link) {
        die ("Koneksi dengan MySQL gagal: ".mysqli_connect_errno()." - ".mysqli_connect_error());
    }
?>
