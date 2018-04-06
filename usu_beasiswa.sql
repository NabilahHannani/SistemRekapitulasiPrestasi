-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Apr 2018 pada 15.36
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usu_beasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kompetisi`
--

CREATE TABLE `jenis_kompetisi` (
  `id_prestasi` tinyint(3) NOT NULL,
  `jenis_prestasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kompetisi`
--

INSERT INTO `jenis_kompetisi` (`id_prestasi`, `jenis_prestasi`) VALUES
(1, 'Lomba/Festival Komputer'),
(2, 'Lomba/Festival non-Komputer'),
(3, 'Aktif Penelitian'),
(4, 'Aktif Pengabdian Masyarakat'),
(5, 'Kepanitiaan Internal'),
(6, 'Kepanitiaan Eksternal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `username` char(5) NOT NULL,
  `nama_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `nip`, `nama_dosen`, `jk`, `alamat`, `no_hp`) VALUES
(2, '196506191989031001', 'Ginanjar i', 'L', 'Jalan Rawa Cangkuk III', '082166780065');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_history_lomba`
--

CREATE TABLE `tbl_history_lomba` (
  `id_history` int(11) NOT NULL,
  `id_lomba` int(11) DEFAULT NULL,
  `id_prestasi` tinyint(2) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `nim` char(9) DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_history_lomba`
--

