-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2021 pada 17.24
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datasurat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `level` enum('admin','kepala_p3d','kepala_seksi','staff') NOT NULL,
  `nik` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `seksi` enum('1','2','3') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id_user`, `username`, `password`, `level`, `nik`, `nama`, `email`, `seksi`) VALUES
(1, 'admin', 'admin', 'admin', '', '', '', NULL),
(2, 'kepala_p3d', 'kepala_p3d', 'kepala_p3d', '123456789', 'asdfg', 'adminsimpeg@gmail.com', NULL),
(3, 'kepala_seksi', 'kepala_seksi', 'kepala_seksi', '123456789', 'kepala tu', 'kepalatu@gmail.com', '1'),
(4, 'indriya', 'indriya', 'staff', '2141434', 'Indriya', 'indriya@gmail.com', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `perihal` varchar(191) NOT NULL,
  `tujuan` varchar(191) NOT NULL,
  `file` varchar(191) DEFAULT NULL,
  `isi` text,
  `no_surat` varchar(191) DEFAULT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `tanggal`, `perihal`, `tujuan`, `file`, `isi`, `no_surat`, `status`) VALUES
(6, '2021-04-13', 'a', 'afdf', '6085893bcf568.pdf', '<p>asdfghjkl</p>\r\n', '800/001-tu', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `no_surat` varchar(191) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` varchar(191) NOT NULL,
  `file` varchar(191) NOT NULL,
  `pengirim` varchar(191) NOT NULL,
  `seksi` int(191) DEFAULT NULL,
  `status` int(191) NOT NULL DEFAULT '0',
  `staff` int(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `no_surat`, `tanggal`, `perihal`, `file`, `pengirim`, `seksi`, `status`, `staff`) VALUES
(1, '123456', '2021-03-29', '-', '123456.pdf', '2', 1, 3, 4),
(2, '123456', '2021-03-30', 'asdfg', '', '2', NULL, 0, NULL),
(3, '145', '2021-03-30', 'asd', 'Surat_Lamaran_PT_TKII_M_Bagas_Setia.pdf', '2', NULL, 0, NULL),
(4, '123456', '2021-03-30', 'asdfgh', 'Surat_Lamaran_PT_TKII_M_Bagas_Setia1.pdf', '2', NULL, 0, NULL),
(5, '1', '2021-04-26', 'a', 'document1.pdf', 'a', NULL, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
