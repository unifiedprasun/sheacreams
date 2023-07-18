-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 07:25 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mridayaitservices_db_sheacreams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `contact_number` varchar(256) NOT NULL,
  `password` text NOT NULL,
  `position` varchar(256) NOT NULL,
  `image` text NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=super_admin, 2=employee',
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1' COMMENT '1=active',
  `is_deleted` int(11) NOT NULL DEFAULT '0' COMMENT '1=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `contact_number`, `password`, `position`, `image`, `type`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(1, 'Shovan Nandi', 'Admin', 'admin@gmail.com', '8348338409', '75d23af433e0cea4c0e45a56dba18b30', 'Director', 'flower4.jpg', 1, '2020-04-12 03:00:00', '2020-09-24 14:52:22', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner_details`
--

CREATE TABLE `banner_details` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL COMMENT 'id from banner_page',
  `image` text NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner_details`
--

INSERT INTO `banner_details` (`id`, `page_id`, `image`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(1, 1, 'banner1.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(2, 2, 'banner2.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(3, 3, 'banner3.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(4, 4, 'banner4.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(5, 5, 'banner5.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(6, 6, 'banner6.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(7, 7, 'banner7.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(8, 8, 'banner8.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(9, 9, 'banner9.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(10, 10, 'banner10.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(11, 11, 'banner11.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(12, 12, 'banner12.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(13, 13, 'banner13.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(14, 14, 'banner14.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(15, 15, 'banner15.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(16, 16, 'banner16.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0),
(17, 17, 'banner17.png', '2020-08-27 20:16:34', '2020-08-27 20:16:34', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner_page`
--

