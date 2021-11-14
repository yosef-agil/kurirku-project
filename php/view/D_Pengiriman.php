<?php

    //hubungkan dengan file data.php
    include ("../model/data.php");

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
        td{
            padding: 8px;
        }
        .action-btn{
            padding: 5px 25px;
            background-color: #33ADFF;
            color: #ffff;
            border-radius: 6px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    
    <header>
        <a href="#" class="brand">Kurir.<span>ku</span></a>
        <nav class="nav">
            <a href="#" class="nav-link">Dashboard</a>
            <a href="#" class="nav-link">Kirim Barang</a>
            <a href="#" class="nav-link">Cek Tarif</a>
            <a href="#" class="nav-link">Tracking</a>
            <a href="#" class="nav-link">Report</a>
        </nav>
    </header>

    <main>
        <div class="userNav">

        </div>
        <h4>Pengiriman hari ini</h4>
        <div class="dataMenu">
            <form action="#" method="post">
                <input type="text" id="theInput" onkeyup="searchFunction()" placeholder="Search here..." title="Type in a name">
            </form>
            <a href="#" class="btn-add">Add data</a>
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
                <?php
                    foreach ($dataKirim as $key){
                        echo "<tr class='data-table'>
                              <td>".$no."</td>
                              <td>".$key['id_pengiriman']."</td>
                              <td>".$key['tanggal_kirim']."</td>
                              <td>".$key['estimasi_terima']."</td>
                              <td>".$key['id_pengirim']."</td>
                              <td>".$key['id_penerima']."</td>
                              <td>".$key['id_barang']."</td>
                              <td>".$key['id_pembayaran']."</td>
                              <td><a href='#' class='action-btn'>Tracking</a></td>";
                        $no++;
                    };
                ?>
            </table>
        </div>
    </main>
</body>
</html>