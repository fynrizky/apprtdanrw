-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2019 pada 05.45
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbadm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `modulmenu`
--

CREATE TABLE `modulmenu` (
  `id_modul` int(11) NOT NULL,
  `nama_modul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `modulmenu`
--

INSERT INTO `modulmenu` (`id_modul`, `nama_modul`) VALUES
(1, 'dashboard'),
(2, 'master'),
(3, 'transaksi'),
(4, 'laporan'),
(5, 'users');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_agama`
--

CREATE TABLE `tabel_agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_agama`
--

INSERT INTO `tabel_agama` (`id_agama`, `agama`) VALUES
(1, 'islam'),
(2, 'kristen'),
(3, 'budha'),
(4, 'hindu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kelahiran`
--

CREATE TABLE `tabel_kelahiran` (
  `id_kelahiran` int(11) NOT NULL,
  `nama_balita` varchar(30) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `hari_lahir` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_kelahiran`
--

INSERT INTO `tabel_kelahiran` (`id_kelahiran`, `nama_balita`, `tempat_lahir`, `hari_lahir`, `tanggal_lahir`, `jenis_kelamin`, `id_kk`, `nama_ayah`, `nama_ibu`) VALUES
(3, 'adnan ardhani', 'jakarta', 'senin', '2015-05-25', 'laki-laki', 2, 'nur apandi', 'erna furiani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kematian`
--

CREATE TABLE `tabel_kematian` (
  `id_kematian` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `id_rtrw` int(11) NOT NULL,
  `sebab_kematian` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_kematian`
--

INSERT INTO `tabel_kematian` (`id_kematian`, `id_kk`, `id_warga`, `id_rtrw`, `sebab_kematian`) VALUES
(1, 1, 1, 3, 'sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_keperluan`
--

CREATE TABLE `tabel_keperluan` (
  `id_keperluan` int(11) NOT NULL,
  `keperluan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_keperluan`
--

INSERT INTO `tabel_keperluan` (`id_keperluan`, `keperluan`) VALUES
(1, 'membuat surat keterangan tidak mampu'),
(2, 'pindah alamat'),
(3, 'untuk mengurus surat kematian'),
(4, 'untuk membuat KJP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kk`
--

CREATE TABLE `tabel_kk` (
  `id_kk` int(11) NOT NULL,
  `id_rtrw` int(11) NOT NULL,
  `no_kk` varchar(18) NOT NULL,
  `nama_kk` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_kk`
--

INSERT INTO `tabel_kk` (`id_kk`, `id_rtrw`, `no_kk`, `nama_kk`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `pekerjaan`) VALUES
(1, 3, '3172010502092682', 'dra. ra. suyanti', 'jl. sukarela', 'perempuan', 'solo', '1969-07-23', 'islam', 'guru'),
(2, 3, '3172012804151033', 'nur apandi', 'jl. sukarela', 'laki-laki', 'jakarta', '1987-06-12', 'islam', 'karyawan swasta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_rtrw`
--

CREATE TABLE `tabel_rtrw` (
  `id_rtrw` int(11) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `kelurahan` varchar(12) NOT NULL,
  `kecamatan` varchar(12) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_rtrw`
--

INSERT INTO `tabel_rtrw` (`id_rtrw`, `rt`, `rw`, `kelurahan`, `kecamatan`, `gambar`) VALUES
(1, '001', '010', 'penjaringan', 'penjaringan', 'gbr-1551334519.png'),
(2, '002', '010', 'penjaringan', 'penjaringan', 'gbr-1551334590.png'),
(3, '003', '010', 'penjaringan', 'penjaringan', 'gbr-1551334639.png'),
(4, '004', '010', 'penjaringan', 'penjaringan', 'gbr-1551334695.png'),
(5, '005', '010', 'penjaringan', 'penjaringan', 'gbr-1551334729.png'),
(6, '006', '010', 'penjaringan', 'penjaringan', 'gbr-1551334786.png'),
(7, '007', '010', 'penjaringan', 'penjaringan', 'gbr-1551334872.png'),
(8, '008', '010', 'penjaringan', 'penjaringan', 'gbr-1551334926.png'),
(9, '009', '010', 'penjaringan', 'penjaringan', 'gbr-1551335038.png'),
(10, '010', '010', 'penjaringan', 'penjaringan', 'gbr-1551335141.png'),
(11, '011', '010', 'penjaringan', 'penjaringan', 'gbr-1551335170.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_sp`
--

CREATE TABLE `tabel_sp` (
  `id_sp` int(11) NOT NULL,
  `id_rtrw` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `id_keperluan` int(11) NOT NULL,
  `proses` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_sp`
--

INSERT INTO `tabel_sp` (`id_sp`, `id_rtrw`, `id_warga`, `id_keperluan`, `proses`) VALUES
(1, 3, 1, 4, 'sudah validasi'),
(2, 3, 6, 1, 'sudah validasi'),
(3, 3, 3, 4, 'belum validasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_warga`
--

CREATE TABLE `tabel_warga` (
  `id_warga` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `id_rtrw` int(11) NOT NULL,
  `nik` varchar(18) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tmp_lahir` varchar(25) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jns_kelamin` varchar(10) NOT NULL,
  `almt` text NOT NULL,
  `agm` varchar(10) NOT NULL,
  `status_perkawinan` varchar(12) NOT NULL,
  `pkrjaan` varchar(25) NOT NULL,
  `warganegara` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_warga`
--

INSERT INTO `tabel_warga` (`id_warga`, `id_kk`, `id_rtrw`, `nik`, `nama`, `tmp_lahir`, `tgl_lhr`, `jns_kelamin`, `almt`, `agm`, `status_perkawinan`, `pkrjaan`, `warganegara`) VALUES
(1, 1, 3, '3172012506950002', 'rizky fiyannur rachmanto', 'jakarta', '1995-06-25', 'laki-laki', 'jl. sukarela', 'islam', 'belum kawin', 'mahasiswa', 'indonesia'),
(2, 2, 3, '3172011206870007', 'nur apandi', 'jakarta', '1967-06-12', 'laki-laki', 'jl. sukarela', 'islam', 'kawin', 'karyawan swasta', 'indonesia'),
(3, 1, 3, '3172016307690001', 'dra. ra. suyanti', 'solo', '1969-07-23', 'perempuan', 'jl. sukarela', 'islam', 'kawin', 'guru', 'indonesia'),
(4, 1, 3, '3172013008970002', 'reztyo ', 'jakarta', '1997-08-30', 'laki-laki', 'jl. sukarela', 'islam', 'belum kawin', 'mahasiswa', 'indonesia'),
(5, 1, 3, '3172015103040003', 'rahmahtiawati marfiyannur r', 'jakarta', '2004-03-11', 'perempuan', 'jl. sukarela', 'islam', 'belum kawin', 'pelajar', 'indonesia'),
(6, 2, 3, '3172015803880003', 'erna furiani', 'jakarta', '1988-03-16', 'perempuan', 'jl. sukarela', 'islam', 'kawin', 'mengurus rumah tangga', 'indonesia'),
(7, 2, 3, '3172016101081008', 'aira nur zahra', 'jakarta', '2008-01-21', 'perempuan', 'jl. sukarela', 'islam', 'belum kawin', 'belum Bekerja', 'indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `level`) VALUES
(1, 'administrator', '$2y$10$pCtlcpiF0f6Kt/Nz/Hw59emDzUnAft0GlB4CdUGzPakLIbGDDWmri', 1),
(2, 'rw', '$2y$10$8Oh.Ztfpx8.RpPbbKJrwiOaT6ZygpaJxRxvRkCx28r2i9/.NSJqTe', 2),
(3, 'rt', '$2y$10$UwKoeYXU./AM5u6gusIXHuLCh3PeGKcMNnfc7QkEN2bE3OIOomsfG', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `modulmenu`
--
ALTER TABLE `modulmenu`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indeks untuk tabel `tabel_agama`
--
ALTER TABLE `tabel_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `tabel_kelahiran`
--
ALTER TABLE `tabel_kelahiran`
  ADD PRIMARY KEY (`id_kelahiran`);

--
-- Indeks untuk tabel `tabel_kematian`
--
ALTER TABLE `tabel_kematian`
  ADD PRIMARY KEY (`id_kematian`);

--
-- Indeks untuk tabel `tabel_keperluan`
--
ALTER TABLE `tabel_keperluan`
  ADD PRIMARY KEY (`id_keperluan`);

--
-- Indeks untuk tabel `tabel_kk`
--
ALTER TABLE `tabel_kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indeks untuk tabel `tabel_rtrw`
--
ALTER TABLE `tabel_rtrw`
  ADD PRIMARY KEY (`id_rtrw`);

--
-- Indeks untuk tabel `tabel_sp`
--
ALTER TABLE `tabel_sp`
  ADD PRIMARY KEY (`id_sp`);

--
-- Indeks untuk tabel `tabel_warga`
--
ALTER TABLE `tabel_warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `modulmenu`
--
ALTER TABLE `modulmenu`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tabel_agama`
--
ALTER TABLE `tabel_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tabel_kelahiran`
--
ALTER TABLE `tabel_kelahiran`
  MODIFY `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_kematian`
--
ALTER TABLE `tabel_kematian`
  MODIFY `id_kematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_keperluan`
--
ALTER TABLE `tabel_keperluan`
  MODIFY `id_keperluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tabel_kk`
--
ALTER TABLE `tabel_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tabel_rtrw`
--
ALTER TABLE `tabel_rtrw`
  MODIFY `id_rtrw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tabel_sp`
--
ALTER TABLE `tabel_sp`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_warga`
--
ALTER TABLE `tabel_warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
