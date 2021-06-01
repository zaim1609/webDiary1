<?php
//koneksi database 
$conn = mysqli_connect("localhost","root","","diary");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    //ambil data
$id_diary = $data["id"];
$judul = $data["judul"];
$ekspresi = $data["ekspresi"];
$tanggal = $data["tanggal"];
$isi = $data["isi"];
$gambar = null;

//query insert data
$query = "INSERT INTO cerita VALUES
('$id_diary','$judul','$ekspresi','$tanggal','$isi','$gambar')
";
mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}



function ubah($data){
    global $conn;
        //ambil data dari form
    $id = htmlspecialchars($data["id"]) ;
    $judul = htmlspecialchars($data["judul"]) ;
    $ekspresi = htmlspecialchars($data["ekspresi"]) ;
    $tanggal = ($data["tanggal"]) ;
    $isi = htmlspecialchars($data["isi"]) ;
    $gambar = null;
    

    //cek user pilih gambar baru ato kgk
    // if($_FILES['gambar']['error'] === 4){
    // $gambar = $gambarLama ;
    // } else {
    //     $gambar = uplode();
    // }


     //query insert data
     $query = "UPDATE cerita SET
       id = '$id',
        judul = '$judul',
        ekspresi = '$ekspresi',
        tanggal = '$tanggal',
        isi = '$isi',
        gambar='$gambar'
        WHERE id = '$id'
     ";
     mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
    }

    function hapus($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM cerita WHERE id = '$id'");
        return mysqli_affected_rows($conn);
    }

    
function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["user"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);



    //cek username udah ad ato belom
      $result = mysqli_query($conn,"SELECT user FROM user WHERE user = '$username'");
      if( mysqli_fetch_assoc($result)){
        echo"<script>
        alert('konfirmasi gagal');
            </script>";
        return false;
      }

//cek konfirmasi password
    if( $password !== $password2){
        echo"<script>
                 alert('konfirmasi gagal');
            </script>";
        return false;
    }
    //enkripsi password
    $password = password_hash($password,PASSWORD_DEFAULT);

    //tambahkan user baru ke database
    mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password')");
    return mysqli_affected_rows($conn);


}