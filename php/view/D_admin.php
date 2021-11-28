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
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard | Admin</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap');
        body {
            background-color: #eee;
            font-family: 'Inter', sans-serif;
        }
        header{
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            overflow-x: hidden;
        }
        main{
            margin-left: 260px;
            padding:30px 30px;
        }
        .nav-link:hover {
            background-color: #525252 !important
        }

        .nav-link .fa {
            transition: all 1s
        }

        .nav-link:hover .fa {
            transform: rotate(360deg)
        }
        td{
            font-size:14px;
        }
    </style>
</head>
<body>
    
    <header>
        <div class="sidebar-menu">
            <!-- side bar menu -->
            <div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> 
            <a href="/" style="margin-left:16px;" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none fs-4"> 
                Kurir<span class="fs-4" style="color:#75CB79;">.ku</span> </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item"> <a href="#" class="nav-link active" aria-current="page">Dashboard</a> </li>
                    <li> <a href="ADMIN_data_penerima.php" class="nav-link text-white">Data Penerima</a> </li>
                    <li> <a href="ADMIN_data_pengirim.php" class="nav-link text-white">Data Pengirim</a> </li>
                    <li> <a href="#" class="nav-link text-white">Report</a> </li>
                </ul>
                <hr>
                <div class="dropdown">

                    <a style="font-size:14px;" href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> 
                        <img src="https://simg.nicepng.com/png/small/128-1280406_view-user-icon-png-user-circle-icon-png.png" alt="" width="28" height="28" class="rounded-circle me-2"> 
                        <?php echo  $_SESSION["user"]["f_name"]." ".$_SESSION["user"]["l_name"]; ?>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../connection/logout2.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

        <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>Data Pengiriman</h4>
                </div>
                <div class="col-md-6">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Cari berdasarkan nomer resi" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <hr style="margin-top:25px;">
            </div>
            
            <div class="col-md-12">
                <div class="table-responsive-sm">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
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
                        </thead>
                        <tbody>
                        <?php
                            foreach ($dataKirim as $key){
                            echo "<tr class='data-table'>
                                <td>".$no."</td>
                                <td>".$key['no_resi']."</td>
                                <td>".$key['tanggal_kirim']."</td>
                                <td>".$key['estimasi_terima']."</td>
                                <td>".$key['id_pengirim']."</td>
                                <td>".$key['id_barang']."</td>
                                <td>".$key['id_penerima']."</td>
                                <td>".$key['id_pembayaran']."</td>
                                <td><a href='#' class='btn btn-success btn-sm'>On Process</a>
                                    <a href='#' class='btn btn-primary btn-sm'>Lihat Data</a>
                                    <a href='lihat_data.php' class='btn btn-secondary btn-sm'>Edit Data</a></td>";
                            $no++;
                            };
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </main>


    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>