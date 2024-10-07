-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2024 pada 11.11
-- Versi server: 10.1.38-MariaDB
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
-- Database: `ci-peminjaman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_biaya_ops_mobil`
--

CREATE TABLE `tb_biaya_ops_mobil` (
  `kd_ops_mobil` varchar(50) NOT NULL,
  `kd_pengembalian` varchar(50) NOT NULL,
  `nama_user` text NOT NULL,
  `bbm` int(11) NOT NULL,
  `tol` int(11) NOT NULL,
  `parkir` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_biaya_ops_mobil`
--

INSERT INTO `tb_biaya_ops_mobil` (`kd_ops_mobil`, `kd_pengembalian`, `nama_user`, `bbm`, `tol`, `parkir`, `total`) VALUES
('OMB001', 'PG002', 'Fauzi', 150000, 50000, 30000, 230000),
('OMB002', 'PG004', 'Fauzi', 55555, 55555, 55555, 166665);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_biaya_ops_motor`
--

CREATE TABLE `tb_biaya_ops_motor` (
  `kd_ops_motor` varchar(50) NOT NULL,
  `kd_pengembalian` varchar(50) NOT NULL,
  `nama_user` text NOT NULL,
  `bbm` int(11) NOT NULL,
  `parkir` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_biaya_ops_motor`
--

INSERT INTO `tb_biaya_ops_motor` (`kd_ops_motor`, `kd_pengembalian`, `nama_user`, `bbm`, `parkir`, `total`) VALUES
('OMT001', 'PG001', 'Fauzi', 20000, 6000, 26000),
('OMT002', 'PG003', 'Fauzi', 23, 3123, 3146),
('OMT003', 'PG005', 'Fauzi', 10000, 5000, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `kd_kendaraan` varchar(50) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `merk` text NOT NULL,
  `nomor_polisi` varchar(50) NOT NULL,
  `warna` text NOT NULL,
  `status_kendaraan` varchar(50) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`kd_kendaraan`, `jenis_kendaraan`, `merk`, `nomor_polisi`, `warna`, `status_kendaraan`, `gambar`) VALUES
('KD001', 'Mobil', 'Toyota', 'BA 3456 JI', 'Putih', 'Tersedia', 'mobiltoyota.jpg'),
('KD002', 'Mobil', 'Suzuki', 'BA 1234 LK', 'Hitam', 'Tersedia', 'mobiluzuki.png'),
('KD004', 'Mobil', 'Avanza', 'BA 7897 AI', 'Silver', 'Tersedia', 'mobilavanza2.jpeg'),
('KD005', 'Motor', 'Honda', 'BA 8765 ST', 'Merah', 'Tersedia', 'motorhonda.jpg'),
('KD006', 'Motor', 'Yamaha', 'BA 0283 NM', 'Hitam', 'Tersedia', 'motoryamaha.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `kd_peminjaman` varchar(50) NOT NULL,
  `tgl_keberangkatan` date NOT NULL,
  `waktu_peminjaman` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` text NOT NULL,
  `kd_kendaraan` varchar(50) NOT NULL,
  `status_konfirmasi` varchar(50) NOT NULL,
  `tujuan` text NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`kd_peminjaman`, `tgl_keberangkatan`, `waktu_peminjaman`, `id_user`, `nama_user`, `kd_kendaraan`, `status_konfirmasi`, `tujuan`, `penanggung_jawab`) VALUES
('PJ001', '2024-01-01', '2 hari', 10, 'Fauzi', 'KD006', 'Dikembalikan', 'Pergi ke kota batusangkar', '2 Orang'),
('PJ002', '2024-01-05', '10 hari', 10, 'Fauzi', 'KD004', 'Dikembalikan', 'Dinas Luar kota', '6 Orang'),
('PJ003', '2024-01-09', '4 hari', 11, 'Hanifah', 'KD006', 'Dikembalikan', 'Pergi ke padang panjang', '1 orang'),
('PJ004', '2024-01-17', 'sad', 10, 'Fauzi', 'KD006', 'Dikembalikan', 'asd', 'sad'),
('PJ005', '2024-01-08', '3', 10, 'Fauzi', 'KD002', 'Dikembalikan', 'fasf', 'fs'),
('PJ006', '2024-01-23', '4 ', 10, 'Fauzi', 'KD006', 'Dikembalikan', 'ggg', 'haha'),
('PJ007', '2024-01-01', 'aaaa', 10, 'Fauzi', 'KD006', 'Menunggu', 'aaa', 'aaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `kd_pengembalian` varchar(50) NOT NULL,
  `kd_peminjaman` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` text NOT NULL,
  `kd_kendaraan` varchar(50) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `waktu_kembali` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`kd_pengembalian`, `kd_peminjaman`, `id_user`, `nama_user`, `kd_kendaraan`, `tgl_kembali`, `waktu_kembali`, `keterangan`) VALUES
('PG001', 'PJ001', 10, 'Fauzi', 'KD006', '2024-01-02', '2 hari', 'Dikembalikan tepat waktu'),
('PG002', 'PJ002', 10, 'Fauzi', 'KD004', '2024-01-17', '12 hari', 'Dikembalikan telat 2 hari'),
('PG003', 'PJ004', 10, 'Fauzi', 'KD006', '2024-01-30', '21', '212'),
('PG004', 'PJ005', 10, 'Fauzi', 'KD002', '2024-01-24', '6', 'dasd'),
('PG005', 'PJ006', 10, 'Fauzi', 'KD006', '2024-01-18', '6', 'dasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `nama` text NOT NULL,
  `nik` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `divisi` text NOT NULL,
  `level` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `nik`, `jenis_kelamin`, `alamat`, `email`, `no_hp`, `divisi`, `level`, `status`) VALUES
(8, 'admin', '$2y$10$v64FT1d/LJIMNpOaQM3jo.W4qJAwdSZQPPeiH7KuEmW0hTuVzlTIO', 'ADMIN', '123456789', 'Laki-laki', 'ADMIN', 'admin@gmail.com', '089999999', 'ADMIN', 'Admin', 1),
(10, 'pegawai1', '$2y$10$LI4tOSDnFrrFIslYrEDe9e7ugrgSZgZ3dN4cNd6zJTErc/2E6yT62', 'Fauzi', '123456789', 'Laki-laki', 'Sijunjung', 'fauzi@yahoo.com', '089999999', 'Sijunjung', 'Pegawai', 1),
(11, 'pegawai2', '$2y$10$iLltsVxRIO0uyVFBz.fLnuYLUZSrTdmXMxEwSjN.lnjtUxHCtYe7G', 'Hanifah', '987654321', 'Wanita', 'batusangkar', 'hanifah@gmail.com', '087777777', 'Sijunjung', 'Pegawai', 1),
(13, 'kepalaops', '$2y$10$dvKE6k7PLZcBRqVzq8XWk.k.tj52W8CY2tFK44L0CxwMSJ4vtizOy', 'kepala operasional', '888888888', 'Laki-laki', 'lllllllllll', 'kepalaops@gmail.com', '888888888', 'Kepala ops', 'Kepala Operasional', 1),
(14, 'pegawai3', '$2y$10$OJB5zqxhy9240lHnv77ZKOKYLFg6HaBdNbIe2NgMU87mjo6qPe5Qu', 'pegawai3', '11111', 'Laki-laki', '11111', '11111', '11111', '1111111', 'Pegawai', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_biaya_ops_mobil`
--
ALTER TABLE `tb_biaya_ops_mobil`
  ADD PRIMARY KEY (`kd_ops_mobil`);

--
-- Indeks untuk tabel `tb_biaya_ops_motor`
--
ALTER TABLE `tb_biaya_ops_motor`
  ADD PRIMARY KEY (`kd_ops_motor`);

--
-- Indeks untuk tabel `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`kd_kendaraan`);

--
-- Indeks untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`kd_peminjaman`);

--
-- Indeks untuk tabel `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD UNIQUE KEY `kd_pengembalian` (`kd_pengembalian`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
