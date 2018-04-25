-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Mar 2018 pada 16.23
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_expedisi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id_bank` int(100) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_rek` varchar(255) NOT NULL,
  `cabang` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `status_del` enum('Y','T') NOT NULL COMMENT 'apus ya / tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bank`
--

INSERT INTO `tb_bank` (`id_bank`, `nama_bank`, `no_rek`, `cabang`, `kota`, `status_del`) VALUES
(1, 'BCA', '0027162812', 'KCP 21 Gubeng , Surabaya', 'Surabaya', 'T'),
(2, '', '', '', '', 'Y'),
(3, 'BRI', '992612916', 'Nginden , Panurakan', 'Panurakan', 'T'),
(4, 'Maybank', '2149921024719', 'Kenjeran . jalan Pulau mentari nomor 21 KCP 99271', 'Surabaya', 'T'),
(5, 'asdasd', '12', '12', '12', 'Y'),
(6, '12312', '3123', '3123', '213', 'Y'),
(7, '4141', '4141', '4141', '4141', 'Y'),
(8, 'Central Asia 23', '287518209', 'Kertoraharjo', 'Surabaya', 'Y'),
(9, '114', '1414', '1414', '14', 'Y'),
(10, '123', '124124', '12412', '4124', 'Y'),
(11, '123', '123', '123', '123', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cabang`
--

CREATE TABLE `tb_cabang` (
  `id_cabang` int(100) NOT NULL,
  `nama_cabang` varchar(255) NOT NULL,
  `kode_cabang` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telp_cabang` varchar(255) NOT NULL,
  `id_karyawan` varchar(100) NOT NULL,
  `status_del` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_cabang`
--

INSERT INTO `tb_cabang` (`id_cabang`, `nama_cabang`, `kode_cabang`, `alamat`, `telp_cabang`, `id_karyawan`, `status_del`) VALUES
(1, '123123', '66GSEUOE4', '123123', '123-1231-2312', '0', 'Y'),
(2, '123', 'N728PYP6D', '123', '', '0', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(100) NOT NULL,
  `id_cabang` int(10) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL COMMENT '''Laki laki / Perempuan''',
  `alamat_karyawan` text NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nomor_telp` varchar(255) NOT NULL,
  `gaji` int(255) NOT NULL,
  `status_del` enum('Y','T') NOT NULL COMMENT 'Hapus ya / tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `id_cabang`, `nama_karyawan`, `jenis_kelamin`, `alamat_karyawan`, `tempat_lahir`, `tgl_lahir`, `nomor_telp`, `gaji`, `status_del`) VALUES
(1, 0, 'Paijo', 'P', '<p>123</p>\r\n', '123123', '3123-03-12', '123123123', 123123, 'T'),
(2, 0, 'paiji', 'L', '<p>123123</p>\r\n', '123123', '0123-03-12', '123123', 123132, 'T'),
(3, 0, 'barsa', 'L', '<p>123</p>\r\n', '', '0000-00-00', '123', 123123, 'T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_operation`
--

CREATE TABLE `tb_operation` (
  `id_operation` int(100) NOT NULL,
  `nama_operation` varchar(255) NOT NULL,
  `biaya_operation` int(255) NOT NULL,
  `status_del` enum('Y','T') NOT NULL COMMENT '''Ya dan Tidak'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_operation`
--

INSERT INTO `tb_operation` (`id_operation`, `nama_operation`, `biaya_operation`, `status_del`) VALUES
(1, 'Uang Makan', 210003, 'Y'),
(2, 'Uang Bensin', 210000, 'T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supir`
--

CREATE TABLE `tb_supir` (
  `id_supir` int(100) NOT NULL,
  `kode_supir` varchar(100) NOT NULL,
  `nama_supir` varchar(255) NOT NULL,
  `tempat_lahir_supir` varchar(255) NOT NULL,
  `tgl_lahir_supir` date NOT NULL,
  `alamat_supir` text NOT NULL,
  `usia` int(11) NOT NULL,
  `nomor_telp` varchar(100) NOT NULL,
  `status_del` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supir`
--

INSERT INTO `tb_supir` (`id_supir`, `kode_supir`, `nama_supir`, `tempat_lahir_supir`, `tgl_lahir_supir`, `alamat_supir`, `usia`, `nomor_telp`, `status_del`) VALUES
(1, '2ZLZY', 'Bisras', '123123', '2112-12-12', '123123', -95, '123123', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tarif`
--

CREATE TABLE `tb_tarif` (
  `id_tarif` int(100) NOT NULL,
  `kota_tujuan` varchar(255) NOT NULL,
  `kota_asal` varchar(255) NOT NULL,
  `tarif_kubik` int(255) NOT NULL,
  `tarif_km` int(255) NOT NULL,
  `status_del` enum('Y','T') NOT NULL COMMENT 'Hapus ya / tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tarif`
--

INSERT INTO `tb_tarif` (`id_tarif`, `kota_tujuan`, `kota_asal`, `tarif_kubik`, `tarif_km`, `status_del`) VALUES
(1, 'Jakarta', 'MEdan', 42000, 12000, 'Y'),
(2, '124', '124', 124, 124, 'Y'),
(3, 'Kenjeran', 'Surabaya', 12000, 30000, 'T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id_toko` int(100) NOT NULL,
  `owner_toko` varchar(255) NOT NULL,
  `jenis_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `email_toko` varchar(255) NOT NULL,
  `telp_toko` varchar(255) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `tipe_toko` varchar(100) NOT NULL COMMENT '1 : Penjual , 2 : Customer',
  `disc` int(5) NOT NULL,
  `nama_npwp` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `status_del` enum('Y','T') NOT NULL COMMENT 'Hapus ya / tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_toko`
--

INSERT INTO `tb_toko` (`id_toko`, `owner_toko`, `jenis_toko`, `alamat_toko`, `email_toko`, `telp_toko`, `nama_toko`, `tipe_toko`, `disc`, `nama_npwp`, `npwp`, `status_del`) VALUES
(1, 'Supardi', 'Penjualan Pakaian', '<p>Jl Kenjeran nomor 21&nbsp;</p>\r\n', 'zxc_services@gmail.com', '031-7721-4441', 'zxc_de Distro', 'penjual', 10, 'ZXC DE DISTRO', '29.917.729.4-018.263', 'Y'),
(2, 'Supardi', 'Penjualan Pakaian', '<p>Jl Kenjeran nomor 21&nbsp;</p>\r\n', 'zxc_services@gmail.com', '031-7721-4441', 'zxc_de Distro', 'penjual', 100, 'ZXC DE DISTRO', '29.917.729.4-018.263', 'Y'),
(3, 'Bluescrint', 'zxc', '<p>Filll</p>\r\n', 'zcx@gmail.com', '034-1241-2122', '123', 'penjual', 12, '123123123', '12.312.312.3-123.123', 'T'),
(4, 'asdzz', 'asd', '<p>asd</p>\r\n', 'asd@gmail.com', '120-3124-1241', 'asdasdasdasd', 'customer', 1, '123', '12.312.312.3-123.123', 'T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_truck`
--

CREATE TABLE `tb_truck` (
  `id_truck` int(100) NOT NULL,
  `kode_supir` varchar(199) NOT NULL,
  `nomor_polisi` varchar(100) NOT NULL,
  `tanggal_pajak` date NOT NULL,
  `tanggal_kir` date NOT NULL,
  `status_del` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_truck`
--

INSERT INTO `tb_truck` (`id_truck`, `kode_supir`, `nomor_polisi`, `tanggal_pajak`, `tanggal_kir`, `status_del`) VALUES
(1, '2ZLZY', 'Z 2121 Ls', '1212-12-12', '1212-12-12', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(100) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `password`, `id_role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_operation`
--
ALTER TABLE `tb_operation`
  ADD PRIMARY KEY (`id_operation`);

--
-- Indexes for table `tb_supir`
--
ALTER TABLE `tb_supir`
  ADD PRIMARY KEY (`id_supir`);

--
-- Indexes for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `tb_truck`
--
ALTER TABLE `tb_truck`
  ADD PRIMARY KEY (`id_truck`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id_bank` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  MODIFY `id_cabang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_operation`
--
ALTER TABLE `tb_operation`
  MODIFY `id_operation` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_supir`
--
ALTER TABLE `tb_supir`
  MODIFY `id_supir` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  MODIFY `id_tarif` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id_toko` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_truck`
--
ALTER TABLE `tb_truck`
  MODIFY `id_truck` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
