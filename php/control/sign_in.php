<?php

    require_once ("../connection/connect.php");

    if(isset($_POST['login'])){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);

        $sql = "SELECT * FROM tb_signUp WHERE email=:email";
        $stmt = $db->prepare($sql);

        //bind parameter ke query
        $params = array(
            ":email" => $email,
        );

        $stmt->execute($params);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //jika user terdaftar
        if($user){
            //verifikasi password
            if(password_verify($pass, $user["pass"])){
                //buat session
                session_start();
                $_SESSION["user"] = $user;

                //login sukses, alihkan ke halaman home
                header("Location: ../view/D_admin.php");
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign In | Kurir.ku</title>
    <style>
      body{
        background-color:#E9F3FA;
      }
      .log-admin{
        background-color:#fff;
        padding:40px;
        border-radius:15px;
        box-shadow: 1px 5px 22px 0px rgba(58, 63, 78, 0);
      }
      .pass{
        padding-top:15px;
      }
    </style>
  </head>
  <body>
    <main>

      <div class="container">
        <div class="row">
          <div class="col-4 position-absolute top-50 start-50 translate-middle">
            <div class="log-admin">
              <form action="" class="user" method="post">
              <h3 style="text-align:center;">Log In - Admin</h3><br>
              <hr>
              <div class="col-md-12">
                <label for="formGroupExampleInput" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="formGroupExampleInput" placeholder="Your email address..">
              </div>
              <div class="pass col-md-12">
                <label for="formGroupExampleInput2" class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" id="formGroupExampleInput2" placeholder="Input your password..">
              </div>
              <br>
              <input type="submit" class="btn btn-primary" name="login" style="width:100%;" value="Sign In"><br><br>

              <p style="text-align:center;">Don't have an account? <span><a href="sign_up.php" style="text-decoration:none; color:blue;">Sign Up</a></span></p>
              </form>
            </div>
          </div>
        </div>
      </div>

    </main>

    <!-- Javascript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>
