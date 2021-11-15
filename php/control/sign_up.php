<?php

    require_once ("../connection/connect.php");

    if(isset($_POST['register'])){

        $f_name = filter_input (INPUT_POST, 'f_name', FILTER_SANITIZE_STRING);
        $l_name = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);

        //menyiapkan querry
        $sql = "INSERT INTO tb_signUp (f_name, l_name, email, pass)
                VALUES (:f_name, :l_name, :email, :pass)";
        $stmt = $db->prepare($sql);

        $params = array(
            ":f_name" => $f_name,
            ":l_name" => $l_name,
            ":email" => $email,
            ":pass" => $pass
        );

        //eksekusi untuk menyimpan ke database
        $saved = $stmt->execute($params);

        if($saved) header("Location: ../view/D_Pengiriman.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css">
    <title>Sign Up | Kurir.ku</title>
  </head>
  <body>
    <h2>Sign Up</h2>
    <form action="" method="post">

        <label class="lb" for="fname">First name</label><br>
        <input type="text" name="f_name" id="fname" placeholder="Your first name..."><br>

        <label class="lb" for="lname">Last name</label><br>
        <input type="text" name="l_name" id="lname" placeholder="Your last name..."><br>

        <label class="lb" for="mail">Email</label><br>
        <input type="email" name="email" id="mail" placeholder="Input your email..."><br>

        <label class="lb" for="pass">Password</label><br>
        <input type="password" name="pass" id="pass" placeholder="Input your password..."><br>
        
        <label class="lb" for="passConf">Confirmation Password</label><br>
        <input type="password" name="passConf" id="passConf" placeholder="Confirmation your password..."><br>
        
        <input class="lb" type="checkbox" id="cek" name="cek1" value="agree">
        <label for="cek">Agrre <span>Privacy & Policy</span> and <span>Terms & Conditions</span></label><br>

        <input type="submit" class="btn-signUp" name="register" value="Sign Up">
    </form>
  </body>
</html>