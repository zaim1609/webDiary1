<?php

require 'php/function.php';
$Diary = query("SELECT * FROM cerita order by id desc");



if(!isset($_GET["id"])){
    $Diary = query("SELECT * FROM cerita order by id desc");
    $ctr = query("SELECT * FROM cerita WHERE id = '1'")[0];

}else{
    $id = $_GET["id"];
    $ctr = query("SELECT * FROM cerita WHERE id = '$id'")[0];
}










// cek apakah tobol submit sudah di tekan atau belum
if (isset($_POST["tambah"])){
    

   

    //cek data berhasil input atau tidak
   if(tambah($_POST) > 0 ){
       echo " 
        <script>
            alert('data berhasi ditambahkan');
            document.location.href = 'admin.php';
        </script>
       ";
   }else{
       echo"
       <script>
       alert('data gagal ditambahkan');
       </script>
       ";
   }

}



if (isset($_POST["ubah"])){


//ambil data di URL
$id = $_GET["id"];

$ctr = query("SELECT * FROM cerita WHERE id = '$id'")[0];

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













?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="admin">
    <nav class="navlogin a">
        <label for="" class="logo">Web Diary</label>
            <ul>    
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="index.php">Service</a></li>
                <li><a href="index.php">About</a></li>
                <li><a href="sign.php">Sign Up</a></li>
                <li><a href="login.php">Log in</a></li>
            </ul>
    </nav>

<!-- table nambah  -->
<div class="side">
    <table border=1>
    
         <tr>
             <th class="title"><h3 class="uu l">Your Diary</h3></th>   
         </tr>
    
    <?php foreach( $Diary as $row) :?>
    <tr>
        <td><?=$row["judul"];?></td>
        <td>
            <a href="admin.php?id=<?= $row["id"];?>">ubah</a>
            <a href="hapus.php?id=<?= $row["id"];?>" onclick = "return confirm('yakin?');">hapus</a>
        </td>

    </tr>
    <?php endforeach; ?>
    
    </table>
</div>    

<!-- table nambah end -->

<!-- table data -->
<div class="kertas">

    <div class="xa">
            <div class="sapa">
                <h2 class="rasa font">What are you fell?</h2>
            </div>

            <form action="" method = "post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for = "id"> id: </label>
                <input type="text" name = "id" id = "id" value = <?= $ctr["id"];?>>
            </li>

           
            <div class="emote">
                <div class="ekspresi a">
                    <img src="css/image/seneng.png" alt="" class="qq">
                    <input type="radio" id="senang" name="ekspresi" value="senang" class="qq">
                </div>
                <div class="ekspresi b">
                    <img src="css/image/biasa.png" alt="" class="qq">
                    <input type="radio" id="biasa" name="ekspresi" value="biasa" class="qq">
                </div>
                <div class="ekspresi c">
                    <img src="css/image/nangis.png" alt="" class="qq">
                    <input type="radio" id="sedih" name="ekspresi" value="sedih" class="qq">
                </div>
                <div class="ekspresi d">
                    <img src="css/image/marah.png" alt="" class="qq">
                    <input type="radio" id="marah" name="ekspresi" value="marah" class="qq">
                </div>
            </div>
</div>
            <div class="xa">
                <input type="date" name = "tanggal" id = "tanggal" class="nb date" value = <?= $ctr["tanggal"];?>>
            </div>


            <div class="xa">
                <input type="text" name = "judul" id = "judul" class="nb date" required value = <?= $ctr["judul"];?>>
            </div>

            <div class="xa">
            <div class="emote o">
                <!-- <div class="ekspresi a"></div> -->
                 <button class="ekspresi a">
                     <img src="css/image/pdf.png" alt="">
                 </button>
                <!-- <div class="ekspresi b"></div> -->
                <button type = "submit" name="tambah" class="ekspresi b">
                    <img src="css/image/kl.png" alt="">
                </button>
                <!-- <div class="ekspresi c"></div> -->
                <button type = "submit" name="ubah" class="ekspresi c">
                    <img src="css/image/ll.png" alt="">
                </button>
                <!-- <div class="ekspresi d"></div> -->
                <button class="ekspresi d">
                    <img src="css/image/publish.png" alt="" width="30px">
                </button>
            </div>
        </div>
           
           
        <div class="asq">
            <textarea name="isi" id="isi" class="textarea"><?= $ctr["isi"];?></textarea>

        </div>
        <table class="gambart">
            <tr>
                <td>
                    <button class="tombol d">Uplode</button>
                </td>
            </tr>
        </table>
           
           

        

        </ul>
    </form>
    </div>
    </div>
<!-- table data end -->












 </div>
</body>
</html>