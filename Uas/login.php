<?php

require 'php/function.php';

if( isset($_POST["login"])){
    $username = $_POST["user"];
    $password = $_POST["password"];

    $result=mysqli_query($conn,"SELECT*FROM user WHERE user = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1 ){

        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"])){
            header("location: admin.php");
            exit;

        }

    }
    $error = true;
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
<script src="js/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<body>


<?php if(isset($error)){
    echo "<script>
        alert('lol');
     </script>";

    }
?>

    <div class="login">
        <nav class="navlogin">
            <label for="" class="logo">Web Diary</label>
                <ul>    
                    <li><a href="index.php" >Home</a></li>
                    <li><a href="">Service</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="sign.php">Sign Up</a></li>
                    <li><a href="login.php"class="active">Log in</a></li>
                </ul>
        </nav>
        <div class="large o">
            <img src="css/image/vektor2.png" alt="" class="uu j">
        </div>
        <div class="large o">
            <form action="" method = "post" class="form">
                <h1 class="head">Log In</h1>
                <ul>
                    <li>
                    
                        <input type="text" name ="user" id="user" class="kp email">
                    </li> 
                    <li>
                   
                        <input type="password" name="password" id ="password" class="kp password">
                    </li>   
                    <li>
                        
                        <input type="checkbox" name="remember" id="remember" class="checkbox p">
                        <label for="remember" class="checkbox p">Remember me</label>
                    </li>
                    <li>
                        <button type="submit" name="login" class="submit" >log in</button>
                    </li>    
                </ul>
            </form>


            </div>
        </div>
    </div>
</body>

<script src="index.js"></script>
</html>