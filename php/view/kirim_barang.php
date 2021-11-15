<?php

    //hubungkan dengan file data.php
    include ("../model/data.php");
    require_once("../connection/auth2.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" />
    <title>Dashboard | User</title>
    <style>
        header {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
        }
        header a{
        padding: 6px 6px 45px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #ffffff;
        display: block;
        }
        header a span{
            color:#75CB79;
        }
        nav a {
        padding: 6px 6px 6px 32px;
        text-decoration: none;
        font-size: 18px;
        color: #818181;
        display: block;
        }
        main{
            margin-left:215px;
            margin-right: 15px;
        }
        main table{
            width: 100%;
        }
        .topHead{
            color:#959797;
        }
        .listData{
            margin-top:25px;
        }
        .data-table{
            background-color: #E9F3FA;
        }
        .listData td{
            padding: 8px;
        }
        .action-btn{
            padding: 5px 15px;
            margin-right:5px;
            background-color: #33ADFF;
            color: #ffff;
            border-radius: 6px;
        }
        .action-btn1{
            padding: 5px 15px;
            margin-right:5px;
            background-color: #50D890;
            color: #ffff;
            border-radius: 6px;
        }
        a{
            text-decoration: none;
        }
        .menu form{
            float: right;
        }
        .usr td{
            float: right;
        }
        .usr a{
            font-size:15px;
        }
        .active{
            color:#ffff;
        }
    </style>
</head>
<body>
    
    <header>
        <a href="#" class="brand">Kurir.<span>ku</span></a>
        <nav class="nav">
            <a href="../view/D_user.php" class="nav-link">Dashboard</a>
            <a href="../view/kirim_barang.php" class="nav-link active">Kirim Barang</a>
            <a href="#" class="nav-link">Cek Tarif</a>
            <a href="#" class="nav-link">Tracking</a>
        </nav>
    </header>

    <main>
        <div class="userNav">
            <table class="usr">
                <tr>
                    <td><h3><?php echo  $_SESSION["user"]["nama"]." | " ?><a href="../connection/logout2.php">Logout</a></h3></td>
                </tr>
            </table>
            <hr />
        </div>

        <div class="kirimForm">
            <h2>Isi data berikut ini</h2>
            <form action="../mode/dataPengiriman.php">

            </form>
        </div>
    </main>
</body>
</html>