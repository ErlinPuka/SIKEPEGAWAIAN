-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2024 pada 23.21
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_kepegawaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jam_kerja`
--

CREATE TABLE `tb_jam_kerja` (
  `id_jam_kerja` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jam_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jam_kerja`
--

INSERT INTO `tb_jam_kerja` (`id_jam_kerja`, `id_pegawai`, `jam_kerja`) VALUES
(1, 1, 9),
(2, 3, 7),
(3, 4, 9),
(4, 5, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kenek`
--

CREATE TABLE `tb_kenek` (
  `id_kenek` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `rit_angkutan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_palet`
--

CREATE TABLE `tb_palet` (
  `id_palet` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_jam_kerja` int(11) NOT NULL,
  `jumlah_palet` int(11) NOT NULL,
  `jenis_palet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama_pegawai`, `alamat`, `no_telp`, `email`, `password`) VALUES
(1, 'Heri', 'Jl. Tembaga No 1', '08637812763', 'sumanto@mail.com', '8b9352d4e4829704f3801232c18d609b'),
(3, 'Nadem', 'Jl. Renang No 3', '085829368392', 'nadem@gmail.com', '$2y$10$TYgt8S4kM6CAniwfPOLc0u.Dzms.LiFeXI5rnPD6PIZt7hyaLfBD2'),
(4, 'Peni', 'Jl. Ikan Paus No 3', '085763748950', 'syahrulhidayat342@gmail.com', '$2y$10$IA4gVvIvU4l/G6LXEuhIJe4iD30qyaVFfvQ0oNNLf2YIKpW/o8afK'),
(5, 'Admin 1', 'Jl. Golf No 12', '085789356748', 'admin@mail.com', '$2y$10$nwnEVpRIKnsTD8Ivjbvgpu7NJZIgSHWBC8.3uESvTwwFbZQRGfiYC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peg_mesin`
--

CREATE TABLE `tb_peg_mesin` (
  `id_peg_mesin` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_jam_kerja` int(11) NOT NULL,
  `mesin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_peg_mesin`
--

INSERT INTO `tb_peg_mesin` (`id_peg_mesin`, `id_pegawai`, `id_jam_kerja`, `mesin`) VALUES
(4, 1, 1, 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penggajian`
--

CREATE TABLE `tb_penggajian` (
  `id_penggajian` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jenis_penggajian` enum('bulanan','harian') NOT NULL,
  `total_gaji` int(11) NOT NULL,
  `tanggal_dibayar` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `bulan_penggajian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id_presensi` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `status_presensi` enum('hadir','sakit','izin','alpa') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_presensi`
--

INSERT INTO `tb_presensi` (`id_presensi`, `id_pegawai`, `status_presensi`, `tanggal`) VALUES
(3, 1, 'hadir', '2024-04-01'),
(4, 3, 'izin', '2024-05-04'),
(5, 1, 'hadir', '2024-04-02'),
(6, 3, 'hadir', '2024-05-01'),
(7, 1, 'hadir', '2024-04-03'),
(8, 3, 'hadir', '2024-05-02'),
(9, 4, 'hadir', '2024-05-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satpam`
--

CREATE TABLE `tb_satpam` (
  `id_satpam` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_satpam`
--

INSERT INTO `tb_satpam` (`id_satpam`, `id_pegawai`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_staf`
--

CREATE TABLE `tb_staf` (
  `id_staf` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_jam_kerja` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_staf`
--

INSERT INTO `tb_staf` (`id_staf`, `id_pegawai`, `id_jam_kerja`, `jabatan`) VALUES
(3, 1, 1, 'HRD 1'),
(4, 5, 4, 'Super Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supir`
--

CREATE TABLE `tb_supir` (
  `id_supir` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_jam_kerja` int(11) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `rit_angkutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_supir`
--

INSERT INTO `tb_supir` (`id_supir`, `id_pegawai`, `id_jam_kerja`, `transport`, `rit_angkutan`) VALUES
(2, 4, 3, 'Truk', 12);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jam_kerja`
--
ALTER TABLE `tb_jam_kerja`
  ADD PRIMARY KEY (`id_jam_kerja`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `tb_kenek`
--
ALTER TABLE `tb_kenek`
  ADD PRIMARY KEY (`id_kenek`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `tb_palet`
--
ALTER TABLE `tb_palet`
  ADD PRIMARY KEY (`id_palet`),
  ADD KEY `id_jam_kerja` (`id_jam_kerja`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tb_peg_mesin`
--
ALTER TABLE `tb_peg_mesin`
  ADD PRIMARY KEY (`id_peg_mesin`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_jam_kerja` (`id_jam_kerja`);

--
-- Indeks untuk tabel `tb_penggajian`
--
ALTER TABLE `tb_penggajian`
  ADD PRIMARY KEY (`id_penggajian`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `tb_satpam`
--
ALTER TABLE `tb_satpam`
  ADD PRIMARY KEY (`id_satpam`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `tb_staf`
--
ALTER TABLE `tb_staf`
  ADD PRIMARY KEY (`id_staf`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_jam_kerja` (`id_jam_kerja`);

--
-- Indeks untuk tabel `tb_supir`
--
ALTER TABLE `tb_supir`
  ADD PRIMARY KEY (`id_supir`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_jam_kerja` (`id_jam_kerja`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jam_kerja`
--
ALTER TABLE `tb_jam_kerja`
  MODIFY `id_jam_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kenek`
--
ALTER TABLE `tb_kenek`
  MODIFY `id_kenek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_palet`
--
ALTER TABLE `tb_palet`
  MODIFY `id_palet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_peg_mesin`
--
ALTER TABLE `tb_peg_mesin`
  MODIFY `id_peg_mesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_penggajian`
--
ALTER TABLE `tb_penggajian`
  MODIFY `id_penggajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_satpam`
--
ALTER TABLE `tb_satpam`
  MODIFY `id_satpam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_staf`
--
ALTER TABLE `tb_staf`
  MODIFY `id_staf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_supir`
--
ALTER TABLE `tb_supir`
  MODIFY `id_supir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_jam_kerja`
--
ALTER TABLE `tb_jam_kerja`
  ADD CONSTRAINT `tb_jam_kerja_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kenek`
--
ALTER TABLE `tb_kenek`
  ADD CONSTRAINT `tb_kenek_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_palet`
--
ALTER TABLE `tb_palet`
  ADD CONSTRAINT `tb_palet_ibfk_1` FOREIGN KEY (`id_jam_kerja`) REFERENCES `tb_jam_kerja` (`id_jam_kerja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_palet_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_peg_mesin`
--
ALTER TABLE `tb_peg_mesin`
  ADD CONSTRAINT `tb_peg_mesin_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_peg_mesin_ibfk_2` FOREIGN KEY (`id_jam_kerja`) REFERENCES `tb_jam_kerja` (`id_jam_kerja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_penggajian`
--
ALTER TABLE `tb_penggajian`
  ADD CONSTRAINT `tb_penggajian_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD CONSTRAINT `tb_presensi_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_satpam`
--
ALTER TABLE `tb_satpam`
  ADD CONSTRAINT `tb_satpam_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_staf`
--
ALTER TABLE `tb_staf`
  ADD CONSTRAINT `tb_staf_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_staf_ibfk_2` FOREIGN KEY (`id_jam_kerja`) REFERENCES `tb_jam_kerja` (`id_jam_kerja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_supir`
--
ALTER TABLE `tb_supir`
  ADD CONSTRAINT `tb_supir_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_supir_ibfk_2` FOREIGN KEY (`id_jam_kerja`) REFERENCES `tb_jam_kerja` (`id_jam_kerja`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
