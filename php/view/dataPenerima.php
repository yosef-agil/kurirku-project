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
    <title>Dashboard | User</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap');
        *{
            margin:0;
            padding:0;
        }
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
            margin-left: 280px;
            padding:60px 40px;
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
    </style>
</head>
<body>
    <header>
        <div class="sidebar-menu">
            <!-- side bar menu -->
            <div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> 
            <a href="/" style="margin-left:16px;"  class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none fs-4"> 
                Kurir<span class="fs-4" style="color:#75CB79;">.ku</span> </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li> <a href="D_user.php" class="nav-link text-white">Dashboard</a> </li>
                    <li  class="nav-item"> <a href="kirim_barang.php" class="nav-link active"  aria-current="page">Kirim Barang</a> </li>
                    <li> <a href="cekTarif.php" class="nav-link text-white">Cek Tarif</a> </li>
                    <li> <a href="tracking.php" class="nav-link text-white">Tracking</a> </li>
                </ul>
                <hr>
                <div class="dropdown">
                    
                    <a style="font-size:14px;" href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> 
                        <img src="https://simg.nicepng.com/png/small/128-1280406_view-user-icon-png-user-circle-icon-png.png" alt="" width="28" height="28" class="rounded-circle me-2"> 
                        <?php echo  $_SESSION["user"]["nama"]; ?>
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
            <div class="col-6">
                <div class="kirimForm">
                    <h4>Isi data penerima barang</h4>
                    <p>
                        Lengkapi formulir ini untuk melakukan pengiriman barang
                    </p>
                    <br>
                    <form action="../control/penerima_controller.php" class="kirim row g-3" method="post">
                        <div class="col-md-6">
                            <label for="formGroupExampleInput" class="form-label">Nama penerima</label>
                            <input type="text" class="form-control form-control-sm" name="pn" id="formGroupExampleInput" placeholder="Tulis nama penerima">
                        </div>
                        <div class="col-md-6">
                            <label for="formGroupExampleInput" class="form-label">No. Ponsel</label>
                            <input type="text" class="form-control form-control-sm" name="np" id="formGroupExampleInput" placeholder="Tulis nomer ponsel">
                        </div>
                        <div class="col-md-8">
                            <label for="formGroupExampleInput" class="form-label">Kota/Kecamatan</label>
                            <input type="text" class="form-control form-control-sm" name="kc" id="formGroupExampleInput" placeholder="Tulis kota/kecamatan">
                        </div>
                        <div class="col-md-4">
                            <label for="formGroupExampleInput" class="form-label">Kode pos</label>
                            <input type="text" class="form-control form-control-sm" name="kp" id="formGroupExampleInput" placeholder="5 digit kode pos">
                        </div>
                        <div class="col-md-12">
                            <label for="formGroupExampleInput" class="form-label">alamat</label>
                            <input type="text" class="form-control form-control-sm" name="al" id="formGroupExampleInput" placeholder="Tulis nama jalan, nomor rumah, nomor kompleks, nama gedung,. etc">
                        </div>

                        <div class="col-md-12">
                        <br>
                        <input type="submit" class="btn btn-primary" name="register" value="Metode Pembayaran" style="width:50%;"><br><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
    

    <!-- Javascript Bootstrap -->
    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>