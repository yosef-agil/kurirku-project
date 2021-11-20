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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign Up | Kurir.ku</title>

    <style>
      body{
        background-color:#E9F3FA;
      }
      .sign-up-user{
        background-color:#fff;
        padding:18px;
        border-radius:15px;
        box-shadow: 1px 5px 22px 0px rgba(58, 63, 78, 0);
      }
    </style>
  </head>
  <body>

      <div class="container">
        <div class="row">
          <div class="col-4 position-absolute top-50 start-50 translate-middle">
            <div class="sign-up-user">
              <form action="" class="user row g-3" method="post">
              <h4>Sign Up - Customer</h4>

              <div class="col-md-12">
                <label for="formGroupExampleInput" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" id="formGroupExampleInput" placeholder="Your email address..">
              </div>
              <div class="col-md-6">
                <label for="formGroupExampleInput" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="formGroupExampleInput" placeholder="Your email address..">
              </div>
              <div class="col-md-6">
                <label for="formGroupExampleInput" class="form-label">Kode Post</label>
                <input type="text" class="form-control" name="kode" id="formGroupExampleInput" placeholder="Your email address..">
              </div>
              <div class="col-md-6">
                <label for="formGroupExampleInput" class="form-label">No Telepon</label>
                <input type="number" class="form-control" name="nomer" id="formGroupExampleInput" placeholder="Your email address..">
              </div>
              <div class="col-md-6">
                <label for="formGroupExampleInput" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="formGroupExampleInput" placeholder="Your email address..">
              </div>
              <div class="col-md-6">
                <label for="formGroupExampleInput" class="form-label">Passoword</label>
                <input type="password" class="form-control" name="passUsr" id="formGroupExampleInput" placeholder="Your email address..">
              </div>
              <div class="col-md-6">
                <label for="formGroupExampleInput2" class="form-label">Confirmation Password</label>
                <input type="password" class="form-control" name="passUsrConf" id="formGroupExampleInput2" placeholder="Input your password..">
              </div>

              <div class="col-md-12">
                <br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                      Agrre <span>Privacy & Policy</span> and <span>Terms & Conditions</span>
                    </label>
                  </div><br>

                  <input type="submit" class="btn btn-primary" name="register" value="Sign Up" style="width:100%;"><br><br>

                  <p style="text-align:center;">Don't have an account? <span><a href="sign_in_user.php" style="text-decoration:none; color:blue;">Sign In</a></span></p>
              </div>

              </form>
            </div>
          </div>
        </div>
      </div>

    <!-- Javascript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>