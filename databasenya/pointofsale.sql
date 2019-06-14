-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Jun 2018 pada 08.32
-- Versi Server: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pointofsale`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_toko`
--

CREATE TABLE IF NOT EXISTS `alamat_toko` (
  `Id_Toko` int(11) NOT NULL,
  `Nama_Toko` varchar(100) DEFAULT NULL,
  `Alamat_Toko` varchar(100) DEFAULT NULL,
  `Rt` varchar(15) NOT NULL,
  `Rw` varchar(15) NOT NULL,
  `Desa` varchar(100) DEFAULT NULL,
  `Kecamatan` varchar(50) DEFAULT NULL,
  `Kabupaten` varchar(30) DEFAULT NULL,
  `Kode_Pos` varchar(30) DEFAULT NULL,
  `Telp` varchar(20) DEFAULT NULL,
  `Fax` varchar(20) DEFAULT NULL,
  `Deskripsi_Toko` varchar(30) NOT NULL,
  `Email_Toko` varchar(30) NOT NULL,
  `Foto_Toko` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alamat_toko`
--

INSERT INTO `alamat_toko` (`Id_Toko`, `Nama_Toko`, `Alamat_Toko`, `Rt`, `Rw`, `Desa`, `Kecamatan`, `Kabupaten`, `Kode_Pos`, `Telp`, `Fax`, `Deskripsi_Toko`, `Email_Toko`, `Foto_Toko`) VALUES
(1, 'Toko Karisma', 'Perum. TNI-AL Blok B21 / 18', '03', '02', 'Sukamanah', 'Jonggol', 'Bogor', '16830', ' 02111377557', '16788', 'Toko Sembako', 'karisma123@gmail.com', '200318062958.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bahan_baku`
--

CREATE TABLE IF NOT EXISTS `tb_bahan_baku` (
  `Kode_Bahan_Baku` varchar(100) NOT NULL,
  `Kode_Gudang` varchar(15) NOT NULL,
  `Nama_Barang` varchar(50) DEFAULT NULL,
  `Lv1` int(11) NOT NULL,
  `Isi_Lv1` int(11) NOT NULL,
  `Name_Lv1` varchar(30) NOT NULL,
  `Lv2` int(11) NOT NULL,
  `Isi_Lv2` int(11) NOT NULL,
  `Name_Lv2` varchar(30) NOT NULL,
  `Lv3` int(11) NOT NULL,
  `Isi_Lv3` int(11) NOT NULL,
  `Name_Lv3` varchar(30) NOT NULL,
  `Lv4` int(11) NOT NULL,
  `Isi_Lv4` int(11) NOT NULL,
  `Name_Lv4` varchar(30) NOT NULL,
  `Foto_Barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bahan_baku`
--

INSERT INTO `tb_bahan_baku` (`Kode_Bahan_Baku`, `Kode_Gudang`, `Nama_Barang`, `Lv1`, `Isi_Lv1`, `Name_Lv1`, `Lv2`, `Isi_Lv2`, `Name_Lv2`, `Lv3`, `Isi_Lv3`, `Name_Lv3`, `Lv4`, `Isi_Lv4`, `Name_Lv4`, `Foto_Barang`) VALUES
('8991906101644', '2GD01', 'Rokok Jarum Coklat', 1, 1, 'Dus', 4, 3, 'Box', 8, 2, 'PCS', 0, 0, '', '260118053448.jpg'),
('8999909000544', '2GD01', 'Rokok Filter Black', 19, 1, 'Dus', 4, 1, 'Box', 8, 3, 'PCS', 0, 0, '', '250118190037.jpg'),
('9786021430637', '2GD01', 'buku php mysqli', 1, 1, 'PCS', 0, 0, '', 0, 0, '', 0, 0, '', '270218141854.png'),
('b1', '2GD01', 'tas', 1, 1, 'Dus', 2, 2, 'PCS', 0, 0, '', 0, 0, '', '140318062526.jpg'),
('BR001', '2GD01', 'Payung', 20, 1, 'Palet', 2, 0, 'Dus', 4, 1, 'Box', 8, 7, 'PCS', '190118025839.png'),
('BR002', '2GD01', 'Sosis Sonize', 2, 1, 'Dus', 8, 2, 'Box', 30, 28, 'PCS', 0, 0, '', '190118025954.png'),
('BR003', '2GD01', 'Minyak Palmia', 24, 1, 'Dus', 4, 2, 'Liter', 0, 0, '', 0, 0, '', '190118030040.png'),
('BR004', '2GD01', 'Terigu', 4, 1, 'Kg', 2, 1, 'Setengah Kg', 4, 2, 'Seperempat Kg', 0, 0, '', 'vcredist.bmp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bantudetailreturpembelian`
--

CREATE TABLE IF NOT EXISTS `tb_bantudetailreturpembelian` (
  `Id_Detail` varchar(30) NOT NULL,
  `No_Retur` varchar(100) DEFAULT NULL,
  `Kode_Bahan_Baku` varchar(100) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Level` varchar(30) NOT NULL,
  `Nama_Satuan` varchar(30) NOT NULL,
  `Kode_User` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bantu_pembelian`
--

CREATE TABLE IF NOT EXISTS `tb_bantu_pembelian` (
  `Id_Transaksi` varchar(100) NOT NULL,
  `Kode_Bahan_Baku` varchar(50) DEFAULT NULL,
  `Nama_Barang` varchar(50) NOT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Nama_Satuan` varchar(30) NOT NULL,
  `Level` varchar(30) NOT NULL,
  `Harga_Beli` double NOT NULL,
  `Kode_User` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `Id` varchar(100) NOT NULL,
  `Kode_Gudang` varchar(50) DEFAULT NULL,
  `Kode_Bahan_Baku` varchar(100) DEFAULT NULL,
  `Nama_Barang` varchar(100) DEFAULT NULL,
  `Isi` int(11) DEFAULT NULL,
  `Isi_Default` varchar(15) NOT NULL,
  `Level` varchar(30) NOT NULL,
  `Nama_Satuan` varchar(50) DEFAULT NULL,
  `Harga_Jual` double DEFAULT NULL,
  `Scan` varchar(20) NOT NULL,
  `Code_Barcode` varchar(100) NOT NULL,
  `Tanggal_Update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`Id`, `Kode_Gudang`, `Kode_Bahan_Baku`, `Nama_Barang`, `Isi`, `Isi_Default`, `Level`, `Nama_Satuan`, `Harga_Jual`, `Scan`, `Code_Barcode`, `Tanggal_Update`) VALUES
('8991906101644ScanLv2', '2GD01', '8991906101644', 'Rokok Jarum Coklat', 1, '4', 'Lv2', 'Box', 20000, 'Scan', '8991038766605', '2018-01-26 11:37:36'),
('8991906101644ScanLv3', '2GD01', '8991906101644', 'Rokok Jarum Coklat', 1, '8', 'Lv3', 'PCS', 12000, 'Scan', '8991906101644', '2018-01-26 11:36:49'),
('8991906101644TidakLv3', '2GD01', '8991906101644', 'Rokok Jarum Coklat', 1, '8', 'Lv3', 'PCS', 12000, 'Tidak', '', '2018-01-27 23:19:17'),
('8999909000544ScanLv2', '2GD01', '8999909000544', 'Rokok Filter Black', 1, '4', 'Lv2', 'Box', 20000, 'Scan', '5678', '2018-01-26 09:06:14'),
('8999909000544ScanLv3', '2GD01', '8999909000544', 'Rokok Filter Black', 1, '8', 'Lv3', 'PCS', 12000, 'Scan', '1234', '2018-01-26 09:02:31'),
('8999909000544TidakLv3', '2GD01', '8999909000544', 'Rokok Filter Black', 1, '8', 'Lv3', 'PCS', 12000, 'Tidak', '', '2018-01-26 09:01:18'),
('9786021430637ScanLv1', '2GD01', '9786021430637', 'buku php mysqli', 1, '', 'Lv1', 'PCS', 50000, 'Scan', '9786021430637', '2018-02-27 20:20:11'),
('BR001ScanLv3', '2GD01', 'BR001', 'Payung', 1, '4', 'Lv3', 'Box', 20000, 'Scan', '', '2017-10-02 14:43:33'),
('BR001ScanLv4', '2GD01', 'BR001', 'Payung', 1, '8', 'Lv4', 'PCS', 5000, 'Scan', '', '2018-01-19 09:02:57'),
('BR001TidakLv1', '2GD01', 'BR001', 'Payung', 1, '', 'Lv1', 'Palet', 25000, 'Tidak', '', '2018-01-19 09:01:43'),
('BR001TidakLv2', '2GD01', 'BR001', 'Payung', 1, '2', 'Lv2', 'Dus', 15000, 'Tidak', '', '2018-01-19 09:02:15'),
('BR001TidakLv3', '2GD01', 'BR001', 'Payung', 1, '4', 'Lv3', 'Box', 10000, 'Tidak', '', '2018-01-19 09:02:39'),
('BR001TidakLv4', '2GD01', 'BR001', 'Payung', 1, '8', 'Lv4', 'PCS', 5000, 'Tidak', '', '2018-01-19 09:03:17'),
('BR003ScanLv1', '2GD01', 'BR003', 'Minyak Palmia', 1, '', 'Lv1', 'Dus', 50000, 'Scan', '', '2018-01-19 09:20:52'),
('BR003ScanLv2', '2GD01', 'BR003', 'Minyak Palmia', 1, '4', 'Lv2', 'Liter', 20000, 'Scan', '', '2018-01-19 09:05:12'),
('BR003TidakLv1', '2GD01', 'BR003', 'Minyak Palmia', 1, '', 'Lv1', 'Dus', 50000, 'Tidak', '', '2018-01-19 09:03:46'),
('BR003TidakLv2', '2GD01', 'BR003', 'Minyak Palmia', 1, '4', 'Lv2', 'Liter', 20000, 'Tidak', '', '2018-01-19 09:04:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE IF NOT EXISTS `tb_customer` (
  `Id_Customer` varchar(50) NOT NULL,
  `Nama_Customer` varchar(50) DEFAULT NULL,
  `Jenis_Kelamin` varchar(20) NOT NULL,
  `Tempat` varchar(20) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `Telepon` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Agama` varchar(20) NOT NULL,
  `Kewarganegaraan` varchar(5) NOT NULL,
  `Tanggal_Registrasi` date NOT NULL,
  `No_Identitas` varchar(50) NOT NULL,
  `Jenis_Identitas` varchar(20) NOT NULL,
  `Foto_Identitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`Id_Customer`, `Nama_Customer`, `Jenis_Kelamin`, `Tempat`, `Tanggal_Lahir`, `Alamat`, `Telepon`, `Email`, `Agama`, `Kewarganegaraan`, `Tanggal_Registrasi`, `No_Identitas`, `Jenis_Identitas`, `Foto_Identitas`) VALUES
('CUS00001', 'Bayu', 'Laki-Laki', 'Bekasi', '1997-02-07', 'Perum. TNI-AL Blok B7 No.08 Rt 02 Rw 02 Des. Sukamanah Jonggol - Bogor ', '087688987654', 'bayu123@gmail.com', 'Islam', 'WNI', '2018-03-21', '889055673421', 'KTP', '210318054929.jpg'),
('CUS00002', 'Ujang', 'Laki-Laki', 'Depok', '1996-07-18', 'Perum. Cimahi Blok B6 / 8 Jonggol - Bogor', '089655453321', 'ujang@gmail.com', 'Kristen', 'WNI', '2018-03-21', '676835686784657', 'KTP', '210318055114.jpg'),
('CUS00003', 'Ucup', 'Laki-Laki', 'Jakarta', '1997-02-01', 'Perum. TNI-AL Blok A2 / 2 Rt 02 Rw 02 Des. Sukamanah Kec. Jonggol Kab. Bogor', '086676565434', 'ucup123@gmail.com', 'Islam', 'WNI', '2018-03-21', '547676989468768', 'KTP', '200318061658.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detailreturpembelian`
--

CREATE TABLE IF NOT EXISTS `tb_detailreturpembelian` (
  `Id_Detail` varchar(30) NOT NULL,
  `No_Retur` varchar(100) DEFAULT NULL,
  `Kode_Bahan_Baku` varchar(100) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Level` varchar(30) DEFAULT NULL,
  `Nama_Satuan` varchar(30) DEFAULT NULL,
  `Kode_User` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detailreturpembelian`
--

INSERT INTO `tb_detailreturpembelian` (`Id_Detail`, `No_Retur`, `Kode_Bahan_Baku`, `Qty`, `Level`, `Nama_Satuan`, `Kode_User`) VALUES
('DET00003', 'R190218BGR00003', 'BR001', 1, 'Lv4', 'PCS', 'USR20180200001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pembelian`
--

CREATE TABLE IF NOT EXISTS `tb_detail_pembelian` (
  `Id_Transaksi` varchar(50) NOT NULL,
  `No_Faktur` varchar(50) DEFAULT NULL,
  `Kode_User` varchar(50) NOT NULL,
  `Kode_Bahan_Baku` varchar(50) DEFAULT NULL,
  `Nama_Barang` varchar(50) NOT NULL,
  `Level` varchar(30) NOT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Nama_Satuan` varchar(30) NOT NULL,
  `Harga_Beli` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_pembelian`
--

INSERT INTO `tb_detail_pembelian` (`Id_Transaksi`, `No_Faktur`, `Kode_User`, `Kode_Bahan_Baku`, `Nama_Barang`, `Level`, `Qty`, `Nama_Satuan`, `Harga_Beli`) VALUES
('TRN020418BGR00007', 'INV020418BGR00006', 'USR20180400007', 'BR003', 'Minyak Palmia', 'Lv1', 8, 'Dus', 50000),
('TRN080218BGR00002', 'INV080218BGR00002', 'USR20180100002', 'BR004', 'Terigu', 'Lv1', 3, 'Kg', 15000),
('TRN090218BGR00004', 'INV090218BGR00004', 'USR20180200001', 'BR002', 'Sosis Sonize', 'Lv1', 1, 'Dus', 15000),
('TRN210218BGR00005', 'INV210218BGR00005', 'USR20180200001', 'BR001', 'Payung', 'Lv1', 20, 'Palet', 50000),
('TRN210218BGR00006', 'INV210218BGR00005', 'USR20180200001', 'BR003', 'Minyak Palmia', 'Lv1', 15, 'Dus', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gudang`
--

CREATE TABLE IF NOT EXISTS `tb_gudang` (
  `Kode_Gudang` varchar(15) NOT NULL,
  `Nama_Gudang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gudang`
--

INSERT INTO `tb_gudang` (`Kode_Gudang`, `Nama_Gudang`) VALUES
('2GD01', 'Gudang Barang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_header_pembelian_bahanbaku`
--

CREATE TABLE IF NOT EXISTS `tb_header_pembelian_bahanbaku` (
  `No_Faktur` varchar(100) NOT NULL,
  `Kode_User` varchar(50) DEFAULT NULL,
  `Kode_Supplier` varchar(50) DEFAULT NULL,
  `Tanggal_Pembelian` datetime DEFAULT NULL,
  `Discount` double NOT NULL,
  `Ppn` double NOT NULL,
  `Jenis_Pembayaran` varchar(20) DEFAULT NULL,
  `Nama_Bank` varchar(50) NOT NULL,
  `Nominal` double NOT NULL,
  `Kembali` double NOT NULL,
  `Tanggal_Jatuh_Tempo` date DEFAULT NULL,
  `Nomor_Rekening` varchar(50) DEFAULT NULL,
  `Atas_Nama` varchar(100) NOT NULL,
  `Total_Pembelian` double DEFAULT NULL,
  `Total_Pembelian_Sebelumnya` double NOT NULL,
  `Bukti_Pembayaran` varchar(100) DEFAULT NULL,
  `Status_Pembelian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_header_pembelian_bahanbaku`
--

INSERT INTO `tb_header_pembelian_bahanbaku` (`No_Faktur`, `Kode_User`, `Kode_Supplier`, `Tanggal_Pembelian`, `Discount`, `Ppn`, `Jenis_Pembayaran`, `Nama_Bank`, `Nominal`, `Kembali`, `Tanggal_Jatuh_Tempo`, `Nomor_Rekening`, `Atas_Nama`, `Total_Pembelian`, `Total_Pembelian_Sebelumnya`, `Bukti_Pembayaran`, `Status_Pembelian`) VALUES
('INV020418BGR00006', 'USR20180400007', 'SUP20171200003', '2018-04-02 18:17:23', 0, 0, 'Transfer', 'BRI', 400000, 0, '2018-04-24', '689787656412', 'lyla', 400000, 400000, '030418031040.jpg', 'Pending'),
('INV080218BGR00002', 'USR20180100002', 'SUP20171200003', '2018-02-08 03:24:30', 0, 0, 'Tunai', '', 50000, 5000, '0000-00-00', '-', '', 45000, 45000, '070218212430', 'Proses'),
('INV080218BGR00003', 'USR20180100002', 'SUP20171200003', '2018-02-08 05:44:39', 2, 0, 'Tunai', '', 25000, 5400, '2018-02-13', NULL, '', 19600, 20000, '070218234439.gif', 'Pending'),
('INV090218BGR00004', 'USR20180200001', 'SUP20171200001', '2018-02-09 02:08:31', 0, 0, 'Transfer', 'MANDIRI', 20000, 5000, '2018-02-10', '7687687776', 'dadang', 15000, 15000, '080218200831.png', 'Proses'),
('INV210218BGR00005', 'USR20180200001', 'SUP20171200003', '2018-02-21 09:13:23', 0, 0, 'Transfer', 'BCA', 1800000, 50000, '2018-02-24', '6577698770', 'amang mahmud', 1750000, 1750000, '210218031323.png', 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hutang`
--

CREATE TABLE IF NOT EXISTS `tb_hutang` (
  `Id_Hutang` varchar(100) NOT NULL,
  `Nota` varchar(100) DEFAULT NULL,
  `Id_Customer` varchar(50) DEFAULT NULL,
  `Kode_User` varchar(50) NOT NULL,
  `Tanggal_Hutang` datetime DEFAULT NULL,
  `Tanggal_Tempo_Hutang` datetime DEFAULT NULL,
  `Hutang` double NOT NULL,
  `Total_Hutang` double DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Nominal_Bunga` double NOT NULL,
  `Bunga` int(11) NOT NULL,
  `Total_Piutang` double NOT NULL,
  `Tanggal_Update_Piutang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hutang`
--

INSERT INTO `tb_hutang` (`Id_Hutang`, `Nota`, `Id_Customer`, `Kode_User`, `Tanggal_Hutang`, `Tanggal_Tempo_Hutang`, `Hutang`, `Total_Hutang`, `Status`, `Nominal_Bunga`, `Bunga`, `Total_Piutang`, `Tanggal_Update_Piutang`) VALUES
('HUT0218BGR000000000003', 'NOT0218BGR000000000007', 'CUS00001', 'USR20180200001', '2018-02-19 08:24:17', '2018-02-21 00:00:00', -7000, -6000, 'Hutang', 6930, 1, 6930, '2018-03-13 18:33:08'),
('HUT0318BGR000000000004', 'NOT0318BGR000000000008', 'CUS00001', 'USR20180200001', '2018-03-28 09:57:19', '2018-04-28 00:00:00', -7000, -7000, 'Hutang', 3500, 50, 0, '0000-00-00 00:00:00'),
('HUT0318BGR000000000005', 'NOT0318BGR000000000010', 'CUS00001', 'USR20180200001', '2018-03-31 09:32:07', '2018-04-30 00:00:00', -10000, -10000, 'Hutang', 200, 2, 0, '0000-00-00 00:00:00'),
('HUT0418BGR000000000006', 'NOT0418BGR000000000011', 'CUS00001', 'USR20180400009', '2018-04-16 15:11:43', '2018-05-16 00:00:00', -7000, -7000, 'Hutang', 7000, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hutangdetail`
--

CREATE TABLE IF NOT EXISTS `tb_hutangdetail` (
  `Id_Detail` varchar(100) NOT NULL,
  `Id_Hutang` varchar(100) DEFAULT NULL,
  `Kode_User` varchar(50) NOT NULL,
  `Tanggal_Bayar` datetime DEFAULT NULL,
  `Jenis_Bayar` varchar(50) DEFAULT NULL,
  `Bayar_Total` double DEFAULT NULL,
  `Sisa_Total` double DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hutangdetail`
--

INSERT INTO `tb_hutangdetail` (`Id_Detail`, `Id_Hutang`, `Kode_User`, `Tanggal_Bayar`, `Jenis_Bayar`, `Bayar_Total`, `Sisa_Total`, `Status`) VALUES
('DHT0218BGR000000000004', 'HUT0218BGR000000000003', 'USR20180200001', '2018-02-19 08:31:52', 'Tunai', 1000, -6000, 'Hutang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hutangreport`
--

CREATE TABLE IF NOT EXISTS `tb_hutangreport` (
  `Id_Hutang` varchar(100) NOT NULL,
  `Nota` varchar(100) DEFAULT NULL,
  `Id_Customer` varchar(100) DEFAULT NULL,
  `Kode_User` varchar(50) DEFAULT NULL,
  `Tanggal_Hutang` datetime DEFAULT NULL,
  `Tanggal_Tempo_Hutang` datetime DEFAULT NULL,
  `Tanggal_Selesai_Hutang` datetime DEFAULT NULL,
  `Total_Hutang` double DEFAULT NULL,
  `Bayar_Total` double DEFAULT NULL,
  `Sisa_Bayar` double NOT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Nominal_Bunga` double NOT NULL,
  `Bunga` int(11) NOT NULL,
  `Total_Piutang` double NOT NULL,
  `Tanggal_Update_Piutang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hutangreport`
--

INSERT INTO `tb_hutangreport` (`Id_Hutang`, `Nota`, `Id_Customer`, `Kode_User`, `Tanggal_Hutang`, `Tanggal_Tempo_Hutang`, `Tanggal_Selesai_Hutang`, `Total_Hutang`, `Bayar_Total`, `Sisa_Bayar`, `Status`, `Nominal_Bunga`, `Bunga`, `Total_Piutang`, `Tanggal_Update_Piutang`) VALUES
('HUT0218BGR000000000001', 'NOT0218BGR000000000002', 'CUS00001', 'USR20180200001', '2018-02-12 09:39:06', '2017-12-31 00:00:00', '2018-02-12 09:43:26', -7000, 7000, 0, 'Lunas', 6650, 5, 0, '2018-02-12 09:40:29'),
('HUT0218BGR000000000002', 'NOT0218BGR000000000003', 'CUS00001', 'USR20180200001', '2018-02-12 09:48:19', '2017-12-01 00:00:00', '2018-02-13 09:59:02', -7000, 8000, 1000, 'Lunas', 6650, 5, 0, '2018-02-13 09:56:43'),
('HUT0218BGR000000000003', 'NOT0218BGR000000000007', 'CUS00001', 'USR20180200001', '2018-02-19 08:24:17', '2018-02-21 00:00:00', NULL, -7000, NULL, 0, 'Hutang', 6930, 1, 6930, '2018-03-13 18:33:08'),
('HUT0318BGR000000000004', 'NOT0318BGR000000000008', 'CUS00001', 'USR20180200001', '2018-03-28 09:57:19', '2018-04-28 00:00:00', NULL, -7000, NULL, 0, 'Hutang', 3500, 50, 0, '0000-00-00 00:00:00'),
('HUT0318BGR000000000005', 'NOT0318BGR000000000010', 'CUS00001', 'USR20180200001', '2018-03-31 09:32:07', '2018-04-30 00:00:00', NULL, -10000, NULL, 0, 'Hutang', 200, 2, 0, '0000-00-00 00:00:00'),
('HUT0418BGR000000000006', 'NOT0418BGR000000000011', 'CUS00001', 'USR20180400009', '2018-04-16 15:11:43', '2018-05-16 00:00:00', NULL, -7000, NULL, 0, 'Hutang', 7000, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hutangreportdetail`
--

CREATE TABLE IF NOT EXISTS `tb_hutangreportdetail` (
  `Id_Detail` varchar(100) NOT NULL,
  `Id_Hutang` varchar(100) DEFAULT NULL,
  `Kode_User` varchar(50) DEFAULT NULL,
  `tanggal_Bayar` datetime DEFAULT NULL,
  `Jenis_Bayar` varchar(20) DEFAULT NULL,
  `Bayar_Total` double DEFAULT NULL,
  `Sisa_Total` double DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hutangreportdetail`
--

INSERT INTO `tb_hutangreportdetail` (`Id_Detail`, `Id_Hutang`, `Kode_User`, `tanggal_Bayar`, `Jenis_Bayar`, `Bayar_Total`, `Sisa_Total`, `Status`) VALUES
('DHT0218BGR000000000001', 'HUT0218BGR000000000001', 'USR20180200001', '2018-02-12 09:43:10', 'Tunai', 5000, -2000, 'Hutang'),
('DHT0218BGR000000000002', 'HUT0218BGR000000000001', 'USR20180200001', '2018-02-12 09:43:25', 'Tunai', 2000, 0, 'Lunas'),
('DHT0218BGR000000000003', 'HUT0218BGR000000000002', 'USR20180200001', '2018-02-13 09:59:02', 'Tunai', 8000, 1000, 'Lunas'),
('DHT0218BGR000000000004', 'HUT0218BGR000000000003', 'USR20180200001', '2018-02-19 08:31:52', 'Tunai', 1000, -6000, 'Hutang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hutang_piutang`
--

CREATE TABLE IF NOT EXISTS `tb_hutang_piutang` (
  `Id_Piutang` varchar(100) NOT NULL,
  `Id_Hutang` varchar(100) DEFAULT NULL,
  `Kode_User` varchar(50) DEFAULT NULL,
  `Nominal_Piutang` double DEFAULT NULL,
  `Bayar_Piutang` double DEFAULT NULL,
  `Jenis_Bayar` varchar(50) NOT NULL,
  `Sisa_Piutang` double DEFAULT NULL,
  `Kembali` double NOT NULL,
  `Keterangan` varchar(100) DEFAULT NULL,
  `Tanggal_Bayar_Piutang` datetime DEFAULT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hutang_piutang`
--

INSERT INTO `tb_hutang_piutang` (`Id_Piutang`, `Id_Hutang`, `Kode_User`, `Nominal_Piutang`, `Bayar_Piutang`, `Jenis_Bayar`, `Sisa_Piutang`, `Kembali`, `Keterangan`, `Tanggal_Bayar_Piutang`, `Status`) VALUES
('PHT0218HUT000000000001', 'HUT0218BGR000000000001', 'USR20180200001', 6650, 5000, 'Tunai', 1650, 0, 'nanggung', '2018-02-12 09:41:44', ''),
('PHT0218HUT000000000002', 'HUT0218BGR000000000001', 'USR20180200001', 1650, 2000, 'Tunai', 0, 350, 'lunas', '2018-02-12 09:42:24', ''),
('PHT0218HUT000000000003', 'HUT0218BGR000000000002', 'USR20180200001', 13300, 15000, 'Tunai', 0, 1700, 'selesai', '2018-02-13 09:57:49', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE IF NOT EXISTS `tb_penjualan` (
  `Nota` varchar(100) NOT NULL,
  `Kode_User` varchar(50) NOT NULL,
  `Tanggal_Penjualan` datetime DEFAULT NULL,
  `Discount` int(11) DEFAULT NULL,
  `Ppn` int(11) NOT NULL,
  `Total_Pembelian` double DEFAULT NULL,
  `Total_Sebelumnya` double NOT NULL,
  `Bayar` double NOT NULL,
  `Bayar_Sebelumnya` double NOT NULL,
  `Sisa` double NOT NULL,
  `Status` varchar(15) NOT NULL,
  `Status_Update` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`Nota`, `Kode_User`, `Tanggal_Penjualan`, `Discount`, `Ppn`, `Total_Pembelian`, `Total_Sebelumnya`, `Bayar`, `Bayar_Sebelumnya`, `Sisa`, `Status`, `Status_Update`) VALUES
('NOT0218BGR000000000001', 'USR20180200001', '2018-02-12 09:36:56', 0, 0, 12000, 12000, 12000, 12000, 0, 'Bayar', 'None'),
('NOT0218BGR000000000002', 'USR20180200001', '2018-02-12 09:39:06', 0, 0, 12000, 12000, 12000, 5000, 0, 'Lunas', 'None'),
('NOT0218BGR000000000003', 'USR20180200001', '2018-02-12 09:48:19', 0, 0, 12000, 12000, 13000, 5000, 1000, 'Lunas', 'None'),
('NOT0218BGR000000000004', 'USR20180200001', '2018-02-13 09:50:24', 0, 0, 10000, 10000, 10000, 10000, 0, 'Bayar', 'None'),
('NOT0218BGR000000000005', 'USR20180200001', '2018-02-12 11:07:25', 0, 0, 29000, 29000, 30000, 30000, 1000, 'Bayar', 'None'),
('NOT0218BGR000000000006', 'USR20180200001', '2018-02-18 08:55:35', 0, 0, 10000, 10000, 20000, 20000, 10000, 'Bayar', 'None'),
('NOT0218BGR000000000007', 'USR20180200001', '2018-02-19 08:24:17', 0, 0, 12000, 12000, 5000, 5000, -7000, 'Hutang', 'None'),
('NOT0318BGR000000000008', 'USR20180200001', '2018-03-28 09:57:19', 0, 0, 12000, 12000, 5000, 5000, -7000, 'Hutang', 'None'),
('NOT0318BGR000000000009', 'USR20180200001', '2018-03-31 09:24:03', 0, 0, 12000, 12000, 12000, 12000, 0, 'Bayar', 'None'),
('NOT0318BGR000000000010', 'USR20180200001', '2018-03-31 09:32:07', 0, 0, 20000, 20000, 10000, 10000, -10000, 'Hutang', 'None'),
('NOT0418BGR000000000011', 'USR20180400009', '2018-04-16 15:11:43', 0, 0, 12000, 12000, 5000, 5000, -7000, 'Hutang', 'None');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualanbantu`
--

CREATE TABLE IF NOT EXISTS `tb_penjualanbantu` (
  `Id_Nota` varchar(100) NOT NULL,
  `Nota` varchar(100) DEFAULT NULL,
  `Kode_User` varchar(50) NOT NULL,
  `Kode_Bahan_Baku` varchar(100) DEFAULT NULL,
  `Nama_Barang` varchar(100) NOT NULL,
  `Nama_Satuan` varchar(50) NOT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Level` varchar(20) NOT NULL,
  `Harga_Jual` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualandetail`
--

CREATE TABLE IF NOT EXISTS `tb_penjualandetail` (
  `Id_Nota` varchar(100) NOT NULL,
  `Nota` varchar(100) DEFAULT NULL,
  `Kode_User` varchar(50) NOT NULL,
  `Kode_Bahan_Baku` varchar(100) DEFAULT NULL,
  `Nama_Barang` varchar(100) NOT NULL,
  `Nama_Satuan` varchar(50) NOT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Level` varchar(20) NOT NULL,
  `Harga_Jual` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualandetail`
--

INSERT INTO `tb_penjualandetail` (`Id_Nota`, `Nota`, `Kode_User`, `Kode_Bahan_Baku`, `Nama_Barang`, `Nama_Satuan`, `Qty`, `Level`, `Harga_Jual`) VALUES
('DNT0218BGR000000000001', 'NOT0218BGR000000000001', 'USR20180200001', '8991906101644', 'Rokok Jarum Coklat', 'PCS', 1, 'Lv3', 12000),
('DNT0218BGR000000000002', 'NOT0218BGR000000000002', 'USR20180200001', '8991906101644', 'Rokok Jarum Coklat', 'PCS', 1, 'Lv3', 12000),
('DNT0218BGR000000000003', 'NOT0218BGR000000000003', 'USR20180200001', '8991906101644', 'Rokok Jarum Coklat', 'PCS', 1, 'Lv3', 12000),
('DNT0218BGR000000000004', 'NOT0218BGR000000000004', 'USR20180200001', 'BR001', 'Payung', 'Box', 1, 'Lv3', 10000),
('DNT0218BGR000000000005', 'NOT0218BGR000000000005', 'USR20180200001', '8991906101644', 'Rokok Jarum Coklat', 'PCS', 1, 'Lv3', 12000),
('DNT0218BGR000000000006', 'NOT0218BGR000000000005', 'USR20180200001', 'BR001', 'Payung', 'PCS', 1, 'Lv4', 5000),
('DNT0218BGR000000000007', 'NOT0218BGR000000000005', 'USR20180200001', '8999909000544', 'Rokok Filter Black', 'PCS', 1, 'Lv3', 12000),
('DNT0218BGR000000000008', 'NOT0218BGR000000000006', 'USR20180200001', 'BR001', 'Payung', 'Box', 1, 'Lv3', 10000),
('DNT0218BGR000000000009', 'NOT0218BGR000000000007', 'USR20180200001', '8991906101644', 'Rokok Jarum Coklat', 'PCS', 1, 'Lv3', 12000),
('DNT0318BGR000000000010', 'NOT0318BGR000000000008', 'USR20180200001', '8991906101644', 'Rokok Jarum Coklat', 'PCS', 1, 'Lv3', 12000),
('DNT0318BGR000000000011', 'NOT0318BGR000000000009', 'USR20180200001', '8999909000544', 'Rokok Filter Black', 'PCS', 1, 'Lv3', 12000),
('DNT0318BGR000000000012', 'NOT0318BGR000000000010', 'USR20180200001', '8999909000544', 'Rokok Filter Black', 'Box', 1, 'Lv2', 20000),
('DNT0418BGR000000000013', 'NOT0418BGR000000000011', 'USR20180400009', '8999909000544', 'Rokok Filter Black', 'PCS', 1, 'Lv3', 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_reportdetailreturpembelian`
--

CREATE TABLE IF NOT EXISTS `tb_reportdetailreturpembelian` (
  `Id_Detail` varchar(30) NOT NULL,
  `No_Retur` varchar(100) DEFAULT NULL,
  `Kode_Bahan_Baku` varchar(100) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Level` varchar(30) NOT NULL,
  `Nama_Satuan` varchar(30) NOT NULL,
  `Kode_User` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_reportdetailreturpembelian`
--

INSERT INTO `tb_reportdetailreturpembelian` (`Id_Detail`, `No_Retur`, `Kode_Bahan_Baku`, `Qty`, `Level`, `Nama_Satuan`, `Kode_User`) VALUES
('DET00001', 'R120218BGR00001', 'BR002', 1, 'Lv3', 'PCS', 'USR20180200001'),
('DET00002', 'R130218BGR00002', 'BR002', 1, 'Lv2', 'Box', 'USR20180200001'),
('DET00003', 'R190218BGR00003', 'BR001', 1, 'Lv4', 'PCS', 'USR20180200001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_reportreturpembelian`
--

CREATE TABLE IF NOT EXISTS `tb_reportreturpembelian` (
  `No_Retur` varchar(100) NOT NULL,
  `Kode_User` varchar(50) DEFAULT NULL,
  `Kode_Supplier` varchar(100) DEFAULT NULL,
  `Tanggal_Retur` datetime DEFAULT NULL,
  `Tanggal_SelesaiRetur` datetime DEFAULT NULL,
  `Keterangan` varchar(500) DEFAULT NULL,
  `Biaya_Retur` double DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_reportreturpembelian`
--

INSERT INTO `tb_reportreturpembelian` (`No_Retur`, `Kode_User`, `Kode_Supplier`, `Tanggal_Retur`, `Tanggal_SelesaiRetur`, `Keterangan`, `Biaya_Retur`, `Status`) VALUES
('R120218BGR00001', 'USR20180200001', 'SUP20171200003', '2018-02-12 09:57:43', '2018-02-12 10:04:13', 'tukar baru', 12000, 'Selesai'),
('R130218BGR00002', 'USR20180200001', 'SUP20171200001', '2018-02-13 09:10:40', '2018-02-13 09:13:58', 'tukar', 12000, 'Selesai'),
('R190218BGR00003', 'USR20180200001', 'SUP20171200003', '2018-02-19 08:39:26', NULL, 'tukar baru', 12000, 'Retur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_returpembelian`
--

CREATE TABLE IF NOT EXISTS `tb_returpembelian` (
  `No_Retur` varchar(100) NOT NULL,
  `Kode_User` varchar(50) DEFAULT NULL,
  `Kode_Supplier` varchar(100) DEFAULT NULL,
  `Tanggal_Retur` datetime DEFAULT NULL,
  `Keterangan` text,
  `Biaya_Retur` double DEFAULT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_returpembelian`
--

INSERT INTO `tb_returpembelian` (`No_Retur`, `Kode_User`, `Kode_Supplier`, `Tanggal_Retur`, `Keterangan`, `Biaya_Retur`, `Status`) VALUES
('R190218BGR00003', 'USR20180200001', 'SUP20171200003', '2018-02-19 08:39:26', 'tukar baru', 12000, 'Retur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan_bahan_baku`
--

CREATE TABLE IF NOT EXISTS `tb_satuan_bahan_baku` (
  `Id_Satuan` varchar(50) NOT NULL,
  `Satuan_Bahan_Baku` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_satuan_bahan_baku`
--

INSERT INTO `tb_satuan_bahan_baku` (`Id_Satuan`, `Satuan_Bahan_Baku`) VALUES
('1ST01', 'Palet'),
('1ST02', 'Kodi'),
('2ST01', 'Dus'),
('3ST01', 'Box'),
('4ST01', 'PCS'),
('5ST01', 'Kg'),
('6ST01', 'Seperempat Kg'),
('7ST01', 'Setengah Kg'),
('8ST01', 'Liter'),
('9ST01', 'Seperempat Liter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stokopname`
--

CREATE TABLE IF NOT EXISTS `tb_stokopname` (
  `Id_Stokopname` varchar(50) NOT NULL DEFAULT '',
  `Tanggal_Stokopname` datetime DEFAULT NULL,
  `Kode_User` varchar(50) DEFAULT NULL,
  `Normalisasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_stokopname`
--

INSERT INTO `tb_stokopname` (`Id_Stokopname`, `Tanggal_Stokopname`, `Kode_User`, `Normalisasi`) VALUES
('SO00002', '2018-02-13 09:24:05', 'USR20180200001', 'Finish'),
('SO00003', '2018-02-13 09:27:48', 'USR20180200001', 'Finish'),
('SO00004', '2018-03-03 12:07:13', 'USR20180200001', 'Finish'),
('SO00005', '2018-03-26 08:45:34', 'USR20180200001', 'Finish'),
('SO00007', '2018-04-03 11:00:59', 'USR20180400008', 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stokopnamedetail`
--

CREATE TABLE IF NOT EXISTS `tb_stokopnamedetail` (
  `Id_Detail` varchar(50) NOT NULL,
  `Id_Stokopname` varchar(50) DEFAULT NULL,
  `Kode_Bahan_Baku` varchar(50) DEFAULT NULL,
  `Nama_Barang` varchar(50) DEFAULT NULL,
  `Stok` int(11) DEFAULT NULL,
  `Stok_Nyata` int(11) DEFAULT NULL,
  `Stok_Selisih` int(11) DEFAULT NULL,
  `Nama_Satuan` varchar(30) NOT NULL,
  `Level` varchar(10) NOT NULL,
  `Keterangan` varchar(100) DEFAULT NULL,
  `Kode_User` varchar(50) NOT NULL,
  `Normalisasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_stokopnamedetail`
--

INSERT INTO `tb_stokopnamedetail` (`Id_Detail`, `Id_Stokopname`, `Kode_Bahan_Baku`, `Nama_Barang`, `Stok`, `Stok_Nyata`, `Stok_Selisih`, `Nama_Satuan`, `Level`, `Keterangan`, `Kode_User`, `Normalisasi`) VALUES
('SD0303180000000041', 'SO00004', 'BR002', 'Sosis Sonize', 2, 2, 0, 'Dus', 'Lv1', '', 'USR20180200001', 'Finish'),
('SD0303180000000042', 'SO00004', 'BR002', 'Sosis Sonize', 2, 2, 0, 'Box', 'Lv2', '', 'USR20180200001', 'Finish'),
('SD0303180000000043', 'SO00004', 'BR002', 'Sosis Sonize', 29, 28, -1, 'PCS', 'Lv3', '', 'USR20180200001', 'Finish'),
('SD0304180000000111', 'SO00007', '9786021430637', 'buku php mysqli', 1, 1, 0, 'PCS', 'Lv1', 'Ready', 'USR20180400008', 'Belum'),
('SD1205180000000081', 'SO00008', '9786021430637', 'buku php mysqli', 1, 1, 0, 'PCS', 'Lv1', 'rr', 'USR20180400007', 'Belum'),
('SD1302180000000021', 'SO00002', 'BR002', 'Sosis Sonize', 2, 2, 0, 'Dus', 'Lv1', 'ready', 'USR20180200001', 'Finish'),
('SD1302180000000022', 'SO00002', 'BR002', 'Sosis Sonize', 2, 2, 0, 'Box', 'Lv2', 'ready', 'USR20180200001', 'Finish'),
('SD1302180000000023', 'SO00002', 'BR002', 'Sosis Sonize', 29, 29, 0, 'PCS', 'Lv3', 'ready', 'USR20180200001', 'Finish'),
('SD1302180000000031', 'SO00003', 'BR002', 'Sosis Sonize', 2, 2, 0, 'Dus', 'Lv1', '', 'USR20180200001', 'Finish'),
('SD1302180000000032', 'SO00003', 'BR002', 'Sosis Sonize', 2, 2, 0, 'Box', 'Lv2', '', 'USR20180200001', 'Finish'),
('SD1302180000000033', 'SO00003', 'BR002', 'Sosis Sonize', 29, 29, 0, 'PCS', 'Lv3', '', 'USR20180200001', 'Finish'),
('SD2603180000000041', 'SO00005', 'BR001', 'Payung', 22, 20, -2, 'Palet', 'Lv1', 'hilang', 'USR20180200001', 'Finish'),
('SD2603180000000051', 'SO00005', 'BR002', 'Sosis Sonize', 2, 2, 0, 'Dus', 'Lv1', 'Ready', 'USR20180200001', 'Finish'),
('SD2603180000000061', 'SO00005', '9786021430637', 'buku php mysqli', 1, 1, 0, 'PCS', 'Lv1', 'Ready', 'USR20180200001', 'Finish'),
('SD2603180000000071', 'SO00005', '8999909000544', 'Rokok Filter Black', 21, 20, -1, 'Dus', 'Lv1', 'hilang', 'USR20180200001', 'Finish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stokopnamedetailbantu`
--

CREATE TABLE IF NOT EXISTS `tb_stokopnamedetailbantu` (
  `Id_Detail` varchar(50) NOT NULL,
  `Id_Stokopname` varchar(50) DEFAULT NULL,
  `Kode_Bahan_Baku` varchar(50) DEFAULT NULL,
  `Nama_Barang` varchar(50) DEFAULT NULL,
  `Stok` int(11) DEFAULT NULL,
  `Stok_Nyata` int(11) DEFAULT NULL,
  `Stok_Selisih` int(11) DEFAULT NULL,
  `Nama_Satuan` varchar(30) NOT NULL,
  `Level` varchar(10) NOT NULL,
  `Keterangan` varchar(100) DEFAULT NULL,
  `Kode_User` varchar(50) NOT NULL,
  `Normalisasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_stokopnamedetailbantu`
--

INSERT INTO `tb_stokopnamedetailbantu` (`Id_Detail`, `Id_Stokopname`, `Kode_Bahan_Baku`, `Nama_Barang`, `Stok`, `Stok_Nyata`, `Stok_Selisih`, `Nama_Satuan`, `Level`, `Keterangan`, `Kode_User`, `Normalisasi`) VALUES
('SD1205180000000081', 'SO00008', '9786021430637', 'buku php mysqli', 1, 1, 0, 'PCS', 'Lv1', 'rr', 'USR20180400007', 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE IF NOT EXISTS `tb_supplier` (
  `Kode_Supplier` varchar(50) NOT NULL,
  `Nama_Supplier` varchar(50) DEFAULT NULL,
  `Deskripsi` varchar(100) NOT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `Telepon` varchar(15) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`Kode_Supplier`, `Nama_Supplier`, `Deskripsi`, `Alamat`, `Telepon`, `Email`) VALUES
('SUP20171200001', 'Pt. Aksara', 'Supplier Pakaian', 'Jonggol', '089766765432', 'aksara@gmail.com'),
('SUP20171200002', 'Pt. Raya manufacturing', 'Supplier Elektronik', 'Jakarta Barat', '089755654142', 'raya@gmail.com'),
('SUP20171200003', 'Pt. Indofood', 'Supplier Sembako', 'Jakarta Raya', '085655676152', 'indofoof@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `Kode_User` varchar(50) NOT NULL,
  `No_Identitas` varchar(50) DEFAULT NULL,
  `Nama` varchar(50) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Pass` varchar(20) DEFAULT NULL,
  `Hak_Akses` varchar(30) DEFAULT NULL,
  `Jenis_Kelamin` varchar(20) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Contact` varchar(200) NOT NULL,
  `Kode_Supplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`Kode_User`, `No_Identitas`, `Nama`, `Username`, `Pass`, `Hak_Akses`, `Jenis_Kelamin`, `Phone`, `Contact`, `Kode_Supplier`) VALUES
('USR20180200001', '887677654342', 'Ardiyanto', 'ardiyanto', '123', 'Admin', 'Laki - Laki', '085694462012', 'Jonggol', ''),
('USR20180200004', '885644343122', 'PT. Aksara', 'aksara', '123', 'Supplier', 'Laki - Laki', '087766565432', 'Jakarta', 'SUP20171200001'),
('USR20180200005', '7865876987987', 'arya', 'arya', '123', 'Supplier', 'Laki - Laki', '089766565434', 'Jakarta', 'SUP20171200003'),
('USR20180400006', '109826787651', 'Endah Winarni', 'endah', '123', 'Pemilik Toko', 'Perempuan', '087677876565', 'Perum. TNI-AL Blok C21 No. 18 Rt 03 Rw 02 Desa Sukamanah Kecamatan Jonggol Kabupaten Bogor', ''),
('USR20180400007', '126787676543', 'Eko Sanjaya', 'eko', '123', 'Kepala Gudang', 'Laki - Laki', '089766565434', 'Perum. TNI-AL Blok A3 No. 1 Rt 04 Rw 02 Desa Sukamanah Kecamatan Jonggol Kabupaten Bogor', ''),
('USR20180400008', '768967545612', 'Yudi', 'yudi', '123', 'Kepala Penjualan', 'Laki - Laki', '085677676545', 'Perum. TNI-AL Blok B6 No. 9 Rt 03 Rw 02 Desa Sukamanah Kecamatan Jonggol Kabupaten Bogor', ''),
('USR20180400009', '089767656543', 'Intan', 'intan', '123', 'Kasir', 'Perempuan', '085677874512', 'Perum. TNI-AL Blok AA2 No. 2 Rt 04 Rw 02 Desa Sukamanah Kecamatan Jonggol Kabupaten Bogor', ''),
('USR20180400010', '778765561234', 'Raras', 'raras', '123', 'Accountant', 'Perempuan', '087788656512', 'Perum. TNI-AL Blok C1 No. 12 Rt 03 Rw 02 Desa Sukamanah Kecamatan Jonggol Kabupaten Bogor', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat_toko`
--
ALTER TABLE `alamat_toko`
  ADD PRIMARY KEY (`Id_Toko`);

--
-- Indexes for table `tb_bahan_baku`
--
ALTER TABLE `tb_bahan_baku`
  ADD PRIMARY KEY (`Kode_Bahan_Baku`);

--
-- Indexes for table `tb_bantudetailreturpembelian`
--
ALTER TABLE `tb_bantudetailreturpembelian`
  ADD PRIMARY KEY (`Id_Detail`);

--
-- Indexes for table `tb_bantu_pembelian`
--
ALTER TABLE `tb_bantu_pembelian`
  ADD PRIMARY KEY (`Id_Transaksi`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`Id_Customer`);

--
-- Indexes for table `tb_detailreturpembelian`
--
ALTER TABLE `tb_detailreturpembelian`
  ADD PRIMARY KEY (`Id_Detail`);

--
-- Indexes for table `tb_detail_pembelian`
--
ALTER TABLE `tb_detail_pembelian`
  ADD PRIMARY KEY (`Id_Transaksi`);

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`Kode_Gudang`);

--
-- Indexes for table `tb_header_pembelian_bahanbaku`
--
ALTER TABLE `tb_header_pembelian_bahanbaku`
  ADD PRIMARY KEY (`No_Faktur`);

--
-- Indexes for table `tb_hutang`
--
ALTER TABLE `tb_hutang`
  ADD PRIMARY KEY (`Id_Hutang`);

--
-- Indexes for table `tb_hutangdetail`
--
ALTER TABLE `tb_hutangdetail`
  ADD PRIMARY KEY (`Id_Detail`);

--
-- Indexes for table `tb_hutangreport`
--
ALTER TABLE `tb_hutangreport`
  ADD PRIMARY KEY (`Id_Hutang`);

--
-- Indexes for table `tb_hutangreportdetail`
--
ALTER TABLE `tb_hutangreportdetail`
  ADD PRIMARY KEY (`Id_Detail`);

--
-- Indexes for table `tb_hutang_piutang`
--
ALTER TABLE `tb_hutang_piutang`
  ADD PRIMARY KEY (`Id_Piutang`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`Nota`);

--
-- Indexes for table `tb_penjualanbantu`
--
ALTER TABLE `tb_penjualanbantu`
  ADD PRIMARY KEY (`Id_Nota`);

--
-- Indexes for table `tb_penjualandetail`
--
ALTER TABLE `tb_penjualandetail`
  ADD PRIMARY KEY (`Id_Nota`);

--
-- Indexes for table `tb_reportdetailreturpembelian`
--
ALTER TABLE `tb_reportdetailreturpembelian`
  ADD PRIMARY KEY (`Id_Detail`);

--
-- Indexes for table `tb_reportreturpembelian`
--
ALTER TABLE `tb_reportreturpembelian`
  ADD PRIMARY KEY (`No_Retur`);

--
-- Indexes for table `tb_returpembelian`
--
ALTER TABLE `tb_returpembelian`
  ADD PRIMARY KEY (`No_Retur`);

--
-- Indexes for table `tb_satuan_bahan_baku`
--
ALTER TABLE `tb_satuan_bahan_baku`
  ADD PRIMARY KEY (`Id_Satuan`);

--
-- Indexes for table `tb_stokopname`
--
ALTER TABLE `tb_stokopname`
  ADD PRIMARY KEY (`Id_Stokopname`);

--
-- Indexes for table `tb_stokopnamedetail`
--
ALTER TABLE `tb_stokopnamedetail`
  ADD PRIMARY KEY (`Id_Detail`);

--
-- Indexes for table `tb_stokopnamedetailbantu`
--
ALTER TABLE `tb_stokopnamedetailbantu`
  ADD PRIMARY KEY (`Id_Detail`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`Kode_Supplier`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`Kode_User`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
