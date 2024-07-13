<?php
// file koneksi database
include_once("config.php");

// aambil id from Website to untuk menghapus user tersebut
$id = $_GET['id'];

// Menghapus user row dari table sesuai id yang diberi
$result = mysqli_query($mysqli, "DELETE FROM buku WHERE id=$id");

// Setelah dihapus langsung menampilkan halaman Home kembali dan menampilkan list yang telah diubah.
header("Location:index_buku.php");
