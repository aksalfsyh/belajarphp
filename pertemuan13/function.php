<?php 
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows =[];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    // ambil data dari tiap elemen
    $nama       = htmlspecialchars($data["nama"]);
    $nrp        = htmlspecialchars($data["nrp"]);
    $email      = htmlspecialchars($data["email"]);
    $jurusan    = htmlspecialchars($data["jurusan"]);
    // $gambar     = htmlspecialchars($data["gambar"]);
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    //query insert data
    $query = "INSERT INTO mahasiswa (nama, nrp, email, jurusan, gambar)
    VALUES ('$nama','$nrp','$email','$jurusan','$gambar')";
    
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    if ($error ===4 ){
        echo "
        <script>
        alert('pilih gambar terlebih dahulu');
        </script>
        ";
        return false;
    }

    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar= explode('.', $namafile);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $id         = $data["id"];
    $nama       = htmlspecialchars($data["nama"]);
    $nrp        = htmlspecialchars($data["nrp"]);
    $email      = htmlspecialchars($data["email"]);
    $jurusan    = htmlspecialchars($data["jurusan"]);
    $gambar     = htmlspecialchars($data["gambar"]);

    //query update data
    $query = "UPDATE mahasiswa SET
                nrp = '$nrp',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id =$id
                ";
    
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM mahasiswa
     WHERE 
     nama LIKE '$keyword%' OR
     nrp LIKE '%$keyword%' OR
     email LIKE '%$keyword%' OR
     jurusan LIKE '%$keyword%'
     ";

     return query($query);

}











?>