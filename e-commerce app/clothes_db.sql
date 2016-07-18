-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2015 at 11:32 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clothes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `person` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `person`) VALUES
(1, 'jeans', 'men'),
(3, 'Office wear', 'men'),
(4, 'mam', 'kids'),
(5, 'Shoes', 'men'),
(7, 'shoes', 'women'),
(8, 'jackets', 'men'),
(9, 'jackets', 'women'),
(10, 'skirts', 'women'),
(11, 'tops', 'women'),
(12, 'scarves', 'women'),
(14, 'T-Shirts', 'kids'),
(15, 'Tops', 'kids'),
(16, 'Jackets', 'kids'),
(17, 'Trousers', 'kids'),
(18, 'socks', 'kids'),
(19, 'Shoes', 'kids'),
(20, 'Marvins', 'kids'),
(21, 'Blankets', 'other'),
(22, 'Curtains', 'other'),
(23, 'Carpets', 'other'),
(25, 'Interior Design things', 'other'),
(26, 'shirts', 'men'),
(27, 'Jewellery', 'men'),
(28, 'Jewellery', 'women'),
(29, 'dresses', 'women'),
(30, 'bags', 'women'),
(31, 'pillows', 'other'),
(33, 'curtains', 'home'),
(34, 'cutlery', 'home'),
(35, 'carpets', 'home'),
(36, 'Table mats', 'home'),
(37, 'Beddings', 'home');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `new` varchar(255) NOT NULL,
  `person` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image_location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `category`, `new`, `person`, `price`, `description`, `image_location`) VALUES
