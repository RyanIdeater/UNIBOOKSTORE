<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM buku ORDER BY id DESC");
?>

<html>

<head>
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
        <h4><b>Tabel Buku</b></h4>
        <br />

        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID Buku</th>
                    <th>Kategori</th>
                    <th>Nama Buku</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Penerbit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data_buku = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $data_buku['id_buku'] . "</td>";
                    echo "<td>" . $data_buku['kategori'] . "</td>";
                    echo "<td>" . $data_buku['nama_buku'] . "</td>";
                    echo "<td>" . $data_buku['harga'] . "</td>";
                    echo "<td>" . $data_buku['stok'] . "</td>";
                    echo "<td>" . $data_buku['penerbit'] . "</td>";

                    echo "<td>
                            <a href='edit_buku.php?id=$data_buku[id]' class='btn btn-warning'>Edit</a> 
                            <a href='delete_buku.php?id=$data_buku[id]' class='btn btn-danger'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <br />
        <a href="add_buku.php" class="btn btn-dark">Tambah Data Buku</a><br /><br />
        <a href="index.php" class="btn btn-dark">Kembali</a>
    </div>
</body>

</html>
