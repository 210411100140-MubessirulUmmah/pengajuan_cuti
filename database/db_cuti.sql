-- phpMyAdmin SQL Dump
-- version 5.2.2-dev+20230602.64eceff4f9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2023 pada 11.26
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cuti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` varchar(30) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `alasan` text NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `mulai` date NOT NULL,
  `berakhir` date NOT NULL,
  `id_status_cuti` int(12) NOT NULL,
  `perihal_cuti` varchar(100) NOT NULL,
  `alasan_verifikasi` text DEFAULT NULL,
  `bukti_pembayaran` enum('Lunas','Belum Lunas') DEFAULT NULL,
  `surat_ortu` enum('Ada','Meragukan','Tidak Ada') DEFAULT NULL,
  `surat_kebenaran` enum('Ada','Meragukan','Tidak Ada') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_user`, `alasan`, `tgl_diajukan`, `mulai`, `berakhir`, `id_status_cuti`, `perihal_cuti`, `alasan_verifikasi`, `bukti_pembayaran`, `surat_ortu`, `surat_kebenaran`) VALUES
('cuti-06a5f', '40bae2603ae22725d35def9e7c48b0d6', 'Ikut Politik', '2022-08-11', '2022-08-22', '2022-08-23', 2, 'Rapat Orang Tua Siswa', 'Rapat Penting', 'Belum Lunas', 'Ada', 'Ada'),
('cuti-7d81b', 'beecc6bfae05c7fba5a19f27f41a27ec', 'Healing Ke Gunung', '2022-08-11', '2022-08-27', '2022-08-29', 3, 'Muncak', '', 'Lunas', 'Ada', 'Meragukan'),
('cuti-ae1f9', '45040532ab8fea21bf8c2a95cf5b8566', 'Ekonomi keluarga tidak Stabil', '2023-12-05', '2024-02-19', '2024-05-24', 2, 'Tidak Mampu Membayar UKT', 'Ya gapapa', 'Lunas', 'Ada', 'Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_cuti`
--

CREATE TABLE `status_cuti` (
  `id_status_cuti` int(11) NOT NULL,
  `status_cuti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_cuti`
--

INSERT INTO `status_cuti` (`id_status_cuti`, `status_cuti`) VALUES
(1, 'Menunggu Konfirmasi'),
(2, 'Izin Cuti Diterima'),
(3, 'Izin Cuti Ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(256) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_user_detail` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `id_user_level`, `id_user_detail`) VALUES
('134e349e4f50a051d8ca3687d6a7de1a', 'buk-1', 'buk-1', 'admin@admin.com', 2, '134e349e4f50a051d8ca3687d6a7de1a'),
('134e349e4f50a051d8ca3687d6a7de2b', 'teknik', 'teknik', 'teknik@trunojoyo.ac.id', 4, '134e349e4f50a051d8ca3687d6a7de2b'),
('134e349e4f50a051d8ca3687d6a7de3c', 'pendidikan', 'pendidikan', 'pendidikan@trunojoyo.ac.id', 4, '134e349e4f50a051d8ca3687d6a7de3c'),
('134e349e4f50a051d8ca3687d6a7de4d', 'sosialbudaya', 'sosialbudaya', 'sosialbudaya@trunojoyo.ac.id', 4, '134e349e4f50a051d8ca3687d6a7de4d'),
('134e349e4f50a051d8ca3687d6a7de5e', 'pertanian', 'pertanian', 'pertanian@trunojoyo.ac.id', 4, '134e349e4f50a051d8ca3687d6a7de5e'),
('134e349e4f50a051d8ca3687d6a7de6f', 'keislaman', 'keislaman', 'keislaman@trunojoyo.ac.id', 4, '134e349e4f50a051d8ca3687d6a7de6f'),
('134e349e4f50a051d8ca3687d6a7de7g', 'hukum', 'hukum', 'hukum@trunojoyo.ac.id', 4, '134e349e4f50a051d8ca3687d6a7de7g'),
('134e349e4f50a051d8ca3687d6a7de8h', 'ekonomi', 'ekonomi', 'ekonomi@trunojoyo.ac.id', 4, '134e349e4f50a051d8ca3687d6a7de8h'),
('1fcaef592c1b8f4b733b04e19be58f99', '210411100324', 'fajar', 'fajar@gmail.com', 1, '1fcaef592c1b8f4b733b04e19be58f99'),
('2fbb953bcaf76ff9d669197a6d9b6733', '210411100322', 'dedi', 'dedi@gmail.com', 1, '2fbb953bcaf76ff9d669197a6d9b6733'),
('39332f054c98c54e4eda83e1274566ed', '210411100325', 'putri', 'putri@gmail.com', 1, '39332f054c98c54e4eda83e1274566ed'),
('394125b4dd6a990d44234aacb50d131a', '210411100321', 'adbul', 'abdul@gmail.com', 1, '394125b4dd6a990d44234aacb50d131a'),
('40bae2603ae22725d35def9e7c48b0d6', '210411100326', 'zahra', 'zahra@gmail.com', 1, '40bae2603ae22725d35def9e7c48b0d6'),
('45040532ab8fea21bf8c2a95cf5b8566', '210411100084', 'ari', 'ari@gmail.com', 1, '45040532ab8fea21bf8c2a95cf5b8566'),
('98eb4077470a60a0fe0f7b9d01755557', 'buk-2', 'buk-2', 'ika@gmail.com', 2, '98eb4077470a60a0fe0f7b9d01755557'),
('ac17ba333687f309365285822a62d58d', '210411100003', 'raihan', 'raihanfadillah1409@gmail.com', 1, 'ac17ba333687f309365285822a62d58d'),
('beecc6bfae05c7fba5a19f27f41a27ec', '210411100323', 'elga', 'elga@gmail.com', 1, 'beecc6bfae05c7fba5a19f27f41a27ec'),
('f5972fbf4ef53843c1e12c3ae99e5005', 'bak-1', 'bak-1', 'kresna123@gmail.com', 3, 'f5972fbf4ef53843c1e12c3ae99e5005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_detail`
--

CREATE TABLE `user_detail` (
  `id_user_detail` varchar(256) NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `id_jenis_kelamin` int(12) DEFAULT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `prodi` text DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `fakultas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_detail`
--

INSERT INTO `user_detail` (`id_user_detail`, `nama_lengkap`, `id_jenis_kelamin`, `no_telp`, `prodi`, `alamat`, `semester`, `fakultas`) VALUES
('134e349e4f50a051d8ca3687d6a7de1a', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('134e349e4f50a051d8ca3687d6a7de2b', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('134e349e4f50a051d8ca3687d6a7de3c', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('134e349e4f50a051d8ca3687d6a7de4d\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('134e349e4f50a051d8ca3687d6a7de5e\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('134e349e4f50a051d8ca3687d6a7de6f', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('134e349e4f50a051d8ca3687d6a7de7g\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('134e349e4f50a051d8ca3687d6a7de8h', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('394125b4dd6a990d44234aacb50d131a', 'Abdul Haris', 1, '081234567890', 'Teknik Informatika', NULL, NULL, NULL),
('40bae2603ae22725d35def9e7c48b0d6', 'Zahra Amelia Fauzzi', 2, '085656456212', 'Manajemen', NULL, '3', 'Ekonomi'),
('45040532ab8fea21bf8c2a95cf5b8566', 'Ari Bagus F', 1, '0872291832', 'Teknik Informatika', 'Madiun', '5', 'Teknik'),
('98eb4077470a60a0fe0f7b9d01755557', NULL, 1, NULL, NULL, NULL, NULL, NULL),
('ac17ba333687f309365285822a62d58d', 'Raihan Fadillah', 1, '082301239009', 'Teknik Informatika', 'Sumenep', '5', 'Teknik'),
('beecc6bfae05c7fba5a19f27f41a27ec', 'Elga Yuan Saputra', 1, '081224567122', 'MSP', NULL, NULL, 'Pertanian'),
('f5972fbf4ef53843c1e12c3ae99e5005', NULL, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'pegawai'),
(2, 'admin'),
(3, 'super admin'),
(4, 'fakultas     ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indeks untuk tabel `status_cuti`
--
ALTER TABLE `status_cuti`
  ADD PRIMARY KEY (`id_status_cuti`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id_user_detail`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_cuti`
--
ALTER TABLE `status_cuti`
  MODIFY `id_status_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
