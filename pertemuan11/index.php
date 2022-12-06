<?php
require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>

<body>

    <h1 style="text-align: center;">Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data Mahasiswa</a>
    <br><br>


    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>


        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr style="text-align: center;">
                <td> <?php echo $i ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row ["id"];?>">Ubah</a>|
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?>" width="60" alt=""></td>
                <td><?php echo $row["nrp"]; ?></td>
                <td><?php echo $row["nama"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["jurusan"]; ?></td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>



    </table>
</body>

</html>