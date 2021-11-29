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
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard | User</title>
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
        .hasil{
            margin-top:15px;
            padding: 25px;
            border-radius:15px;
            background-color:white;
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
                    <li> <a href="D_user.php" class="nav-link text-white">Dashboard</a> </li>
                    <li> <a href="kirim_barang.php" class="nav-link text-white" >Kirim Barang</a> </li>
                    <li class="nav-item"> <a href="cekTarif.php" class="nav-link active"  aria-current="page">Cek Tarif</a> </li>
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
                <div class="col-md-6">
                    <h4>Cek Ongkos Kirim</h4>
                </div>
                <hr style="margin-top:25px;">
            </div>
            <div class="col-md-12">
                <form action="" method="post" class="kirim row g-3">
                    <div class="col-md-4">
                        <label for="formGroupExampleInput" class="form-label">Origin Shipment</label>
                        <input type="text" class="form-control form-control-sm" name="asal[]" id="formGroupExampleInput" placeholder="Origin">
                    </div>
                    <div class="col-md-4">
                        <label for="formGroupExampleInput" class="form-label">Destination Shipment</label>
                        <input type="text" class="form-control form-control-sm" name="tujuan[]" id="formGroupExampleInput" placeholder="Destination">
                    </div>
                    <div class="col-md-4">
                        <label for="formGroupExampleInput" class="form-label">Berat barang (gram)</label>
                        <input type="number" class="form-control form-control-sm" name="berat[]" id="formGroupExampleInput" placeholder="eg. 100">
                    </div>
                    <hr style="margin-top:25px;">
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-primary" name="cek" value="Cek Tarif" style="width:100%;"><br><br>
                    </div>
                </form>
            </div>
        </div>
                <!-- foreach($asal1 as $key => $val){
                    echo "Asal Kota = ".$asal1[$key]."<br>";
                    echo "Tujuan Kota = ".$tujuan1[$key]."<br>";
                    echo "Berat barang = ".$berat1[$key]."<br>";
                }
                if($berat1<=200){
                    echo "10.000";
                }else if($berat1 > 200){
                    echo "15.000";
                }else{
                    echo "20.000";
                }
            } -->
        <div class="col-md-12">
            <div class="hasil">
                <div class="table-responsive-sm">
                    <h5>Harga Tarif</h5>
                    <hr style="margin-top:25px;">
                    <table class="table table-hover">
                        <tbody>
                            <?php
                            if (isset($_POST['cek'])){

                            $asal = $_POST['asal'];
                            $tujuan = $_POST['tujuan'];
                            $berat = $_POST['berat'];
                                foreach($asal as $key => $val){
                                    echo "<tr>";
                                    echo "<td>Origin Shipment</td>";
                                    echo "<td>".$asal[$key]."</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<td>Destination Shipment</td>";
                                    echo "<td>".$tujuan[$key]."</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<td>Berat Barang</td>";
                                    echo "<td>".$berat[$key]." Gram </td>";
                                    echo "</tr>";
                                };
                            if($berat <= 200){
                                    echo "<tr>";
                                    echo "<td>Harga Tarif</td>";
                                    echo "<td>Rp 12.000</td>";
                                    echo "</tr>";
                            }else if($berat > 200 && $berat <= 1000){
                                    echo "<tr>";
                                    echo "<td>Harga Tarif</td>";
                                    echo "<td>Rp 16.000</td>";
                                    echo "</tr>";                                
                            }else if($berat > 1000 && $berat <= 2500){
                                    echo "<tr>";
                                    echo "<td>Harga Tarif</td>";
                                    echo "<td>Rp 20.000</td>";
                                    echo "</tr>";                                
                            }else if($berat > 5000 && $berat <= 10000){
                                    echo "<tr>";
                                    echo "<td>Harga Tarif</td>";
                                    echo "<td>Rp 24.000</td>";
                                    echo "</tr>";                                
                            }else if($berat > 10000 && $berat <= 15000){
                                    echo "<tr>";
                                    echo "<td>Harga Tarif</td>";
                                    echo "<td>Rp 28.000</td>";
                                    echo "</tr>";                                
                            }else if($berat > 15000 && $berat <= 20000){
                                    echo "<tr>";
                                    echo "<td>Harga Tarif</td>";
                                    echo "<td>Rp 32.000</td>";
                                    echo "</tr>";                                
                            }
                            else{
                                    echo "<tr>";
                                    echo "<td>Harga Tarif</td>";
                                    echo "<td>Rp 45.000</td>";
                                    echo "</tr>";
                            }
                            }
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
