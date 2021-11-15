<?php

    require_once ("../connection/connect.php");

    if(isset($_POST['register'])){

        $nama = filter_input (INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
        $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
        $kode = filter_input(INPUT_POST, 'kode', FILTER_SANITIZE_STRING);
        $nomer = filter_input(INPUT_POST, 'nomer', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $passUsr = password_hash($_POST["passUsr"], PASSWORD_DEFAULT);

        //menyiapkan querry
        $sql = "INSERT INTO tb_signUp_usr (nama, alamat, kode, nomer, email, passUsr)
                VALUES (:nama, :alamat, :kode, :nomer, :email, :passUsr)";
        $stmt = $db->prepare($sql);

        $params = array(
            ":nama" => $nama,
            ":alamat" => $alamat,
            ":kode" => $kode,
            ":nomer" => $nomer,
            ":email" => $email,
            ":passUsr" => $passUsr,
        );

        //eksekusi untuk menyimpan ke database
        $saved = $stmt->execute($params);

        if($saved) header("Location: sign_in_user.php");
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

        <label class="lb" for="nama">Nama Lengkap</label><br>
        <input type="text" name="nama" id="nama" placeholder="Nama anda..."><br>

        <label class="lb" for="alamat">Alamat</label><br>
        <input type="text" name="alamat" id="alamat" placeholder="Alamat lengkap..."><br>

        <label class="lb" for="kode">Kode Post</label><br>
        <input type="text" name="kode" id="kode" placeholder="Kode post anda..."><br>
        
        <label class="lb" for="noTlpn">No Telepon</label><br>
        <input type="number" name="nomer" id="noTlpn" placeholder="Nomer ponsel..."><br>

        <label class="lb" for="email">Email</label><br>
        <input type="email" name="email" id="email" placeholder="Email anda..."><br>

        <label class="lb" for="pass">Password</label><br>
        <input type="password" name="passUsr" id="pass" placeholder="Input your password..."><br>
        
        <label class="lb" for="passConf">Confirmation Password</label><br>
        <input type="password" name="passUsrConf" id="passConf" placeholder="Confirmation your password..."><br><br>
        
        <input class="lb" type="checkbox" id="cek" name="cek1" value="agree">
        <label for="cek">Agrre <span>Privacy & Policy</span> and <span>Terms & Conditions</span></label><br>

        <input type="submit" class="btn-signUp" name="register" value="Daftar">

        <br>
        <a href="sign_in_user.php">Already have an account? Sign In</span></a>
    </form>
  </body>
</html>