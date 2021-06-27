-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2021 pada 04.09
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
-- Database: `data_surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_surat_masuk` int(11) NOT NULL,
  `seksi` int(11) NOT NULL,
  `subseksi` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `komentar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `id_surat_masuk`, `seksi`, `subseksi`, `status`, `komentar`) VALUES
(3, 2, 2, 3, 2, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepala_seksi`
--

CREATE TABLE `kepala_seksi` (
  `id_kepala_seksi` int(11) NOT NULL,
  `id_user` varchar(191) NOT NULL,
  `nik` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `id_seksi` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kepala_seksi`
--

INSERT INTO `kepala_seksi` (`id_kepala_seksi`, `id_user`, `nik`, `nama`, `email`, `id_seksi`) VALUES
(1, '60cedcdc86689', '3213012611980001', 'Raden Ajeng', 'radenajeng@gmail.com', '2'),
(2, '60ceeafae26a4', '3213012611980001', 'Ahmad Zayyidin A. Lc. M.AP', 'ahmadzayyidin@gmail.com', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_surat_keluar`
--

CREATE TABLE `pengajuan_surat_keluar` (
  `id_pengajuan_surat_keluar` int(11) NOT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `perihal` varchar(191) NOT NULL,
  `tujuan` varchar(191) NOT NULL,
  `status` int(191) NOT NULL,
  `isi` text NOT NULL,
  `kepala_p3d` varchar(191) DEFAULT NULL,
  `kepala_seksi` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan_surat_keluar`
--

INSERT INTO `pengajuan_surat_keluar` (`id_pengajuan_surat_keluar`, `id_staff`, `perihal`, `tujuan`, `status`, `isi`, `kepala_p3d`, `kepala_seksi`) VALUES
(5, 3, 'dfdfdf', 'dfdfdf', 2, '<p>asdasf</p>\r\n', NULL, NULL),
(6, NULL, 'Undangan', 'Bupati Subang', 1, '<p>undangan</p>\r\n', '2', NULL),
(8, NULL, 'Undangan', 'Bupati Subang', 0, '<p>undangan</p>\r\n', '2', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `seksi`
--

CREATE TABLE `seksi` (
  `id_seksi` int(11) NOT NULL,
  `nama_seksi` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `seksi`
--

INSERT INTO `seksi` (`id_seksi`, `nama_seksi`) VALUES
(1, 'Tata Usaha'),
(2, 'Penerimaan dan Penagihan'),
(3, 'Pendataan Penetapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `id_user` varchar(191) NOT NULL,
  `nik` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `id_seksi` varchar(191) NOT NULL,
  `subseksi` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id_staff`, `id_user`, `nik`, `nama`, `email`, `id_seksi`, `subseksi`) VALUES
(3, '60cef392d3686', '3213012611980001', 'ryanto', 'ryanto@gmail.com', '2', '11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subseksi`
--

CREATE TABLE `subseksi` (
  `id_subseksi` int(11) NOT NULL,
  `id_seksi` int(11) NOT NULL,
  `nama_subseksi` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subseksi`
--

INSERT INTO `subseksi` (`id_subseksi`, `id_seksi`, `nama_subseksi`) VALUES
(1, 1, 'Pengelola Keuangan'),
(2, 1, 'Perencanaan Program'),
(3, 1, 'Pengadministrasian Sarana dan Prasarana'),
(4, 1, 'Pengolah Data Aplikasi dan Pengolah Data Sistem Keuangan'),
(5, 1, 'Pengadministrasi Umum'),
(6, 3, 'Pengolah Data Pemeriksa Pajak'),
(7, 3, 'Pengolah Data dan Potensi Pajak'),
(8, 3, 'Verifikator Pajak'),
(9, 3, 'Pengolah Data dan Potensi Pajak'),
(10, 3, 'Pengolah Data Pemeriksa Pajak'),
(11, 2, 'Pengelola Pelaporan Data penerimaan'),
(12, 2, 'Pranata Kearsipan'),
(13, 2, 'Pengolah Data Penagihan Pajak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `urutan_surat` int(191) NOT NULL,
  `id_pengajuan_surat_keluar` int(11) NOT NULL,
  `no_surat` varchar(191) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `file` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `urutan_surat`, `id_pengajuan_surat_keluar`, `no_surat`, `tanggal`, `isi`, `file`) VALUES
(5, 1, 5, '800/001-tu', '2021-06-25', '<p>asdasf</p>\r\n', '60d58b4cc873d.pdf'),
(6, 2, 6, '800/002-tu', '2021-06-26', '<p>undangan</p>\r\n', '60d6a71c4884d.pdf');

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
  `status` int(191) NOT NULL,
  `tujuan` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `no_surat`, `tanggal`, `perihal`, `file`, `pengirim`, `status`, `tujuan`) VALUES
(2, '800/001-tu', '2021-06-23', 'a', 'document5.pdf', 'a', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `level` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
('1', 'admin', 'admin', 'admin'),
('2', 'kepala_p3d', '12345678', 'kepala_p3d'),
('60cedcdc86689', 'radenajeng', '12345678', 'kepala_seksi'),
('60ceeafae26a4', 'ahmadzayyidin', '1234567', 'kepala_seksi'),
('60cef392d3686', 'ryanto', '12345678', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `id_surat_masuk` (`id_surat_masuk`),
  ADD KEY `seksi` (`seksi`);

--
-- Indeks untuk tabel `kepala_seksi`
--
ALTER TABLE `kepala_seksi`
  ADD PRIMARY KEY (`id_kepala_seksi`);

--
-- Indeks untuk tabel `pengajuan_surat_keluar`
--
ALTER TABLE `pengajuan_surat_keluar`
  ADD PRIMARY KEY (`id_pengajuan_surat_keluar`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indeks untuk tabel `seksi`
--
ALTER TABLE `seksi`
  ADD PRIMARY KEY (`id_seksi`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indeks untuk tabel `subseksi`
--
ALTER TABLE `subseksi`
  ADD PRIMARY KEY (`id_subseksi`),
  ADD KEY `id_seksi` (`id_seksi`);

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
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kepala_seksi`
--
ALTER TABLE `kepala_seksi`
  MODIFY `id_kepala_seksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_surat_keluar`
--
ALTER TABLE `pengajuan_surat_keluar`
  MODIFY `id_pengajuan_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `seksi`
--
ALTER TABLE `seksi`
  MODIFY `id_seksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `subseksi`
--
ALTER TABLE `subseksi`
  MODIFY `id_subseksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_surat_masuk`) REFERENCES `surat_masuk` (`id_surat_masuk`),
  ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`seksi`) REFERENCES `seksi` (`id_seksi`);

--
-- Ketidakleluasaan untuk tabel `pengajuan_surat_keluar`
--
ALTER TABLE `pengajuan_surat_keluar`
  ADD CONSTRAINT `pengajuan_surat_keluar_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`);

--
-- Ketidakleluasaan untuk tabel `subseksi`
--
ALTER TABLE `subseksi`
  ADD CONSTRAINT `subseksi_ibfk_1` FOREIGN KEY (`id_seksi`) REFERENCES `seksi` (`id_seksi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
