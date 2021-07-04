-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2021 pada 08.59
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
-- Database: `data_suratt`
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
(2, 6, 2, 3, 3, 'ya'),
(3, 8, 2, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepala_seksi`
--

CREATE TABLE `kepala_seksi` (
  `id_kepala_seksi` int(11) NOT NULL,
  `id_user` varchar(191) NOT NULL,
  `nip` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `id_seksi` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kepala_seksi`
--

INSERT INTO `kepala_seksi` (`id_kepala_seksi`, `id_user`, `nip`, `nama`, `id_seksi`) VALUES
(1, '60cedcdc86689', '196511061991032005', 'Raden Ajeng Chrysanti S.Sos', '2'),
(2, '60ceeafae26a4', '198003182011011003', 'Ahmad Zayyidin A. Lc. M.AP', '3'),
(3, '60d9df9cb0a56', '196606061993031012', 'Drs. Yaya Sudia, MM', '1');

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
(2, NULL, '', 'afdf', 1, '<p>asdfdf</p>\r\n', NULL, NULL);

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
  `nip` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `id_seksi` int(20) NOT NULL,
  `subseksi` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id_staff`, `id_user`, `nip`, `nama`, `id_seksi`, `subseksi`) VALUES
(3, '60cef392d3686', '197211282009011001', 'Ryanto', 2, '11'),
(4, '60d9df5c87007', '197908162008011005', 'Deden Rhamdan Budhi K, S.Sos., M.AP', 1, '4');

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
(11, 2, 'Pengelola Pelaporan Data Penerimaan'),
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
  `file` varchar(191) NOT NULL,
  `klasifikasi` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `urutan_surat`, `id_pengajuan_surat_keluar`, `no_surat`, `tanggal`, `isi`, `file`, `klasifikasi`) VALUES
(2, 1, 2, '000/001-tu', '2021-07-11', '<p>asdfdf</p>\r\n', '60e15a1b688f2.pdf', 'umum');

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
(6, '119/1827/Renbang', '2021-06-17', 'Laporan Tahunan Pelaksanaan Kerja Sama Daerah', 'Surat_ke_P3D_hal_laporan_Flagging_hasil_penelusuran_tahun_2019.pdf', 'Bapenda Pusat', 3, 'Kepala P3DW'),
(8, '119/1827/Renbang', '2021-07-01', 'keterangan penelitian', 'Surat_ke_P3D_hal_SKM_Semester_I_2020.pdf', 'Bapenda Pusat', 1, 'kepala tu');

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
('60ceeafae26a4', 'ahmadzayyidin', '12345678', 'kepala_seksi'),
('60cef392d3686', 'ryanto', '12345678', 'staff'),
('60d9df5c87007', 'dedenrhamdan', '12345678', 'staff'),
('60d9df9cb0a56', 'yayasudia', '12345678', 'kepala_seksi');

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
  ADD PRIMARY KEY (`id_kepala_seksi`),
  ADD UNIQUE KEY `id_user` (`id_user`);

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
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD UNIQUE KEY `id_pengajuan_surat_keluar` (`id_pengajuan_surat_keluar`);

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
  MODIFY `id_kepala_seksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_surat_keluar`
--
ALTER TABLE `pengajuan_surat_keluar`
  MODIFY `id_pengajuan_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `seksi`
--
ALTER TABLE `seksi`
  MODIFY `id_seksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `subseksi`
--
ALTER TABLE `subseksi`
  MODIFY `id_subseksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Ketidakleluasaan untuk tabel `kepala_seksi`
--
ALTER TABLE `kepala_seksi`
  ADD CONSTRAINT `kepala_seksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

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

--
-- Ketidakleluasaan untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`id_pengajuan_surat_keluar`) REFERENCES `pengajuan_surat_keluar` (`id_pengajuan_surat_keluar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
