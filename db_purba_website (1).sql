-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2016 at 11:13 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_purba_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `purb_all_data`
--

CREATE TABLE IF NOT EXISTS `purb_all_data` (
  `data_id` varchar(30) NOT NULL DEFAULT '',
  `data_kode` varchar(30) NOT NULL,
  `data_title` varchar(150) DEFAULT NULL,
  `data_url` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purb_all_data`
--

INSERT INTO `purb_all_data` (`data_id`, `data_kode`, `data_title`, `data_url`) VALUES
('DTA0001', 'CTP0001', 'Promo', 'http://localhost/purbasari/index.php/home/post/category/CTP0001'),
('DTA0002', 'CTP0002', 'Events', 'http://localhost/purbasari/index.php/home/post/category/CTP0002'),
('DTA0003', 'CTP0003', 'New Product', 'http://localhost/purbasari/index.php/home/post/category/CTP0003'),
('DTA0004', 'PST0001', 'Event and Promo Bulan Januari 2016', 'http://localhost/purbasari/index.php/home/post/single/PST0001'),
('DTA0005', 'PST0002', 'Event and Promo Bulan Februari 2016', 'http://localhost/purbasari/index.php/home/post/single/PST0002'),
('DTA0006', 'PST0003', 'Event and Promo Bulan Maret 2016', 'http://localhost/purbasari/index.php/home/post/single/PST0003'),
('DTA0007', 'PST0004', 'New Product 1', 'http://localhost/purbasari/index.php/home/post/single/PST0004'),
('DTA0008', 'PST0005', 'Event and Promo', 'http://localhost/purbasari/index.php/home/post/single/PST0005'),
('DTA0009', 'PGE0001', 'About Us', 'http://localhost/purbasari/index.php/home/page/single/PGE0001'),
('DTA0010', 'CTR0001', 'Scrub', 'http://localhost/purbasari/index.php/home/page/category/CTR0001'),
('DTA0011', 'CTR0002', 'Feminine Higine', 'http://localhost/purbasari/index.php/home/page/category/CTR0002'),
('DTA0012', 'CTR0003', 'Body Lotion', 'http://localhost/purbasari/index.php/home/page/category/CTR0003'),
('DTA0013', 'CTR0004', 'Body Care', 'http://localhost/purbasari/index.php/home/page/category/CTR0004'),
('DTA0014', 'CTR0005', 'Face Wash', 'http://localhost/purbasari/index.php/home/page/category/CTR0005'),
('DTA0015', 'PRD0001', 'Purbasari 1', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0001'),
('DTA0016', 'PRD0002', 'Purbasari 2', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0002'),
('DTA0017', 'PRD0003', 'Purbasari 3', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0003'),
('DTA0018', 'PRD0004', 'Purbasari 4', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0004'),
('DTA0019', 'PRD0005', 'Purbasari 5', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0005'),
('DTA0020', 'PRD0006', 'Purbasari 6', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0006'),
('DTA0021', 'PRD0007', 'Purbasari 7', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0007'),
('DTA0022', 'PRD0008', 'Purbasari 8', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0008'),
('DTA0023', 'PRD0009', 'Purbasari 9', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0009'),
('DTA0024', 'PRD0010', 'Purbasari 10', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0010'),
('DTA0025', 'PRD0011', 'Purbasari 11', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0011'),
('DTA0026', 'PRD0012', 'Purbasari 12', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0012'),
('DTA0027', 'PRD0013', 'Purbasari 13', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0013');

-- --------------------------------------------------------

--
-- Table structure for table `purb_banner`
--

CREATE TABLE IF NOT EXISTS `purb_banner` (
  `banner_id` varchar(30) NOT NULL,
  `banner_name` varchar(150) DEFAULT NULL,
  `banner_post_disp` varchar(75) DEFAULT NULL,
  `banner_desc` text,
  `banner_date_create` datetime DEFAULT NULL,
  `banner_date_update` datetime DEFAULT NULL,
  `banner_url` varchar(150) NOT NULL,
  `author` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purb_banner`
--

INSERT INTO `purb_banner` (`banner_id`, `banner_name`, `banner_post_disp`, `banner_desc`, `banner_date_create`, `banner_date_update`, `banner_url`, `author`) VALUES
('BNR0001', 'Banner 1', 'slider11.jpg', '-', '2016-03-10 13:55:48', '2016-03-14 16:56:18', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0001', 1),
('BNR0002', 'Banner 2', 'slider2.jpg', '-', '2016-03-10 13:56:05', '2016-03-14 16:56:47', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0005', 1),
('BNR0003', 'Banner 3', 'slider3.jpg', '-', '2016-03-10 13:56:35', '2016-03-14 16:56:55', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0010', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purb_category_post`
--

CREATE TABLE IF NOT EXISTS `purb_category_post` (
  `category_post_id` varchar(30) NOT NULL,
  `category_post_name` varchar(30) DEFAULT NULL,
  `category_post_desc` text,
  `category_post_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purb_category_post`
--

INSERT INTO `purb_category_post` (`category_post_id`, `category_post_name`, `category_post_desc`, `category_post_update`) VALUES
('CTP0001', 'Promo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-03-14 15:29:28'),
('CTP0002', 'Events', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-03-14 15:29:37'),
('CTP0003', 'New Product', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-03-14 15:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `purb_category_product`
--

CREATE TABLE IF NOT EXISTS `purb_category_product` (
  `category_id` varchar(30) NOT NULL,
  `category_name` varchar(30) DEFAULT NULL,
  `category_desc` text,
  `category_date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purb_category_product`
--

INSERT INTO `purb_category_product` (`category_id`, `category_name`, `category_desc`, `category_date_update`) VALUES
('CTR0001', 'Scrub', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-03-14 15:33:41'),
('CTR0002', 'Feminine Higine', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-03-14 15:33:48'),
('CTR0003', 'Body Lotion', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-03-14 15:33:57'),
('CTR0004', 'Body Care', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-03-14 15:34:04'),
('CTR0005', 'Face Wash', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2016-03-14 15:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `purb_contact`
--

CREATE TABLE IF NOT EXISTS `purb_contact` (
`contact_id` int(11) NOT NULL,
  `contact_email` varchar(30) DEFAULT NULL,
  `contact_phone1` varchar(30) DEFAULT NULL,
  `contact_phone2` varchar(30) DEFAULT NULL,
  `contact_fax` varchar(30) DEFAULT NULL,
  `contact_address` text,
  `contact_facebook` varchar(225) DEFAULT NULL,
  `contact_twitter` varchar(225) DEFAULT NULL,
  `contact_youtube` varchar(225) DEFAULT NULL,
  `contact_linkedin` varchar(225) DEFAULT NULL,
  `long_point` varchar(150) DEFAULT NULL,
  `lat_point` varchar(150) DEFAULT NULL,
  `contact_date_update` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `purb_contact`
--

INSERT INTO `purb_contact` (`contact_id`, `contact_email`, `contact_phone1`, `contact_phone2`, `contact_fax`, `contact_address`, `contact_facebook`, `contact_twitter`, `contact_youtube`, `contact_linkedin`, `long_point`, `lat_point`, `contact_date_update`) VALUES
(1, 'sales@purbasari.com', '(021) 123-4567', '(021) 123-4567', '(021) 123-4567', 'Jl. Ciputat Raya No.2C Kby. Lama Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12240 Indonesia', 'http://facebook.com/', 'http://twitter.com/', 'http://youtube.com/', 'http://linkedin.com/', '106.77759289741516', '-6.257737868906802', '2016-03-08 08:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `purb_menu`
--

CREATE TABLE IF NOT EXISTS `purb_menu` (
  `menu_id` varchar(30) NOT NULL DEFAULT '',
  `menu_name` varchar(30) DEFAULT NULL,
  `menu_url` varchar(150) NOT NULL,
  `menu_remark` varchar(150) DEFAULT NULL,
  `menu_date_modify` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purb_menu`
--

INSERT INTO `purb_menu` (`menu_id`, `menu_name`, `menu_url`, `menu_remark`, `menu_date_modify`) VALUES
('MNU0001', 'Home', 'http://localhost/purbasari/', 'Halaman Home', '2016-03-10 07:57:14'),
('MNU0002', 'About Us', 'http://localhost/purbasari/index.php/home/page/single/PGE0001', 'Halaman About Us', '2016-03-14 09:39:51'),
('MNU0003', 'Products', 'http://localhost/purbasari/index.php/home/page/', '-', '2016-03-14 09:47:39'),
('MNU0004', 'Events and Promo', 'http://localhost/purbasari/index.php/home/post', 'categori posting', '2016-03-14 09:40:40'),
('MNU0005', 'Contact Us', 'http://localhost/purbasari/index.php/home/contact', '-', '2016-03-14 09:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `purb_menu_detail`
--

CREATE TABLE IF NOT EXISTS `purb_menu_detail` (
  `menu_detail_id` varchar(30) NOT NULL,
  `menu_header` varchar(30) DEFAULT NULL,
  `menu_detail_url` varchar(100) DEFAULT NULL,
  `menu_detail_label` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purb_menu_detail`
--

INSERT INTO `purb_menu_detail` (`menu_detail_id`, `menu_header`, `menu_detail_url`, `menu_detail_label`) VALUES
('MDU0001', 'MHU0001', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0001', 'Purbasari 1'),
('MDU0002', 'MHU0001', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0002', 'Purbasari 2'),
('MDU0003', 'MHU0001', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0003', 'Purbasari 3'),
('MDU0004', 'MHU0001', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0004', 'Purbasari 4'),
('MDU0005', 'MHU0002', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0005', 'Purbasari 5'),
('MDU0006', 'MHU0002', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0006', 'Purbasari 6'),
('MDU0007', 'MHU0002', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0007', 'Purbasari 7'),
('MDU0008', 'MHU0003', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0008', 'Purbasari 8'),
('MDU0009', 'MHU0003', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0009', 'Purbasari 9'),
('MDU0010', 'MHU0003', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0010', 'Purbasari 10'),
('MDU0011', 'MHU0004', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0011', 'Purbasari 11'),
('MDU0012', 'MHU0004', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0012', 'Purbasari 12'),
('MDU0013', 'MHU0004', 'http://localhost/purbasari/index.php/home/page/product_detail/PRD0013', 'Purbasari 13'),
('MDU0014', 'MHU0004', 'http://localhost/purbasari/index.php/home/post/single/PST0001', 'Purbasari 14'),
('MDU0015', 'MHU0004', 'http://localhost/purbasari/index.php/home/post/single/PST0004', 'Purbasari 15');

-- --------------------------------------------------------

--
-- Table structure for table `purb_menu_header`
--

CREATE TABLE IF NOT EXISTS `purb_menu_header` (
  `menu_header_id` varchar(30) NOT NULL DEFAULT '',
  `menu_header_label` varchar(50) DEFAULT NULL,
  `menu_header_remark` varchar(100) DEFAULT NULL,
  `id_menu` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purb_menu_header`
--

INSERT INTO `purb_menu_header` (`menu_header_id`, `menu_header_label`, `menu_header_remark`, `id_menu`) VALUES
('MHU0001', 'Body Scrubs', '-', 'MNU0003'),
('MHU0002', 'Feminine Higine', '-', 'MNU0003'),
('MHU0003', 'Body Care', '-', 'MNU0003'),
('MHU0004', 'Body Lotion', '-', 'MNU0003');

-- --------------------------------------------------------

--
-- Table structure for table `purb_message`
--

CREATE TABLE IF NOT EXISTS `purb_message` (
`message_id` int(11) NOT NULL,
  `message_name` varchar(30) DEFAULT NULL,
  `message_email` varchar(50) DEFAULT NULL,
  `message_text` text,
  `message_date_post` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `purb_message`
--

INSERT INTO `purb_message` (`message_id`, `message_name`, `message_email`, `message_text`, `message_date_post`) VALUES
(1, 'Evan Abeiza', 'evan.abeiza@gmail.com', '0', '2016-03-15 08:27:44'),
(2, 'Evan Abeiza', 'evan.abeiza@gmail.com', '0', '2016-03-15 08:35:22'),
(4, 'Evan Abeiza', 'evan.abeiza@gmail.com', 'Bohong ahh', '2016-03-15 08:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `purb_page`
--

CREATE TABLE IF NOT EXISTS `purb_page` (
  `page_id` varchar(30) NOT NULL,
  `page_title` varchar(30) DEFAULT NULL,
  `page_desc` text,
  `page_status` enum('draft','posting','trash') DEFAULT NULL,
  `page_date_create` datetime DEFAULT NULL,
  `page_date_update` datetime DEFAULT NULL,
  `author` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purb_page`
--

INSERT INTO `purb_page` (`page_id`, `page_title`, `page_desc`, `page_status`, `page_date_create`, `page_date_update`, `author`) VALUES
('PGE0001', 'About Us', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'posting', '2016-03-14 15:33:13', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purb_partner`
--

CREATE TABLE IF NOT EXISTS `purb_partner` (
`partner_id` int(11) NOT NULL,
  `partner_name` varchar(150) DEFAULT NULL,
  `partner_logo` varchar(150) DEFAULT NULL,
  `partner_url` varchar(150) DEFAULT NULL,
  `partner_desc` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purb_post`
--

CREATE TABLE IF NOT EXISTS `purb_post` (
  `post_id` varchar(30) NOT NULL,
  `post_title` varchar(75) DEFAULT NULL,
  `post_short_desc` varchar(225) NOT NULL,
  `post_desc` text,
  `post_status` enum('draft','posting','trash') DEFAULT NULL,
  `post_date_create` datetime DEFAULT NULL,
  `post_date_update` datetime DEFAULT NULL,
  `post_category` varchar(30) DEFAULT NULL,
  `post_url` varchar(225) DEFAULT NULL,
  `post_pict` varchar(100) NOT NULL,
  `post_pict_thumb` varchar(75) NOT NULL,
  `author` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purb_post`
--

INSERT INTO `purb_post` (`post_id`, `post_title`, `post_short_desc`, `post_desc`, `post_status`, `post_date_create`, `post_date_update`, `post_category`, `post_url`, `post_pict`, `post_pict_thumb`, `author`) VALUES
('PST0001', 'Event and Promo Bulan Januari 2016', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'posting', '2016-03-14 15:30:56', '2016-03-14 16:02:34', 'CTP0002', NULL, 'banner1.jpg', 'uploads/post/thumb/banner1.jpg', 1),
('PST0002', 'Event and Promo Bulan Februari 2016', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'posting', '2016-03-14 15:31:29', '2016-03-14 16:07:00', 'CTP0002', NULL, 'banner2.jpg', 'uploads/post/thumb/banner2.jpg', 1),
('PST0003', 'Event and Promo Bulan Maret 2016', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'posting', '2016-03-14 15:31:56', '2016-03-14 16:06:45', 'CTP0001', NULL, 'banner3.jpg', 'uploads/post/thumb/banner3.jpg', 1),
('PST0004', 'New Product 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'posting', '2016-03-14 15:32:19', '2016-03-14 16:07:11', 'CTP0003', NULL, 'banner21.jpg', 'uploads/post/thumb/banner21.jpg', 1),
('PST0005', 'Event and Promo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'draft', '2016-03-14 15:32:40', '2016-03-14 16:07:21', 'CTP0002', NULL, 'banner11.jpg', 'uploads/post/thumb/banner11.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purb_product`
--

CREATE TABLE IF NOT EXISTS `purb_product` (
  `product_id` varchar(30) NOT NULL DEFAULT '',
  `product_name` varchar(30) DEFAULT NULL,
  `product_principle_id` varchar(75) DEFAULT NULL,
  `product_desc` text,
  `product_pict` varchar(150) DEFAULT NULL,
  `product_thumb_pict` varchar(150) DEFAULT NULL,
  `product_category` varchar(30) NOT NULL,
  `product_new` bit(1) NOT NULL,
  `product_promo` varchar(30) NOT NULL,
  `product_create_date` datetime DEFAULT NULL,
  `product_update_date` datetime DEFAULT NULL,
  `product_status` enum('posting','draft','trash') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purb_product`
--

INSERT INTO `purb_product` (`product_id`, `product_name`, `product_principle_id`, `product_desc`, `product_pict`, `product_thumb_pict`, `product_category`, `product_new`, `product_promo`, `product_create_date`, `product_update_date`, `product_status`) VALUES
('PRD0001', 'Purbasari 1', '123456', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '1.png', 'uploads/product/thumb/1.png', 'CTR0004', b'1', 'Disc.10% + 5%', '2016-03-14 15:35:07', '2016-03-15 09:15:01', 'posting'),
('PRD0002', 'Purbasari 2', '123456', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '5.png', 'uploads/product/thumb/5.png', 'CTR0003', b'0', 'Disc. 10%', '2016-03-14 15:35:31', '2016-03-15 08:56:48', 'posting'),
('PRD0003', 'Purbasari 3', '123456', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '4.png', 'uploads/product/thumb/4.png', 'CTR0005', b'0', '', '2016-03-14 15:35:54', '2016-03-14 16:23:08', 'posting'),
('PRD0004', 'Purbasari 4', '123456', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '2.png', 'uploads/product/thumb/2.png', 'CTR0003', b'1', '', '2016-03-14 15:36:14', '2016-03-15 08:58:10', 'posting'),
('PRD0005', 'Purbasari 5', '123456', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '3.png', 'uploads/product/thumb/3.png', 'CTR0001', b'0', '', '2016-03-14 15:36:31', '2016-03-14 16:23:47', 'posting'),
('PRD0006', 'Purbasari 6', '123456', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '11.png', 'uploads/product/thumb/11.png', 'CTR0002', b'1', '', '2016-03-14 15:36:51', '2016-03-15 08:57:51', 'posting'),
('PRD0007', 'Purbasari 7', '123456', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '41.png', 'uploads/product/thumb/41.png', 'CTR0004', b'0', '', '2016-03-14 15:37:08', '2016-03-14 16:24:07', 'posting'),
('PRD0008', 'Purbasari 8', '123456', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '51.png', 'uploads/product/thumb/51.png', 'CTR0005', b'0', '', '2016-03-14 15:37:26', '2016-03-14 16:24:17', 'posting'),
('PRD0009', 'Purbasari 9', '123456', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '12.png', 'uploads/product/thumb/12.png', 'CTR0002', b'0', 'Disc. 15%', '2016-03-14 15:37:46', '2016-03-15 08:58:31', 'posting'),
('PRD0010', 'Purbasari 10', '123456', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '52.png', 'uploads/product/thumb/52.png', 'CTR0005', b'0', 'Buy 1 + Get 1 Free', '2016-03-14 15:38:04', '2016-03-15 08:59:51', 'posting'),
('PRD0011', 'Purbasari 11', '123456', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '21.png', 'uploads/product/thumb/21.png', 'CTR0001', b'0', '', '2016-03-14 15:38:26', '2016-03-14 16:24:51', 'posting'),
('PRD0012', 'Purbasari 12', '123456', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '31.png', 'uploads/product/thumb/31.png', 'CTR0002', b'0', '', '2016-03-14 15:38:47', '2016-03-14 16:25:00', 'posting'),
('PRD0013', 'Purbasari 13', '123456', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '42.png', 'uploads/product/thumb/42.png', 'CTR0004', b'0', '', '2016-03-14 15:39:06', '2016-03-14 16:25:11', 'posting');

-- --------------------------------------------------------

--
-- Table structure for table `purb_setting`
--

CREATE TABLE IF NOT EXISTS `purb_setting` (
`setting_id` int(11) NOT NULL,
  `setting_title` varchar(30) DEFAULT NULL,
  `setting_tag_line` varchar(225) DEFAULT NULL,
  `setting_desc` text,
  `setting_logo` varchar(150) DEFAULT NULL,
  `setting_thumb_logo` varchar(150) DEFAULT NULL,
  `setting_date_update` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `purb_setting`
--

INSERT INTO `purb_setting` (`setting_id`, `setting_title`, `setting_tag_line`, `setting_desc`, `setting_logo`, `setting_thumb_logo`, `setting_date_update`) VALUES
(1, 'Purbasari Product', 'Kecantikan yang berasal dari alam', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'purbasari1.png', 'uploads/logo/thumb/purbasari1.png', '2016-03-14 08:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `purb_user`
--

CREATE TABLE IF NOT EXISTS `purb_user` (
`user_id` int(11) NOT NULL,
  `user_first_name` varchar(30) DEFAULT NULL,
  `user_last_name` varchar(30) DEFAULT NULL,
  `user_nick` varchar(30) DEFAULT NULL,
  `user_username` varchar(225) DEFAULT NULL,
  `user_password` varchar(225) DEFAULT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `user_date_log` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `purb_user`
--

INSERT INTO `purb_user` (`user_id`, `user_first_name`, `user_last_name`, `user_nick`, `user_username`, `user_password`, `user_email`, `user_date_log`) VALUES
(1, 'Evan.', 'Abeiza', 'Evan', 'admin', 'admin', 'it.mis@goc.co.id', '2016-03-15 14:38:05'),
(5, 'test12', 'test', 'test1', 'admin1', 'admin1', 'test@gmail.com', '2016-03-01 15:23:20'),
(6, 'test3', 'test', 'test3', 'admin3', 'admin3', 'test@gmail.com', NULL),
(7, 'asd', 'dsad', 'dsad', 'admin4', 'admin4', 'dsad@ad.com', NULL),
(8, 'admin5', 'admin', 'admin', 'admin5', 'admin5', 'admin@sdas.com', NULL),
(9, 'admin6', 'admin', 'admin', 'admin6', 'admin6', 'admin@goc.co.id', NULL),
(10, 'admin7', 'admin', 'admin', 'admin7', 'admin7', 'admin@goc.co.id', NULL),
(11, 'admin8', 'admin', 'admin', 'admin8', 'admin8', 'admin@goc.co.id', NULL),
(12, 'admin9', 'admin', 'admin', 'admin9', 'admin9', 'admin@goc.co.id', NULL),
(13, 'admin10', 'admin', 'admin10', 'admin10', 'admin10', 'admin@goc.co.id', NULL),
(14, 'admin11', 'admin', 'admin', 'admin11', 'admin11', 'admin@goc.co.id', NULL),
(16, 'admin13', 'adminas', 'sda', 'admin13', 'admin13', 'sd@sad.com', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purb_all_data`
--
ALTER TABLE `purb_all_data`
 ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `purb_banner`
--
ALTER TABLE `purb_banner`
 ADD PRIMARY KEY (`banner_id`), ADD KEY `author` (`author`);

--
-- Indexes for table `purb_category_post`
--
ALTER TABLE `purb_category_post`
 ADD PRIMARY KEY (`category_post_id`);

--
-- Indexes for table `purb_category_product`
--
ALTER TABLE `purb_category_product`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `purb_contact`
--
ALTER TABLE `purb_contact`
 ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `purb_menu`
--
ALTER TABLE `purb_menu`
 ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `purb_menu_detail`
--
ALTER TABLE `purb_menu_detail`
 ADD PRIMARY KEY (`menu_detail_id`), ADD KEY `menu_header` (`menu_header`);

--
-- Indexes for table `purb_menu_header`
--
ALTER TABLE `purb_menu_header`
 ADD PRIMARY KEY (`menu_header_id`), ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `purb_message`
--
ALTER TABLE `purb_message`
 ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `purb_page`
--
ALTER TABLE `purb_page`
 ADD PRIMARY KEY (`page_id`), ADD KEY `author` (`author`);

--
-- Indexes for table `purb_partner`
--
ALTER TABLE `purb_partner`
 ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `purb_post`
--
ALTER TABLE `purb_post`
 ADD PRIMARY KEY (`post_id`), ADD KEY `author` (`author`), ADD KEY `post_category` (`post_category`);

--
-- Indexes for table `purb_product`
--
ALTER TABLE `purb_product`
 ADD PRIMARY KEY (`product_id`), ADD KEY `product_category` (`product_category`);

--
-- Indexes for table `purb_setting`
--
ALTER TABLE `purb_setting`
 ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `purb_user`
--
ALTER TABLE `purb_user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purb_contact`
--
ALTER TABLE `purb_contact`
MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `purb_message`
--
ALTER TABLE `purb_message`
MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `purb_partner`
--
ALTER TABLE `purb_partner`
MODIFY `partner_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purb_setting`
--
ALTER TABLE `purb_setting`
MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `purb_user`
--
ALTER TABLE `purb_user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `purb_banner`
--
ALTER TABLE `purb_banner`
ADD CONSTRAINT `purb_banner_ibfk_1` FOREIGN KEY (`author`) REFERENCES `purb_user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `purb_menu_detail`
--
ALTER TABLE `purb_menu_detail`
ADD CONSTRAINT `purb_menu_detail_ibfk_1` FOREIGN KEY (`menu_header`) REFERENCES `purb_menu_header` (`menu_header_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purb_menu_header`
--
ALTER TABLE `purb_menu_header`
ADD CONSTRAINT `purb_menu_header_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `purb_menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purb_page`
--
ALTER TABLE `purb_page`
ADD CONSTRAINT `purb_page_ibfk_1` FOREIGN KEY (`author`) REFERENCES `purb_user` (`user_id`);

--
-- Constraints for table `purb_post`
--
ALTER TABLE `purb_post`
ADD CONSTRAINT `purb_post_ibfk_1` FOREIGN KEY (`author`) REFERENCES `purb_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `purb_post_ibfk_2` FOREIGN KEY (`post_category`) REFERENCES `purb_category_post` (`category_post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purb_product`
--
ALTER TABLE `purb_product`
ADD CONSTRAINT `purb_product_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `purb_category_product` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
