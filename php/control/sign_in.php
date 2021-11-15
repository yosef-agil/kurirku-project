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
                header("Location: ../view/D_Pengiriman.php");
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
    <title>Sign In | Kurir.ku</title>
  </head>
  <body>
    <main>
      <div class="userLog">
        <form action="" class="user" method="post">
          <div class="log-in">
            <h2>Log In</h2>

            <div class="mail">
              <label class="lb" for="email">Email</label><br>
              <input type="email" class="form" id="email" name="email" value="" placeholder="Enter email address..."/>
            </div>
            <div class="pass">
              <label class="lb" for="pass">Password</label><br>
              <input type="password" class="form" id="pass" name="pass" value="" placeholder="Enter your password..."/>
            </div>

            <br />
            <input type="submit" name="login" value="Sign In">
            <a href="sign-up.html">Don't have an account?<span>Create One</span></a
            >
          </div>
        </form>
      </div>
    </main>
  </body>
</html>
