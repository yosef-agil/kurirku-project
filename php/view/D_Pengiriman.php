<?php

    //hubungkan dengan file data.php
    include ("../model/data.php");
    require_once("../connection/auth.php");

    //new Object
    $DT= new theData();
    $dataKirim= $DT->tampil_table();
    $no=1;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" />
    <title>Dashboard | Pengiriman</title>
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
            <a href="#" class="nav-link active">Dashboard</a>
            <a href="#" class="nav-link">Data Penerima</a>
            <a href="#" class="nav-link">Data Pengirim</a>
            <a href="#" class="nav-link">Report</a>
        </nav>
    </header>

    <main>
        <div class="userNav">
            <table class="usr">
                <tr>
                    <td><h3><?php echo  $_SESSION["user"]["f_name"]." ".$_SESSION["user"]["l_name"]." | " ?><a href="../connection/logout.php">Logout</a></h3></td>
                </tr>
            </table>
            <hr />
        </div>

        <div class="dataMenu">
            <table class="menu">
                <tr>
                    <td><h2>Data Pengiriman</h2></td>
                    <td>
                        <form action="#" method="post">
                            <input type="text" name="" id="theInput" onkeyup="searchFunction()" placeholder="Search here..." title="Type in a name">
                            <input type="submit" value="Search" class="srch">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <div class="listData">
            <table>
                <tr class="topHead">
                    <td>no</td>
                    <td>no resi</td>
                    <td>tgl kirim</td>
                    <td>tgl tiba</td>
                    <td>pengirim</td>
                    <td>penerima</td>
                    <td>id barang</td>
                    <td>id pembayaran</td>
                    <td>Action</td>
                </tr>
                <!-- ganti 'id_pengiriman' samaain sama nama variable yang ada di db -->
                <?php
                    foreach ($dataKirim as $key){
                        echo "<tr class='data-table'>
                              <td>".$no."</td>
                              <td>".$key['id_pengirim']."</td>
                              <td>".$key['tanggal_kirim']."</td>
                              <td>".$key['estimasi_terima']."</td>
                              <td>".$key['id_pengirim']."</td>
                              <td>".$key['id_penerima']."</td>
                              <td>".$key['id_barang']."</td>
                              <td>".$key['id_pembayaran']."</td>
                              <td><a href='#' class='action-btn1'>On Process</a><a href='#' class='action-btn'>Edit</a><a href='lihat_data.php' class='action-btn'>Lihat Data</a></td>";
                        $no++;
                    };
                ?>
            </table>
        </div>
    </main>
</body>
</html>