(5, 'Nike brand', 'Shoes', 'New', 'men', 3500, 'This is a new sport shoe from Nairobi', 'image/items/p35.jpg'),
(6, 'Tennis shoes', 'Shoes', 'Not New', 'men', 1200, 'Custom made shoe from italy', 'image/items/p14.jpg'),
(7, 'And 1', 'Shoes', 'Not New', 'men', 2500, 'NBA shoes that glow at night', 'image/items/p1.jpg'),
(8, 'leather high boots', 'shoes', 'New', 'women', 2000, 'skin leathered boots', 'image/items/heels.png'),
(9, 'Loafers', 'Shoes', 'New', 'men', 2500, 'The latest form Italy made using wool', 'image/items/boots-600x400.png'),
(10, 'skila shoes', 'Shoes', 'Not New', 'men', 4000, 'Shoes made just for anything especially runnning without wearing out', 'image/items/db_file_img_17_60xauto.jpg'),
(11, 'italian suite', 'Office wear', 'Not New', 'men', 2300, 'ad fe nii e afdf', 'image/items/db_file_img_155_640xauto.jpg'),
(12, 'black nk', 'Office wear', 'Not New', 'men', 3200, 'dgsdf nuasf sdfasf sdaf', 'image/items/cat-pro-1.jpg'),
(13, 'jambo shirt', 'shirts', 'New', 'men', 4000, 'sao adss bbuk mlm as ', 'image/items/lg-product-1.jpg'),
(14, 'costa shirt', 'shirts', 'Not New', 'men', 1000, 'afid ouo awewa oh', 'image/items/db_file_img_88_640xauto.jpg'),
(15, 'lkoiok shirt', 'shirts', 'Not New', 'men', 6400, 'koil oaer jowq ', 'image/items/t_item1.jpg'),
(16, 'jui shirts', 'shirts', 'Not New', 'men', 3400, 'ooio af asfdasiuu ihb qw', 'image/items/t_item6.jpg'),
(17, 'simo watch', 'Jewellery', 'Not New', 'men', 3000, 'moi igiuCf asfas safdas asf', 'image/items/clock-1-600x400.png'),
(18, 'werxdf', 'Jewellery', 'Not New', 'men', 123141, 'xsvsfgv', 'image/items/sl-2.jpg'),
(19, 'wfvfg', 'Jewellery', 'Not New', 'men', 9876, 'ijui are afg o', 'image/items/metro.png'),
(20, 'oko watch', 'Jewellery', 'Not New', 'men', 85865, 'sadfuasdf asfgasf ', 'image/items/demo-3.jpg'),
(21, 'ASDfsaf', 'Jewellery', 'Not New', 'men', 9875, 'sldfas asdfasdf sdfas', 'image/items/lg-product-5.jpg'),
(22, 'aowfsf', 'Jewellery', 'Not New', 'men', 87686, 'kuhiuaskd akd', 'image/items/db_file_img_152_640xauto.jpg'),
(23, 'bhjyujg', 'jackets', 'Not New', 'men', 8768976, 'iy p8to uytu uytu ', 'image/items/corner-photo.png'),
(24, 'hggkj', 'jackets', 'Not New', 'men', 325467, 'julytugt lj g', 'image/items/db_file_img_39_640xauto.jpg'),
(25, 'agfsdgasdg', 'shoes', 'New', 'women', 123123, 'svsdgdfg', 'image/items/bots-2-600x400.png'),
(26, 'dfbsdh', 'shoes', 'Not New', 'women', 21345, ' febklmdfv oipk;lfdv pfeiovs', 'image/items/db_file_img_265_160xauto.jpg'),
(27, 'sdfsf', 'shoes', 'New', 'women', 2344, 'dfgerh  tyytuj  qwret', 'image/items/db_file_img_269_160xauto.jpg'),
(28, 'swgfrehd', 'shoes', 'New', 'women', 9087543, 'cfghkjlm', 'image/items/lg-product-2.jpg'),
(29, 'poiugfyyhj', 'shoes', 'Not New', 'women', 32868, 'mnjhbgjh igjg df ljg ', 'image/items/product-4.jpg'),
(30, '2342', 'tops', 'Not New', 'women', 359732, 'jkdsfgdhglj ldfgdsfg ', 'image/items/db_file_img_261_160xauto.jpg'),
(31, 'aderw', 'dresses', 'New', 'women', 123421, 'fgsdgsdfg', 'image/items/db_file_img_49_640xauto.jpg'),
(32, 'sadfasf', 'dresses', 'New', 'women', 12344, 'ccsfgsdger egt', 'image/items/15.jpg'),
(33, 'd786v', 'dresses', 'New', 'women', 46578, 'joifegods goudsfgs ', 'image/items/bs1.jpg'),
(34, 'w2g5465', 'dresses', 'New', 'women', 1434, 'dfbvgsg egt', 'image/items/bs4.jpg'),
(35, 'gergwer', 'dresses', 'Not New', 'women', 134444, 'iuwfbioawfyioaw ', 'image/items/bs3.jpg'),
(36, 'ksuahf', 'dresses', 'Not New', 'women', 658790, 'oauifya aerwaew er', 'image/items/bs2.jpg'),
(37, 'sdfgsdgd', 'Jewellery', 'Not New', 'women', 2324, 'sdfgseger', 'image/items/p30.jpg'),
(38, 'sdfsf', 'Jewellery', 'Not New', 'women', 35465879, 'jhult ug', 'image/items/p31.jpg'),
(39, 'p9igv ', 'Jewellery', 'Not New', 'women', 34000, 'oisdjfouadsyf ', 'image/items/p32.jpg'),
(40, '23422', 'Jewellery', 'Not New', 'women', 12300, 'osdijlas df', 'image/items/p33.jpg'),
(41, 'rter', 'Jewellery', 'Not New', 'women', 300, 'kjiudhyas df', 'image/items/snake-120x120.png'),
(42, 'sdfgsag', 'Shoes', 'Not New', 'men', 2132435, 'sdfgsgsdg', 'image/items/p60.jpg'),
(43, 'asdfg', 'Shoes', 'Not New', 'men', 1323, 'zxdfsdhnfhg', 'image/items/banner-topmenu.jpg'),
(44, 'hvnj', 'Shoes', 'Not New', 'kids', 21324, 'qerq3wtr3e', 'image/items/popular2.jpg'),
(45, 'wurifer', 'Shoes', 'Not New', 'kids', 1234234, 'xvxdggdhg', 'image/items/banner7.jpg'),
(46, 'aswds', 'Shoes', 'Not New', 'kids', 1, 'zcfasdf', 'image/items/p10.jpg'),
(47, 'dfgdrghgf', 'Shoes', 'Not New', 'kids', 1000, 'vzdvsdfg dgsdg', 'image/items/banner4.jpg'),
(48, 'ikhsvuhsd', 'Shoes', 'Not New', 'kids', 34000, 'oijfsugse eirug erf esri ', 'image/items/banner3.jpg'),
(49, 'afsd', 'Tops', 'Not New', 'kids', 312424, 'sfgasg', 'image/items/b2.jpg'),
(50, 'xcvzx', 'mam', 'Not New', 'kids', 0, 'xdfvsdf', 'image/items/b3.jpg'),
(51, 'dvdvd', 'T-Shirts', 'Not New', 'kids', 2344, 'fvsdfgvd', 'image/items/blog1.jpg'),
(52, 'dsghsgh', 'socks', 'New', 'kids', 1234, 'cvbdsb', 'image/items/blog2.jpg'),
(53, 'dghdsh', 'Marvins', 'New', 'kids', 234245, 'dghsgdh', 'image/items/blog3.jpg'),
(54, 'miji', 'Blankets', 'Not New', 'other', 65765, 'khkuykhkh iuh', 'image/items/b1.jpg'),
(55, 'fwfw', 'Blankets', 'New', 'other', 200, 'sfgsgsrth yurtyu yuery', 'image/items/banner5.jpg'),
(56, 'juykiyr', 'Blankets', 'Not New', 'other', 2312, 'dfshgh', 'image/items/banner6.jpg'),
(57, 'o84hu', 'Blankets', 'Not New', 'other', 340, 'gfhdeyj 33e3ada', 'image/items/banner8.jpg'),
(58, 'tg3t3t', 'Blankets', 'Not New', 'other', 123134, 'dfhr ;oijh trhrot w', 'image/items/p71.jpg'),
(59, '1cxfwfeg', 'pillows', 'Not New', 'other', 2344, 'httru eyr', 'image/items/p7.jpg'),
(60, 'geth', 'pillows', 'Not New', 'other', 1124, '5yu5yur5 5y56 ', 'image/items/p8.jpg'),
(61, 'ghdrhe', 'pillows', 'Not New', 'other', 45235, 'bhtyhtryhrh', 'image/items/p9.jpg'),
(62, 'vsefgfg', 'pillows', 'Not New', 'other', 765546, ' bdfghdthjty', 'image/items/p12.jpg'),
(63, 'fsdf2', 'pillows', 'Not New', 'other', 23414, 'ghdhdr thyerty ', 'image/items/p13.jpg'),
(64, 'tarnish one', 'curtains zao', 'Not New', 'other', 2000, 'a new brand from italy', 'image/items/single-room.jpg'),
(65, 'qwert', 'curtains zao', 'Not New', 'other', 1000, 'dfesge', 'image/items/double-room.jpg'),
(66, 'jinja', 'curtains', 'New', 'home', 20000, 'hii hapa ni mpya', 'image/items/slide4-800x425.jpg'),
(67, 'Nigerian curtains', 'curtains', 'Not New', 'home', 5000, 'Cream in color and very eye catching', 'image/items/slide-1.jpg'),
(68, 'strikia', 'curtains', 'Not New', 'home', 1500, 'this curtainns give your house a jungle camouflage look', 'image/items/demo-slide-2.jpg'),
(69, 'traditional curtain', 'curtains', 'Not New', 'home', 23000, 'made by the maasai with rams skin', 'image/items/demo-slide-1.jpg'),
(70, 'kanaka', 'curtains', 'Not New', 'home', 10000, 'straight from italy they are the best', 'image/items/slide-2.jpg'),
(71, 'beddings one', 'Beddings', 'Not New', 'home', 12000, 'a full pack of beddings that are very cosy', 'image/items/slide-3.jpg'),
(72, 'beddings two', 'Beddings', 'Not New', 'home', 15000, 'lorem ipsum from lorem ipsum in kenya and cery cosu ntra jeui favfj uyuou ajaebja', 'image/items/blog-1.jpg'),
(73, 'beddings three', 'Beddings', 'Not New', 'home', 10000, 'lorem ipsum from lorem ipsum in kenya and cery cosu ntra jeui favfj uyuou ajaebja', 'image/items/blog-4.jpg'),
(74, 'beddings four', 'Beddings', 'Not New', 'home', 12000, 'lorem ipsum from lorem ipsum in kenya and cery cosu ntra jeui favfj uyuou ajaebja', 'image/items/double-room.jpg'),
(75, 'beddings five', 'Beddings', 'Not New', 'home', 13000, 'lorem ipsum from lorem ipsum in kenya and cery cosu ntra jeui favfj uyuou ajaebja', 'image/items/slide2-800x425.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(40) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `location` varchar(255) NOT NULL,
  `total` int(40) NOT NULL,
  `state` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `fname`, `lname`, `email`, `contact`, `location`, `total`, `state`) VALUES
