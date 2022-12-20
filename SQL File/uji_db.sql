-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306:3308
-- Generation Time: Dec 20, 2022 at 12:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uji_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) CHARACTER SET latin1 NOT NULL,
  `createuser` varchar(255) DEFAULT NULL,
  `deleteuser` varchar(255) DEFAULT NULL,
  `createbid` varchar(255) DEFAULT NULL,
  `updatebid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `createuser`, `deleteuser`, `createbid`, `updatebid`) VALUES
(1, 'Superuser', '1', '1', '1', '1'),
(2, 'Admin', '1', NULL, '1', '1'),
(3, 'User', NULL, NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `Staffid` int(10) DEFAULT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `Photo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'avatar15.jpg',
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `Staffid`, `AdminName`, `UserName`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Status`, `Photo`, `Password`, `AdminRegdate`) VALUES
(2, 1005, 'Admin', 'admin', 'rio', 'ira', 770546590, 'admin@gmail.com', 1, '3f9470b34a8e3f526dbdb022f9f19cf7.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '2021-06-21 10:18:39'),
(9, 1234, 'Admin', 'tom', 'Agaba', 'tom', 757537271, 'tom@gmail.com', 1, 'pic_3.jpg', '25d55ad283aa400af464c76d713c07ad', '2021-06-21 07:08:48'),
(29, 0, 'User', 'gerald', 'Gerald', 'Brain', 770546590, 'brain@gmail.com', 1, 'avatar15.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '2021-07-24 10:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `ToolsId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `BookingNumber`, `userEmail`, `ToolsId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`, `LastUpdationDate`) VALUES
(1, 123456789, 'test@gmail.com', 1, '2020-07-07', '2020-07-09', 'What  is the cost?', 1, '2020-07-07 14:03:09', NULL),
(2, 987456321, 'test@gmail.com', 4, '2020-07-19', '2020-07-24', 'hfghg', 1, '2020-07-09 17:49:21', '2021-01-16 20:09:42'),
(4, 903014017, 'gerald@gmail.com', 8, '2021-01-16', '2021-01-21', 'service it very well', 0, '2021-01-16 20:16:13', NULL),
(5, 901268746, 'gerald@gmail.com', 2, '2021-02-16', '2021-02-18', 'good conditions', 2, '2021-02-15 08:14:05', '2021-06-14 03:23:13'),
(6, 958065939, 'john@gmail.com', 6, '2021-07-26', '2021-07-28', 'I need that Toolswhen it is well serviced', 1, '2021-07-26 07:05:08', '2021-07-26 07:23:02'),
(7, 345568254, 'john@gmail.com', 3, '2021-07-29', '2021-07-31', 'That Toolsis beautiful', 0, '2021-07-26 07:14:47', NULL),
(8, 391717396, 'udin@gmail.com', 24, '2022-12-07', '2022-12-15', 'dafaf', 1, '2022-12-20 10:48:06', '2022-12-20 10:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyemail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyphone` int(10) NOT NULL,
  `companyaddress` varchar(255) CHARACTER SET latin1 NOT NULL,
  `companylogo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'avatar15.jpg',
  `status` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`id`, `regno`, `companyname`, `companyemail`, `country`, `companyphone`, `companyaddress`, `companylogo`, `status`, `creationdate`) VALUES
(4, '1005', 'ToolsRental', 'rental@gmail.com', 'Canada', 770546590, 'Luthuli Avenue', 'ca53ba82ba62d3d3f8707bde131ebd78.jpg', '1', '2021-02-02 12:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblitems`
--

CREATE TABLE `tblitems` (
  `id` int(11) NOT NULL,
  `itemTitle` varchar(150) DEFAULT NULL,
  `itemsBrand` int(11) DEFAULT NULL,
  `itemsOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `antiair` int(11) DEFAULT NULL,
  `tahankarat` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblitems`
--

INSERT INTO `tblitems` (`id`, `itemTitle`, `itemsBrand`, `itemsOverview`, `PricePerDay`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `antiair`, `tahankarat`, `RegDate`, `UpdationDate`) VALUES
(1, 'Barang1', 1, 'Maruti Wagon R Latest Updates\r\n\r\nMaruti Suzuki has launched the BS6 Wagon R S-CNG in India. The LXI CNG and LXI (O) CNG variants now cost Rs 5.25 lakh and Rs 5.32 lakh respectively, up by Rs 19,000. Maruti claims a fuel economy of 32.52km per kg. The CNG Wagon R’s continuation in the BS6 era is part of the carmaker’s ‘Mission Green Million’ initiative announced at Auto Expo 2020.\r\n\r\nPreviously, the carmaker had updated the 1.0-litre powertrain to meet BS6 emission norms. It develops 68PS of power and 90Nm of torque, same as the BS4 unit. However, the updated motor now returns 21.79 kmpl, which is a little less than the BS4 unit’s 22.5kmpl claimed figure. Barring the CNG variants, the prices of the Wagon R 1.0-litre have been hiked by Rs 8,000.', 500, 'kariel2.png', 'maruti1.jpg', 'maruti3.jpg', 'steering-close-up-1288209207_930x620.jpg', 'boot-with-standard-luggage-202327489_930x620.jpg', 1, 1, '2020-07-07 07:04:35', '2021-07-23 20:08:26'),
(2, 'Barang2', 2, 'BMW 5 Series price starts at ? 55.4 Lakh and goes upto ? 68.39 Lakh. The price of Petrol version for 5 Series ranges between ? 55.4 Lakh - ? 60.89 Lakh and the price of Diesel version for 5 Series ranges between ? 60.89 Lakh - ? 68.39 Lakh.', 1000, 'kariel3.png', 'bmw2.jpg', 'bmw5.jpg', 'bmw6.jpg', 'bmw7.jpg', 1, 1, '2020-07-07 07:12:02', '2021-07-23 19:42:22'),
(3, 'Barang3', 3, 'As per ARAI, the mileage of Q8 is 0 kmpl. Real mileage of the vehicle varies depending upon the driving habits. City and highway mileage figures also vary depending upon the road conditions.', 3000, 'image3.png', '1920x1080_MTC_XL_framed_Audi-Odessa-Armaturen_Spiegelung_CC_v05.jpg', 'audi1.jpg', '1audiq8.jpg', 'audi-q8-front-view4.jpeg', 1, 1, '2020-07-07 07:19:21', '2020-07-07 07:28:02'),
(4, 'Barang4', 4, 'Latest Update: Nissan has launched the Kicks 2020 with a new turbocharged petrol engine. You can read more about it here.\r\n\r\nNissan Kicks Price and Variants: The Kicks is available in four variants: XL, XV, XV Premium, and XV Premium(O).', 800, 'image2.png', 'kicksmodelimage.jpg', 'download.jpg', 'kicksmodelimage.jpg', '', NULL, NULL, '2020-07-07 07:25:28', NULL),
(5, 'Barang5', 4, ' The GT-R packs a 3.8-litre V6 twin-turbocharged petrol, which puts out 570PS of max power at 6800rpm and 637Nm of peak torque. The engine is mated to a 6-speed dual-clutch transmission in an all-wheel-drive setup. The 2+2 seater GT-R sprints from 0-100kmph in less than 3', 2000, 'image4.png', 'Best-Nissan-Cars-in-India-New-and-Used-1.jpg', '2bb3bc938e734f462e45ed83be05165d.jpg', '2020-nissan-gtr-rakuda-tan-semi-aniline-leather-interior.jpg', 'images.jpg', 1, 1, '2020-07-07 07:34:17', '2021-07-11 11:58:05'),
(6, 'Barang6', 4, 'Value for money product and it was so good It is more spacious than other sedans It looks like a luxurious car.', 400, 'image6.png', 'images (1).jpg', 'Nissan-Sunny-Interior-114977.jpg', 'nissan-sunny-8a29f53-500x375.jpg', 'new-nissan-sunny-photo.jpg', 1, 1, '2020-07-07 09:12:49', NULL),
(7, 'Barang7', 5, 'Toyota Fortuner Features: It is a premium seven-seater SUV loaded with features such as LED projector headlamps with LED DRLs, LED fog lamp, and power-adjustable and foldable ORVMs. Inside, the Fortuner offers features such as power-adjustable driver seat, automatic climate control, push-button stop/start, and cruise control.\r\n\r\nToyota Fortuner Safety Features: The Toyota Fortuner gets seven airbags, hill assist control, vehicle stability control with brake assist, and ABS with EBD.', 3000, 'image1.png', 'toyota-fortuner-legender-rear-quarters-6e57.jpg', 'zw-toyota-fortuner-2020-2.jpg', 'download (1).jpg', '', NULL, 1, '2020-07-07 09:17:46', '2021-01-16 13:29:31'),
(8, 'Barang8', 1, 'The new Vitara Brezza is a well-rounded package that is feature-loaded and offers good drivability. And it is backed by Maruti’s vast service network, which ensures a peace of mind to customers. The petrol motor could have been more refined and offered more pep.', 600, 'image5.png', 'marutisuzuki-vitara-brezza-rear-view37.jpg', 'marutisuzuki-vitara-brezza-dashboard10.jpg', 'marutisuzuki-vitara-brezza-boot-space59.jpg', 'marutisuzuki-vitara-brezza-boot-space28.jpg', NULL, NULL, '2020-07-07 09:23:11', NULL),
(20, 'TENDA LWY COMPASS 4P FIBER', 11, '- UKURAN : 210*210*140cm\r\n- KAPASITAS : 4-5 Orang\r\n- BAHAN : 100% Polyester PU 3000mm\r\n- INNER : Lapisan jaring\r\n- BERAT : 4,1 kg\r\n- TIANG : 7,9 mm fiberglass\r\n- Dua Pintu\r\n- Memiliki kanopi (Seperti foto)\r\n- UKURAN PACKING : 60*15*15 cm', 60000, 'Tenda1-1_0004_a4f2c89d4f4fb1120927e6a4b481462f.jpg', 'Tenda1-1_0003_7cdb1f31e3ca5adb0fe238444234e0ab.jpg', 'Tenda1-1_0002_86eb8246cea450f2b8fae631b38d6abf.jpg', 'Tenda1-1_0001_227f5642cab5333c04ad26a3575ef543.jpg', 'Tenda1-1_0000_fff42f9b8d31422f364ca24df4668e76.jpg', 1, NULL, '2022-12-20 09:27:02', NULL),
(21, 'Tenda Camping Hillman Cloud Up Smart Kap 2-3 Orang Outdoor Tent', 11, 'Outer : ( 210T Polyester Ripstop , PU 3000mm ) full sealed tape\r\nInner : 210T Polyester PU 3000 mm\r\nFloor: Oxford Nylon 210D Seal taped\r\nFrame : Alumunium alloy Diameter 8.5 cm\r\nSize : 210 + 60 X 140 X 110 cm\r\nPackaging : 48 x 16 x 16 cm\r\nWeight : 2.3 kg\r\nCapacity : 2 Person', 55000, 'Tenda-2_0000_sg-11134201-22100-kkb1z8c9gxiv14.jpg', 'Tenda-2_0001_sg-11134201-22100-5b7xu3a9gxiv3f.jpg', 'Tenda-2_0002_sg-11134201-22100-1s9vajc9gxive6.jpg', 'Tenda-2_0003_sg-11134201-22100-x6r96kb9gxiv32.jpg', 'Tenda-2_0004_sg-11134201-22100-wdiabxa9gxiv5c.jpg', 1, 1, '2022-12-20 09:33:29', NULL),
(22, 'Decathlon Quechua Tenda Camping Family Arpenaz 4.1 & Forester Enigma Original', 11, '- Kapasitas : Ruang tamu yang luas 5.9 m² dengan alas lantai, kamar tidur 210 x 240 cm.\r\n- Mudah dibongkar/pasang : Tiang sederhana: tiang dengan kode warna.\r\n- Mengurangi panas : Flysheet berlapis di atas ruang tamu untuk ventilasi dan mengurangi kondensasi.\r\n- Kegelapan\r\n- Daya tahan : Menahan angin 50km/jam (Daya 6): diuji di terowongan angin pada bidang berputar\r\n- Mudah dibawa : Strap angkut Mencakup 60 X 24 x 24 cm 35 liter Berat: 9.8 kg\r\n- Tahan air : Diuji shower dengan 200 mm air / jam / m² (hujan tropis) dan uji lapangan.\r\n', 57000, 'Tenda-3_0000_735f13fea4375fdeecd72c0a84009d93.jpg', 'Tenda-3_0001_0b4aa1a7ec2499d72ad5436b8b578ac7.jpg', 'Tenda-3_0002_be25fdb76c6b3c49ec729b0b1a2b3497.jpg', 'Tenda-3_0003_4d69877e034f1fbb93bff9f9ed80f7e6.jpg', 'Tenda-3_0004_917ffc90bcd1c9bb16e48efd3d211d53.jpg', 1, NULL, '2022-12-20 09:42:02', NULL),
(23, 'TENDA WILDSHELL SERIES KENAWA 2 PERSON FRAME ALLOY ', 11, '- Kenawa tent 2 (person) Original\r\n- Warna : Blue\r\n- Ukuran Tenda : 210 x (50+140+50) x 120\r\n- Flysheet lapisan luar : 210T Polyester PU3000mm\r\n- Inner bagian dalam : 210T Polyester PU5000mm\r\n- Alas : 210T Polyester Cloth With PU Coating\r\n- Double Door Storm Proof\r\n- Jenis Tiang: Alumunium 7,9MM\r\n- Pasak : 10pcs\r\n- Berat : 1,9kgs\r\n- Ukuran Kemasan: 50cm x 12cm x 15cm', 76000, 'Tenda-4_0000_55b776d0f02a3ae35adc14daa3cc8279.jpg', 'Tenda-4_0001_538df075b02786ff2855d5afb2aafc59.jpg', 'Tenda-4_0002_97632d5c336e5eae7f78db42035cf17b.jpg', 'Tenda-4_0003_ea288d9c3d1229c645ce37e44850a31a.jpg', 'Tenda-4_0004_171b728dec328d3390656d602c93dc2c.jpg', 1, 1, '2022-12-20 09:46:10', NULL),
(24, 'Tenda Camping Forester Enigma Kapasitas 6 Orang', 11, 'Brand : Forester\r\nTipe : Enigma\r\nSize : (180+250) x 220 x 160 cm\r\nFlysheet : 190T PU 1500M Polyester Seam taped waterproof ability\r\nInner Tent : 170T Breathable Polyester\r\nGround Sheet : PE (120G/m2)\r\nPoles : 3 pcs Fiber Glass Poles ; 2 Pcs Steel Poles \r\nKapasitas : 4-6 Orang', 97000, 'Tenda-5_0002_bbb09e44843887d3b8292f202936b20f.jpg', 'Tenda-5_0003_aaab01598d004be9dd1034a0bf427a5a.jpg', 'Tenda-5_0004_c439a201d66c20c2aa669453201777d3.jpg', 'Tenda-5_0001_7b27fa1bda001bbd52b647c4eb878595.jpg', 'Tenda-5_0000_de9f8a7b6b7717763f7d62a5e74e79ba.jpg', 1, NULL, '2022-12-20 09:48:44', NULL),
(25, 'tas carrier zarventure merbabu 60+5 liter.', 12, '-Bahan kordura kanvas premium tebal\r\n-Kapasitas 60+5 liter\r\n-Doubel frame besi alumunium dibelakang yg mudah dilepas\r\n-Busa2 tebal di pundak, punggung, dan pinggang untuk kenyamanan pemakaian\r\n-Backsystem Adjustable / Bisa diubah ubah sesuai ukurang punggung\r\n-Tali-tali pengatur dan penyeimbang (adjustable).\\\r\n-Bisa bongkar muat dari bagian bawah (terdapat zipper/sleting dibagian bawah)\r\n-Nyaman di pakai.\r\n-kualitas di jamin bagus dan awet,tidak bagus free retur', 55000, 'Kariel1_0000_9b064fd42f0c185b76d14d0b0ea7c30f.jpg', 'Kariel1_0001_7af6d7e8ea1dbe94e718c7fc2c883539.jpg', 'Kariel1_0002_baf18d382871a4209d6ecaa0aa2e7331.jpg', 'Kariel1_0003_488e9393315d35c1067239168b3c7636.jpg', 'Kariel1_0004_6079ef31f6c3f484c9b47b37f2e06030.jpg', 1, 1, '2022-12-20 10:18:50', NULL),
(26, 'tas hiking outdoor ADVENTURE GEAR ACONCAGUA karrier tnf summits 60 - 70 LITER', 12, '-Bahan kordura tebal\r\n-Kapasitas 70 liter\r\n-Dobel frame besi alumunium dibelakang yg mudah dilepas\r\n-Busa2 tebal di pundak, punggung, dan pinggang untuk kenyamanan p-pemakaian\r\n-Backsystem Adjustable / Bisa diubah ubah sesuai ukurang punggung\r\n-Tali-tali pengatur dan penyeimbang (adjustable).\r\n-resleting di tengah bisa ambil barang di bagian bawah.\r\n-Nyaman di pakai.', 57000, 'Kariel2_0003_f04f68804eb9c66e877669811fa4288d.jpg', 'Kariel2_0004_45965f0c8a796e03355380cacfebac81.jpg', 'Kariel2_0002_8f3772d94359f14f771d23f31ccb2680.jpg', 'Kariel2_0001_0e155118662551a23066792f884d4181.jpg', 'Kariel2_0000_8ea51ebc698c93d636bb245ba1e37533.jpg', 1, NULL, '2022-12-20 10:20:16', NULL),
(27, 'tas carrier adventure gear AG & ZA merapi 60+5 liter.', 12, '-Bahan kordura premium tebal\r\n-Kapasitas 60 liter (BISA UP)\r\n-Doubel frame besi alumunium dibelakang yg mudah dilepas\r\n-Busa2 tebal di pundak, punggung, dan pinggang untuk kenyamanan pemakaian\r\n-Backsystem Adjustable / Bisa diubah ubah sesuai ukurang punggung\r\n-Tali-tali pengatur dan penyeimbang (adjustable).\\\r\n-Bisa bongkar muat dari bagian bawah (terdapat zipper/sleting dibagian bawah)\r\n-Nyaman di pakai.\r\n-kualitas di jamin bagus dan awet,tidak bagus free retur', 78000, 'Kariel3_0000_5d1dde6a6c9f5b2133f8e249f5756f50.jpg', 'Kariel3_0001_e2247507390f211603f0e458745e1ac9.jpg', 'Kariel3_0002_865261bf418e74c93a86b6fd6b0e8842.jpg', 'Kariel3_0003_43de15ee1a3ea70fb04d18903ca00c5d.jpg', 'Kariel3_0004_b0791ee4f7be08bf796de3fac17ba0cf.jpg', 1, 1, '2022-12-20 10:21:40', NULL),
(28, 'tas Carrier  Elektra 45 L', 12, '- Ukuran 45+ . Bahan Cordura + Polyester nylon\r\n- Tempat Water Bleder 2 liter\r\n- Slot Botol dan matrasl kiri kanan.\r\n- Jahitan BARTEX ( DOUBLE JAHITAN)\r\n- belum termasuk raincover , seusiai variasi \r\n- busa tebal empuk nyaman di punggung.\r\n- murah kualitas bagus.', 60000, 'Kariel4_0000_f88747b73e87888424ed27da76ee3e9a.jpg', 'Kariel4_0001_34bfde31586dd17c0344673aececbfb8.jpg', 'Kariel4_0002_dd92471e0056393f331b269ce9898236.jpg', 'Kariel4_0003_fc33866a53897b5499659a30050c93a5.jpg', 'Kariel4_0004_9d1713bf6644603f1e4c755effb4aec5.jpg', 1, 1, '2022-12-20 10:22:36', '2022-12-20 11:25:52'),
(29, 'tas carrier zarventure EQUATOR 60+5 liter.', 12, '-Bahan kordura kanvas premium tebal\r\n-Kapasitas 60+5 liter\r\n-Doubel frame besi alumunium dibelakang yg mudah dilepas\r\n-Busa2 tebal di pundak, punggung, dan pinggang untuk kenyamanan pemakaian\r\n-Backsystem Adjustable / Bisa diubah ubah sesuai ukurang punggung\r\n-Tali-tali pengatur dan penyeimbang (adjustable).\\\r\n-Bisa bongkar muat dari bagian bawah (terdapat zipper/sleting dibagian bawah)\r\n-Nyaman di pakai.\r\n-kualitas di jamin bagus dan awet,tidak bagus free retur', 67000, 'Kariel5_0003_43ebaf0564cfde2d8d8385121b431d9f.jpg', 'Kariel5_0004_3b02e7ef53bb41f47da375ea2ebd6ea3.jpg', 'Kariel5_0002_aba9c4578f78d237a7b8abb6998895ec.jpg', 'Kariel5_0001_ace8506b80dc210c82f6b6b2806edda2.jpg', 'Kariel5_0000_3bd0220cb180b36239baf3776c0afa9f.jpg', 1, NULL, '2022-12-20 10:23:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `id` int(11) NOT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `InvoiceNumber` int(11) DEFAULT NULL,
  `CustomerName` varchar(150) DEFAULT NULL,
  `CustomerContactNo` bigint(12) DEFAULT NULL,
  `PaymentMode` varchar(100) DEFAULT NULL,
  `InvoiceGenDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`id`, `ProductId`, `Quantity`, `InvoiceNumber`, `CustomerName`, `CustomerContactNo`, `PaymentMode`, `InvoiceGenDate`) VALUES
(1, 4, 2, 753947547, 'Anuj', 9354778033, 'cash', '2019-12-25 08:32:47'),
(2, 1, 1, 753947547, 'Anuj', 9354778033, 'cash', '2019-12-25 08:32:47'),
(3, 1, 1, 979148350, 'Sanjeen', 1234567890, 'card', '2019-12-25 11:38:08'),
(4, 4, 1, 979148350, 'Sanjeen', 1234567890, 'card', '2019-12-25 11:38:08'),
(5, 1, 1, 861354457, 'Rahul', 9876543210, 'cash', '2019-12-24 11:43:48'),
(6, 5, 1, 861354457, 'Rahul', 9876543210, 'cash', '2019-12-24 11:43:48'),
(7, 5, 1, 276794782, 'Sarita', 1122334455, 'cash', '2019-12-25 11:48:06'),
(8, 6, 1, 276794782, 'Sarita', 1122334455, 'cash', '2019-12-25 11:48:06'),
(9, 6, 2, 744608164, 'Babu Pandey', 123458962, 'card', '2019-12-25 12:07:50'),
(10, 2, 2, 744608164, 'Babu Pandey', 123458962, 'card', '2019-12-25 12:07:50'),
(11, 7, 1, 139640585, 'John', 45632147892, 'cash', '2019-12-25 14:54:24'),
(12, 5, 1, 139640585, 'John', 45632147892, 'cash', '2019-12-25 14:54:24'),
(13, 1, 5, 199453245, 'gerald', 770546590, 'cash', '2021-06-04 08:56:35'),
(14, 2, 1, 199453245, 'gerald', 770546590, 'cash', '2021-06-04 08:56:35'),
(16, 7, 1, 631413957, 'Owen', 770546590, 'cash', '2021-06-06 20:45:52'),
(19, 1, 10, 371439323, 'gloria', 770546590, 'cash', '2021-06-06 21:18:18'),
(20, 3, 19, 371439323, 'gloria', 770546590, 'cash', '2021-06-06 21:18:18'),
(21, 5, 12, 371439323, 'gloria', 770546590, 'cash', '2021-06-06 21:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(4, 'smith@gmail.com', '2020-07-07 09:26:21'),
(6, 'gerald@gmail.com', '2021-01-16 12:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbltype`
--

CREATE TABLE `tbltype` (
  `id` int(11) NOT NULL,
  `TypeName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltype`
--

INSERT INTO `tbltype` (`id`, `TypeName`, `CreationDate`, `UpdationDate`) VALUES
(11, 'Tenda', '2022-12-20 08:44:55', NULL),
(12, 'Kariel', '2022-12-20 08:45:01', NULL),
(13, 'Senter', '2022-12-20 08:45:09', NULL),
(14, 'Sleeping Bag', '2022-12-20 08:46:24', NULL),
(15, 'Kompor Gas Mini', '2022-12-20 08:47:12', '2022/12/20');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(2, 'Arinaitwe Gerald', 'gerald@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0770546590', '15/01/1995', 'Muyenga', 'London', 'England', '2021-01-16 12:28:49', '2021-07-24 11:31:28'),
(4, 'udin', 'udin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '08908976878', '15/01/2002', 'jl.raya sidoarjo', 'Sidoarjo', 'indon', '2021-07-26 07:01:37', '2022-12-20 04:26:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblitems`
--
ALTER TABLE `tblitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltype`
--
ALTER TABLE `tbltype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblitems`
--
ALTER TABLE `tblitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbltype`
--
ALTER TABLE `tbltype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