INSERT INTO `tbl_history_lomba` (`id_history`, `id_lomba`, `id_prestasi`, `tanggal`, `nim`, `status`) VALUES
(6, 8, 1, '2018-03-09', '141402043', 'Sudah Terverifikasi'),
(7, 9, 1, '2018-03-10', '141402044', 'Sudah Terverifikasi'),
(8, 10, 2, '2018-04-10', '141402043', 'Sudah Terverifikasi'),
(9, 1, 3, '2018-04-11', '141402043', 'Sudah Terverifikasi'),
(10, 2, 4, '2018-04-11', '141402043', 'Sudah Terverifikasi'),
(11, 1, 5, '2018-04-11', '141402043', 'Belum Terverifikasi'),
(12, 2, 6, '2018-04-11', '141402043', 'Belum Terverifikasi'),
(13, 11, 1, '2018-04-07', '141402043', 'Belum Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level_user`
--

CREATE TABLE `tbl_level_user` (
  `id_level_user` tinyint(1) NOT NULL,
  `nama_level` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_level_user`
--

INSERT INTO `tbl_level_user` (`id_level_user`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Dosen'),
(3, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lomba`
--

CREATE TABLE `tbl_lomba` (
  `id_lomba` int(11) NOT NULL,
  `nim` char(9) NOT NULL,
  `nama_kompetisi` varchar(50) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `institusi` varchar(30) NOT NULL,
  `url` varchar(50) NOT NULL,
  `id_prestasi` tinyint(3) NOT NULL,
  `prestasi` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `lampiran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lomba`
--

INSERT INTO `tbl_lomba` (`id_lomba`, `nim`, `nama_kompetisi`, `waktu_pelaksanaan`, `lokasi`, `institusi`, `url`, `id_prestasi`, `prestasi`, `keterangan`, `lampiran`) VALUES
(8, '141402043', 'Kemerdekaan Perang', '2018-03-09', 'Medan', 'PEMKOT', 'http://www.lomba.com/', 1, 'HU', 'Pemenang Olimpiade', 'KULIT_DEPAN9.pdf'),
(9, '141402044', 'sdaas', '2017-11-30', 'asda', 'asas', 'http://www.lomba.com//', 1, '', 'asdas', 'KULIT_DEPAN10.pdf'),
(10, '141402043', 's', '1996-11-03', 'USU', 'USU', 'https://github.com/andreasnainggolan/usubeasiswa', 2, '', 'hsdwj`', 'CV_Rommy_Fauzi_-_BPKS.pdf'),
(11, '141402043', 'ds', '2006-04-03', 'USU', 'USU', 'https://stackoverflow.com/questions/968196/how-to-', 1, 'asa', 'dsds', '219689.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nim` char(9) NOT NULL,
  `nama_mahasiswa` varchar(30) NOT NULL,
  `jurusan` enum('Teknologi Informasi','Ilmu Komputer') NOT NULL,
  `JK` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nim`, `nama_mahasiswa`, `jurusan`, `JK`, `tempat_lahir`, `tanggal_lahir`, `alamat`) VALUES
('141402043', 'Andreas Putra Wijaya', 'Ilmu Komputer', 'P', 'assadas', '2018-12-30', 'asdas'),
('141402044', 'Irwansyah', 'Teknologi Informasi', 'P', 'Medan', '2018-03-16', 'Medan'),
('141402117', 'Nabilah Hannani', 'Teknologi Informasi', 'P', 'Medan', '1996-11-03', 'Jalan Rawa Cangkuk III'),
('admindf', 'Yunda ', 'Ilmu Komputer', 'P', 'Medan', '2016-11-03', 'dsd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_organisasi`
--

CREATE TABLE `tbl_organisasi` (
  `id_kepanitiaan` int(11) NOT NULL,
  `nim` char(9) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `nama_organisasi` varchar(50) NOT NULL,
  `nama_institusi` varchar(50) NOT NULL,
  `ketua_organisasi` varchar(30) NOT NULL,
  `waktu_jabatan` date NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `id_prestasi` tinytext NOT NULL,
  `keterangan` text NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `status` enum('Terverifikasi','Belum Terverifikasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_organisasi`
--

INSERT INTO `tbl_organisasi` (`id_kepanitiaan`, `nim`, `nama_jabatan`, `nama_organisasi`, `nama_institusi`, `ketua_organisasi`, `waktu_jabatan`, `lokasi`, `url`, `id_prestasi`, `keterangan`, `lampiran`, `status`) VALUES
(1, '141402043', 'ds', 'd', 'dqd', 'ds', '2017-10-03', 'USU', 'ttps://mail.google.com/mail/u/0/#inbox', '5', 'sghg', 'CV_Rommy_Fauzi_-_BPKS6.pdf', 'Belum Terverifikasi'),
(2, '141402043', 'sds', 'dsd', 'dss', 'Jijii', '2016-09-05', 'USU', 'ttps://mail.google.com/mail/u/0/#inbox', '6', 'Usu', 'CV_Rommy_Fauzi_-_BPKS7.pdf', 'Belum Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penelitian`
--

CREATE TABLE `tbl_penelitian` (
  `id_penelitian` int(11) NOT NULL,
  `nim` char(9) NOT NULL,
  `judul_penelitian` varchar(50) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `institusi` varchar(50) NOT NULL,
  `ketua_pelaksana` varchar(30) NOT NULL,
  `id_prestasi` tinyint(3) NOT NULL,
  `keterangan` text NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `status` enum('Terverifikasi','Belum Terverifikasi','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penelitian`
--

INSERT INTO `tbl_penelitian` (`id_penelitian`, `nim`, `judul_penelitian`, `waktu_pelaksanaan`, `lokasi`, `institusi`, `ketua_pelaksana`, `id_prestasi`, `keterangan`, `lampiran`, `status`) VALUES
(1, '141402043', 's', '1996-11-03', 'USU', 'USU', 'Yu', 3, 'dss', 'CV_Rommy_Fauzi_-_BPKS1.pdf', 'Belum Terverifikasi'),
(2, '141402043', 'sf', '2015-03-04', 'USU', 'USU', 'Yu', 4, 'sds', 'CV_Rommy_Fauzi_-_BPKS2.pdf', 'Belum Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_level_user` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `id_level_user`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, '9968278145', 'c5cf9ec95883699ecc55db64cb06de35', 2),
(11, '14140203', '19216fa9f408e9081a5cb7dca8cd3889', 3),
(12, '14140', 'd41d8cd98f00b204e9800998ecf8427e', 3),
(20, '141402043', '19216fa9f408e9081a5cb7dca8cd3889', 3),
(21, '141402044', '9ad6f8435a174116114d4587cd8131de', 3),
(22, 'admindf', '21232f297a57a5a743894a0e4a801fc3', 3),
(23, '141402117', 'cd8fb895ae8382ac015b7f20a53dee5c', 3);

--
-- Trigger `tbl_user`
--
DELIMITER $$
CREATE TRIGGER `hapusMahasiswa` AFTER DELETE ON `tbl_user` FOR EACH ROW BEGIN
DELETE FROM tbl_mahasiswa WHERE nim=OLD.username;
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_kompetisi`
--
ALTER TABLE `jenis_kompetisi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tbl_history_lomba`
--
ALTER TABLE `tbl_history_lomba`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `tbl_lomba`
--
ALTER TABLE `tbl_lomba`
  ADD PRIMARY KEY (`id_lomba`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD PRIMARY KEY (`id_kepanitiaan`);

--
-- Indexes for table `tbl_penelitian`
--
ALTER TABLE `tbl_penelitian`
  ADD PRIMARY KEY (`id_penelitian`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kompetisi`
--
ALTER TABLE `jenis_kompetisi`
  MODIFY `id_prestasi` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_history_lomba`
--
ALTER TABLE `tbl_history_lomba`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_level_user`
--
ALTER TABLE `tbl_level_user`
  MODIFY `id_level_user` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_lomba`
--
ALTER TABLE `tbl_lomba`
  MODIFY `id_lomba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  MODIFY `id_kepanitiaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_penelitian`
--
ALTER TABLE `tbl_penelitian`
  MODIFY `id_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
