-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2021 pada 05.40
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `seksi` varchar(191) DEFAULT NULL,
  `subseksi` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`id_user`, `username`, `password`, `level`, `nik`, `nama`, `email`, `seksi`, `subseksi`) VALUES
(1, 'admin', 'admin', 'admin', '', '', '', NULL, NULL),
(2, 'kepala_p3d', 'kepala_p3d', 'kepala_p3d', '123456789', 'asdfg', 'adminsimpeg@gmail.com', NULL, NULL),
(3, 'kepala_seksi', 'kepala_seksi', 'kepala_seksi', '123456789', 'kepala tu', 'kepalatu@gmail.com', 'penerimaan_dan_penagihan', NULL),
(4, 'indriya', 'indriya', 'staff', '2141434', 'Indriya', 'indriya@gmail.com', 'penerimaan_dan_penagihan', 'pengelolaan_pelaporan_data_penerimaan'),
(7, 'ahmadzayyidin', '12345678', 'kepala_seksi', '3213012611980001', 'Ahmad Zayyidin A. Lc. M.AP', 'ahmadzayyidin@gmail.com', 'pendataan_penetapan', 'NULL'),
(8, 'udinsyarifudin', '12345678', 'staff', '3213012611980001', 'Udin Syarifudin', 'udinsyarifudin@gmail.com', 'pendataan_penetapan', 'pengolah_data_pemeriksa_pajak'),
(9, 'imanrochiman', '12345678', 'staff', '3213012611980001', 'Iman Rochiman', 'imanrochiman@gmail.com', 'penerimaan_dan_penagihan', 'pranata_kearsipan'),
(10, 'udinsaepudin', '12345678', 'staff', '3213012611980001', 'Udin Saepudin S.AP', 'udinsaepudin@gmail.com', 'penerimaan_dan_penagihan', 'pengolah_data_penagihan_pajak'),
(11, 'sumarna', '12345678', 'staff', '3213012611980001', 'Sumarna S.E', 'sumarna@gmail.com', 'penerimaan_dan_penagihan', 'pengolah_data_penagihan_pajak'),
(12, 'ucusamsurijal', '12345678', 'staff', '3213012611980001', 'Ucu Samsurijal', 'ucusamsurijal@gmail.com', 'pendataan_penetapan', 'pengolah_data_dan_potensi_pajak'),
(13, 'yayathidayat', '12345678', 'staff', '3213012611980001', 'Yayat Hidayat', 'yayathidayat@gmail.com', 'pendataan_penetapan', 'verifikator_pajak'),
(14, 'pitrayana', '12345678', 'staff', '3213012611980001', 'Pitrayana E, S.H', 'pitrayana', 'pendataan_penetapan', 'pengolah_data_dan_potensi_pajak'),
(15, 'budipermana', '12345678', 'staff', '3213012611980001', 'Budi Permana', 'budipermana@gmail.com', 'pendataan_penetapan', 'pengolah_data_dan_potensi_pajak'),
(16, 'carnan', '12345678', 'staff', '3213012611980001', 'Carnan', 'carnan@gmail.com', 'pendataan_penetapan', 'pengolah_data_pemeriksa_pajak'),
(17, 'tarmo', '12345678', 'staff', '3213012611980001', 'Tarmo', 'tarmo@gmail.com', 'pendataan_penetapan', 'pengolah_data_pemeriksa_pajak');

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
  `isi` text DEFAULT NULL,
  `no_surat` varchar(191) DEFAULT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `tanggal`, `perihal`, `tujuan`, `file`, `isi`, `no_surat`, `status`) VALUES
(9, '2021-06-07', 'a', '', '60be29f6a0823.pdf', '<p>a</p>\r\n', '800/001-tu', '1'),
(10, '2021-06-08', 'a', 'afdf', '60bf23c8bb18c.pdf', '<p>b</p>\r\n', '800/001-tu', '1');

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
  `seksi` varchar(191) DEFAULT NULL,
  `status` int(191) NOT NULL DEFAULT 0,
  `staff` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `no_surat`, `tanggal`, `perihal`, `file`, `pengirim`, `seksi`, `status`, `staff`) VALUES
(1, '123456', '2021-03-29', '-', '123456.pdf', '2', '1', 3, '4'),
(2, '123456', '2021-03-30', 'asdfg', '', '2', '1', 3, '4'),
(5, '1', '2021-04-26', 'a', 'document1.pdf', 'a', 'penerimaan_dan_penagihan', 2, '4'),
(6, '800/001-tu', '2021-06-07', 'a', 'document3.pdf', 'a', NULL, 0, NULL);

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
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
