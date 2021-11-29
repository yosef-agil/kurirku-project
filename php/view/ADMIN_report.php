<?php

//hubungkan dengan file data.php
include("../model/data.php");
require_once("../connection/auth.php");

//new Object
$DT = new theData();
$dataKirim = $DT->tampil_table();
$no = 1;

?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body style="border: 1px solid black; margin: 15px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Data Pengiriman</h4>
            </div>
            <hr style="margin-top:25px;">
        </div>

        <div class="col-md-12">
            <div class="table-responsive-sm">
                <table class="table table-striped table-hover align-middle">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dataKirim as $key) {
                            echo "<tr class='data-table'>
                                <td>" . $no . "</td>
                                <td>" . $key['no_resi'] . "</td>
                                <td>" . $key['tanggal_kirim'] . "</td>
                                <td>" . $key['estimasi_terima'] . "</td>
                                <td>" . $key['id_pengirim'] . "</td>
                                <td>" . $key['id_barang'] . "</td>
                                <td>" . $key['id_penerima'] . "</td>
                                <td>" . $key['id_pembayaran'] . "</td>";
                            $no++;
                        };
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
    <script src="../js/sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>