CREATE TABLE `banner_page` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner_page`
--

INSERT INTO `banner_page` (`id`, `page_name`, `page_slug`) VALUES
(1, 'Shop By Concerns', 'shop-by-concerns'),
(2, 'Shop By Skin Type', 'shop-by-skin-type'),
(3, 'Blogs', 'blogs'),
(4, 'Blog Details', 'blog-details'),
(5, 'Find A Store', 'find-a-store'),
(6, 'Contact Us', 'contact-us'),
(7, 'The Shea Story', 'the-shea-story'),
(8, 'Customer Service', 'customer-service'),
(9, 'Delivery', 'delivery'),
(10, 'Returns', 'returns'),
(11, 'Sustainability Commitment', 'sustainability-commitment'),
(12, 'Environmental Policy', 'environmental-policy'),
(13, 'User Profile', 'user-profile'),
(14, 'Writer Profile', 'writer-profile'),
(15, 'Free Sample', 'free-sample'),
(16, 'Shop', 'shop'),
(17, 'Search', 'search');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `is_approve` int(11) DEFAULT '0' COMMENT '1=approved, 2=rejected',
  `writer` int(11) NOT NULL COMMENT 'id from writer table',
  `category` int(11) NOT NULL COMMENT 'id from category table',
  `title` varchar(256) NOT NULL,
  `image` text,
  `slug` varchar(256) NOT NULL,
  `tags` text NOT NULL,
  `short_desc` text NOT NULL,
  `content` longtext NOT NULL,
  `meta_title` varchar(256) DEFAULT NULL,
  `meta_keywords` text,
  `meta_description` longtext,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1' COMMENT '1=active',
  `is_deleted` int(11) NOT NULL DEFAULT '0' COMMENT '1=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `is_approve`, `writer`, `category`, `title`, `image`, `slug`, `tags`, `short_desc`, `content`, `meta_title`, `meta_keywords`, `meta_description`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(1, 1, 5, 5, 'Blog One', 'blog_one.jpg', 'blog-one', 'Tag One,Tag Two,Tag Three,Tag Four', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Meta Titles', 'Meta Keywords', 'Meta Descriptions', '2020-09-11 16:15:06', '2020-09-11 17:29:43', 1, 0),
(2, 1, 5, 5, 'Blog Two', 'blog_two.jpg', 'blog-two', 'Tag One,Tag Two,Tag Three,Tag Four', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Meta Titles', 'Meta Keywords', 'Meta Descriptions', '2020-09-11 16:15:06', '2020-09-11 16:15:06', 0, 0),
(3, 1, 5, 5, 'Blog Three', 'blog_three.jpg', 'blog-three', 'Tag One,Tag Two,Tag Three,Tag Four,Tag Five', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Meta Titles', 'Meta Keywords', 'Meta Descriptions', '2020-09-11 16:15:06', '2020-09-11 16:15:06', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `added_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `user_id`, `blog_id`, `comment`, `added_on`, `is_active`, `is_deleted`) VALUES
(1, 1, 1, 'This is the best website', '2020-08-02 14:50:49', 1, 0),
(2, 2, 2, 'This is the best website', '2020-08-02 14:55:19', 0, 0),
(3, 5, 1, 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '2020-09-11 19:46:47', 1, 0),
(4, 1, 3, 'testing...', '2020-09-24 15:52:55', 1, 0),
(5, 1, 3, 'test once again....', '2020-09-24 15:54:35', 1, 0),
(6, 1, 3, 'test repeatedly.....', '2020-09-24 16:31:22', 1, 0),
(7, 2, 3, 'test comment Subham...', '2020-09-24 16:44:07', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_count`
--

CREATE TABLE `blog_count` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_count`
--

INSERT INTO `blog_count` (`id`, `blog_id`, `view`) VALUES
(1, 3, 30),
(2, 2, 18),
(3, 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `added_on`, `is_deleted`) VALUES
(1, 4, 2, 3, '2020-09-09 17:44:14', 0),
(2, 4, 3, 3, '2020-09-09 17:44:25', 0),
(7, 5, 8, 2, '2020-09-12 17:10:40', 0),
(8, 5, 6, 1, '2020-09-12 17:10:40', 0),
(9, 1, 1, 2, '2020-09-25 15:22:19', 1),
(10, 1, 2, 2, '2020-09-25 15:26:32', 1),
(11, 1, 6, 2, '2020-09-25 15:52:16', 1),
(12, 1, 5, 1, '2020-09-25 15:54:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_for` int(11) NOT NULL COMMENT '1=product, 2=blog',
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `banner_image` varchar(256) DEFAULT NULL,
  `meta_title` text,
  `meta_keywords` text,
  `meta_description` text,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_for`, `slug`, `name`, `icon`, `banner_image`, `meta_title`, `meta_keywords`, `meta_description`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(1, 1, 'normal-skin', 'Normal Skin', NULL, NULL, 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-22 23:01:52', '2020-08-22 23:01:52', 1, 0),
(2, 1, 'dry-skin', 'Dry Skin', NULL, NULL, 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-22 23:02:18', '2020-08-22 23:02:18', 1, 0),
(3, 1, 'oily-skin', 'Oily Skin', NULL, NULL, 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-22 23:02:40', '2020-08-22 23:02:40', 1, 0),
(4, 1, 'sensitive-skin', 'Sensitive Skin', NULL, NULL, 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-22 23:03:20', '2020-08-22 23:03:20', 1, 0),
(5, 2, 'category-one', 'Category One', '', '', 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-22 23:04:22', '2020-09-23 18:38:51', 1, 0),
(6, 2, 'category-two', 'Category Two', NULL, NULL, 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-22 23:04:46', '2020-08-22 23:04:46', 1, 0),
(7, 2, 'category-three', 'Category Three', NULL, NULL, 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-24 20:03:54', '2020-08-24 20:04:38', 1, 0),
(8, 2, 'category-four', 'Category Four', NULL, NULL, 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-25 16:50:07', '2020-08-25 16:50:07', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `content` longtext NOT NULL,
  `banner_image` text NOT NULL,
  `meta_title` varchar(256) DEFAULT NULL,
  `meta_keywords` text,
  `meta_description` text,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `name`, `title`, `slug`, `content`, `banner_image`, `meta_title`, `meta_keywords`, `meta_description`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(1, 'About Us', 'About Us', 'about-us', '<h3>OUR STORY</h3>\r\n\r\n<p>Growing up in our household was an amazing learning experience Dad was a biochemist always experimenting in his homemade lab making different things Some being face creams, hair moisturizers and shampoo for all the local neighbors. You can guess he was always a popular person<br />\r\n<br />\r\nWhile Mum Mrs. Jameson always advocated from an early age the use of natural products in things that she applied to her skin or ate. She loves trying different natural health remedies and still has gushingly amazing skin Using different nourishing natural ingredients together with shea butter to moisturize and black soap to wash with a regime that has not changed now she is in her Seventies<br />\r\n<br />\r\nSo growing up with this in our heads it was no wonder that I and sister soon realized if we also wanted young radiant healthy well-toned skin &ndash; It was a good idea to follow mum and dad&#39;s skin and general wellbeing regime and we have not looked back.</p>\r\n\r\n<hr />\r\n<h3>OUR TEAM</h3>\r\n\r\n<p>We are an experienced team who through personal experiences have enjoyed the deep moisturizing qualities shea products have provided to our own skin.<br />\r\nOur objective at Shea Creams is to provide your body from your head down to your toes with shea and other plant-derived products that are right for you needs. We strive to get products of natural origin to you that will enhance and retain their natural qualities and always say no to anything that adds no value or are harmful to your skin. That&rsquo;s a total no from us to all known nasties and animal testing.</p>\r\n', 'abotuus_banner.jpg', NULL, NULL, NULL, '2020-08-24 20:35:34', '2020-09-11 20:50:35', 1, 0),
(2, 'Terms & Conditions', 'Terms And Conditions', 'terms-and-conditions', '<h3><strong>General terms and conditions</strong></h3>\r\n\r\n<p>Do read the following carefully as it contains the terms and conditions that you agree to be bound by if you wish to use the Shea Creamswebsite or purchase from Shea Creams. The terms and conditions apply to your use of the Shea Creamswebsite, online shop and ordering services. These conditions and the terms of use apply between you (where &lsquo;you&rsquo; refers to the customer using the website or whose order is accepted by Shea Creams and Shea Creams(where &lsquo;Shea Creams&rsquo;, &lsquo;we&rsquo; and &lsquo;us&rsquo; refers to Body Butter Limited)</p>\r\n\r\n<p>Body Butter Limited&rsquo;s registered office is the 3rd floor, 86 - 90 Paul St, Old Street, London EC2A 4NE, United Kingdom.</p>\r\n\r\n<p>Registered in England &amp; Wales Company Reg No. 10444988</p>\r\n\r\n<p>Please address any complaints, queries or correspondence regarding these terms and conditions to this registered address or contact us by email.</p>\r\n\r\n<h3><strong>Buying</strong></h3>\r\n\r\n<p>You are able to purchase products manufactured by Shea Creams directly from our website, by post or by telephone. Our delivery service covers the United Kingdom, the US, Canada, Africa, the Middle East, China, the EU, and Australasia. You may purchase products produced by Shea Creams for personal use only unless otherwise agreed. We reserve the right to refuse any order on any grounds. All orders are dispatched on receipt of payment unless an alternative arrangement has been put in place.</p>\r\n\r\n<h3><strong>Selling</strong></h3>\r\n\r\n<p>If you are a retailer, you may sell Shea Creams products to a third party in accordance with these stated terms and conditions, adhering to Shea Creams pricing recommendations and Shea Creams copyright regulations. Retailers may not sell any Shea Creams product to another retailer for re-sale or act as a distributor without permission from Shea Creams. (in which circumstance Shea Creams will provide written terms and conditions applicable to such an agreement).</p>\r\n\r\n<p>Shea Creams reserves the right to remove any retailer from its customer base if it is decided that within all reasonable doubt that Shea Creams products are being sold in a manner deemed inappropriate or offensive or which may be causing a &ldquo;conflict of interest&rdquo; between customers or retailers. All decisions are made at the discretion of Shea Creams.</p>\r\n\r\n<h3><strong>Product prices</strong></h3>\r\n\r\n<p>Full details of all the products available along with their prices are set out on the Shea Creams website. All of our prices are shown in Pound Sterling and USDollars. The prices exclude postage and packing charges where they are applicable.</p>\r\n\r\n<p>We reserve the right to change our prices at any time.</p>\r\n\r\n<h3><strong>Product Details</strong></h3>\r\n\r\n<p>Shea Creams takes all reasonable care to ensure that all details, descriptions, and prices of products are correct at the time when the relevant information is placed on the website; online shop or in any printed material. Some Shea Creams products may not be available and Shea Creams reserves the right to remove or add items to and from the website at any time. Although every effort is made to keep our information as up to date as possible, the information appearing at a particular time may not always reflect the exact position at the moment you place an order. Whilst every effort is made to accurately describe Shea Creams products, there may be slight variations in product color, packaging design or specification at any time. We endeavor to make sure pricing is correct at time of printing but reserve the right to change prices due to error or supplier changes.</p>\r\n\r\n<p>Reference to any product or service by Shea Creams does not constitute an offer to sell or supply that product or service and does not mean that the product or service is available in all countries. The information provided by Shea Creams has been included in good faith for general informational purposes only. It should not be relied upon for any specific purpose and no representation or warranty is given as to its accuracy or completeness.</p>\r\n\r\n<h3><strong>Placing an order</strong></h3>\r\n\r\n<p>Orders may be placed online on our website www.Shea Creams.com or over the phone on 02071128577. Shea Creams accepts payments by credit or debit cards as well as bank transfers where applicable. All card payments are made securely through our Merchant Service Provider PayPal where all payments are dealt with through a secure server.</p>\r\n\r\n<p>All Shea Creams products remain the property of Shea Creams until payment has been received in full.</p>\r\n\r\n<p>If your credit or debit card does not give authorisation and is declined, your order will also be declined and not be processed any further. Shea Creams will confirm your product order by email once payment has been received. Shea Creams will email you again to confirm that the products you have ordered are being shipped to you. Once placed, your order becomes a contract of sale for the products you have ordered and is concluded between you and Shea Creams only upon those products being shipped to you.</p>\r\n\r\n<p>Shea Creams may refuse or be unable to process your order if the product you ordered is discontinued or no longer available; your credit card does not give authorization for the payment of the purchase price or if you do not meet any of the criteria required to allow an order to be made.</p>\r\n\r\n<h3><strong>Changing or cancelling an order</strong></h3>\r\n\r\n<p>If you wish to change an order simply contact Shea Creams on 02071128577or email: info@SheaCreams.com including your order number and the date the order was placed. You may cancel an order within 14 days of receipt of your order in accordance with your consumer rights under The Consumer Contracts Regulations 2013. We may not be able to stop your order being shipped out to you; however, your right to cancel an order and return the products remains unaffected. The costs of delivery and returns incurred will be the customer&rsquo;s responsibility.</p>\r\n\r\n<h3><strong>Returns</strong></h3>\r\n\r\n<p>If you would like to return a product or an order to us, please do so within 14 days of receipt of the goods. Under the Customer Contracts Regulations, you have 14 days to return the items to us. Please contact Shea Creams first by telephone 02071128577 or email info@SheaCreams.com to inform us of the return and provide us with details of the items you wish to return.</p>\r\n\r\n<p>We will provide you with a returns number or form to fill in to accompany your returns. For reasons of hygiene and safety, we are unable to exchange items unless they return to us unopened. Please pack your parcel with care; if you fail to pack the parcel and your goods arrive damaged (as a result of the return trip) we may not be able to process your return.</p>\r\n\r\n<p>Please send the returns to us at Body Butter Limited, 3rd floor, 86 - 90 Paul St, Old Street, London EC2A 4NE. We recommend you obtain proof of posting to ensure both traceability and insurance. You should also obtain a receipt for the parcel when you send it.</p>\r\n\r\n<p>If you wish to return an order because you no longer wish to receive the goods, or no longer want a product, the return costs will be the customer&rsquo;s responsibility. If a product has been partially used, you may not receive a full refund. A refund will be provided on receipt of the return.</p>\r\n\r\n<p>If you have any questions, please ask.</p>\r\n\r\n<p>To return a damaged, the incorrect or faulty product you have 28 days from receiving the product under The Customer Contracts Regulations 2013 to do so.</p>\r\n\r\n<p>Please contact Shea Creams first by telephone 02071128577 or email info@SheaCreams.com to inform us of the problem and providing us with the details of the items you wish to return. We will provide you with a returns number or form to fill in to accompany your returns.</p>\r\n\r\n<p>Please pack your parcel with care; if you fail to pack the parcel carefully and your goods arrive damaged (as a result of the return trip) we may not be able to process your return. We will refund the postage costs incurred to the value of standard second class rate (under 1kg) or first-class rate (over 1kg) for faulty or incorrect goods. Our returns address is Body Butter Limited, 3rd floor, 86 - 90 Paul St, Old Street, London EC2A 4NE.</p>\r\n\r\n<p>We recommend you obtain a free proof of posting via the post office to ensure both traceability and insurance. You should also obtain a receipt for the parcel when you send it.</p>\r\n\r\n<h3><strong>Refunds</strong></h3>\r\n\r\n<p>We will are happy to refund any returned items in a re-saleable condition or alternatively exchange the product. You will be refunded at the price you paid for the product at the time of your order within 7 days of receipt of a return. You will be refunded the product price or you can exchange the product once the return is received by Shea Creams. If the product you wish to exchange has a lower price than the originally ordered product, we will refund you the difference; if it has a higher price, we will require you to settle the difference.</p>\r\n\r\n<p>If you wish to return an item you do not like, ordered by mistake or you have changed your mind about &ndash; Shea Creams will only refund the cost of your order and not the returns charge. These products must be packed up carefully and be in a fully saleable condition. Once a product has been opened or where the product has been extensively used, we reserve the right not to refund in full. A refund of the delivery charge will only be given where the products returned are incorrect or were delivered in a damaged or faulty state. In this event, we will reimburse your postage costs at the standard second class rate (under 1kg) or first-class rate (over 1kg). Shea Creams also reserves the right to recommend a returns method to save costs.</p>\r\n\r\n<h3><strong>Delivery Damage</strong></h3>\r\n\r\n<p>In the event a Shea Creams order is received in a damaged condition due to transit, the consignment should be refused at the point of delivery so that the goods be returned to Shea Creams. If goods are only seen to be damaged once the package has been opened &ndash; please contact us immediately and we will arrange the re-delivery of a new order. A re-delivery can take place once Shea Creams receive evidence of the damage, for example, a photograph.</p>\r\n\r\n<h3><strong>Delivery Times</strong></h3>\r\n\r\n<p>UK Orders placed with Shea Creams are processed to reach you as quickly as possible, usually within 1-4 days. Most orders are dispatched within 24 hours of receipt (except over the weekends, bank holidays and other holidays where orders will be processed on resuming opening). If your order has not arrived within 7 days, please contact us.</p>\r\n\r\n<p>US shipping time, please allow between 4-8 days for delivery. If your order has not arrived within 8 days, please contact us.</p>\r\n\r\n<p>Other locations between 4-10 days for delivery. If your order has not arrived within 9 days, please contact us.</p>\r\n\r\n<p>Customs and Import Duty</p>\r\n\r\n<p>If you live outside of the UK it is your responsibility to check and assess if there are any extra charges, taxes or import duties liable on delivery. Shea Creams will not be liable for any of these extra charges or charges in the event that a shipment is stopped, held or disposed of. Shea Creams has no control over these charges, please contact your local customs office for more information.</p>\r\n\r\n<h3><strong>Suitability for purpose</strong></h3>\r\n\r\n<p>We do not accept responsibility for the misuse of Shea Creams products. It is the responsibility of the customer to use Shea Creams products with discretion. Shea Creams does not accept responsibility for the misuse of products where the goods are used in any way that contravenes recommendations. We do not accept responsibility for damage or defect of Shea Creams goods arising from incorrect storage or use by the customer. We accept no liability for loss or consequential damage arising from the goods supplied. All Shea Creams products have passed through rigorous quality control procedures before dispatch to the customer. Shea Creams cannot be held responsible for the deterioration of the products due to the customer&rsquo;s incorrect storage conditions ie, exposure to direct sunlight, etc. The customer should ensure that Shea Creams products are kept in hygienic conditions, to minimize the risk of deterioration in the product resulting from external contamination.</p>\r\n\r\n<h3><strong>Disclaimer</strong></h3>\r\n\r\n<p>Information provided by Shea Creams to our customers is for information purposes only and is not intended to diagnose, prescribe or replace professional advice. If the customer has a medical complaint, it is the customer&rsquo;s responsibility to seek advice about contraindications from using any of the goods supplied by Shea Creams.</p>\r\n\r\n<p>All representations relating to the purpose of use are excluded to the full extent permitted by law and Shea Creams accepts no liability. None of the information we provide is intended to treat any ailment and any product used to such a purpose is used with the responsibility and at the discretion of the consumer. It is the customer&rsquo;s responsibility to obtain advice about contraindications from a professional. We disclaim all liability and responsibility arising from any reliance on information or products purchased from this website. While all effort is made to ensure that the information provided is correct, the website may contain errors for which we accept no liability. We accept no liability for loss or damage caused by the misuse or misrepresentation of information supplied. All representations relating to the purpose of use are excluded to the full extent permitted by law and we accept no liability.</p>\r\n\r\n<h3><strong>Trademarks</strong></h3>\r\n\r\n<p>All Shea Creams branding, product names and service names used on the Shea Creams website are the trademarks, registered trademark of Shea Creams unless otherwise stated. You may not distribute products or offer services under or by reference to or otherwise use or reproduce any such registered trademarks, trade names or service marks without the prior written permission of Shea Creams &ndash; the owner of such registered trademarks, trade names or service marks.</p>\r\n\r\n<h3><strong>Copyright</strong></h3>\r\n\r\n<p>Shea Creams 2017-2020. All Rights Reserved. Reproduction is prohibited other than in accordance with the following copyright notice and limited reproduction permissions. The contents of the Shea Creams pages are the copyright of &copy; Shea Creams Limited and remain the sole property of Shea Creams.</p>\r\n\r\n<ol>\r\n	<li>&nbsp;As a potential purchaser, you may not copy or print copies of our web pages without written permission from Shea Creams. You may pass on information to another individual or a third party for their personal information only, but only if you acknowledge the web pages of Shea Creams as the source of the material. You must also include such acknowledgment along with the URL from the Shea Creams website (https://www.Shea Creams.com) in the copy of the material, and you inform the third party that these conditions apply to him or her and that he/she must comply with them. This license to recopy does not permit incorporation of the material or any part of it in any other work or publication, whether in hard copy or electronic or any other form. In particular (but without limitation) no part of a page from the website of Shea Creams or any printed material may be distributed or copied for any commercial purpose.</li>\r\n	<li>&nbsp;Shea Creams is able to provide promotional literature and product information where possible so please contact Shea Creams for relevant information. You may not reproduce or copy any images from the Shea Creams website without permission.</li>\r\n	<li>&nbsp;No part of the website of Shea Creams may be reproduced on or transmitted to or stored in any other website or any other form of the electronic retrieval system. Shea Creams is unless otherwise stated, the owner of all copyright and database rights on the website and its contents.</li>\r\n	<li>&nbsp;Shea Creams may not be used for the purpose of marketing or in advertising (print or internet) of any sort without written permission from Shea Creams.</li>\r\n	<li>&nbsp;You may not publish, distribute, extract, re-utilize, or reproduce any part of the Shea Creams name, logo, images, branding or website in any material form other than in accordance with the uses set out in our terms and conditions &ndash; or as permitted by the Copyright Designs and Patents Act 1988 or the Copyright and Rights in Databases Regulations 1997 as applicable &ndash; or any equivalent legislation as may apply in your country.</li>\r\n</ol>\r\n\r\n<h3><strong>Reservations</strong></h3>\r\n\r\n<p>Shea Creams reserves the right to:</p>\r\n\r\n<p>Modify or withdraw, temporarily or permanently, Shea Creams online shop with or without notice to you. Shea Creams shall not be liable to you or any third party for any such modification or withdrawal; and/or change in the terms and conditions from time to time. Your continued use of Shea Creams products or website following such changes shall be deemed to be your acceptance of such changes. It is your responsibility to check regularly to determine whether the terms and conditions have been changed.<br />\r\nIf Shea Creams should change these conditions, your order will be subject to the terms and conditions at the date and time of you placing your order.</p>\r\n\r\n<p>Up to date copies of the relevant terms and conditions are available by email <a href=\"mailto:info@sheacreams.com\">info@sheacreams.com</a></p>\r\n\r\n<p>If any part of the conditions is declared unlawful or unenforceable, then that provision shall be deemed deleted from the conditions and the remaining provisions of the conditions shall remain in full force and effect.</p>\r\n\r\n<p>These terms and conditions are governed by and will be construed in accordance with the laws of England and Wales. Any disputes arising under or in connection with these Terms and Conditions shall be subject to the non-exclusive jurisdiction of the English Courts.</p>\r\n', 'dummy_2.png', NULL, NULL, NULL, '2020-08-24 20:50:08', '2020-08-24 20:50:08', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `compose_mail`
--

CREATE TABLE `compose_mail` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `sent_date` datetime NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT '0' COMMENT '1=read',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_logs`
--

CREATE TABLE `employee_logs` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'id from admin',
  `page_url` text NOT NULL,
  `ip_address` varchar(256) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `enquery`
--

CREATE TABLE `enquery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `is_star` int(11) NOT NULL DEFAULT '0',
  `is_read` int(11) NOT NULL DEFAULT '0' COMMENT '1=read',
  `is_reply` int(11) NOT NULL DEFAULT '0',
  `reply_message` text,
  `reply_date` date DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquery`
--

INSERT INTO `enquery` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `date`, `is_star`, `is_read`, `is_reply`, `reply_message`, `reply_date`, `is_active`, `is_deleted`) VALUES
(1, 'Shovan Nandi', 'shovan@gmail.com', '8348338409', 'Test Subject', 'If you use this site regularly and would like to help keep the site on the Internet, please consider donating a small sum to help pay for the hosting and bandwidth bill', '2020-09-10 15:27:40', 0, 1, 0, NULL, NULL, 1, 0),
(2, 'Shovan Nandi', 'shovan@gmail.com', '8348338409', 'Subject', 'Test', '2020-09-10 15:29:52', 0, 1, 0, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'id from user table',
  `product_id` int(11) NOT NULL COMMENT 'id from product table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `value` text NOT NULL,
  `icon` varchar(256) DEFAULT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `title`, `name`, `value`, `icon`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(1, 'FOOTER_ADDRESS_ONE', 'Footer Address One', '3rd floor, 86 - 90 Paul St, Old Street, London EC2A 4NE United Kingdom\r\n', 'fa fa-map-marker', '2020-08-24 20:17:36', '2020-09-03 20:37:19', 1, 0),
(2, 'FOOTER_ADDRESS_TWO', 'Footer Address Two', '10685-B Hazelhurst Dr. #24523 Houston, TX 77043 USA\r\n', 'fa fa-map-marker', '2020-08-24 20:18:09', '2020-09-03 20:37:37', 1, 0),
(3, 'FOOTER_EMAIL', 'Footer Email', '<p>info@sheacreams.com</p>\r\n', 'fa fa-envelope', '2020-08-24 20:19:18', '2020-08-24 20:19:18', 1, 0),
(4, 'FACEBOOK_LINK', 'Facebook Link', '<p>https://www.facebook.com/sheacreams.skincare</p>\r\n', 'fa fa-facebook', '2020-08-24 20:20:16', '2020-09-07 23:20:23', 1, 0),
(5, 'INSTAGRAM_LINK', 'Instagram Link', '<p>https://www.instagram.com/sheacreams/</p>\r\n', 'fa fa-instagram', '2020-08-24 20:21:01', '2020-09-07 23:20:32', 1, 0),
(6, 'TWITTER_LINK', 'Twitter Link', '<p>https://twitter.com/SheaCreams/</p>\r\n', 'fa fa-twitter', '2020-08-24 20:22:01', '2020-09-07 23:20:13', 1, 0),
(7, 'PINTEREST_LINK', 'Pinterest Link', '<p>https://www.pinterest.co.uk/sheacreams/</p>\r\n', 'fa fa-pinterest', '2020-08-24 20:22:58', '2020-09-07 23:18:25', 1, 0),
(9, 'FOOTER_SLIDER_TEXT', 'Footer Slider Text', '<p>OUR PRODUCTS ARE NATURAL BASED AND HANDMADE</p>\r\n', '', '2020-08-24 20:24:36', '2020-08-24 20:24:36', 1, 0),
(10, 'SHOP_BY_CONCERNS', 'Shop By Concerns', '<h3>SKIN CARE PRODUCTS DESIGNED FOR MEN &amp; WOMEN</h3>\r\n\r\n<p>Welcome I hope you enjoy using our wonderful selection of skincare products and most importantly they meet and exceed your expectations when it comes to handmade cosmetic products. Our unisex range has been specifically made to benefit a wide spectrum of customer needs. Do share your Shea experience with other users and our team on ig: shea creams and Facebook: shea creams<br />\r\n<br />\r\nWe hope you enjoy the Shea Creams experience</p>\r\n', '', '2020-08-24 20:28:10', '2020-09-04 15:51:45', 1, 0),
(11, 'SHOP_BY_SKIN_TYPE', 'Shop By Skin Type', '<h3>UNISEX SKIN CARE PRODUCTS FOR ALL SKIN TYPES</h3>\r\n\r\n<p>Looking after your skin is all part of our daily body care routine which also includes what we eat, regular physical workouts and plenty of sleep. As we know that the benefits from the correct skin care routine can be immediate and provide long term visible change.<br />\r\n<br />\r\nWe ensure that our formulations are made with products of natural origin that actually benefit you&rsquo;re specific skin type. Our nourishing skin range provides 24 hour total moisturising cover just what we need to cope with today&rsquo;s hectic lifestyle.</p>\r\n', '', '2020-08-24 20:29:03', '2020-09-04 15:52:06', 1, 0),
(12, 'STORE_ADDRESS_ONE', 'Store Address One', '<p><strong>Pempamsie Brixton</strong></p>\r\n\r\n<p>102 Brixton Hill, London SW2 1AH</p>\r\n\r\n<p><strong>Call US:</strong>&nbsp;+44 20 8671 0800</p>\r\n', '', '2020-08-24 20:30:15', '2020-09-04 16:32:04', 1, 0),
(13, 'STORE_ADDRESS_TWO', 'Store Address Two', '<p><strong>Ankh Wellbeing Centre</strong></p>\r\n\r\n<p>10 Adelaide Grove, Shepherd&rsquo;s Bush, London W12 0JJ</p>\r\n\r\n<p><strong>Call US:</strong>&nbsp;020 8743 1985</p>\r\n', '', '2020-08-24 20:30:44', '2020-09-04 16:31:43', 1, 0),
(14, 'CUSTOMER_SERVICE_EMAIL', 'Customer Service Email', '<p>Submit your questions whenever you like.</p>\r\n\r\n<h3>customer@sheacreams.com</h3>\r\n', '', '2020-08-24 21:15:22', '2020-09-04 15:27:09', 1, 0),
(15, 'CUSTOMER_SERVICE_CALL', 'Customer Service Call', '<p>For enquiries please use our Consumer</p>\r\n\r\n<h3>Care Number: 02071128577</h3>\r\n', '', '2020-08-24 21:16:36', '2020-09-04 15:27:24', 1, 0),
(16, 'DELIVERY_INFORMATION', 'Delivery Information', '<h3>How much is UK delivery?</h3>\r\n\r\n<p>Our delivery charge is &pound;4.00 for orders up to 3 items. Orders over 4 items will cost &pound;4.73 for postage and packing.</p>\r\n\r\n<h3>How long will it take to get my package?</h3>\r\n\r\n<p>We aim to dispatch our orders as quickly as possible, usually on the same day as receiving the order. We dispatch our orders with FedEx, Royal Mail &amp; DHL so please allow 1-4 days for delivery.</p>\r\n\r\n<h3>Do you offer next day delivery?</h3>\r\n\r\n<p>Yes, we can offer a next day delivery service choice for any orders placed before 1 pm. But these orders have to be called through to us and paid for by telephone.</p>\r\n\r\n<h3>Do you ship internationally?</h3>\r\n\r\n<p>Yes, we ship to the US at local US rates, do contact us at info@sheacreams.com in relation to other Worldwide destinations. Our delivery charges to other parts of the World start at &pound;10.00 and are staggered by weight.</p>\r\n', '', '2020-08-24 21:19:03', '2020-09-04 15:52:40', 1, 0),
(17, 'RETURN_INFORMATION', 'Return Information', '<h3>How do I return something?</h3>\r\n\r\n<p>Please email <a href=\"mailto:info@sheacreams.com\">info@sheacreams.com</a> with your order number and the reason for return and we will provide you with the details you need. Please get in touch with us within 28 days of ordering, we are unable to accept returns after this time has elapsed.</p>\r\n\r\n<hr />\r\n<h3>What happens if I have a damaged order?</h3>\r\n\r\n<p>Please contact us immediately and we will happily replace the damaged items. Please notify us within 3 days of delivery. Please be aware that we may ask you to return the goods or request photographic evidence of the damage.</p>\r\n', '', '2020-08-24 21:20:16', '2020-09-04 15:53:10', 1, 0),
(18, 'SUSTAINABILITY_COOITMENT', 'Sustainability Commitment', '<p>At Shea Creams we are committed to making products that are friendly to our customers and environment</p>\r\n\r\n<p><strong>Renew, Reuse, Refill and Recycle!</strong></p>\r\n\r\n<p>We use only packing that can either be reused or recycled we are committed to recycling our packaging be it reusable plastic or our infinitely reusable aluminum jars &ndash;We endeavor to recycle as much of our everyday waste as possible. We will be looking to introduce our new refill service which will be available at our outlets soon which of course will have perks of use &ldquo;and hope at some point you can join us on that commitment.&rdquo;</p>\r\n\r\n<p><strong>Sourcing</strong></p>\r\n\r\n<p>Our ethically sourced Shea Butter is derived from West African working directly with the farmers ensures more profits go back. We are proud to confirm that all our Hand Made products are made by innovative traditional farming methods making our products truly organic.</p>\r\n\r\n<p><strong>Natural</strong></p>\r\n\r\n<p>By making our skincare products as natural as possible and refusing to test on animals. Relying more on our knowledge of butter, essential oils, ingredients, plants and flowers so as to ensure a more Natural final product</p>\r\n\r\n<p><strong>Products</strong></p>\r\n\r\n<p>Our team on the ground and local producers work hard to bring you the best organic produce in the market to use in our products. Having this in mind, we have created and sourced a selection of wonderful shea creams, oils, soaps, moisturizers we know you will love.</p>\r\n', '', '2020-08-24 21:22:58', '2020-09-04 15:54:57', 1, 0),
(19, 'ENVIRONMENTAL_POLICY', 'Environmental Policy', '<p>At Shea Creams we are dedicated to providing eco-friendly products that are not only good for our skin but are also friendly to our environment.</p>\r\n\r\n<p>Keeping in line with our 100% policy we ensure that our formulations are made with products of natural origin that actually benefit your specific skin type.</p>\r\n\r\n<p>Also in keeping in line with our 100% natural origin policy. By making our skincare products as natural as possible and refusing to test on animals. Relying more on our knowledge of butter, essential oils, ingredients, plants and flowers so as to ensure a more Natural final product.</p>\r\n\r\n<p>Sustainability is important to us we don&rsquo;t use any unsustainable ingredients from plants that are endangered or tree species. If you know a certain plant that contributes to habitat destruction do tell us and we&rsquo;ll choose something else in our formulation!</p>\r\n\r\n<p><strong>Renew, Reuse, Refill and Recycle!</strong></p>\r\n\r\n<p>We use only packing that can either be reused or recycled we are committed to recycling our packaging be it reusable pet plastic containers or our infinitely reusable aluminum jars &ndash;We endeavor to recycle as much of our everyday waste as possible. We will be looking to introduce our new moisturizer refill service which will be available at selected outlets soon which of course will have perks of use &ldquo;and hope at some point you can join us on that commitment.&rdquo;</p>\r\n\r\n<h3>Conservation is a state of harmony between men and land. &ndash; Aldo Leopold</h3>\r\n', '', '2020-08-24 21:24:23', '2020-09-04 15:51:10', 1, 0),
(20, 'FOOTER_COPYRIGHT', 'Footer Copyright', '<p>Sheacreams&nbsp;&copy; All right reserved.</p>\r\n', '', '2020-08-24 21:27:00', '2020-08-24 21:27:00', 1, 0),
(22, 'SHEA_STORY', 'The Shea Story', '<p>Accounts from around the dynasty of Cleopatra speak of caravans laden with highly valued shea destined for cosmetic use. How things have changed?!<br />\r\nThe amazing moisturising and healing properties of shea has spread and is no more just the pursuits of Pharaohs<br />\r\nOur premier unrefined shea butter is high in natural minerals and oils and is cultivated and extracted from the nut using innovative and traditional methods and techniques.</p>\r\n\r\n<p>Shea butter is suitable for eczema, dry skin, tanning, stretch marks, environmentally damaged skin, anti-aging, natural skin toning and overall wellbeing; a natural moisturiser for modern day living.</p>\r\n\r\n<p>Shea butter in its unrefined form is found in a white, yellow or cream colour, has a natural smoky nutty scent and a shelf life of over two years.</p>\r\n', '', '2020-08-24 21:33:29', '2020-08-24 21:33:29', 1, 0),
(23, 'DELIVERY_DAYS', 'Delivery Days', '14\r\n', '', '2020-09-07 13:57:54', '2020-09-09 12:41:18', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `home_banner`
--

CREATE TABLE `home_banner` (
  `id` int(11) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_image` text NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_banner`
--

INSERT INTO `home_banner` (`id`, `banner_title`, `banner_image`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(1, 'Banner One', 'banner.png', '2020-08-25 12:25:07', '2020-08-25 12:25:07', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `home_content_one`
--

CREATE TABLE `home_content_one` (
  `id` int(11) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content1` text NOT NULL,
  `content2` text NOT NULL,
  `content3` text NOT NULL,
  `content4` text NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_content_one`
--

INSERT INTO `home_content_one` (`id`, `content_title`, `content1`, `content2`, `content3`, `content4`, `image1`, `image2`, `image3`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(1, 'Shea Creams', '<p>Our range of Skin Cream is perfect to use to hydrate the body on a daily basis. Suitable for natural skin toning, tanning, dry skin, stretch marks, anti-aging, and overall wellbeing.</p>\r\n', '<p>24 hour Moisturizer for Body, Hands and Feet Designed for Men and Women</p>\r\n', '<ul>\r\n	<li>Cuticle repair</li>\r\n	<li>Anti-Aging</li>\r\n	<li>Ezcema</li>\r\n	<li>Skin Toning</li>\r\n	<li>Stretch Marks / Scars</li>\r\n	<li>Sun Damaged</li>\r\n	<li>Tanning</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Natural</li>\r\n	<li>Organic</li>\r\n	<li>Handmade</li>\r\n	<li>Skin Hydrator</li>\r\n	<li>Luxury</li>\r\n	<li>Perfect Gift</li>\r\n</ul>\r\n', 'shop_by_needs.jpg', 'shea_story.jpg', 'know_your_skin.png', '2020-08-24 22:19:48', '2020-08-24 22:19:48', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `home_content_three`
--

CREATE TABLE `home_content_three` (
  `id` int(11) NOT NULL,
  `content_title` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_content_three`
--

INSERT INTO `home_content_three` (`id`, `content_title`, `url`, `image`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(1, 'ABOUT US', 'http://www.google.com', 'about_us.png', '2020-08-25 12:11:43', '2020-08-25 12:11:43', 1, 0),
(2, 'SUSTAINABILITY', 'http://www.google.com', 'sustainability.jpg', '2020-08-25 12:12:23', '2020-08-25 12:20:44', 1, 0),
(3, 'SHEA BLOGS', 'http://www.google.com', 'pile-folded-old-newspapers-selective-600w-256943407.jpg', '2020-08-25 12:13:10', '2020-08-25 12:13:10', 1, 0),
(4, 'We heard that you wanted exclusive offers, special rewards', 'http://www.google.com', 'social_awerness.jpg', '2020-08-25 12:13:39', '2020-08-25 12:13:39', 1, 0),
(5, 'Never tried our Shea products before? Get a free sample', 'http://www.google.com', 'rBVaWFwaI2qAGEcYAAN5L3-82p4458.jpg', '2020-08-25 12:14:09', '2020-08-25 12:14:09', 1, 0),
(6, 'FIND A STORE', 'http://www.google.com', 'find_a_store.jpg', '2020-08-25 12:14:41', '2020-08-25 12:14:41', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `home_content_two`
--

CREATE TABLE `home_content_two` (
  `id` int(11) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_content_two`
--

INSERT INTO `home_content_two` (`id`, `content_title`, `content`, `image`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(1, 'Ethically Sourced', '<p>Shea Butter from West African By working with farmers using innovative traditional farming methods ensure more profits go back</p>\r\n', 'ethically_source.jpg', '2020-08-24 22:02:55', '2020-08-25 11:19:01', 1, 0),
(2, 'Natural', '<p>Making our skincare products as natural as possible relying more on our knowledge of butter, oils, plants, and flowers. And refusing to test on animals</p>\r\n', 'natural.jpg', '2020-08-24 22:03:31', '2020-08-24 22:03:31', 1, 0),
(3, 'Quality Assurance', '<p>Our individual handmade products have Our quality guarantee assurance stamp Our brand name and the ingredients packed inside each jar</p>\r\n', 'quality_assurance.jpg', '2020-08-24 22:04:01', '2020-08-24 22:04:01', 1, 0),
(4, 'Your Experience', '<p>Just received your first order or you&rsquo;ve purchased before do send us a mail about your experience How did it benefit your skin?</p>\r\n', 'your_experience.jpg', '2020-08-24 22:04:34', '2020-08-24 22:04:34', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `know_your_skin`
--

CREATE TABLE `know_your_skin` (
  `id` int(11) NOT NULL,
  `data_for` int(11) NOT NULL COMMENT '1=know_your_skin, 2=free_sample',
  `is_reply` int(11) NOT NULL DEFAULT '0',
  `reply_date` datetime DEFAULT NULL,
  `reply_msg` text,
  `skin_type` varchar(255) NOT NULL,
  `skin_concern` text NOT NULL,
  `message` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `know_your_skin`
--

INSERT INTO `know_your_skin` (`id`, `data_for`, `is_reply`, `reply_date`, `reply_msg`, `skin_type`, `skin_concern`, `message`, `name`, `mobile`, `email`, `address`, `added_on`) VALUES
(1, 2, 0, NULL, NULL, 'Normal skin', 'Test', 'Test', 'Shovan Nandi', '8348338409', 'shovan@gmail.com', 'Baguati', '2020-09-07 23:15:26'),
(2, 1, 0, NULL, NULL, 'Normal skin', 'Test', 'Test', 'Shovan Nandi', '8348338409', 'shovan@gmail.com', 'Baguati', '2020-09-07 23:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `most_view`
--

CREATE TABLE `most_view` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL COMMENT 'id from product table',
  `ip_address` varchar(256) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `is_subscribe` int(11) NOT NULL DEFAULT '1' COMMENT '0=unsubscribe',
  `subscription_date` datetime NOT NULL,
  `unsubscribe_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `is_subscribe`, `subscription_date`, `unsubscribe_date`) VALUES
(1, 'shovannandi96@gmail.com', 1, '2020-08-26 21:50:42', '0000-00-00 00:00:00'),
(2, 'shovannandi97@gmail.com', 1, '2020-08-26 21:51:31', '0000-00-00 00:00:00'),
(3, 'shovannandi95@gmail.com', 1, '2020-08-26 21:51:31', '0000-00-00 00:00:00'),
(4, 'shovannandi98@gmail.com', 1, '2020-09-07 18:28:08', '0000-00-00 00:00:00'),
(5, 'shovan@gmail.com', 1, '2020-09-07 18:34:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'foreign key of users table id ',
  `order_number` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `payment_type` varchar(255) NOT NULL COMMENT ' ',
  `payment_date` date NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `transaction_status` enum('paid','unpaid','processing','cancelled') NOT NULL COMMENT 'paid=>payment,unpaid=>not payment,processing=>payment processing,ccacelled=>payment cancelled',
  `transaction_amount` double(10,2) NOT NULL,
  `delivery_charge` double(10,2) NOT NULL,
  `delivery_date` date NOT NULL,
  `order_status` enum('0','1','2','3','4','5') NOT NULL COMMENT '0=>Pending,1=>Processing,2=>On hold,3=>dispatch,4=>delivered,5=>Cancel',
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL COMMENT 'foreign key of orders table orderid ',
  `product_id` int(11) NOT NULL COMMENT 'foreign key of products table id ',
  `price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `total_amount` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `best_selling` int(11) NOT NULL DEFAULT '0',
  `is_popular` int(11) NOT NULL DEFAULT '0',
  `sku_code` varchar(256) DEFAULT NULL,
  `product_name` varchar(256) DEFAULT NULL,
  `product_slug` varchar(256) DEFAULT NULL,
  `feature_image` varchar(256) DEFAULT NULL,
  `product_stock` int(11) DEFAULT NULL,
  `short_desc` text,
  `long_desc` longtext,
  `aditional_info` text,
  `usd_price` double(10,2) NOT NULL,
  `gbp_price` double(10,2) NOT NULL,
  `usd_offer_price` double(10,2) DEFAULT NULL,
  `gbp_offer_price` double(10,2) DEFAULT NULL,
  `tags` text,
  `meta_title` text,
  `meta_keywords` text,
  `meta_description` text,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `best_selling`, `is_popular`, `sku_code`, `product_name`, `product_slug`, `feature_image`, `product_stock`, `short_desc`, `long_desc`, `aditional_info`, `usd_price`, `gbp_price`, `usd_offer_price`, `gbp_offer_price`, `tags`, `meta_title`, `meta_keywords`, `meta_description`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(1, 0, 1, '386205', 'Shea Butter Creme', 'shea-butter-creme', 'Shea-Butter-Creme.jpg', NULL, '<p>A truly natural body butter made from a formulation of butter and oils we have carefully chosen ingredients such as Jojoba according to their benefits to deep moisturize, repair and renew. With daily use, Skin feels soft, smooth and more elastic a perfect daily antidote.</p>\r\n', '<p>Suitable to use in hydrating the skin in cases of eczema, dry skin, stretch marks, rough areas, soothe skin, reduce inflammation, environmentally damaged skin, cuticles, anti-aging, natural skin toning, antioxidants, tanning, and overall wellbeing.</p>\r\n\r\n<p>Scent: citrus scent with fresh grassy undertones</p>\r\n\r\n<p><strong>How to use:</strong><br />\r\n&nbsp;<br />\r\nDo apply sparingly extremely rich place on fingers then spread evenly over the skin</p>\r\n', '<p><strong>Weight :</strong> 0.175 kg</p>\r\n', 17.00, 12.00, 0.00, 0.00, 'Tanning,Ezcema,Skin-Toning,Sun-Damaged,Anti-Aging,Stretch-Marks-Scars,Curticles', 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-25 14:15:12', '2020-09-24 18:14:19', 1, 0),
(2, 0, 1, '386208', 'Shea Butter Creme fragrance free', 'shea-butter-creme-fragrance-free', 'Shea-Buter-Creme-fragrance-free.jpg', NULL, 'Whipped rich airy shea butter intense long-lasting body moisturizer only one daily application needed to keep your skin nourished and hydrated through the day.', '<p>A truly natural body butter made from a formulation of butter and oils we have carefully chosen ingredients such as Jojoba according to their benefits to deep moisturize, repair and renew. With daily use, Skin feels soft, smooth and more elastic a perfect daily antidote.</p>\r\n\r\n<p>suitable to use in hydrating the skin in cases of eczema, dry skin, stretch marks, rough areas, soothe skin, reduce inflammation, environmentally damaged skin, cuticles, anti-aging, natural skin toning, antioxidants, tanning, and overall wellbeing.</p>\r\n\r\n<p>Fragrance-free</p>\r\n\r\n<p>How to use: Do apply sparingly extremely rich place on fingers then spread evenly over the skin.</p>\r\n', '<p><strong>Weight :</strong> 0.175 kg</p>\r\n', 17.00, 12.00, 0.00, 0.00, 'Tanning,Ezcema,Sun-Damaged,Skin-Toning,Anti-Aging,Stretch-Marks-Scars,Curticles', 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-25 14:24:35', '2020-08-25 14:26:47', 1, 0),
(3, 0, 1, '386206', 'Shea Butter With Jojoba Oil', 'shea-butter-with-jojoba-oil', 'Shea_Butter_Jojoba_oil.jpg', NULL, 'Rich organic unrefined shea butter infused with jojoba oils amazing benefits includes rebalances the skins natural oils, rich in vitamin E', '<p>strengthens and regenerates skin by enhancing collagen production, rich in iodine helps fight bacteria Combine this together with the intense deep moisturizing, anti-aging, skin toning and other multiple amazing benefits of Shea Butter its sure to provide healthy long-lasting protection for your skin.</p>\r\n\r\n<p>suitable to use in hydrating the skin in cases of eczema, dry skin, stretch marks, soothe burns, rough areas, pigmentation, environmentally damaged skin, cuticles, anti-aging, natural skin toning, tanning, and overall wellbeing.</p>\r\n\r\n<p>Fragrance-Free</p>\r\n', '<p><strong>Weight :</strong> 0.175 kg</p>\r\n', 11.00, 8.00, 0.00, 0.00, 'Ezcema,Sun-Damaged,Anti-Aging,Stretch-Marks-Scars,Curticles', 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-25 14:31:47', '2020-08-25 14:31:47', 1, 0),
(4, 0, 1, '386403', 'Shea Butter With Lemongrass ', 'shea-butter-with-lemongrass', 'Shea_Butter_Lemongrass.jpg', NULL, 'Rich organic unrefined shea butter, combined with the known anti-inflammatory & antifungal qualities of lemongrass oil. Great citrus smell with fresh grassy undertones', '<p>Infused together with the intense deep moisturizing and amazing properties of Shea sure to provide long-lasting protection for your skin.</p>\r\n\r\n<p>suitable to use in hydrating the skin in cases of eczema, dry skin, stretch marks,<br />\r\nenvironmentally damaged skin, cuticles, anti-aging, natural skin toning, tanning, and overall wellbeing.</p>\r\n\r\n<p>Scent: citrus scent with fresh grassy undertones.</p>\r\n', '<p><strong>Weight :</strong> 0.1 kg</p>\r\n', 8.00, 6.00, 0.00, 0.00, 'Ezcema,Sun-Damaged,Anti-Aging,Stretch-Marks-Scars,Curticles', 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-25 14:39:48', '2020-08-25 14:39:48', 1, 0),
(5, 1, 0, '386207', 'Shea Hydrate', 'shea-hydrate', 'Shea_Hydrate.jpg', NULL, 'Shea Hydrate formulated with versatility in mind moisturizer suitable for most types of skin packed with many of the benefits of Shea.', '<p>A light yet firm moisturiser that leaves the skin looking: smoother and toned, while providing long lasting protection. We&rsquo;ve loaded a few extra ingredients in this one.Argon oil a natural skin booster and Vitamin E oil encourages skin health, healthier appearance and high in antioxidants that are known to fight free radicals.</p>\r\n\r\n<p>Suitable to use in hydrating the skin in cases of dry skin, stretch marks, anti-inflammatory agent, environmentally damaged skin, anti-aging, natural skin toning,and overall wellbeing and encourages healthier and softer skin.</p>\r\n', '<p><strong>Weight :</strong> 0.13 kg</p>\r\n', 21.00, 15.00, 0.00, 0.00, 'Tanning,Ezcema,Sun-Damaged,Skin-Toning,Anti-Aging,Stretch-Marks-Scars,Curticles', 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-25 14:43:17', '2020-08-25 14:43:17', 1, 0),
(6, 1, 0, '386400', 'Shea Hydrate  Fragrance Free', 'shea-hydrate-fragrance-free', 'Shea_Hydrate_Fragrance_Free.jpg', NULL, 'A light yet firm moisturizer that leaves the skin looking: smoother and toned, while providing long-lasting protection. We’ve loaded a few extra ingredients in this one.', '<p>A fragrance free moisturiser infused with Argon oil a natural booster and Vitamin E oil which encourages a healthier appearance and high in antioxidants that are known to fight free radicals.Suitable to use in hydrating the skin in cases of dry skin, stretch marks, anti-inflammatory agent, environmentally damaged skin, anti-aging, natural skin toning and overall well being while encouraging healthier and softer skin.</p>\r\n', '<p><strong>Weight :</strong> 0.13 kg</p>\r\n', 21.00, 15.00, 0.00, 0.00, 'Tanning,Ezcema,Sun-Damaged,Skin-Toning,Anti-Aging,Stretch-Marks-Scars,Curticles', 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-25 14:47:06', '2020-08-25 14:47:06', 1, 0),
(7, 1, 0, '386401', 'Shea Hydrate with Frankincense & Myrrh', 'shea-hydrate-with-frankincense-myrrh', 'Shea_Hydrate_Frankinsense_Myrrh.jpg', NULL, 'Shea Hydrate with Frankincense & Myrrh formulated with versatility in mind moisturizer suitable for most types of skin packed with many of the benefits of Shea.', '<p>A light yet firm moisturiser that leaves the skin looking: smoother and toned, while providing long lasting protection. We&rsquo;ve loaded a few extra ingredients in this one. Argon oil a natural skin booster and Vitamin E oil encourages skin health, healthier appearance and high in antioxidants that are<br />\r\nknown to fight free radicals.</p>\r\n\r\n<p>Suitable to use in hydrating the skin in cases of dry skin, stretch marks, anti-inflammatory agent,environmentally damaged skin, anti-aging, natural skin toning, and overall well being and encourages healthier and softer skin.</p>\r\n\r\n<p>Scent: A woody-oriental fragrance with citrus top notes mixed in with a warm base of frankincense,<br />\r\nmyrrh and amber.</p>\r\n', '<p><strong>Weight :</strong> 0.13 kg</p>\r\n', 0.00, 15.00, 0.00, 0.00, 'Tanning,Ezcema,Sun-Damaged,Skin-Toning,Anti-Aging,Stretch-Marks-Scars,Curticles', 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-25 14:51:26', '2020-08-25 14:51:26', 1, 0),
(8, 1, 0, '386402', 'Shea Hydrate With Lavender Wood', 'shea-hydrate-with-lavender-wood', 'Shea_Hydrate_Lavender_wood.jpg', NULL, 'Shea Hydrate with Lavender Wood formulated with versatility in mind moisturizer suitable for most types of skin packed with many of the benefits of Shea.', '<p>A light yet firm moisturiser that leaves the skin looking: smoother and toned, while providing long lasting protection. We&rsquo;ve loaded a few extra ingredients in this one.Argon oil a natural skin booster and Vitamin E oil encourages skin health, healthier appearance and high in antioxidants that are known to fight free radicals.</p>\r\n\r\n<p>Suitable to use in hydrating the skin in cases of dry skin, stretch marks, anti-inflammatory agent, environmentally damaged skin, anti-aging, natural skin toning,and overall well being while encourages healthier and softer skin.</p>\r\n\r\n<p>Scent: Gentle and soothing lavender with notes of gentle woods and a soft sweet floral smell.</p>\r\n', '<p><strong>Weight :</strong> 0.13 kg</p>\r\n', 0.00, 15.00, 0.00, 0.00, 'Tanning,Ezcema,Sun-Damaged,Skin-Toning,Anti-Aging,Stretch-Marks-Scars,Curticles', 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-25 14:55:21', '2020-08-25 14:55:21', 1, 0),
(9, 1, 0, '386212', 'Unrefined Organic Shea Butter', 'unrefined-organic-shea-butter', 'Unrefined_Shea_Butter_organic.jpg', NULL, 'Our Creamy rich organic unrefined shea butter has a real earthy natural scent and provides long lasting softness and elasticity to your skin.', '<p>Coupled with its amazing healing properties unrefined shea butter can be used as an intense moisturizer providing 24\\7 protection for your skin, while at the same time working to repair and renew.</p>\r\n\r\n<p>suitable to use in hydrating the skin in cases of eczema, dry skin, stretch marks, environmentally damaged skin, cuticles, anti-aging, natural skin toning, tanning, and overall wellbeing.</p>\r\n', '<p><strong>Weight :</strong> 0.1 kg</p>\r\n', 8.00, 6.00, 0.00, 0.00, 'Ezcema,Sun-Damaged,Anti-Aging,Stretch-Marks-Scars,Curticles', 'Meta Title', 'Meta Keywords', 'Meta Description', '2020-08-25 15:01:43', '2020-08-25 15:01:43', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `category`, `is_active`, `is_deleted`) VALUES
(9, 2, 1, 1, 0),
(10, 2, 3, 1, 0),
(11, 3, 1, 1, 0),
(12, 3, 2, 1, 0),
(13, 3, 3, 1, 0),
(14, 3, 4, 1, 0),
(15, 4, 1, 1, 0),
(16, 4, 2, 1, 0),
(17, 4, 3, 1, 0),
(18, 4, 4, 1, 0),
(19, 5, 1, 1, 0),
(20, 5, 2, 1, 0),
(21, 5, 4, 1, 0),
(22, 6, 1, 1, 0),
(23, 6, 2, 1, 0),
(24, 6, 4, 1, 0),
(25, 7, 1, 1, 0),
(26, 7, 2, 1, 0),
(27, 7, 4, 1, 0),
(28, 8, 1, 1, 0),
(29, 8, 2, 1, 0),
(30, 8, 3, 1, 0),
(31, 8, 4, 1, 0),
(32, 9, 1, 1, 0),
(33, 9, 3, 1, 0),
(34, 9, 4, 1, 0),
(38, 1, 1, 1, 0),
(39, 1, 3, 1, 0),
(40, 1, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recent_view`
--

CREATE TABLE `recent_view` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL COMMENT 'id from product table',
  `ip_address` varchar(256) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `page_url` text NOT NULL,
  `icon` text NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL COMMENT 'id from category table',
  `tag` text NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `category`, `tag`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(3, 6, 'Tag Three', '2020-09-10 18:35:02', '2020-09-10 18:35:02', 1, 0),
(4, 6, 'Tag Four', '2020-09-10 18:35:02', '2020-09-10 18:35:02', 1, 0),
(5, 8, 'Tag Five', '2020-09-10 18:35:02', '2020-09-10 18:35:02', 1, 0),
(6, 8, 'Tag Six', '2020-09-10 18:35:02', '2020-09-10 18:35:02', 1, 0),
(10, 5, 'Tag One', '2020-09-23 18:38:51', '2020-09-23 18:38:51', 1, 0),
(11, 5, 'Tag Two', '2020-09-23 18:38:51', '2020-09-23 18:38:51', 1, 0),
(12, 5, 'Tag Three', '2020-09-23 18:38:51', '2020-09-23 18:38:51', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1=customer, 2=writer',
  `otp` varchar(256) DEFAULT NULL,
  `is_use` int(11) NOT NULL DEFAULT '0' COMMENT '1=used',
  `is_validate` int(11) NOT NULL DEFAULT '0' COMMENT '1=validate',
  `name` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `mobile` varchar(256) NOT NULL,
  `image` text,
  `password` varchar(256) NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `otp`, `is_use`, `is_validate`, `name`, `username`, `email`, `mobile`, `image`, `password`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(1, 1, NULL, 0, 0, 'Shovan Nandi', 'Shovan', 'shovan@gmail.com', '8348338409', '1600949598.jpg', 'MTIzNDU2', '2020-08-24 13:33:19', '2020-08-24 13:33:19', 1, 0),
(2, 1, NULL, 0, 0, 'Subham Nandi', 'Subham', 'subham@gmail.com', '9876543210', '1600949408.jpg', 'MTIzNDU=', '2020-08-24 13:33:58', '2020-08-24 13:33:58', 1, 0),
(4, 1, NULL, 0, 0, 'Subham Nandi', 'Subham', 'subha@gmail.com', '1234567890', 'customer.jpg', 'MTIzNDU=', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(5, 2, NULL, 0, 0, 'Writer One', 'Writer One', 'writer_one@gmail.com', '9999999999', '', 'MTIzNDU=', '2020-09-10 15:50:24', '2020-09-10 15:54:20', 1, 0),
(6, 2, NULL, 0, 0, 'Writer Two', 'Writer Two', 'writer_two@gmail.com', '8888888888', '', 'MTIzNDU=', '2020-09-10 15:51:19', '2020-09-10 15:54:26', 1, 0),
(7, 2, NULL, 0, 0, 'Writer Three', 'Writer Three', 'writer_three@gmail.com', '7777777777', '', 'MTIzNDU=', '2020-09-10 15:52:00', '2020-09-10 15:52:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_type` varchar(255) NOT NULL,
  `name` text,
  `email` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) NOT NULL,
  `alt_contact_no` varchar(255) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `address` text,
  `post_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `city` text,
  `state` text,
  `landmark` text,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `address_type`, `name`, `email`, `contact_no`, `alt_contact_no`, `house_no`, `address`, `post_code`, `country`, `city`, `state`, `landmark`, `added_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(1, 1, 'Office', 'Shovan Nandi', 'shovan@gmail.com', '8348338409', '9876543210', '12345', 'Baguati\r\nNorth 24 Parganas', '700059', 'India', 'Kolkata', 'West Bengal', 'Near Salt lake', '2020-09-10 13:54:51', '2020-09-10 13:54:51', 1, 0),
(2, 1, 'Home', 'Shovan Nandi', 'shovan@gmail.com', '8348338409', '9876543210', '12345', 'Baguati\r\nNorth 24 Parganas', '700059', 'India', 'Kolkata', 'West Bengal', 'Near Salt lake', '2020-09-10 13:30:09', '2020-09-10 13:30:09', 1, 0),
(4, 5, 'Office', 'Writer One', 'writer_one@gmail.com', '9999999999', '9999999999', '12345', 'Baguati\r\nNorth 24 Parganas', '700059', 'India', 'Kolkata', 'West Bengal', 'Near Salt lake', '2020-09-10 16:21:28', '2020-09-10 16:21:28', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`contact_number`);

--
-- Indexes for table `banner_details`
--
ALTER TABLE `banner_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_page`
--
ALTER TABLE `banner_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_count`
--
ALTER TABLE `blog_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compose_mail`
--
ALTER TABLE `compose_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_logs`
--
ALTER TABLE `employee_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquery`
--
ALTER TABLE `enquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banner`
--
ALTER TABLE `home_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_content_one`
--
ALTER TABLE `home_content_one`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_content_three`
--
ALTER TABLE `home_content_three`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_content_two`
--
ALTER TABLE `home_content_two`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `know_your_skin`
--
ALTER TABLE `know_your_skin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `most_view`
--
ALTER TABLE `most_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent_view`
--
ALTER TABLE `recent_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_details`
--
ALTER TABLE `banner_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `banner_page`
--
ALTER TABLE `banner_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_count`
--
ALTER TABLE `blog_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `compose_mail`
--
ALTER TABLE `compose_mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_logs`
--
ALTER TABLE `employee_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquery`
--
ALTER TABLE `enquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `home_banner`
--
ALTER TABLE `home_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_content_one`
--
ALTER TABLE `home_content_one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_content_three`
--
ALTER TABLE `home_content_three`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `home_content_two`
--
ALTER TABLE `home_content_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `know_your_skin`
--
ALTER TABLE `know_your_skin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `most_view`
--
ALTER TABLE `most_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `recent_view`
--
ALTER TABLE `recent_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