(7, '2015-11-09', 'janet', 'wambui', 'janet@yahoo.com', '76908980', 'nairobi', 13844, 'Not Fullfilled'),
(9, '2015-11-12', 'kim', 'kimani', '5468790', '546890-', 'drtfikj', 4500, 'Not Fullfilled'),
(11, '2015-11-13', 'julius', 'kaka', 'julius@gmail.com', '45789075465', 'kisumu', 65965, 'Fullfilled');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `order_id` int(40) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `quantity` int(40) NOT NULL,
  `sub_total` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_name`, `product_image`, `product_category`, `quantity`, `sub_total`) VALUES
(7, 'Nike brand', 'image/items/p35.jpg', 'Shoes', 2, 7000),
(7, 'leather high boots', 'image/items/heels.png', 'shoes', 1, 2000),
(7, 'Loafers', 'image/items/boots-600x400.png', 'Shoes', 1, 2500),
(7, 'sdfsf', 'image/items/db_file_img_269_160xauto.jpg', 'shoes', 1, 2344),
(8, 'Loafers', 'image/items/boots-600x400.png', 'Shoes', 1, 2500),
(9, 'Loafers', 'image/items/boots-600x400.png', 'Shoes', 1, 2500),
(9, 'leather high boots', 'image/items/heels.png', 'shoes', 1, 2000),
(10, 'wfvfg', 'image/items/metro.png', 'Jewellery', 1, 9876),
(10, 'simo watch', 'image/items/clock-1-600x400.png', 'Jewellery', 2, 6000),
(11, 'fwfw', 'image/items/banner5.jpg', 'Blankets', 1, 200),
(11, 'miji', 'image/items/b1.jpg', 'Blankets', 1, 65765);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500'),
(2, 'suzzie', 'bc866148313a617028b7b94f7213a0da');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
