-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2019 pada 17.19
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simke`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `nik` varchar(50) NOT NULL,
  `gaji` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gaji`
--

INSERT INTO `tb_gaji` (`nik`, `gaji`) VALUES
('B1231654867', 2500000),
('B123456789', 4000000),
('B34534534', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(250) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`, `keterangan`) VALUES
(1, 'ADM Staff', 'Manajer Keuangan'),
(2, 'Legal', 'Manajer Keuangan'),
(3, 'Accounting', 'Manajer Keuangan'),
(4, 'ADM Marketing', 'Manajer Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `status_pegawai` varchar(200) NOT NULL COMMENT 'pg teteap; pg lama;',
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nik`, `nama_lengkap`, `no_hp`, `alamat`, `status_pegawai`, `id_jabatan`) VALUES
(8, 'B1231654867', 'AGUS', '081354541321', ' Jl. Alamat baru 123', 'TIDAK TETAP', 4),
(9, 'B123456789', 'ASEP', '081564543123', 'Jl. Alamat Naik 123', 'TETAP', 2),
(10, 'B34534534', 'SUHERMAN', '08151213331', 'Jl. ALamat Turun 321', 'TIDAK TETAP', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_potongan`
--

CREATE TABLE `tb_potongan` (
  `id_potongan` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `tanggal` date NOT NULL,
  `potongan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_potongan`
--

INSERT INTO `tb_potongan` (`id_potongan`, `nik`, `keterangan`, `tanggal`, `potongan`) VALUES
(1, 'B123456789', 'Pajak', '2019-12-16', 25000),
(2, 'B123456789', 'Biaya Bensin Kendaraan', '2019-12-16', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tunjangan`
--

CREATE TABLE `tb_tunjangan` (
  `nik` varchar(50) NOT NULL,
  `tunjangan` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tunjangan`
--

INSERT INTO `tb_tunjangan` (`nik`, `tunjangan`) VALUES
('B1231654867', 150000),
('B123456789', 350000),
('B34534534', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(8) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(1, 'SIMKE Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'SIMKE Keuangan', 'keuangan', 'a4151d4b2856ec63368a7c784b1f0a6e', '2'),
(3, 'SIMKE Barang', 'barang', '177cbf2b2fda8daf8688bd68a5ea6e14', '3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `tb_potongan`
--
ALTER TABLE `tb_potongan`
  ADD PRIMARY KEY (`id_potongan`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tb_tunjangan`
--
ALTER TABLE `tb_tunjangan`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_potongan`
--
ALTER TABLE `tb_potongan`
  MODIFY `id_potongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD CONSTRAINT `tb_gaji_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_pegawai` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_potongan`
--
ALTER TABLE `tb_potongan`
  ADD CONSTRAINT `tb_potongan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_pegawai` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tunjangan`
--
ALTER TABLE `tb_tunjangan`
  ADD CONSTRAINT `tb_tunjangan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_pegawai` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
