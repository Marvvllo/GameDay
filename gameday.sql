-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 06:22 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameday`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `link` varchar(150) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner`, `gambar`, `link`, `status`) VALUES
(1, 'Final NBA Game 3!', 'raptors-vs-warriors.jpg', 'index.php?page=detail&game_id=6', 'off'),
(2, 'FIFA WC 2022 Final', 'FIFA2022Final.jpg', 'index.php?page=detail&game_id=12', 'on'),
(3, 'MPL Week 8 Day 2', 'esport-mpl_815de12.jpg', 'index.php?page=detail&game_id=10', 'on'),
(4, 'ATL Hawks vs MEM Grizzlies', '16x9.jpg', 'index.php?page=detail&game_id=4', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_game` varchar(100) NOT NULL,
  `spesifikasi` text NOT NULL,
  `tanggal_game` date NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `harga` int(150) NOT NULL,
  `stok` tinyint(4) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `kategori_id`, `nama_game`, `spesifikasi`, `tanggal_game`, `gambar`, `harga`, `stok`, `status`) VALUES
(2, 1, 'Atlanta Hawks vs Memphis Grizzlies', 'State Farm Arena, 15:00', '2022-03-07', 'hawksvsgrizzlies.png', 75000, 42, 'on'),
(3, 1, 'Los Angeles Lakers vs Milwaukee Bucks', 'Crypto.com Arena, 21:00', '2022-03-06', 'lakersvsbucks.jpg', 100000, 23, 'on'),
(4, 1, 'Atlanta Hawks vs Memphis Grizzlies', 'State Farm Arena, 19:00', '2022-04-05', '16x9.jpg', 120000, 12, 'on'),
(5, 1, 'Philadelphia 76ers vs Brooklyn Nets', 'Wells Fargo Center, 12:00', '2022-03-23', '76ers-vs-nets.jpg', 90000, 32, 'on'),
(6, 1, 'Toronto Raptors vs Golden State Warriors', 'Scotiabank Arena, 15:00', '2022-03-25', 'raptors-vs-warriors.jpg', 120000, 43, 'on'),
(7, 1, 'Houston Rockets vs Los Angeles Clippers', 'Toyota Center, 21:00', '2022-03-11', 'rockets-vs-clippers.jpg', 90000, 35, 'on'),
(8, 3, 'MPL Regular Season Week 2 Day 1', 'Orion Esports Arena, 14:30', '2022-04-21', '092788900_1616197014-Banner_MPL_Season_7_Week_4_pushnotif_3.jpg', 75000, 16, 'on'),
(9, 3, 'MPL Playoff Season 7', 'Orion Esports Arena, 13:00', '2022-05-01', 'mpl-1_ef31dd4.jpg', 35000, 23, 'on'),
(10, 3, 'MPL Regular Season Week 8 Day 2', 'Noki Esports Arena, 12:40', '2022-04-17', 'esport-mpl_815de12.jpg', 40000, 17, 'on'),
(11, 3, 'MPL Regular Season Week 1 Day 1', 'Noki Esports Arena, 14:30', '2022-02-17', 'MPLWeek1Day1.jpg', 35000, 18, 'on'),
(12, 2, 'FIFA WC 2022 Final Argentina vs Portugal', 'Lusail Stadium, 17:00', '2022-04-03', 'FIFA2022Final.jpg', 120000, 42, 'on'),
(13, 2, 'FIFA WC 2022 European Qualifiers', 'Lusail Stadium, 17:30', '2022-04-12', 'FIFA2022EUQualifiers.webp', 100000, 42, 'on'),
(14, 2, 'FIFA WC 2022 Africa Qualifiers', 'Al Bayt Stadium, 18:00', '2022-04-18', 'fifa2022wcafricaqualifiers.jpg', 85000, 24, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori` varchar(250) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`, `status`) VALUES
(1, 'basket', 'on'),
(2, 'sepak bola', 'on'),
(3, 'e-sports', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `konfirmasi_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_account` varchar(150) NOT NULL,
  `tanggal_transfer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`konfirmasi_id`, `pesanan_id`, `nomor_rekening`, `nama_account`, `tanggal_transfer`) VALUES
(2, 2, '11999', 'Marvello Ny', '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `user_id`, `tanggal`, `status`) VALUES
(1, 2, '2022-04-18', 2),
(2, 1, '2022-04-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `pesanan_id` int(10) NOT NULL,
  `game_id` int(10) NOT NULL,
  `quantity` tinyint(2) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`pesanan_id`, `game_id`, `quantity`, `harga`) VALUES
(1, 14, 3, 85000),
(2, 4, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `level` varchar(30) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `level`, `nama`, `email`, `phone`, `password`, `status`) VALUES
(1, 'superadmin', 'Admin', 'admin@gameday.com', '0895700868466', '21232f297a57a5a743894a0e4a801fc3', 'on'),
(2, 'customer', 'Marvello Nyahu', 'marvello@gameday.com', '0895700868466', '6512bd43d9caa6e02c990b0a82652dca', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`konfirmasi_id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `barang_id` (`game_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `konfirmasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON UPDATE CASCADE;

--
-- Constraints for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_detail_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
