<?php

    //hubungkan dengan file data.php
    include ("../model/data.php");
    require_once("../connection/auth2.php");

    //membuat objek untuk class
    $dt= new theData();
    $barang= $dt->kirim_barang(
                    $_POST["namaBarang"], 
                    $_POST["jumlahBarang"], 
                    $_POST["beratBarang"], 
                    $_POST["ukuranBarang"], 
                    $_POST["jenisBarang"]);

    if($barang==true){
        header("Location: ../view/dataPenerima.php");
    }
    else{
        header("Location: ../view/error.php");
    }

?>