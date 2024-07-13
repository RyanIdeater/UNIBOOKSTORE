<?php
// Koneksi ke database
include_once("config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $id_penerbit = $_POST['id_penerbit'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telepon = $_POST['telepon'];

    $result = mysqli_query($mysqli, "UPDATE penerbit SET id_penerbit='$id_penerbit', nama='$nama', alamat='$alamat', kota='$kota', telepon='$telepon' WHERE id=$id");
    header("Location: index_penerbit.php");
}

$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM penerbit WHERE id=$id");
while ($penerbit_data = mysqli_fetch_array($result)) {
    $id_penerbit = $penerbit_data['id_penerbit'];
    $nama = $penerbit_data['nama'];
    $alamat = $penerbit_data['alamat'];
    $kota = $penerbit_data['kota'];
    $telepon = $penerbit_data['telepon'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penerbit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
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
        <br>
        <a href="index_penerbit.php" class="btn btn-dark">Kembali</a>
        <br><br>

        <form name="update_penerbit" method="post" action="edit_penerbit.php">
            <table>
                <tr>
                    <td>ID Penerbit</td>
                    <td><input type="text" name="id_penerbit" value="<?php echo $id_penerbit; ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td><input type="text" name="kota" value="<?php echo $kota; ?>"></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td><input type="text" name="telepon" value="<?php echo $telepon; ?>"></td>
                </tr>
            </table>
            <br>
            <input class="btn btn-dark" type="submit" name="update" value="Update">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        </form>
    </div>
</body>

</html>
