<?php

    //hubungkan dengan file data.php
    include ("../model/data.php");
    require_once("../connection/auth2.php");

    //membuat objek untuk class
    $dt= new theData();
    $barang= $dt->data_penerima(
                    $_POST["pn"], 
                    $_POST["al"], 
                    $_POST["np"], 
                    $_POST["kp"], 
                    $_POST["kc"]);

    if($barang==true){
        header("Location: ../view/pembayaran.php");
    }
    else{
        header("Location: ../view/error.php");
    }

?>