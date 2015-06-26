-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26 Jun 2015 pada 17.29
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tugas_besar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_admin`
--

CREATE TABLE IF NOT EXISTS `tabel_admin` (
  `USERNAME_ADMIN` varchar(25) NOT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `LEVEL_ADMIN` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_admin`
--

INSERT INTO `tabel_admin` (`USERNAME_ADMIN`, `PASSWORD`, `LEVEL_ADMIN`) VALUES
('siro_gane', '12345', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_barang`
--

CREATE TABLE IF NOT EXISTS `tabel_barang` (
  `ID_BARANG` varchar(25) NOT NULL,
  `NAMA_BARANG` varchar(50) DEFAULT NULL,
  `HARGA_BARANG` float DEFAULT NULL,
  `KATEGORI` varchar(35) DEFAULT NULL,
  `GAMBAR` varchar(100) NOT NULL,
  `DESKRIPSI` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_barang`
--

INSERT INTO `tabel_barang` (`ID_BARANG`, `NAMA_BARANG`, `HARGA_BARANG`, `KATEGORI`, `GAMBAR`, `DESKRIPSI`) VALUES
('fil001', 'Laskar Pelangi ', 50000, 'Action', 'laskar pelangi.jpg', 'Sebuah Film yang diangkat dari sebuah novel Laskar Pelangi Karya Andrea Hirata'),
('fil003', 'Naruto', 25000, 'Action', 'naruto.jpg', ' Naruto bertarung dengan madara'),
('fil004', 'Terminator 3', 50000, 'Action', 'Terminator_3_poster.jpg', ''),
('fil005', 'Ayat Ayat Cinta', 20000, 'Action', 'mdpost_6.jpg', ''),
('fil006', 'The Conjuring', 40000, 'Action', 'the-conjuring.jpg', ''),
('fil007', 'Harry Potter 07', 50000, 'Action', 'harpot 7.jpg', ''),
('fil008', 'X-Men Days of Future Past', 50000, 'Action', 'naruto.jpg', ' '),
('fil009', 'One Piece Movie Z', 45000, 'Petualangan', 'one_piece_two_years_later_movie_poster_by_spicewolf18-d4y6cy3.jpg', ' film Karya Oda Sensei, dimana luffy yang ingin menjadi raja Bajak laut Harus bertarung dengan Z man');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_chart`
--

CREATE TABLE IF NOT EXISTS `tabel_chart` (
  `ID_CHART` varchar(15) NOT NULL,
  `USERNAME_PEMBELI` varchar(50) NOT NULL,
  `ID_BARANG` varchar(25) NOT NULL,
  `USERNAME_ADMIN` varchar(25) NOT NULL,
  `TOTAL_BELANJA` float DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `TANGGAL_ORDER` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_chart`
--

INSERT INTO `tabel_chart` (`ID_CHART`, `USERNAME_PEMBELI`, `ID_BARANG`, `USERNAME_ADMIN`, `TOTAL_BELANJA`, `STATUS`, `TANGGAL_ORDER`) VALUES
('CHART001', 'siro_gane', 'fil008', 'siro_gane', 50000, 'lunas', '2015-06-19'),
('CHART002', 'siro_gane', 'fil006', 'siro_gane', 40000, 'lunas', '2015-06-19'),
('CHART003', 'siro_gane', 'fil009', 'siro_gane', 45000, 'lunas', '2015-06-19'),
('CHART004', 'siro_gane', 'fil001', 'siro_gane', 50000, 'lunas', '2015-06-20'),
('CHART005', 'debora', 'fil003', 'siro_gane', 25000, 'lunas', '2015-06-20'),
('CHART007', 'debora', 'fil001', 'siro_gane', 50000, 'lunas', '2015-06-20'),
('CHART008', 'debora', 'fil001', 'siro_gane', 50000, 'belum lunas', '2015-06-20'),
('CHART009', 'debora', 'fil001', 'siro_gane', 50000, 'belum lunas', '2015-06-20'),
('CHART010', 'debora', 'fil004', 'siro_gane', 50000, 'lunas', '2015-06-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE IF NOT EXISTS `tabel_user` (
  `USERNAME_PEMBELI` varchar(50) NOT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `NO_HP` varchar(25) DEFAULT NULL,
  `LEVEL` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`USERNAME_PEMBELI`, `NAMA`, `PASSWORD`, `ALAMAT`, `NO_HP`, `LEVEL`) VALUES
('abraham', 'Abraham Linclon ', '912ec803b2ce49e4a541068d495ab570', 'Jalan Jawa', '0132131231312', 'member'),
('ana', 'Ana Oke', '1234', 'bondowoso', '123456', 'member'),
('bagio', 'bagio ', '20c1a26a55039b30866c9d0aa51953ca', 'jember', '08123456789', 'member'),
('coba', 'nico ', '81dc9bdb52d04dc20036dbd8313ed055', 'jember', '222222', 'member'),
('debora', 'Debora Siahaan ', '827ccb0eea8a706c4c34a16891f84e7b', 'Jalan Kenanga', '12345704204', 'member'),
('siro_gane', 'Sirajuddin Abraham ', '827ccb0eea8a706c4c34a16891f84e7b', 'jalan batu raden', '0875456', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
 ADD PRIMARY KEY (`USERNAME_ADMIN`);

--
-- Indexes for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
 ADD PRIMARY KEY (`ID_BARANG`);

--
-- Indexes for table `tabel_chart`
--
ALTER TABLE `tabel_chart`
 ADD PRIMARY KEY (`ID_CHART`), ADD KEY `FK_DETAIL_BARANG` (`ID_BARANG`), ADD KEY `FK_MELAYANI` (`USERNAME_ADMIN`), ADD KEY `FK_MENDAPATKAN_DETAIL` (`USERNAME_PEMBELI`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
 ADD PRIMARY KEY (`USERNAME_PEMBELI`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tabel_chart`
--
ALTER TABLE `tabel_chart`
ADD CONSTRAINT `FK_DETAIL_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `tabel_barang` (`ID_BARANG`),
ADD CONSTRAINT `FK_MELAYANI` FOREIGN KEY (`USERNAME_ADMIN`) REFERENCES `tabel_admin` (`USERNAME_ADMIN`),
ADD CONSTRAINT `FK_MENDAPATKAN_DETAIL` FOREIGN KEY (`USERNAME_PEMBELI`) REFERENCES `tabel_user` (`USERNAME_PEMBELI`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
