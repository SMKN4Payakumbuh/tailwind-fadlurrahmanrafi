<?php
include ("../../config/koneksi.php");

$id = $_GET['id'];
$sql = "SELECT * FROM buku INNER JOIN peminjam on buku.idbuku=peminjam.idbuku where buku.idbuku='$id'";
$query = mysqli_query($kon, $sql);
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../dist/output.css" rel="stylesheet">
    <title>EDIT</title>
</head>
<body>
    <div class="bg-cyan-200 h-[75vh] w-[45vw] mx-96 my-24 rounded-3xl shadow-2xl shadow-cyan-400">
        <div class="text-center text-xl font-bold py-8">
            <div>TAMBAH DATA</div>
            <div class="px-4 py-6"><button class="text-xs border-2 border-green-500 px-2 py-1 hover:bg-green-500 hover:text-white rounded-full flex justify-start items-start">
                <a href="../../index.php">HOME</a></button></div>
            <table>
                <form action="" method="POST"> 
                <tr>
                    <input type="hidden" name="id" value="<?= $data['idbuku'] ?>">
                    <td><label for="namapeminjam" class="px-16 font-semibold text-base py-4">NAMA PEMINJAM </label</td>
                    <td><input class="bg-cyan-200 border border-b-black" name="namapeminjam" type="text" value="<?= $data['namapeminjam'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="judulbuku" class="px-16 font-semibold text-base py-4">JUDUL BUKU </label</td>
                    <td><input class="bg-cyan-200 border border-b-black" name="judulbuku" type="text" value="<?= $data['judulbuku'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="penulis" class="px-16 font-semibold text-base py-4">PENULIS</label</td>
                    <td><input class="bg-cyan-200 border border-b-black" name="penulis" type="text" value="<?= $data['penulis'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="penerbit" class="px-16 font-semibold text-base py-4">PENERBIT </label</td>
                    <td><input class="bg-cyan-200 border border-b-black" name="penerbit" type="text" value="<?= $data['penerbit'] ?>" ></td>
                </tr>
                <tr>
                    <td><label for="tanggalpinjam" class="px-16 font-semibold text-base py-4">TANGGAL PINJAM</label</td>
                    <td><input class="bg-cyan-200 border border-b-black" name="tanggalpinjam" type="date" value="<?= $data['tanggalpinjam'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="tanggalkembali" class="px-16 font-semibold text-base py-4">TANGGAL KEMBALI</label</td>
                    <td><input class="bg-cyan-200 border border-b-black" name="tanggalkembali" type="date" value="<?= $data['tanggalkembali'] ?>"></td>
                </tr>
            </table>
            <div class="py-8">
                <input type="submit" value="simpan" class="text-xl border-2 border-green-500 px-6 py-3 hover:bg-green-500 hover:text-white rounded-full">
            </div>
            </form>
            <?php
            if ($_POST) {
                $sql = "UPDATE buku SET judulbuku='{$_POST['judulbuku']}', penulis='{$_POST['penulis']}', penerbit='{$_POST['penerbit']}' WHERE idbuku='{$_POST['id']}'";
                $query = mysqli_query($kon, $sql);

                $sql = "UPDATE peminjam SET namapeminjam='{$_POST['namapeminjam']}', tanggalpinjam='{$_POST['tanggalpinjam']}', tanggalkembali='{$_POST['tanggalkembali']}' WHERE idbuku='{$_POST['id']}'";

                $query = mysqli_query($kon, $sql);
                if ($query){
                    echo "DATA BERHASIL DI TAMBAHkAN";
                    header('Location: ../../index.php');
                }else{
                    echo "DATA GAGAL DITAMBAHKAN".mysqli_error();
                }
            }
            ?>
        </div>
    </div>
</body>
</html>