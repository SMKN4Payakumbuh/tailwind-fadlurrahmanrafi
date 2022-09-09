<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../../dist/output.css" rel="stylesheet">
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
                    <td><label for="namapeminjam" class="px-16 font-semibold text-base py-4">NAMA PEMINJAM </label</td>
                    <td><input class="bg-cyan-200 border border-b-black" name="namapeminjam" type="text"></td>
                </tr>
                <tr>
                    <td><label for="judulbuku" class="px-16 font-semibold text-base py-4">JUDUL BUKU </label</td>
                    <td><input class="bg-cyan-200 border border-b-black" name="judulbuku" type="text" ></td>
                </tr>
                <tr>
                    <td><label for="penulis" class="px-16 font-semibold text-base py-4">PENULIS</label</td>
                    <td><input class="bg-cyan-200 border border-b-black" name="penulis" type="text" ></td>
                </tr>
                <tr>
                    <td><label for="penerbit" class="px-16 font-semibold text-base py-4">PENERBIT </label</td>
                    <td><input class="bg-cyan-200 border border-b-black" name="penerbit" type="text" ></td>
                </tr>
                <tr>
                    <td><label for="tanggalpinjam" class="px-16 font-semibold text-base py-4">TANGGAL PINJAM</label</td>
                    <td><input class="bg-cyan-200 border border-b-black" name="tanggalpinjam" type="date" ></td>
                </tr>
                <tr>
                    <td><label for="tanggalkembali" class="px-16 font-semibold text-base py-4">TANGGAL KEMBALI</label</td>
                    <td><input class="bg-cyan-200 border border-b-black" name="tanggalkembali" type="date" ></td>
                </tr>
            </table>
            <div class="py-8">
                <input type="submit" value="simpan" class="text-xl border-2 border-green-500 px-6 py-3 hover:bg-green-500 hover:text-white rounded-full">
            </div>

            <?php
                include ("../../config/koneksi.php");

                if ($_POST) {
                    $sql = "INSERT INTO buku (judulbuku, penulis, penerbit) VALUES('{$_POST['judulbuku']}', '{$_POST['penulis']}', '{$_POST['penerbit']}')";
                    $query = mysqli_query($kon, $sql);

                    $sql = "SELECT max(idbuku) AS last_id from buku LIMIT 1";
                    $query = mysqli_query($kon, $sql);

                    $data = mysqli_fetch_array($query);
                    $last_id = $data['last_id'];
                    
                    $sql = "INSERT INTO peminjam (idbuku, namapeminjam, tanggalpinjam, tanggalkembali) VALUES ('$last_id','{$_POST['namapeminjam']}', '{$_POST['tanggalpinjam']}', '{$_POST['tanggalkembali']}')";
                    $query = mysqli_query($kon, $sql);

                    if ($query){
                        echo "DATA BERHASIL DI TAMBAHkAN";
                        header('Location: ../../index.php');
                    }else{
                        echo "DATA GAGAL DITAMBAHKAN".mysqli_error();
                    }

                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>