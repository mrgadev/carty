<?php
  // buat koneksi dengan MySQL
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $link = mysqli_connect($dbhost, $dbuser, $dbpass);

  // periksa koneksi, tampilkan error jika gagal
  if(!$link) {
    die ("Koneksi dengan database gagal: ".mysqli_connect_errno()." - ".mysqli_connect_error());
  }

  // buat database carty jika belum ada
  $query = "CREATE DATABASE IF NOT EXISTS carty";
  $result = mysqli_query($link, $query);
  
  if(!$result) {
    die ("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
  } else {
    echo "Database <b>'carty'</b> berhasil dibuat... <br>";
  }

  // pilih database carty
  $result = mysqli_select_db($link, "carty");

  if(!$result) {
    die ("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
  } else {
    echo "Database <b>'carty'</b> berhasil dipilih... <br>";
  }

  // cek apakah tabel produk sudah ada. jika iya, hapus tabel
  $query = "DROP TABLE IF EXISTS produk";
  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query) {
    die ("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
  } else {
    echo "Tabel <b>'produk'</b> berhasil dihapus... <br>";
  }

  // buat query untuk CREATE tabel produk
  $query = "CREATE TABLE produk (sku CHAR(4), nama_produk VARCHAR(100), keterangan VARCHAR(200), harga CHAR(25), jumlah CHAR(25), PRIMARY KEY (sku))";
  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query) {
    die ("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
  } else {
    echo "Tabel <b>'produk'</b> berhasil dibuat... <br>";
  }

  //   buat query untuk INSERT ke tabel produk
  $query = "INSERT INTO produk VALUES ('0001', 'Ustraa Face Wash', 'Face wash yang bebas dari SLS dan paraben', 'Rp. 69.000	', '200'), ";
  $query .= "('0002', 'Ustraa Face Scrub', 'Face scrub yang berguna untuk mengeksfoliasi wajah', 'Rp. 99.000', '150'), ";
  $query .= "('0003', 'Kahf Oily', 'Face wash untuk tipe wajah berminyak', 'Rp. 29.000', '375'), ";
  $query .= "('0004', 'Kahf Sun Screen', 'Membantu melindungi wajah dari radiasi sinar UV	', 'Rp. 49.000', '215'), ";
  $query .= "('0005', 'De-Tan Cream	', 'Membantu mengembalikan warna kulit ke warna aslinya	', 'Rp. 99.000', '200')";
  
  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query) {
    die ("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
  } else {
    echo "Tabel <b>'produk'</b> berhasil diisi... <br>";
  }
?>
