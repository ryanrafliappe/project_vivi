-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 03:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_vivi`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `tanggal`) VALUES
(1, 'Kamu Kira Centang Biru Itu Selalu Aman? Sini Sini!', '<p><br>Silaturahmi itu penting, baik di kehidupan nyata maupun di dunia blogging. Termasuk di <a href=\"https://www.kompasiana.com/tag/kompasiana\">Kompasiana</a>. Seperti <a href=\"https://www.kompasiana.com/tag/platform\">platform</a> <a href=\"https://www.kompasiana.com/tag/blog\">blog</a> lainnya, rajin-rajinlah blog walking agar panjang umur. Eh, jadi balik ke dunia nyata lagi. Silaturahmi memperpanjang usia.</p><p>Dasar penulis receh, buka paragraf aja muter-muter!</p><p>Jadi kalau ada <a href=\"https://www.kompasiana.com/tag/kompasianer\">kompasianer</a> yang memberi rating, mainlah ke \"rumahnya\" juga. Beri ia rating, apa saja, asal jangan \"tidak menarik\". Itu namanya air susu dibalas air ketuban. Iya, gak nyambung.</p>', '2020-09-28 00:00:00'),
(2, 'Jangan Sok Moralis di Republik Ini Tentang G30S', '<p><strong>Sejarah adalah penipuan terbesar bagi manusia</strong>. Terkadang sejarah di manipulasi sedemikian rapi, sistematis dan hanya dikuasai oleh segelintir orang. Komunisme berangkat dari kenyataan obyektif bukan subyektif. Komunisme hadir melalui kenyataan hidup masyarakat. Kehadiran komunisme selalu menjadi ancaman bagi para pemeluk agama.</p><p><a href=\"https://www.kompasiana.com/tag/humaniora\">Humaniora</a> sejati adalah para pemeluk komunis. Karena mereka tulus mencintai sesama. Cinta mereka tanpa embel-embel. Kenyataan obyektif inilah yang menjadi musuh segelintir orang di negeri ini. Terutama peristiwa kemanusiaan G30S tahun 1965.&nbsp;</p>', '2020-09-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `kategori` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `foto`, `kategori`, `keterangan`, `tanggal`) VALUES
(10, '5faf537a4a4bcIMG-20200807-WA0004.jpg', 'Produk', '', '2020-11-14 11:48:10'),
(11, '5faf53a472466IMG-20200807-WA0001.jpg', 'Produk', '', '2020-11-14 11:48:52'),
(12, '5faf5425ab9d7IMG-20200807-WA0000.jpg', 'Produk', '', '2020-11-14 11:51:01'),
(13, '5faf5a2956a421.png', 'Project', '<p><strong>Pekerjaan Pembangunan Aspal Curah Sorong Milik PT. BUMI SARANA UTAMA (KALLA GROUP) Tahun 2011</strong></p>', '2020-11-14 12:16:41'),
(14, '5faf5b033aeb12.png', 'Project', '<p><strong>Pekerjaan Pembangunan Aspal Curah Sorong Milik PT. BUMI SARANA UTAMA (KALLA GROUP) Tahun 2011</strong></p>', '2020-11-14 12:20:19'),
(15, '5faf5c75ddb993.png', 'Project', '<p><strong>Pekerjaan Pembangunan Aspal Curah Sorong Milik PT. BUMI SARANA UTAMA (KALLA GROUP) Tahun 2011</strong></p>', '2020-11-14 12:26:29'),
(16, '5faf5c924d7484.png', 'Project', '<p><strong>Pekerjaan Pembangunan Aspal Curah Sorong Milik PT. BUMI SARANA UTAMA (KALLA GROUP) Tahun 2011</strong></p>', '2020-11-14 12:26:58'),
(17, '5faf5ce2925b45.png', 'Project', '<p><strong>Pekerjaan Pembangunan Aspal Curah Sorong Milik PT. BUMI SARANA UTAMA (KALLA GROUP) Tahun 2011</strong></p>', '2020-11-14 12:28:18'),
(18, '5faf5e92ed47d6.png', 'Project', '<p><strong>Pekerjaan Pembangunan Terminal Aspal Curah Kodya Jayapura Milik PT. BUMI SARANA UTAMA (KALLA GROUP) Tahun 2012</strong></p>', '2020-11-14 12:35:30'),
(19, '5faf5eb3ccab97.png', 'Project', '<p><strong>Pekerjaan Pembangunan Terminal Aspal Curah Kodya Jayapura Milik PT. BUMI SARANA UTAMA (KALLA GROUP) Tahun 2012</strong></p>', '2020-11-14 12:36:03'),
(20, '5faf5ed53d6b88.png', 'Project', '<p><strong>Pekerjaan Pembangunan Terminal Aspal Curah Kodya Jayapura Milik PT. BUMI SARANA UTAMA (KALLA GROUP) Tahun 2012</strong></p>', '2020-11-14 12:36:37'),
(21, '5faf5ef0c26c69.png', 'Project', '<p><strong>Pekerjaan Pembangunan Terminal Aspal Curah Kodya Jayapura Milik PT. BUMI SARANA UTAMA (KALLA GROUP) Tahun 2012</strong></p>', '2020-11-14 12:37:04'),
(22, '5faf607ac44d310.png', 'Project', '<p><strong>Pekerjaan Pembangunan Terminal Aspal Curah Pelabuhan Pagiman, Luwuk Banggai Milik PT. BUMI SARANA UTAMA (KALLA GROUP) Tahun 2014</strong></p>', '2020-11-14 12:43:38'),
(23, '5faf609824e8011.png', 'Project', '<p><strong>Pekerjaan Pembangunan Terminal Aspal Curah Pelabuhan Pagiman, Luwuk Banggai Milik PT. BUMI SARANA UTAMA (KALLA GROUP) Tahun 2014</strong></p>', '2020-11-14 12:44:08'),
(24, '5faf60c5b275412.png', 'Project', '<p><strong>Pekerjaan Pembangunan Terminal Aspal Curah Pelabuhan Pagiman, Luwuk Banggai Milik PT. BUMI SARANA UTAMA (KALLA GROUP) Tahun 2014</strong></p>', '2020-11-14 12:44:53'),
(25, '5faf60dc3341d13.png', 'Project', '<p><strong>Pekerjaan Pembangunan Terminal Aspal Curah Pelabuhan Pagiman, Luwuk Banggai Milik PT. BUMI SARANA UTAMA (KALLA GROUP) Tahun 2014</strong></p>', '2020-11-14 12:45:16'),
(26, '5faf634f739ec14.png', 'Project', '<p><strong>Rehabilitasi Bangunan Sipil Tahap I Pembangkit Listrik Tenaga Mikro (PLTM) Kapasitas 2 MW PLTM Sabilambo, Kolaka</strong></p>', '2020-11-14 12:55:43'),
(27, '5faf637090cb615.png', 'Project', '<p><strong>Rehabilitasi Bangunan Sipil Tahap I Pembangkit Listrik Tenaga Mikro (PLTM) Kapasitas 2 MW PLTM Sabilambo, Kolaka</strong></p>', '2020-11-14 12:56:16'),
(28, '5faf639839cd516.png', 'Project', '<p><strong>Rehabilitasi Bangunan Sipil Tahap I Pembangkit Listrik Tenaga Mikro (PLTM) Kapasitas 2 MW PLTM Sabilambo, Kolaka</strong></p>', '2020-11-14 12:56:56'),
(29, '5faf63dc5fd0b17.png', 'Project', '<p><strong>Rehabilitasi Bangunan Sipil Tahap I Pembangkit Listrik Tenaga Mikro (PLTM) Kapasitas 2 MW PLTM Sabilambo, Kolaka</strong></p>', '2020-11-14 12:58:04'),
(30, '5faf63f957be818.png', 'Project', '<p><strong>Rehabilitasi Bangunan Sipil Tahap I Pembangkit Listrik Tenaga Mikro (PLTM) Kapasitas 2 MW PLTM Sabilambo, Kolaka</strong></p>', '2020-11-14 12:58:33'),
(31, '5faf6421410fa19.png', 'Project', '<p><strong>Rehabilitasi Bangunan Sipil Tahap I Pembangkit Listrik Tenaga Mikro (PLTM) Kapasitas 2 MW PLTM Sabilambo, Kolaka</strong></p>', '2020-11-14 12:59:13'),
(32, '5faf67155f5f820.png', 'Project', '<p><strong>Rehabilitasi Bangunan Sipil Tahap II Pembangkit Listrik Tenaga Mikro (PLTM) Kapasitas 2 MW PLTM Sabilambo, Kolaka</strong></p>', '2020-11-14 13:11:49'),
(33, '5faf672ee6d7121.png', 'Project', '<p><strong>Rehabilitasi Bangunan Sipil Tahap II Pembangkit Listrik Tenaga Mikro (PLTM) Kapasitas 2 MW PLTM Sabilambo, Kolaka</strong></p>', '2020-11-14 13:12:14'),
(34, '5faf67684192823.png', 'Project', '<p><strong>Rehabilitasi Bangunan Sipil Tahap II Pembangkit Listrik Tenaga Mikro (PLTM) Kapasitas 2 MW PLTM Sabilambo, Kolaka</strong></p>', '2020-11-14 13:13:12'),
(35, '5faf67ae1fae124.png', 'Project', '<p><strong>Rehabilitasi Bangunan Sipil Tahap II Pembangkit Listrik Tenaga Mikro (PLTM) Kapasitas 2 MW PLTM Sabilambo, Kolaka</strong></p>', '2020-11-14 13:14:22'),
(36, '5faf67dba683e25.png', 'Project', '<p><strong>Rehabilitasi Bangunan Sipil Tahap II Pembangkit Listrik Tenaga Mikro (PLTM) Kapasitas 2 MW PLTM Sabilambo, Kolaka</strong></p>', '2020-11-14 13:15:07'),
(37, '5faf6a2aa7ca526.png', 'Project', '<p><strong>Pekerjaan Pengadaan dan Pemasangan Tangki HSD Kapasitas 2000 KL PLTG Maleo, Marise, Gorontalo</strong></p>', '2020-11-14 13:24:58'),
(38, '5faf6a4dcc43d27.png', 'Project', '<p><strong>Pekerjaan Pengadaan dan Pemasangan Tangki HSD Kapasitas 2000 KL PLTG Maleo, Marise, Gorontalo</strong></p>', '2020-11-14 13:25:33'),
(39, '5faf6a6a6ed7528.png', 'Project', '<p><strong>Pekerjaan Pengadaan dan Pemasangan Tangki HSD Kapasitas 2000 KL PLTG Maleo, Marise, Gorontalo</strong></p>', '2020-11-14 13:26:02'),
(40, '5faf6a846124929.png', 'Project', '<p><strong>Pekerjaan Pengadaan dan Pemasangan Tangki HSD Kapasitas 2000 KL PLTG Maleo, Marise, Gorontalo</strong></p>', '2020-11-14 13:26:28'),
(41, '5faf6a9d0967d30.png', 'Project', '<p><strong>Pekerjaan Pengadaan dan Pemasangan Tangki HSD Kapasitas 2000 KL PLTG Maleo, Marise, Gorontalo</strong></p>', '2020-11-14 13:26:53'),
(42, '5faf6abbe34b031.png', 'Project', '<p><strong>Pekerjaan Pengadaan dan Pemasangan Tangki HSD Kapasitas 2000 KL PLTG Maleo, Marise, Gorontalo</strong></p>', '2020-11-14 13:27:23'),
(43, '5faf6b0df0a88IMG-20201023-WA0001.jpg', 'Produk', '<p>Tangki</p>', '2020-11-14 13:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `nama`, `profil`) VALUES
(6, 'xxx', '<p>xxx</p>');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `item_desc` varchar(128) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `item_desc`, `spesifikasi`, `foto`) VALUES
(10, 'Kontainer Sampah', 'Tinggi : 60 Cm, Panjang : 105 Cm, Bahan Tong : Fiber Glass, Tebal : 2.5 mm,', '5fce0568a61ce5faf52b9c3704kontainer.jpg'),
(11, ' Sanyo introduces 65-inch LCD TV', '60 to 69-inch TVs', '5fcfbaa3003c1th.jpg'),
(12, 'Kontainer Sampah', '16 inch', '5fd1cd8b53187coba.jpeg'),
(13, 'Kontainer Sampah', 'kap 6. 5', '5fd6e4d3b9c02coba.jpeg'),
(15, 'Kontainer Sampah', '16 inch betul', '5fd74a518f4f4coba.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `produk_log`
--

CREATE TABLE `produk_log` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `log_code` varchar(56) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat_perusahaan` varchar(255) NOT NULL,
  `kota` text NOT NULL,
  `nama_surat` varchar(128) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `terbilang` varchar(255) NOT NULL,
  `jenis_surat` varchar(128) NOT NULL,
  `status_log` varchar(128) NOT NULL DEFAULT 'Menunggu Surat Penawaran Harga',
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_log`
--

INSERT INTO `produk_log` (`id`, `id_user`, `id_produk`, `log_code`, `nama_perusahaan`, `alamat_perusahaan`, `kota`, `nama_surat`, `harga`, `terbilang`, `jenis_surat`, `status_log`, `date`) VALUES
(296, 6, 10, '18122020012710', 'PT. Ammu', 'Makassar blok L', 'Kota Makassar', '18122020012710.png', '-', '-', 'Surat Permohonan', 'Menunggu Invoice', '18 December 2020'),
(297, 3, 11, '18122020012802', 'PT. Ammu jr', 'Makassar blok L', 'Kota Makassar', '18122020012802.png', '-', '-', 'Surat Permohonan', 'Menunggu Invoice', '18 December 2020'),
(298, 6, 10, '18122020012710', 'PT. Ammu', 'Makassar blok L', 'Kota Makassar', 'SURAT PENAWARAN HARGA', '500000', 'lima ratus ribu', 'SURAT PENAWARAN HARGA', 'Menunggu Invoice', '18 December 2020'),
(299, 3, 11, '18122020012802', 'PT. Ammu jr', 'Makassar blok L', 'Kota Makassar', 'SURAT PENAWARAN HARGA', '500000', 'lima ratus ribu', 'SURAT PENAWARAN HARGA', 'Menunggu Invoice', '18 December 2020'),
(300, 6, 10, '18122020012710', 'PT. Anugrah Teknik Mandiris', 'Komp. Ruko New Zamrud F.17 Jl. A.P. Pettarani Makassar ', 'Makassar', 'PO', '500000', 'lima ratus ribu', 'PO', 'Menunggu Invoice', 'Array'),
(301, 3, 11, '18122020012802', 'PT. Anugrah Teknik Mandiris', 'Komp. Ruko New Zamrud F.17 Jl. A.P. Pettarani Makassar ', 'Makassar', 'PO', '500000', 'lima ratus ribu', 'PO', 'Menunggu Invoice', 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `profil`) VALUES
(1, '<p><strong>PT. ANUGERAH TEHNIK MANDIRI </strong>merupakan pengembangan perusahaan dari CV. LADJALANI yang berdiri sejak tahun 1993 sesuai akta pendirian perusahaan No. 299 beserta perubahannya:</p><p>Perusahaan kami merupakan sebuah perusahaan yang bergerak di bidang konstruksi (pekerjaan sipil, mekanikal, elektrikal), Fabrikasi (peralatan mekanikal, mesin dan peralatan elektrikal), instalasi perpipaan, pembuatan tangki serta pemasangan mesin dan relokasi mesin-mesin pembangkit. PT. ANUGERAH TEHNIK MANDIRI memiliki pengalaman dan kompeten dibidangnya, juga didukung oleh sumber daya manusia yang profesional dalam memberikan pelayanan terbaik untuk menjamin kepuasaan klien kami.&nbsp;</p><p><strong>VISI</strong></p><p>Menjadi perusahaan yang terus berkembang dan maju dengan mengutamakan kualitas dan kepuasaaan pelanggan serta untuk mensejahterakan karyawan. Menjadi perusahaan swasta Indonesia yang unggul, profesional dan terdepan dalam melayani klien maupun mitra bisnis.</p><p><strong>MISI</strong></p><ul><li>Memberikan pelayanan terbaik secara profesional, sistematis dan teknologi yang terintegrasi.</li><li>Menghadirkan kegiatan operasional dan layanan yang terencana dan tepat sasaran</li><li>Menjalin hubungan kerjasama yang baik dengan partner jangka pendek maupun jangka panjang</li><li>Memberikan keuntungan yang maksimal bagi perusahaan dan seluruh Stakeholder</li></ul><figure class=\"table\"><table><tbody><tr><td>Nama Perusahaan&nbsp;</td><td><strong>PT. ANUGERAH TEHNIK MANDIRI&nbsp;</strong></td></tr><tr><td>Alamat Kantor&nbsp;</td><td>Komp. Ruko New Zamrud F.17 Jl. A.P. Pettarani Makassar&nbsp;</td></tr><tr><td>Telp.</td><td>&nbsp;(0411) 452455&nbsp;</td></tr><tr><td>Fax</td><td>(0411) 451335&nbsp;</td></tr><tr><td>Email</td><td>anugerahtehnik_mandiri@yahoo.com</td></tr></tbody></table></figure>');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_surat` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `surat_balasan` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `uom` varchar(56) NOT NULL,
  `total_harga` double NOT NULL,
  `supplier_name` varchar(128) NOT NULL,
  `supplier_contact` varchar(128) NOT NULL,
  `supplier_address` text NOT NULL,
  `supplier_contact_person` varchar(56) NOT NULL,
  `supplier_email` varchar(56) NOT NULL,
  `supplier_payment_terms` varchar(128) NOT NULL,
  `supplier_freight_terms` varchar(56) NOT NULL,
  `supplier_shipping_method` varchar(56) NOT NULL,
  `perusahaan_logo` varchar(128) NOT NULL,
  `perusahaan_nama` varchar(128) NOT NULL,
  `perusahaan_alamat` text NOT NULL,
  `perusahaan_nomor_telp` varchar(128) NOT NULL,
  `perusahaan_provinsi` varchar(128) NOT NULL,
  `procurement_bu` varchar(128) NOT NULL,
  `req_bu` varchar(128) NOT NULL,
  `bill_to_location` text NOT NULL,
  `default_ship_to_location` text NOT NULL,
  `po_number` varchar(56) NOT NULL,
  `date` date NOT NULL,
  `revision` int(11) NOT NULL,
  `buyer` varchar(128) NOT NULL,
  `Currency` varchar(56) NOT NULL,
  `status` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `first_approver` varchar(128) DEFAULT NULL,
  `last_approver` varchar(128) DEFAULT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `item_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `id_produk`, `price`, `qty`, `uom`, `total_harga`, `supplier_name`, `supplier_contact`, `supplier_address`, `supplier_contact_person`, `supplier_email`, `supplier_payment_terms`, `supplier_freight_terms`, `supplier_shipping_method`, `perusahaan_logo`, `perusahaan_nama`, `perusahaan_alamat`, `perusahaan_nomor_telp`, `perusahaan_provinsi`, `procurement_bu`, `req_bu`, `bill_to_location`, `default_ship_to_location`, `po_number`, `date`, `revision`, `buyer`, `Currency`, `status`, `description`, `first_approver`, `last_approver`, `spesifikasi`, `item_desc`) VALUES
(56, 10, 500000, 2, 'sdfgh', 1000000, 'PT. Anugrah Teknik Mandiris', '(0411) 452455 ', 'Komp. Ruko New Zamrud F.17 Jl. A.P. Pettarani Makassar ', '(0411) 452455 ', 'anugerahtehnik_mandiri@yahoo.com', 'sdfvg', 'asd', 'sdf', 'unm.jpg', 'pt ammu jr', 'dfgh', 'dfg', 'dfgh', 'dfg', 'sdfg', 'sdf', 'df', '18122020012710', '2020-12-18', 0, 'dsf', 'we', 'df', 'sdf', 'df', 'f', 'Tinggi : 60 Cm, Panjang : 105 Cm, Bahan Tong : Fiber Glass, Tebal : 2.5 mm,', 'Kontainer Sampah'),
(57, 11, 500000, 2, 'sd', 1000000, 'PT. Anugrah Teknik Mandiris', '(0411) 452455 ', 'Komp. Ruko New Zamrud F.17 Jl. A.P. Pettarani Makassar ', '(0411) 452455 ', 'anugerahtehnik_mandiri@yahoo.com', 'dfg', 'ASF', 'asd', 'uh.png', 'adsv', 'dc', 'asc', 'ac', 'asc', 'as', 'scasc', 'asca', '18122020012802', '2020-12-18', 0, 'asc', 'asc', 'asc', 'as', 'asc', 'asc', '60 to 69-inch TVs', ' Sanyo introduces 65-inch LCD TV');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pekerjaan`
--

