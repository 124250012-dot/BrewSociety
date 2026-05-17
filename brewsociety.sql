-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2026 at 03:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brewsociety`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(3) NOT NULL,
  `id_produk` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `catatan` text NOT NULL,
  `jumlah` int(5) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `metode_pembayaran` varchar(30) NOT NULL,
  `status_pesanan` varchar(30) NOT NULL DEFAULT 'menunggu',
  `tanggal_pesanan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_produk`, `id_user`, `catatan`, `jumlah`, `total_harga`, `metode_pembayaran`, `status_pesanan`, `tanggal_pesanan`) VALUES
(1, 7, 2, '', 1, 25000, 'Cashless/QRIS', 'selesai', NULL),
(2, 6, 2, 'less ice', 4, 100000, 'Cashless/QRIS', 'selesai', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(3) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kategori`, `nama_produk`, `harga`, `image`) VALUES
(1, 'Coffee', 'Americano', 21000, 'https://i.pinimg.com/736x/6a/eb/a8/6aeba8412ebe8877326fe58804ed48d9.jpg'),
(2, 'Coffee', 'Latte', 23000, 'https://i.pinimg.com/736x/be/8d/41/be8d413f945e09c6236f726ec35b9a5f.jpg'),
(3, 'Coffee', 'Aren Latte', 24000, 'https://i.pinimg.com/736x/be/8d/41/be8d413f945e09c6236f726ec35b9a5f.jpg'),
(4, 'Coffee', 'Caramel Macchiato', 26000, 'https://i.pinimg.com/1200x/e3/ee/39/e3ee39a113856c5aba5bdaf749c020e7.jpg'),
(5, 'Coffee', 'Butterscotch Latte', 26000, 'https://i.pinimg.com/736x/97/6f/e7/976fe7d600238d377e398a77cd45bd51.jpg'),
(6, 'Non-Coffee', 'Matcha', 25000, 'https://i.pinimg.com/1200x/91/f6/21/91f6215417e9fd1c24703b8b8a4cc1d9.jpg'),
(7, 'Non-Coffee', 'Red Velvet', 25000, 'https://i.pinimg.com/236x/26/89/c2/2689c2c64ae72ff1fd34c02d4e5836ed.jpg'),
(8, 'Non-Coffee', 'Chocolate', 25000, 'https://i.pinimg.com/736x/43/6a/42/436a42f66975a9dc67b4b500aa2b9978.jpg'),
(9, 'Non-Coffee', 'Oreo Shake', 23000, 'https://i.pinimg.com/736x/af/7b/dc/af7bdcbb61ef4b26e1689cac532179af.jpg'),
(10, 'Non-Coffee', 'Mix Berries', 23000, 'https://i.pinimg.com/1200x/18/e3/b6/18e3b61de4412f9887c23b8fac0770f5.jpg'),
(11, 'Snack', 'Donut', 12000, 'https://i.pinimg.com/736x/73/96/9f/73969fa47be4e9cf003ecf2566bd20f4.jpg'),
(12, 'Snack', 'Cookies', 15000, 'https://i.pinimg.com/1200x/87/2f/2b/872f2b51a29c0de6c1289b4b5f0ba39e.jpg'),
(13, 'Snack', 'Croissant', 18000, 'https://i.pinimg.com/736x/6f/d1/9c/6fd19ce547ef7319e53a6ea37c18bfd9.jpg'),
(14, 'Snack', 'Cheese Cake', 25000, 'https://i.pinimg.com/1200x/e0/99/90/e099906dabf5cad7c427358b879e9c6a.jpg'),
(15, 'Snack', 'Mille Crepes', 21000, 'https://i.pinimg.com/736x/d2/77/fa/d277faff51aef18e36114423b07a8110.jpg'),
(16, 'Main Course', 'Nasi Goreng', 28000, 'https://i.pinimg.com/1200x/1c/69/90/1c6990a506575a673f5bb4730934e117.jpg'),
(17, 'Main Course', 'Rice Bowl', 28000, 'https://i.pinimg.com/736x/00/2b/c0/002bc0b61e57adc2a74021281c3b4bcd.jpg'),
(18, 'Main Course', 'Bakmie', 28000, 'https://i.pinimg.com/736x/2e/91/33/2e91336f8ab3ad8914a95b76c6496b89.jpg'),
(19, 'Main Course', 'Spaghetti', 30000, 'https://i.pinimg.com/736x/82/39/ef/8239ef29ad98767e1a16d24ce5a93970.jpg'),
(20, 'Main Course', 'Fish and Chips', 32000, 'https://i.pinimg.com/1200x/1a/5a/12/1a5a1266ef37681145a3a5d1e905c89c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `role` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `role`, `username`, `password`) VALUES
(1, 'member', 'aini', 'aini123'),
(2, 'kasir', 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
