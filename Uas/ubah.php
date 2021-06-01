
<?php
require 'php/function.php';


//ambil data di URL
$id = $_GET["id_dokter"];


//query data mahasiswa bedasarkan id

$dtr = query("SELECT * FROM dokter WHERE id_dokter = '$id'")[0];






// cek apakah tobol submit sudah di tekan atau belum
if (isset($_POST["submit"])){
    

   

    //cek data berhasil ubah atau tidak
   if(ubah($_POST) > 0 ){
       echo " 
        <script>
            alert('data berhasi diubah');
            document.location.href = 'admin.php';
        </script>
       ";
   }else{
       echo"
       <script>
       alert('data gagal diubah');
       document.location.href = 'admin.php';
       </script>
       ";
   }

}
