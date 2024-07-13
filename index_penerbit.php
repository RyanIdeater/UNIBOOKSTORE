<?php 
// Membuat database dengan menggunakan koneksi config php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM penerbit ORDER BY id DESC");
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
.center {
  margin: auto;
  width: 80%;
  padding: 10px;
}
</style>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Penerbit</title>
        </head>
        <body>
        <div class="center">
        
        <h4><b>Tabel Penerbit</h4></b><br />
        <table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID Penerbit</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Telepon</th>
            <th>Action</th>
        </tr>
</thead>
        <?php
         while ($data_penerbit = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" .$data_penerbit['id_penerbit'] . "</td>";
            echo "<td>" .$data_penerbit['nama'] . "</td>";
            echo "<td>" .$data_penerbit['alamat'] . "</td>";
            echo "<td>" .$data_penerbit['kota'] . "</td>";
            echo "<td>" .$data_penerbit['telepon'] . "</td>";

            echo "<td><a href='edit_penerbit.php?id=$data_penerbit[id]' class='btn btn-warning'>Edit</a> | <a href='delete_penerbit.php?id=$data_penerbit[id]' class='btn btn-danger'>Delete</a></td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="add_penerbit.php" class="btn btn-dark">Tambah Penerbit</a><br /><br />
    <a href="index.php" class="btn btn-dark">Kembali</a><br /><br />
</body>
<div class="center">
</html>