<?php
include ("../../config/koneksi.php");

$id = $_GET['id'];

if ($id) {
    $sql = "DELETE FROM peminjam WHERE idbuku='{$id}'";
    $query = mysqli_query($kon, $sql);

    $sql = "DELETE FROM buku WHERE idbuku='{$id}'";
    $query = mysqli_query($kon, $sql);
}
header('Location:../../index.php');
exit;
?>