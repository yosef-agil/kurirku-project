<?php

    require_once ("../connection/connect.php");

    if(isset($_POST['register'])){
        $f_name = filter_input (INPUT_POST, 'f_name', FILTER_SANITIZE_STRING);
        $l_name = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
        $mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
        $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);


        //menyiapkan querry
        $sql = "INSERT INTO tb_daftar (f_name, l_name, email, pass)
                VALUES (:f_name, :l_name, :mail, :pass)";
        $stmt = $db->prepare($sql);

        $params = array(
            ":f_name" != $f_name,
            ":l_name" != $l_name,
            ":email" != $mail,
            ":pass" != $pass
        );

        //eksekusi untuk menyimpan ke database
        $saved = $stmt->execute($params);

        if($saved) header("Location: ../view/data.php");
    }

?>