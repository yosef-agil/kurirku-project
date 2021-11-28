<?php
    include ("../model/data.php");

    $dt=new theData();
    $hapus= $dt->delete_penerima($_GET['id_penerima']);

    if($hapus==true){
      header("Location: ../view/ADMIN_data_penerima.php");
    }
    else{
      header("Location: ../view/error.php");
    }
?>