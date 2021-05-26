-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Mar 2021 pada 16.35
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

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
  `level` enum('admin','kepala_tu','pengirim','penerima') NOT NULL,
  `nik` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id_user`, `username`, `password`, `level`, `nik`, `nama`, `email`) VALUES
(1, 'admin', 'admin', 'admin', '', '', ''),
(2, 'pengirim', 'pengirim', 'pengirim', '123456789', 'asdfg', 'adminsimpeg@gmail.com'),
(3, 'kepalatu', 'kepalatu', 'kepala_tu', '123456789', 'kepala tu', 'kepalatu@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` varchar(191) NOT NULL,
  `tujuan` varchar(191) NOT NULL,
  `file` varchar(191) NOT NULL,
  `isi` text NOT NULL,
  `no_surat` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `tanggal`, `perihal`, `tujuan`, `file`, `isi`, `no_surat`) VALUES
(1, '2021-03-30', 'Keteranga Ijin Penelitian', 'Dekan FIA Universitas', '606334dcc61a7.pdf', '<p style=\"margin-left:76px; text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\">Menindaklanjuti Surat dari </span></span><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\"> </span></span><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\">Dekan Fakultas Ilmu Administrasi Universitas Subang Nomor : 073/154/Dek.II/2020 tanggal 05 Februari 2020, Perihal Ijin Penelitian dan Surat dari Kepala Kantor Kesatuan Bangsa dan Politik Kabupaten Subang Nomor :070.1/ Kesabang tanggal 02 September 2020 Perihal Ijin Research.</span></span></p>\r\n\r\n<p style=\"margin-left:76px; text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\">Berdasarkan hal tersebut, pada prinsipnya kami tidak keberatan dan menerima mahasiswa, atas :</span></span></p>\r\n\r\n<p style=\"margin-left:76px; text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\">Nama : Agung Saepuloh</span></span></p>\r\n\r\n<p style=\"margin-left:76px; text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\">NPM : A1A.16.0123</span></span></p>\r\n\r\n<p style=\"margin-left:76px; text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\">Yang telah melaksanakan kegiatan Penelitian dari tanggal 02 September 2020 s.d 02 Oktober 2020, dengan judul / masalah</span></span></p>\r\n\r\n<p style=\"margin-left:76px; text-align:center\">&ldquo;<span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\">KUALITAS PELAYANAN PADA SAMSAT KELILING DI KABUPATEN SUBANG&rdquo;</span></span></p>\r\n\r\n<p style=\"margin-left:76px; text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:76px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\">Demikian mohon maklum, atas perhatiannya kami ucapkan terima kasih.</span></span></p>\r\n', '800/     -TU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `no_surat` varchar(191) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` varchar(191) NOT NULL,
  `tujuan` varchar(191) NOT NULL,
  `file` varchar(191) NOT NULL,
  `pengirim` varchar(191) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `status_admin` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `no_surat`, `tanggal`, `perihal`, `tujuan`, `file`, `pengirim`, `status`, `status_admin`) VALUES
(1, '123456', '2021-03-29', '-', 'asdfgh', '123456.pdf', '2', '1', '1'),
(2, '123456', '2021-03-30', 'asdfg', 'asdfg', '', '2', '0', '0'),
(3, '145', '2021-03-30', 'asd', 'asdfg', 'Surat_Lamaran_PT_TKII_M_Bagas_Setia.pdf', '2', '0', '0'),
(4, '123456', '2021-03-30', 'asdfgh', 'asdfgh', 'Surat_Lamaran_PT_TKII_M_Bagas_Setia1.pdf', '2', '0', '0');

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
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
