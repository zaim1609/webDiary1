<?php
require 'php/function.php';

if( isset($_POST["login"])){
    if(registrasi($_POST) > 0){
        echo"<script>
                alert('user baru berhasil di tambahkkan');
                document.location.href = 'admin.php';
            </script>";
    }
    else
    {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="sign">
        <nav class="navlogin">
            <label for="" class="logo">Web Diary</label>
                <ul>    
                    <li><a href="index.php" >Home</a></li>
                    <li><a href="">Service</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="sign.php" class="active">Sign Up</a></li>
                    <li><a href="login.php">Log in</a></li>
                </ul>
        </nav>
        <div class="large o">
            <form action="" method = "post" class="form">
                <h1 class="head">Sign Up</h1>
                <ul>
                    <li>
                    
                        <input type="text" name ="user" id="user" class="nb username">
                    </li> 
                    <li>
                    
                        <input type="password" name ="password" id="password" class="nb email">
                    </li> 
                    <li>
                   
                        <input type="password" name="password2" id ="password2" class="nb password">
                    </li> 
                      
                    <li>
                        
                        <input type="checkbox" name="remember" id="remember" class="checkbox p">
                        <label for="remember" class="checkbox p">Remember me</label>
                    </li>
                    <li>
                        <button type="submit" name="login" class="submit">log in</button>
                    </li>    
                </ul>
            </form>
        </div>
        <div class="large o">
           
            <img src="css/image/signupo.png" alt="" class="uu k">

            </div>
        </div>
    </div>
</body>
</html>