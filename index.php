<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM buku ORDER BY id ASC");
$result2 = mysqli_query($mysqli, "SELECT * FROM penerbit ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>HOME</title>
    <style>
.center {
  margin: auto;
  width: 80%;
  padding: 10px;
}
</style>
</head>

<body>
  <div class="center">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="center">
  <center>
  <h1 style="color:white;">Unibookstore</h1>
  </center>
  <div class="container-fluid">
    
   
    <div class="collapse navbar-collapse" id="navbarNav">
    <a class="navbar-brand" href="index.php">HOME</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="index_buku.php">BUKU</a></li>
            <li><a class="dropdown-item" href="index_penerbit.php">PENERBIT</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pengadaan.php">Pengadaan</a>
        </li>
      
    </div>
    <form method="GET" action="index.php" style="text-align: right;">
        <label style="color:white;">Kata Pencarian : </label>
        <input type="text" name="kata_cari" value="<?php if (isset($_GET['kata_cari'])) {
                                                        echo $_GET['kata_cari'];
                                                       
                                                      
                                                       } ?>" />
        <button type="submit" class="btn btn-light">Cari</button>
    </form>
  </div>
  
</nav>
<br />


    <center>
    <h4><b>DAFTAR BUKU</h4></b><br /></center>

    <table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID Buku</th>
            <th>Kategori</th>
            <th>Nama Buku</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Penerbit</th>
        </tr>
        </thead>
        <?php
        include('config.php');
        if (isset($_GET['kata_cari'])) {
            //mengambil variabel kata_cari dari form pencarian
            $kata_cari = $_GET['kata_cari'];

            //jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
            //jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
            $query = "SELECT * FROM buku WHERE nama_buku like '%" . $kata_cari . "%' ORDER BY id ASC";
        } else {
            //jika tidak ada pencarian, default yang dijalankan query ini
            $query = "SELECT * FROM buku ORDER BY id ASC";
        }

        $result = mysqli_query($mysqli, $query,); // untuk menampilkan hasil

        while ($data_buku = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $data_buku['id_buku'] . "</td>";
            echo "<td>" . $data_buku['kategori'] . "</td>";
            echo "<td>" . $data_buku['nama_buku'] . "</td>";
            echo "<td>" . $data_buku['harga'] . "</td>";
            echo "<td>" . $data_buku['stok'] . "</td>";
            echo "<td>" . $data_buku['penerbit'] . "</td>";
        }
        ?>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      </div>
</body>

</html>