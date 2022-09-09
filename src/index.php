<?php
     include "config/koneksi.php";

     $sql = "SELECT * FROM buku INNER JOIN peminjam on buku.idbuku=peminjam.idbuku";
     $query = mysqli_query($kon, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <title>PERPUSTAKAAN</title>
</head>
<body class="bg-white flex justify-center items-center">
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="border-2 border-black max-w-4xl shadow-2xl text-base text-center text-black dark:text-black">
        <caption class="p-5 text-lg font-semibold text-center text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                DATA PUSTAKA
            <br>
            <button class="text-xs border-2 border-green-500 px-2 py-1 hover:bg-green-500 hover:text-white rounded-full flex justify-start items-start">
                <a href="public/buku/tambah.php">Tambah Data</a>
            </button>
            <form action="index.php" method="get">
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
    <div class="relative flex justify-end items-end">
        <input type="text" name="search" value="<?php if(isset($_GET['search'])) { echo $_GET['search']; } ?>" id="default-search" class="block p-4 pl-10 w-96 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required>
        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
    <?php
    if(isset($_GET['search']))
    {
        $filtervalues = $_GET['search'];
        $a = "SELECT * FROM buku WHERE CONCAT(judulbuku,penulis,penerbit) LIKE '%$filtervalues%' ";
        $query_run=mysqli_query($kon, $a);

        $furry = "SELECT * FROM peminjam WHERE CONCAT(namapeminjam,tanggalpinjam,tanggalkembali) LIKE '%$filtervalues%' ";
        $query_run=mysqli_query($kon, $a);

        if (mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $items)
            {
                ?>
                    <tr>
                    <td><?= $items['namapeminjam'] ?></td>
                    <td><?= $items['judulbuku'] ?></td>
                    <td><?= $items['penulis'] ?></td>
                    <td><?= $items['penerbit'] ?></td>
                    <td><?= $items['tanggalpinjam'] ?></td>
                    <td><?= $items['tanggalkembali'] ?></td>
                    </tr>   
                <?php
            }
        }
        else
        {
            ?>
            <tr>
                <td colspan="6">NO RECORD FOUND</td>
            </tr>
            <?php
        }
    }
    ?>
</form>
        </caption>
        <thead class="text-center text-slate-100 uppercase bg-black dark:bg-black dark:text-slate-100">
            <tr>
                <th scope="col" class="py-3 px-6">
                    NAMA PEMINJAM
                </th>
                <th scope="col" class="py-3 px-6">
                    JUDUL BUKU
                </th>
                <th scope="col" class="py-3 px-6">
                    PENULIS
                </th>
                <th scope="col" class="py-3 px-6">
                    PENERBIT
                </th>
                <th scope="col" class="py-3 px-6">
                    TANGGAL PINJAM
                </th>
                <th scope="col" class="py-3 px-6">
                    Tanggal KEMBALI
                </th>
                <th scope="col" class="py-3 px-6">
                    Aksi
                </th>
            </tr>
        </thead>
        <?php

            while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $data['namapeminjam']?></td>
                    <td><?php echo $data['judulbuku']?></td>
                    <td><?php echo $data['penulis']?></td>
                    <td><?php echo $data['penerbit']?></td>
                    <td><?php echo $data['tanggalpinjam']?></td>
                    <td><?php echo $data['tanggalkembali']?></td>
                    <td><a href="public/buku/edit.php?id=<?= $data['idbuku'] ?>">Edit</a> | <a href="public/buku/hapus.php?id=<?= $data['idbuku'] ?>">Hapus</a></td>
                </tr>
            <?php
            }
        ?>
    </table>
</body>
</html>