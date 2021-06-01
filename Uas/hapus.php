<?php

require 'php/function.php';

$id = $_GET["id"];

//  echo " 
//         <script>
//             alert('data berhasi dihapus');
//             document.location.href = 'pertemuan7,1.php';
//         </script>
//      ";


if(hapus($id) > 0){
   echo " 
       <script>
           alert('data berhasi dihapus');
           document.location.href = 'admin.php';
        </script>
      ";
}else{
   echo " 
    <script>
       alert('data gagal dihapus');
       document.location.href = 'admin.php';
    </script>
   ";
}

?>