<?php
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

//ambil data dari tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
// if (!$result) {
//     echo mysqli_error($conn);
//     # code...
// }


//ambil data (fatch) mahasiswa daari object result
/*
mysqli_fetch_row()
$mhs = mysqli_fetch_row($result);
var_dump($mhs[1]);
*/

//mysqli_fetch_assoc()
// while( $mhs = mysqli_fetch_assoc($result) ) {
//     var_dump($mhs["gambar"]);
// }
//mysqli_fetch_array() | bisa numerik bisa assoc
// $mhs = mysqli_fetch_array($result);
// var_dump($mhs);


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
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr style="text-align: center;">
                <td> <?php echo $i ?></td>
                <td>
                    <a href="">Ubah</a>|
                    <a href="">Hapus</a>
                </td>
                <td><img src="img/<?php echo $row["gambar"]; ?>" width="60" alt=""></td>
                <td><?php echo $row["nrp"]; ?></td>
                <td><?php echo $row["nama"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["jurusan"]; ?></td>
            </tr>
            <?php $i++ ?>
        <?php endwhile; ?>



    </table>
</body>

</html>