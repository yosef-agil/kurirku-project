<?php
include ("../model/data.php");

$nama = $_GET['nama_barang'];
$berat = $_GET['berat_barang'];
$jumlah = $_GET['jumlah_barang'];
$harga1 = 12000;
$harga2 = 16000;
$harga3 = 20000;
$harga4 = 24000;
$harga5 = 28000;
$harga6 = 32000;

if ($berat <= 1000) {
    echo "<tr><td>Nama Barang = <td>$nama</td></td></tr><br>";
    echo "<tr><td>Berat Barang = <td>$berat</td></td></tr><br>";
    echo "<tr><td>Jumlah Barang = <td>$jumlah</td></td></tr><br>";
    echo "<tr><td>Harga = <td>Rp. $harga1</td></td></tr><br>";
    echo "<tr><td>Jumlah Harga = <td>Rp. $harga1*$jumlah</td></td></tr><br>";
} elseif ($berat > 1000 && $berat <= 2500) {
    echo "<tr><td>Nama Barang = <td>$nama</td></td></tr><br>";
    echo "<tr><td>Berat Barang = <td>$berat</td></td></tr><br>";
    echo "<tr><td>Jumlah Barang = <td>$jumlah</td></td></tr><br>";
    echo "<tr><td>Harga = <td>Rp. $harga2</td></td></tr><br>";
    echo "<tr><td>Jumlah Harga = <td>Rp. $harga2*$jumlah</td></td></tr><br>";
} elseif ($berat > 2500 && $berat <= 5000) {
    echo "<tr><td>Nama Barang = <td>$nama</td></td></tr><br>";
    echo "<tr><td>Berat Barang = <td>$berat</td></td></tr><br>";
    echo "<tr><td>Jumlah Barang = <td>$jumlah</td></td></tr><br>";
    echo "<tr><td>Harga = <td>Rp. $harga3</td></td></tr><br>";
    echo "<tr><td>Jumlah Harga = <td>Rp. $harga3*$jumlah</td></td></tr><br>";
} elseif ($berat > 5000 && $berat <= 10000) {
    echo "<tr><td>Nama Barang = <td>$nama</td></td></tr><br>";
    echo "<tr><td>Berat Barang = <td>$berat</td></td></tr><br>";
    echo "<tr><td>Jumlah Barang = <td>$jumlah</td></td></tr><br>";
    echo "<tr><td>Harga = <td>Rp. $harga4</td></td></tr><br>";
    echo "<tr><td>Jumlah Harga = <td>Rp. $harga4*$jumlah</td></td></tr><br>";
} elseif ($berat > 10000 && $berat <= 15000) {
    echo "<tr><td>Nama Barang = <td>$nama</td></td></tr><br>";
    echo "<tr><td>Berat Barang = <td>$berat</td></td></tr><br>";
    echo "<tr><td>Jumlah Barang = <td>$jumlah</td></td></tr><br>";
    echo "<tr><td>Harga = <td>Rp. $harga5</td></td></tr><br>";
    echo "<tr><td>Jumlah Harga = <td>Rp. $harga5*$jumlah</td></td></tr><br>";
} else {
    echo "<tr><td>Nama Barang = <td>$nama</td></td></tr><br>";
    echo "<tr><td>Berat Barang = <td>$berat</td></td></tr><br>";
    echo "<tr><td>Jumlah Barang = <td>$jumlah</td></td></tr><br>";
    echo "<tr><td>Harga = <td>Rp. $harga6</td></td></tr><br>";
    echo "<tr><td>Jumlah Harga = <td>Rp. $harga6*$jumlah</td></td></tr><br>";
}
