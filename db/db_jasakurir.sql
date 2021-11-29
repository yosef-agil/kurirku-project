-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 04:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jasakurir`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `no_resi` int(20) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `estimasi_terima` date NOT NULL,
  `id_pengirim` int(25) NOT NULL,
  `id_barang` int(25) NOT NULL,
  `id_penerima` int(25) NOT NULL,
  `id_pembayaran` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`no_resi`, `tanggal_kirim`, `estimasi_terima`, `id_pengirim`, `id_barang`, `id_penerima`, `id_pembayaran`) VALUES
(5001103, '2021-11-02', '2021-11-05', 4001, 11100, 670002, 70012002),
(5001104, '2021-11-22', '2021-11-25', 4002, 11100, 670004, 70012003);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(25) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_barang` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `berat_barang` varchar(255) NOT NULL,
  `ukuran_barang` varchar(255) NOT NULL,
  `tgl_kirim` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `jumlah_barang`, `jenis_barang`, `berat_barang`, `ukuran_barang`, `tgl_kirim`) VALUES
(11100, 'Keyboard Rexus', '1', 'Elektronik', '1000', 'Sedang', '2021-11-22 12:11:08'),
(11101, 'Laptop DELL 24 Inch', '1', 'Elektronik', '2500', 'Sedang', '2021-11-22 12:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(25) NOT NULL,
  `id_pengirim` int(25) NOT NULL,
  `m_pembayaran` varchar(255) NOT NULL,
  `total_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pengirim`, `m_pembayaran`, `total_bayar`) VALUES
(70012002, 4001, 'BCA', '45000'),
(70012003, 4002, 'Transfer Bank', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerima`
--

CREATE TABLE `tb_penerima` (
  `id_penerima` int(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `kode_post` int(25) NOT NULL,
  `kota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penerima`
--

INSERT INTO `tb_penerima` (`id_penerima`, `nama`, `alamat`, `no_telepon`, `kode_post`, `kota`) VALUES
(670002, 'Riza jeheskiel', 'Tanggerang Selatan', '082388101002', 709022, 'Tanggerang'),
(670003, 'Bobo', '081288330011', 'Kota Salatiga', 50711, 'Jl. Kemiri raya, No. 001, Kec. Sidorejo Kota Salatiga, Jawa tengah. 50711'),
(670004, 'Michael Mangalik', 'Jl. Cungkupsari No.436, kec.sidorejo, kota salatiga, jawa tengah', '082288282929', 50711, 'Kota salatiga'),
(670005, 'nodas', 'Jl. raden No. 403, Kec. Boyolali, Jawa tengah. 60122', '082289912211', 60122, 'Boyolali');

-- --------------------------------------------------------

--
-- Table structure for table `tb_signup`
--

CREATE TABLE `tb_signup` (
  `id_admin` bigint(15) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_signup`
--

INSERT INTO `tb_signup` (`id_admin`, `f_name`, `l_name`, `email`, `pass`) VALUES
(1001, 'yosef', 'agil', 'yosefagil8@gmail.com', '$2y$10$q4EemlnLoK7ic5nlCG49M.3hzfwGQdW4JiZagbKLDshEjJIpI1Owe'),
(1002, 'nodas', 'constantine', 'nodas@gmail.com', '$2y$10$KCoInjeYqCrgat7iBoC/dOdgPfDaUV65WpiLO1JWTWXvLCwe1gUZu'),
(1003, 'agil', 'prayogi', 'yosefagil1@gmail.com', '$2y$10$Sa6bsrY68RdQLnkRGcX5Z.Ri/BN0MmXiQ62JrYv2medCipyk6fHhS'),
(1004, 'riza', 'jeheskiel', 'riza@gmail.com', '$2y$10$m7Pu4XyXl6jmMEMiKf2VRut1z69erVPrBPy67RsM7h4tZl56Ya/Kq'),
(1005, 'riza', 'jeheskiel', 'riza@gmail.com', '$2y$10$c6iw/umRTter6Ehja4UWvu57vZdSh07omYCxhlmJXZyZUELEUEllC'),
(1006, 'admin', 'kurir', 'admin@kurir.com', '$2y$10$1aJ1VA5ad5avFfhl4wER0evUDLzd4xVpERtRgylaMYHNrv3piL3g.'),
(1007, 'admin', 'kurir 2', 'admin2@kurir.com', '$2y$10$U7l.u/QHPo9Hrrb1zyTKf./hXnltk8epY1ZH96QkUuqCQSIK3NjZu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_pengirim` int(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nomer` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passUsr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_pengirim`, `nama`, `alamat`, `kode`, `nomer`, `email`, `passUsr`) VALUES
(4001, 'Yosef agil', 'Jl.cungkup no 456', '50711', '0829019555555', 'yosef@gmail.com', '1234'),
(4002, 'Nodas', 'Kemiri raya no.1', '50711', '082229000111', 'nodas@gmail.com', '$2y$10$DaxSJDpCsJn5vLl.D9dZ/uvlnctqMYpeoOo/MXRQ5er.SzsFFFYl2'),
(4003, 'Jackie Chan', 'Victoria Peak, Hong Kong', '70019', '082282882882', 'jackie@gmail.com', '$2y$10$Mi08ZrrV7FxTiBsINiN9LOw7KLTAMFV9tEPEVYYAVroXxx5LKTyCC'),
(4004, 'Yosef Agil', 'Jl. Cungkupsari No.436', '50711', '082371097483', 'yosef8@gmail.com', '$2y$10$.Kol/t3aQniCDFs3FwGRsO0ULpwuCIJQeDqbQ8gF3rH8Rl2uN1a62');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`no_resi`),
  ADD KEY `FK_id_pembayaran` (`id_pembayaran`),
  ADD KEY `FK_id_penerima` (`id_penerima`),
  ADD KEY `FK_id_pengirim` (`id_pengirim`),
  ADD KEY `FK_id_barang` (`id_barang`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `FK_pengirim` (`id_pengirim`);

--
-- Indexes for table `tb_penerima`
--
ALTER TABLE `tb_penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indexes for table `tb_signup`
--
ALTER TABLE `tb_signup`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_pengirim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `no_resi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500110225;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11102;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70012004;

--
-- AUTO_INCREMENT for table `tb_penerima`
--
ALTER TABLE `tb_penerima`
  MODIFY `id_penerima` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=670006;

--
-- AUTO_INCREMENT for table `tb_signup`
--
ALTER TABLE `tb_signup`
  MODIFY `id_admin` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_pengirim` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4005;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `FK_id_barang` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `FK_id_pembayaran` FOREIGN KEY (`id_pembayaran`) REFERENCES `tb_pembayaran` (`id_pembayaran`),
  ADD CONSTRAINT `FK_id_penerima` FOREIGN KEY (`id_penerima`) REFERENCES `tb_penerima` (`id_penerima`),
  ADD CONSTRAINT `FK_id_pengirim` FOREIGN KEY (`id_pengirim`) REFERENCES `tb_user` (`id_pengirim`);

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `FK_pengirim` FOREIGN KEY (`id_pengirim`) REFERENCES `tb_user` (`id_pengirim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