CREATE TABLE `riwayat_pekerjaan` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL,
  `nama_client` varchar(255) NOT NULL,
  `waktu_pelaksanaan` varchar(255) NOT NULL,
  `fee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_pekerjaan`
--

INSERT INTO `riwayat_pekerjaan` (`id`, `lokasi`, `nama_pekerjaan`, `nama_client`, `waktu_pelaksanaan`, `fee`) VALUES
(2, 'rambakulu', 'PNS', 'Resky', '2020-12-08', '500000'),
(3, 'rambakulu', 'PNS', 'randi', '2020-12-26', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `katasandi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `katasandi`) VALUES
(1, 'PT. Mandiri Terkini', 'madiriterkini@gmail.com', '123'),
(2, 'admin', 'admin@admin.com', '123'),
(3, 'gery', 'gery@gmail.com', '123'),
(6, 'resky', 'resky@gmail.com', '123'),
(7, 'novita', 'novitadwicendaniraya@gmail.com', '123'),
(8, 'vivi', 'novitadwicendaniraya12@gmail.com', '456'),
(9, 'Takbir', 'takbirsyamsul@gmail.com', '12345'),
(10, 'viviraya', 'viviraya@gmail.com', '12345'),
(11, 'novitadwicendaniraya', 'novitadwicendaniraya@gmail.com', '12345'),
(17, 'isdar', 'isdar@gmail.com', '123456789'),
(18, 'jifki', 'jifki@gmial.com', '123456789'),
(19, 'workshop', 'workshop@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `id` int(11) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`id`, `barang`, `status`) VALUES
(3, 'th.jpg', 'SELESAI'),
(4, '5faf52b9c3704kontainer.jpg', 'SELESAI'),
(5, 'WhatsApp Image 2020-12-09 at 21.59.42.jpeg', 'SELESAI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_log`
--
ALTER TABLE `produk_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `produk_log`
--
ALTER TABLE `produk_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
