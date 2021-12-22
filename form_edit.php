<?php
  // buka koneksi dengan MySQL
  include("connection.php");

  // cek apakah form telah di submit
  if (isset($_POST["submit"])) {
    // form telah disubmit, cek apakah berasal dari edit_produk.php
    // atau update data dari form_edit.php

    if ($_POST["submit"]=="Edit") {
        //nilai form berasal dari halaman edit_produk.php

        // ambil nilai sku
        $sku = htmlentities(strip_tags(trim($_POST["sku"])));
        // filter data
        $sku = mysqli_real_escape_string($link,$sku);

        // ambil semua data dari database untuk menjadi nilai awal form
        $query = "SELECT * FROM produk WHERE sku='$sku'";
        $result = mysqli_query($link, $query);

        if(!$result){
            die ("Query Error: ".mysqli_errno($link).
                " - ".mysqli_error($link));
        }

        // tidak perlu pakai perulangan while, karena hanya ada 1 record
        $data = mysqli_fetch_assoc($result);

        $nama_produk  = $data["nama_produk"];
        $keterangan   = $data["keterangan"];
        $harga        = $data["harga"];
        $jumlah       = $data["jumlah"];

        // bebaskan memory
        mysqli_free_result($result);
    } else if ($_POST["submit"]=="Update Data") {
        // nilai form berasal dari halaman form_edit.php
        // ambil semua nilai form
        $sku          = htmlentities(strip_tags(trim($_POST["sku"])));
        $nama_produk  = htmlentities(strip_tags(trim($_POST["nama_produk"])));
        $keterangan   = htmlentities(strip_tags(trim($_POST["keterangan"])));
        $harga        = htmlentities(strip_tags(trim($_POST["harga"])));
        $jumlah       = htmlentities(strip_tags(trim($_POST["jumlah"])));
    }
    
    // input data ke database
    if ($_POST["submit"]=="Update Data") {

        // buka koneksi dengan MySQL
        include("connection.php");
  
        // filter semua data
        $sku          = mysqli_real_escape_string($link,$sku);
        $nama_produk  = mysqli_real_escape_string($link,$nama_produk );
        $keterangan   = mysqli_real_escape_string($link,$keterangan);
        $harga        = mysqli_real_escape_string($link,$harga);
        $jumlah       = mysqli_real_escape_string($link,$jumlah);
  
        //buat dan jalankan query UPDATE
        $query  = "UPDATE produk SET ";
        $query .= "nama_produk = '$nama_produk', keterangan = '$keterangan', ";
        $query .= "harga = '$harga', jumlah='$jumlah' ";
        $query .= "WHERE sku = '$sku'";
  
        $result = mysqli_query($link, $query);
  
        //periksa hasil query
        if($result) {
        // INSERT berhasil, redirect ke tampil_produk.php
          header("Location: tampil_produk.php");
        }
        else {
        die ("Query gagal dijalankan: ".mysqli_errno($link).
             " - ".mysqli_error($link));
        }
      }
  } else {
    //   form diakses secara langsung!
    // redirect ke edit_produk.php
    header("Location: edit_produk.php");
  }
 
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Carty | Edit Produk</title>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("navbar.php"); ?>
    <div class="container mt-5">
        <h3 class="text-center mt-5">Tambah Produk</h3>
        <form id="form_produk" action="form_edit.php" method="post">
            <!-- Input -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input name="sku" type="text" class="form-control" placeholder="SKU Produk tidak bisa diubah di menu edit" id="id" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input name="nama_produk" type="text" class="form-control" placeholder="Nama Produk" value="<?=$nama_produk;?>" id="nama-produk">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <textarea name="keterangan" id="pesan" class="form-control" rows="7" placeholder="Keterangan produk lebih lanjut" value="<?=$keterangan;?>"></textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input name="harga" type="text" class="form-control" placeholder="Harga Produk (contoh: Rp. 15.000)" id="harga" value="<?=$harga;?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input name="jumlah" type="text" class="form-control" placeholder="Jumlah Produk" id="jumlah" value="<?=$jumlah;?>">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" value="Update Data" class="btn btn-primary" name="submit"><i class="fas fa-pen"></i> Edit Produk</button>
            <button type="reset" class="btn btn-danger"><i class="fas fa-redo-alt"></i> Reset Form</button>
        </form>
    </div>

    <!-- Footer Section -->
    <?php include("footer.php");?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php
  // tutup koneksi dengan database mysql
  mysqli_close($link);
?>
