<?php
// include database connection file
include_once("config.php");


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    
    $id_buku = $_POST['id_buku'];
    $kategori = $_POST['kategori'];
    $nama_buku = $_POST['nama_buku'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $penerbit = $_POST['penerbit'];


    $result = mysqli_query($mysqli, "UPDATE buku SET id_buku='$id_buku',kategori='$kategori',nama_buku='$nama_buku',harga='$harga',stok='$stok',penerbit='$penerbit' WHERE id=$id");

    header("Location: index_buku.php");
}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM buku WHERE id=$id");

while ($data_buku = mysqli_fetch_array($result)) {
    $id_buku = $data_buku['id_buku'];
    $kategori = $data_buku['kategori'];
    $nama_buku = $data_buku['nama_buku'];
    $harga = $data_buku['harga'];
    $stok = $data_buku['stok'];
    $penerbit = $data_buku['penerbit'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .center {
            margin: auto;
            width: 50%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .btn-dark {
            background-color: #343a40;
            color: #fff;
        }

        .btn-dark:hover {
            background-color: #23272b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td {
            padding: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #343a40;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #23272b;
        }
    </style>
</head>

<body>
    <div class="center">
        <a href="index_buku.php" class="btn btn-dark">Kembali</a>
        <br><br>

        <form name="update_penerbit" method="post" action="edit_buku.php">
            <table>
                <tr>
                    <td>Id Buku</td>
                    <td><input type="text" name="id_buku" value="<?php echo $id_buku; ?>"></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td><input type="text" name="kategori" value="<?php echo $kategori; ?>"></td>
                </tr>
                <tr>
                    <td>Nama Buku</td>
                    <td><input type="text" name="nama_buku" value="<?php echo $nama_buku; ?>"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" value="<?php echo $harga; ?>"></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="text" name="stok" value="<?php echo $stok; ?>"></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td><input type="text" name="penerbit" value="<?php echo $penerbit; ?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
                    <td><input class="btn btn-dark" type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>