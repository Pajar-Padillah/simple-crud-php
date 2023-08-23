<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "pijarcamp");

$id = 0;
$nama_produk = "";
$keterangan = "";
$harga = 0;
$jumlah = 0;
$update = false;

if (isset($_POST['save'])) {
    $nama_produk = $_POST['nama_produk'];
    $keterangan = $_POST['keterangan'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($db, "INSERT INTO produk (nama_produk, keterangan, harga, jumlah) VALUES ('$nama_produk', '$keterangan', '$harga', '$jumlah')");
    $_SESSION['alert'] = "Data saved!";
    header("location: index.php");
}

if (isset($_POST['update'])) {
    $id = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $keterangan = $_POST['keterangan'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($db, "UPDATE produk SET nama_produk='$nama_produk', keterangan='$keterangan', harga='$harga', jumlah='$jumlah'  WHERE id_produk=$id");
    $_SESSION['alert'] = "Data updated!";
    header("location: index.php");
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];

    mysqli_query($db, "DELETE FROM produk WHERE id_produk=$id");
    $_SESSION['alert'] = "Data deleted!";
    header("location: index.php");
}
