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

        if($saved) header("Location: sign_in.php");
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
      .sign-up-admin{
        background-color:#fff;
        padding:20px;
        border-radius:15px;
        box-shadow: 1px 5px 22px 0px rgba(58, 63, 78, 0);
      }
      .pass{
        padding-top:15px;
      }
    </style>
  </head>
  <body>

      <div class="container">
        <div class="row">
          <div class="col-4 position-absolute top-50 start-50 translate-middle">
            <div class="sign-up-admin">
              <form action="" class="user row g-3" method="post">
              <h4 style="text-align:center;">Sign Up - Admin</h4>

              <div class="col-md-6">
                <label for="formGroupExampleInput" class="form-label">First name</label>
                <input type="text" class="form-control" name="f_name" id="formGroupExampleInput" placeholder="first name..">
              </div>
              <div class="col-md-6">
                <label for="formGroupExampleInput" class="form-label">Last name</label>
                <input type="text" class="form-control" name="l_name" id="formGroupExampleInput" placeholder="last name..">
              </div>
              <div class="col-md-12">
                <label for="formGroupExampleInput" class="form-label">Email</label>
                <input type="email" class="form-control" name="mail" id="formGroupExampleInput" placeholder="Your email address..">
              </div>
              <div class="col-md-6">
                <label for="formGroupExampleInput" class="form-label">Passoword</label>
                <input type="password" class="form-control" name="pass" id="formGroupExampleInput" placeholder="Password..">
              </div>
              <div class="col-md-6">
                <label for="formGroupExampleInput2" class="form-label">Confirmation Password</label>
                <input type="password" class="form-control" name="passConf" id="formGroupExampleInput2" placeholder="Confirmation..">
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

                  <p style="text-align:center;">Don't have an account? <span><a href="sign_in.php" style="text-decoration:none; color:blue;">Sign In</a></span></p>
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