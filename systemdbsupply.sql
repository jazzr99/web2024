-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 03 Οκτ 2024 στις 16:38:21
-- Έκδοση διακομιστή: 10.4.28-MariaDB
-- Έκδοση PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `systemdbsupply`
--
CREATE DATABASE IF NOT EXISTS `systemdbsupply` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `systemdbsupply`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `anakoinoseis`
--

CREATE TABLE `anakoinoseis` (
  `id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `anakoinoseis`
--

INSERT INTO `anakoinoseis` (`id`, `title`, `description`) VALUES
(9, 'test', 'Water - Orange juice - Croissant - '),
(12, 'Χρειαζόμαστε νερό + ψωμί', 'Water - Bread - ');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `anakoinosi_items`
--

CREATE TABLE `anakoinosi_items` (
  `id_item` int(11) NOT NULL,
  `id_ananakoinosi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `anakoinosi_items`
--

INSERT INTO `anakoinosi_items` (`id_item`, `id_ananakoinosi`) VALUES
(16, 9),
(16, 12),
(17, 9),
(20, 12),
(26, 9);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(5, 'Food'),
(6, 'Beverages'),
(7, 'Clothing'),
(8, 'Hacker of class'),
(9, '2d hacker'),
(10, ''),
(11, 'Test'),
(13, '-----'),
(14, 'Flood'),
(15, 'new cat'),
(16, 'Medical Supplies'),
(19, 'Shoes'),
(21, 'Personal Hygiene '),
(22, 'Cleaning Supplies'),
(23, 'Tools'),
(24, 'Kitchen Supplies'),
(25, 'Baby Essentials'),
(26, 'Insect Repellents'),
(27, 'Electronic Devices'),
(28, 'Cold weather'),
(29, 'Animal Food'),
(30, 'Financial support'),
(33, 'Cleaning Supplies.'),
(34, 'Hot Weather'),
(35, 'First Aid '),
(39, 'Test_0'),
(40, 'test1'),
(41, 'pet supplies'),
(42, 'Μedicines'),
(43, 'Energy Drinks'),
(44, 'Disability and Assistance Items'),
(45, 'Communication items'),
(46, 'communications'),
(47, 'Humanitarian Shelters'),
(48, 'Water Purification'),
(49, 'Animal Care'),
(50, 'Earthquake Safety'),
(51, 'Sleep Essentilals'),
(52, 'Navigation Tools'),
(53, 'Clothing and cover'),
(54, 'Tools and Equipment'),
(56, 'Special items'),
(57, 'Household Items'),
(59, 'Books'),
(60, 'Fuel and Energy'),
(61, 'test category'),
(65, 'ood'),
(66, 'Animal Flood'),
(67, 'Solar-Powered Devices'),
(68, 'Mental Health Support'),
(69, 'Sanitary Products'),
(70, 'Car Supplies'),
(71, 'Thermal Clothing'),
(72, 'Ready-To-Eat Meals'),
(73, 'Toys'),
(74, 'Shelter Materials'),
(75, 'Personal Safety'),
(76, 'Pharmaceutical'),
(77, 'Pets'),
(78, 'Signaling'),
(79, 'Dried food'),
(80, 'Juice'),
(81, 'Currency'),
(82, 'Electrolytes'),
(83, 'Winter Clothes'),
(84, 'Reading'),
(85, 'Office Supplies'),
(86, 'Chocolate'),
(87, 'Chips'),
(88, 'Cake'),
(200, 'test category');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `details` text NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `items`
--

INSERT INTO `items` (`id`, `name`, `category`, `details`, `qty`) VALUES
(16, 'Water', 6, 'volume:1.5l,pack size:6,', 9),
(17, 'Orange juice', 6, 'volume:250ml,pack size:12,', 5),
(18, 'Sardines', 5, 'brand:Trata,weight:200g,', 0),
(19, 'Canned corn', 5, 'weight:500g,', 0),
(20, 'Bread', 5, 'weight:1kg,type:white,', 0),
(21, 'Chocolate', 5, 'weight:100g,type:milk chocolate,brand:ION,', 0),
(22, 'Men Sneakers', 7, 'size:44,', 0),
(23, 'Test Product', 9, 'weight:500g,pack size:12,expiry date:13/12/1978,', 0),
(24, 'Test Val', 14, 'Details:600ml,', 0),
(25, 'Spaghetti', 5, 'grams:500,', 0),
(26, 'Croissant', 5, 'calories:200,', 0),
(28, '', 10, ':,', 0),
(29, 'Biscuits', 5, ':,', 0),
(30, 'Bandages', 16, ':25 pcs,', 0),
(31, 'Disposable gloves', 16, ':100 pcs,', 0),
(32, 'Gauze', 16, ':,', 0),
(33, 'Antiseptic', 16, ':250ml,', 0),
(34, 'First Aid Kit', 16, ':,', 0),
(35, 'Painkillers', 16, 'volume:200mg,', 0),
(36, 'Blanket', 7, 'size:50&quot; x 60&quot;,', 0),
(37, 'Fakes', 5, ':,', 0),
(38, 'Menstrual Pads', 21, 'stock:500,size:3,:,', 0),
(39, 'Tampon', 21, 'stock:500,size:regular,', 0),
(40, 'Toilet Paper', 21, 'stock:300,ply:3,', 0),
(41, 'Baby wipes', 21, 'volume:500gr,stock :500,scent:aloe,', 0),
(42, 'Toothbrush', 21, 'stock:500,', 0),
(43, 'Toothpaste', 21, 'stock:250,', 0),
(44, 'Vitamin C', 16, 'stock:200,', 0),
(45, 'Multivitamines', 16, 'stock:200,', 0),
(46, 'Paracetamol', 16, 'stock:2000,dosage:500mg,', 0),
(47, 'Ibuprofen', 16, 'stock :10,dosage:200mg,', 0),
(48, '', 10, ':,', 0),
(49, '', 10, ':,:,:,', 0),
(50, '', 10, ':,', 0),
(51, 'Cleaning rag', 22, ':,', 0),
(52, 'Detergent', 22, ':,', 0),
(53, 'Disinfectant', 22, ':,', 0),
(54, 'Mop', 22, ':,', 0),
(55, 'Plastic bucket', 22, ':,', 0),
(56, 'Scrub brush', 22, ':,', 0),
(57, 'Dust mask', 22, ':,', 0),
(58, 'Broom', 22, ':,', 0),
(59, 'Hammer', 23, ':,', 0),
(60, 'Skillsaw', 23, ':,', 0),
(61, 'Prybar', 23, ':,', 0),
(62, 'Shovel', 23, ':,', 0),
(63, 'Flashlight', 23, ':,', 0),
(64, 'Duct tape', 23, ':,', 0),
(65, 'Underwear', 7, ':,', 0),
(66, 'Socks', 7, ':,', 0),
(67, 'Warm Jacket', 7, ':,', 0),
(68, 'Raincoat', 7, ':,', 0),
(69, 'Gloves', 7, ':,', 0),
(70, 'Pants', 7, ':,', 0),
(71, 'Boots', 7, ':,', 0),
(72, 'Dishes', 24, ':,', 0),
(73, 'Pots', 24, ':,', 0),
(74, 'Paring knives', 24, ':,', 0),
(75, 'Pan', 24, ':,', 0),
(76, 'Glass', 24, ':,', 0),
(77, '', 10, ':,:,:,', 0),
(78, '', 10, ':,', 0),
(79, '', 10, ':,', 0),
(80, '', 10, ':,', 0),
(81, '', 10, ':,', 0),
(82, '', 10, ':,:,:,ghw56:twhwhrwh,:,', 0),
(83, 't22', 9, 'wtwty:wytwty,', 0),
(84, 'water ', 6, ':,', 0),
(85, 'Coca Cola', 6, 'Volume:500ml,', 0),
(86, 'spray', 26, 'volume:75ml,', 0),
(87, 'Outdoor spiral', 26, 'duration:7 hours,', 0),
(88, 'Baby bottle', 25, 'volume:250ml,', 0),
(89, 'Pacifier', 25, 'material:silicone,', 0),
(90, 'Condensed milk', 5, 'weight:400gr,', 0),
(91, 'Cereal bar', 5, 'weight:23,5gr,', 0),
(92, 'Pocket Knife', 23, 'Number of different tools:3,Tool:Knife,Tool:Screwdriver,Tool:Spoon,', 0),
(93, 'Water Disinfection Tablets', 16, 'Basic Ingredients:Iodine,Suggested for:Everyone expept pregnant women,', 0),
(94, 'Radio', 27, 'Power:Batteries,Frequencies Range:3 kHz - 3000 GHz,', 0),
(95, 'Kitchen appliances', 14, ':(scrubbers, rubber gloves, kitchen detergent, laundry soap),', 0),
(96, 'Winter hat', 28, ':,', 0),
(97, 'Winter gloves', 28, ':,', 0),
(98, 'Scarf', 28, ':,', 0),
(99, 'Thermos', 28, ':,', 0),
(100, 'Tea', 6, 'volume:500ml,', 0),
(101, 'Dog Food ', 29, 'volume:500g,', 0),
(102, 'Cat Food', 29, 'volume:500g,', 0),
(103, 'Canned', 5, ':,', 0),
(104, 'Chlorine', 22, 'volume:500ml,', 0),
(105, 'Medical gloves', 22, 'volume:20pieces,', 0),
(106, 'T-Shirt', 7, 'size:XL,', 0),
(107, 'Cooling Fan', 34, ':,', 0),
(108, 'Cool Scarf', 34, ':,', 0),
(109, 'Whistle', 23, ':,', 0),
(110, 'Blankets', 28, ':,', 0),
(111, 'Sleeping Bag', 28, ':,', 0),
(112, 'Toothbrush', 21, ':,', 0),
(113, 'Toothpaste', 21, ':,', 0),
(114, 'Thermometer', 16, ':,', 0),
(115, 'Rice', 5, ':,', 0),
(116, 'Bread', 5, ':,', 0),
(117, 'Towels', 22, ':,', 0),
(118, 'Wet Wipes', 22, ':,', 0),
(119, 'Fire Extinguisher', 23, ':,', 0),
(120, 'Fruits', 5, ':,:,', 0),
(121, 'Duct Tape', 23, ':,', 0),
(122, '', 10, ':,', 0),
(123, 'Αθλητικά', 19, 'Νο 46:,', 0),
(124, 'Πασατέμπος', 5, ':,', 0),
(125, 'Bandages', 35, 'Adhesive:2 meters,', 0),
(126, 'Betadine', 35, 'Povidone iodine 10%:240 ml,', 0),
(127, 'cotton wool', 35, '100% Hydrofile:70gr,', 0),
(128, 'Crackers', 5, 'Quantity per package:10,Packages:2,', 0),
(129, 'Sanitary Pads', 21, 'piece:10 pieces,:,:,', 0),
(130, 'Sanitary wipes', 21, 'pank:10 packs,', 0),
(131, 'Electrolytes', 16, 'packet of pills:20 pills,', 0),
(132, 'Pain killers', 16, 'packet of pills:20 pills,', 0),
(133, 'Flashlight', 23, 'pieces:1,:,', 0),
(134, 'Juice', 6, 'volume:500ml,', 0),
(135, 'Toilet Paper', 21, 'rolls:1 roll,:,', 0),
(136, 'Sterilized Saline', 16, 'volume:100ml,', 0),
(137, 'Biscuits', 5, 'packet:1 packet,', 0),
(138, 'Antihistamines', 16, 'pills:10 pills,', 0),
(139, 'Instant Pancake Mix', 5, ':,', 0),
(140, 'Lacta', 5, 'weight:105g,', 0),
(141, 'Canned Tuna', 5, ':,', 0),
(142, 'Batteries', 23, '6 pack:,', 0),
(143, 'Dust Mask', 35, '1:,', 0),
(144, 'Can Opener', 23, '1:,', 0),
(145, '', 10, ':,', 0),
(146, 'Πατατάκια', 5, 'weight:45g,', 0),
(147, 'Σερβιέτες', 21, 'pcs:18,', 0),
(148, 'Dry Cranberries', 5, 'weight:100,', 0),
(149, 'Dry Apricots', 5, 'weight:100,', 0),
(150, 'Dry Figs', 5, 'weight:100,', 0),
(151, 'Παξιμάδια', 5, 'weight:200g,', 0),
(152, '', 10, ':,', 0),
(153, 'Test Item', 11, 'volume:200g,:,', 0),
(154, 'Painkillers', 35, 'Potency:High,', 0),
(155, 'Tampons', 16, ':,', 0),
(156, 'plaster set', 41, '1:,:,', 0),
(157, 'elastic bandages', 41, ':12,', 0),
(158, 'traumaplast', 41, ':20,:,', 0),
(159, 'thermal blanket', 41, ':2,', 0),
(160, 'burn gel', 41, 'ml:500,', 0),
(161, 'pet carrier', 41, ':2,', 0),
(162, 'pet dishes', 41, ':10,', 0),
(163, 'plastic bags', 41, ':20,', 0),
(164, 'toys', 41, ':5,', 0),
(165, 'burn pads', 41, ':5,', 0),
(166, 'cheese', 5, 'grams:1000,', 0),
(167, 'lettuce', 5, 'grams:500,', 0),
(168, 'eggs', 5, 'pair:10,', 0),
(169, 'steaks', 5, 'grams:1000,', 0),
(170, 'beef burgers', 5, 'grams:500,', 0),
(171, 'tomatoes', 5, 'grams:1000,', 0),
(172, 'onions', 5, 'grams:500,', 0),
(173, 'flour', 5, 'grams:1000,', 0),
(174, 'pastel', 5, ':7,', 0),
(175, 'nuts', 5, 'grams:500,', 0),
(176, 'dramamines', 42, ':5,', 0),
(177, 'nurofen', 42, ':10,', 0),
(178, 'imodium', 42, ':5,', 0),
(179, 'emetostop', 42, ':5,', 0),
(180, 'xanax', 42, ':5,', 0),
(181, 'saflutan', 42, ':2,', 0),
(182, 'sadolin', 42, ':3,', 0),
(183, 'depon', 42, ':20,', 0),
(184, 'panadol', 42, ':6,', 0),
(185, 'ponstan ', 42, ':10,', 0),
(186, 'algofren', 42, '10:600ml,:,', 0),
(187, 'effervescent depon', 42, '67:1000mg,', 0),
(188, 'cold coffee', 6, '10:330ml,', 0),
(189, 'Hell', 43, '22:330,', 0),
(190, 'Monster', 43, '31:500ml,', 0),
(191, 'Redbull', 43, '40:330ml,', 0),
(192, 'Powerade', 43, '23:500ml,', 0),
(193, 'PRIME', 43, '15:500ml,', 0),
(194, 'Lighter', 23, '16:Mini,', 0),
(195, 'isothermally shirts', 28, '5:Medium,6:Large,10:Small,2:XL,', 0),
(196, '', 10, ':,', 0),
(197, 'Depon', 42, '10:500mg,:,', 0),
(198, 'Shorts', 34, '20:,:,', 0),
(199, 'Chicken', 5, '5:1.5kg,', 0),
(200, 'testr', 23, '', 0),
(201, 'toys', 41, '30:,', 0),
(202, 'sanitary napkins', 21, '30:500g,', 0),
(203, 'COVID-19 Tests', 16, '20:,', 0),
(204, 'Club Soda', 6, 'volume:500ml,', 0),
(205, 'Wheelchairs', 44, 'quantity:100,', 0),
(206, 'mobile phones', 45, 'iphone:200,', 0),
(207, 'spoon', 24, ':,', 0),
(208, 'fork', 24, ':,', 0),
(209, 'MOTOTRBO R7', 45, 'band:UHF/VHF,Wi-Fi:2,4/5,0 GHz,Bluetooth:5.2,Οθόνη:2,4” 320 x 240 px. QVGA,διάρκεια ζωής της μπαταρίας:28 ώρες,', 0),
(210, 'RM LA 250 (VHF Linear Ενισχυτής 140-150MHz)', 45, 'Frequency:140-150Mhz,Power Supply:13VDC /- 1V 40A,Output RF Power (Nominal):30 – 210W ; 230W max AM/FM/CW,Modulation Types:SSB,CW,AM, FM, data etc (All narrowband modes),', 0),
(211, 'Humanitarian General Purpose Tent System (HGPTS)', 47, 'PART NUMBER:C14Y016X016-T,CONTRACTOR NAME::CELINA Tent, Inc,COLOR:Tan,SET-UP TIME/NUMBER OF PERSONS:4 People/30 Minutes,', 0),
(212, 'CELINA Dynamic Small Shelter ', 47, 'dimensions: 20’x32.5’,TYPE:Frame Structure, Expandable, Air-Transportable,WEIGHT:1,200 lbs,', 0),
(213, 'Multi-purpose Area Shelter System, Type-I', 47, 'TYPE:Frame Structure, Expandable, Air- Transportable,DIMENSIONS:E I-40’x80’,WEIGHT:24,000 lbs,', 0),
(214, 'Trousers', 7, ':,', 0),
(215, 'Shoes', 7, ':,', 0),
(216, 'Hoodie', 7, ':,', 0),
(217, '', 10, ':,', 0),
(218, 'dog food', 49, 'weight:1k,', 0),
(219, 'cat food', 49, 'weight:1k,', 0),
(220, 'macaroni', 5, ':,', 0),
(221, 'rice', 5, ':,', 0),
(222, 'scarf', 7, ':,', 0),
(223, 'gloves', 7, ':,', 0),
(224, 'underwear', 7, ':,', 0),
(225, 'Silver blanket', 50, ':,', 0),
(226, 'Helmet', 50, ':,', 0),
(227, 'Disposable toilet', 50, ':,', 0),
(228, 'Self-generated flashlight', 50, ':,', 0),
(229, 'Mattresses ', 51, 'size:1.90X60,', 0),
(230, 'flashlight', 51, 'light:blue,', 0),
(231, 'matches', 51, 'pack:60,', 0),
(232, 'Heater', 51, 'Volts:208,', 0),
(233, 'Earplugs', 51, 'material:plastic,', 0),
(234, 'Compass', 52, 'Type:Digital,', 0),
(235, 'Map', 52, 'Material:Paper,', 0),
(236, 'GPS', 52, 'Type:Waterproof,', 0),
(237, 'First Aid', 16, '1:1,:,', 0),
(238, 'Bandage', 16, ':5,', 0),
(239, 'Mask', 16, ':10,', 0),
(240, 'Medicines', 16, ':,', 0),
(241, 'Water', 5, '6:1500ml,', 0),
(242, 'Canned Goods', 5, '2:80g,', 0),
(243, 'Snacks', 5, '3:100g,', 0),
(244, 'Cereals', 5, '1:800g,', 0),
(245, 'Blankets', 53, '1:,', 0),
(246, 'Shirt', 53, ':,', 0),
(247, 'Pants', 53, ':,', 0),
(248, 'Shoes', 53, ':,', 0),
(249, 'Socks', 53, ':,', 0),
(250, 'Caps', 53, ':,', 0),
(251, 'Gloves', 53, ':,', 0),
(252, 'Flashlight', 54, ':,', 0),
(253, 'Batteries', 54, 'AAA:5,', 0),
(254, 'Repair Tools', 54, ':,', 0),
(255, 'Soap and Shampoo', 21, '1:200ml,', 0),
(256, 'Toothpastes and Toothbrushes', 21, ':,', 0),
(257, 'Towels', 21, ':,', 0),
(258, 'Diapers', 56, ':,', 0),
(259, 'Animal food', 56, ':,', 0),
(260, 'Pots', 57, ':,', 0),
(261, 'Plates', 57, ':,', 0),
(262, 'Cups', 57, ':,', 0),
(263, 'Cutlery ', 57, ':,', 0),
(264, 'Cleaning Supplies', 57, ':,', 0),
(265, 'Kitchen Appliances', 57, ':,', 0),
(266, 'Home Repair Tools', 57, ':,', 0),
(267, '', 10, ':,', 0),
(268, 'Lord of the Rings', 59, 'pages:230,', 0),
(269, 'Dog Food', 29, ':1kg,', 0),
(270, 'DEPON', 16, ':,', 0),
(271, 'Painkillers', 16, ':,', 0),
(272, 'Gasoline', 60, 'galons:20,', 0),
(273, 'Power Banks', 60, 'quantity:5,', 0),
(274, '', 9, ':,', 0),
(275, 'test item', 29, 'test item :1kg,', 0),
(276, 'test item2', 61, 'volume:500ml,:,', 0),
(277, 'T4 Levothyroxine', 42, 'pills:60 pills,', 0),
(278, '', 10, ':,:,', 0),
(279, 'Solar Charger', 67, ':,:,', 0),
(280, 'Solar-Powered Radio', 67, ':,', 0),
(281, 'Solar Torch', 67, ':,', 0),
(282, 'Stress Ball', 68, ':,', 0),
(283, 'Guided Meditation Audio', 68, ':,', 0),
(284, '', 10, ':,', 0),
(285, '', 10, ':,', 0),
(286, 'Frezyderm Baby Bath ', 69, 'volume:700ml,', 0),
(287, 'Love me again ', 59, 'pages:654,', 0),
(288, 'Apotel', 16, 'mg:100,', 0),
(289, 'Xanax', 16, 'mg:5mg,', 0),
(290, 'Medrol', 16, 'mg:16,', 0),
(291, 'Nike shoes', 19, 'size:42,', 0),
(292, 'Petrol', 70, 'Volume:2L,', 0),
(293, 'Tires', 70, ':,', 0),
(294, 'Car Oil', 70, 'Volume:1L,', 0),
(295, 'Brake Fluid', 70, 'Volume:1L,', 0),
(296, 'Car Battery', 70, ':,', 0),
(297, 'Windshield Wipers', 70, ':,', 0),
(298, 'testSept2024', 11, 'volume:500ml,', 0),
(299, ' Chicken and Rice Meal', 72, ':,', 0),
(300, 'Beef Stew', 72, 'Shelf Life:3 Years,', 0),
(301, 'Alfredo Pasta', 72, ' Spaghetti Bolognese:1 year,', 0),
(302, 'Thermal Gloves', 71, 'Material: Insulated Fiber,Size : S to L,', 0),
(303, 'Fleece-Lined Jacket', 71, 'Material: Fleece and Nylon,Size Range:M to XXL,', 0),
(304, 'Thermal Leggings', 71, 'Material:Polyester Blend,Size Range:S to XXL,', 0),
(305, 'The Great Gatsby', 59, ':,', 0),
(306, 'Cold Weather Thermal Jacket', 71, 'Material:Insulated Down,Size Range:L to XXL,', 0),
(307, 'Transformers', 73, 'Weight:1kg,Size:8x4x14(cm),', 0),
(308, 'Gormiti set', 73, 'Pack :8,Figure weight:100gr(each),Figure size :5x3x6(each),', 0),
(309, 'Emergency Blankets', 74, ':,', 0),
(310, 'Tent Repair Kits', 74, ':,', 0),
(311, 'Portable Lighting', 74, ':,', 0),
(312, 'Shelter Tarps', 74, ':,', 0),
(313, 'Protective Masks', 75, ':,', 0),
(314, 'Reflective Vests', 75, ':,', 0),
(315, 'Emergency Whistles', 75, ':,', 0),
(316, 'Emergency Flares', 75, ':,', 0),
(317, 'Panadol', 76, 'Headache Medicine:2 tablets,', 0),
(318, 'Ibuprofen', 76, 'Pain Relief:3 tablets,', 0),
(319, 'Iodine Solution', 76, 'Disinfectant:200ml,', 0),
(320, 'Pet Food (Dry)', 77, 'volume:2kg,', 0),
(321, 'Pet Food (Wet)', 77, 'volume:500g,', 0),
(322, 'Pet Bed', 77, 'size:medium,', 0),
(323, 'Pet Water Bottle', 77, 'volume:500ml,', 0),
(324, 'Pet Leash', 77, 'length:1.2m,', 0),
(325, 'Pet Collar', 77, 'material:nylon,', 0),
(326, 'Pet Waste Bag', 77, 'quantity:100,', 0),
(327, 'Pet First Aid Kit', 77, 'type:compact,', 0),
(328, 'Pet Shampoo', 77, 'volume:225ml,', 0),
(329, 'Pet Carrier', 77, 'size:medium,', 0),
(330, 'Hand Sanitizer', 69, 'volume:500ml,', 0),
(331, 'Sanitary Wipes', 69, 'quantity:100,', 0),
(332, 'Trash Bags', 69, 'quantity:50,', 0),
(333, 'Disinfectant Spray', 69, 'volume:500ml,', 0),
(334, 'Toilet Cleaning Brush', 69, 'material:nylon,', 0),
(335, 'Surface Cleaner', 69, 'volume:1L,', 0),
(336, 'Air Freshener', 69, 'volume:300ml,', 0),
(337, 'Bleach', 69, 'volume:1L,', 0),
(338, 'Scrub Pads', 69, 'quantity:10,', 0),
(339, 'Cleaning Gloves', 69, 'size:medium,', 0),
(340, 'Emergency Whistle', 78, 'type:high-decibel,', 0),
(341, 'Signal Mirror', 78, 'type:compact,', 0),
(342, 'Flare Kit', 78, 'contents:6 flares,', 0),
(343, 'Hand-Crank Radio', 78, 'type:am/fm,', 0),
(344, 'Walkie-Talkies', 78, 'range:5km,', 0),
(345, 'Glow Sticks', 78, 'quantity:10,', 0),
(346, 'Emergency Beacon', 78, 'type:LED,', 0),
(347, 'Reflective Tapes', 78, 'length:10m,', 0),
(348, 'SOS Signal Card', 78, 'type:waterproof,', 0),
(349, 'Portable Changer', 78, 'type:solar-powered,', 0),
(350, 'Oil', 70, 'bottle:1litre,', 0),
(351, 'Paraflu', 70, 'bottle:1litre,', 0),
(352, 'acrivastine', 42, 'packet:10 temaxia,', 0),
(353, 'Bisacodyl', 42, 'paketo:10 temaxia,', 0),
(354, 'Cefalexin', 42, 'paketo:10 temaxia,', 0),
(355, 'Digoxin', 42, 'paketo:12,', 0),
(356, 'Fentanyl', 42, 'paketo:12,', 0),
(357, 'Circular Saw', 54, 'weight:2kg,', 0),
(358, 'Bolts', 54, 'paket:50,', 0),
(359, 'screws', 54, 'packet:50,', 0),
(360, 'electric drill', 23, 'electric:20V,', 0),
(361, 'Canned tuna', 79, 'grams:200g,', 0),
(362, 'Nuts Mix', 79, 'weight:150g,', 0),
(363, 'Blanket', 53, 'piece:1,', 0),
(364, 'Sleeping bag', 53, 'piece:1,', 0),
(365, 'Wooden spoon', 24, 'piece:1,', 0),
(366, 'Pot', 24, 'piece:1,', 0),
(367, 'Flashlight', 54, 'piece:1,', 0),
(368, 'Solar-powered lamp', 67, 'piece:1,', 0),
(369, 'Tactical knife', 54, 'piece:1,', 0),
(370, 'Pepper spray', 54, 'piece:1,', 0),
(371, 'Orange Juice', 80, 'Carton:500,', 0),
(372, '7ftuits Juice', 80, 'Carton:500,', 0),
(373, 'Cash', 81, 'Amount:small,', 0),
(374, 'Lucozade', 82, 'volume:500ml,', 0),
(375, 'Powerade', 82, 'volume:300ml,', 0),
(376, 'Winter Gloves', 83, 'size:one size,', 0),
(377, 'Scarf', 83, 'size:one size,', 0),
(378, 'Isothermal Jacket', 83, 'size:M,', 0),
(379, 'Sparkling water', 6, 'volume:500ml,', 0),
(380, 'Soda Water', 6, 'volume:500ml,', 0),
(381, 'Toothpicks', 24, 'package:100pcs,', 0),
(382, 'Sprite', 6, 'volume:50ml,', 0),
(383, 'Fanta', 6, 'volume:330ml,', 0),
(384, 'Umbrella', 53, ':,', 0),
(385, 'Magazine', 84, ':,', 0),
(386, 'Newspaper', 84, ':,', 0),
(387, 'Pens', 85, 'package:3pcs,', 0),
(388, 'Paper', 85, 'package:1000pcs,', 0),
(389, 'Pencils', 85, 'package:10pcs,', 0),
(390, 'Erasers', 85, 'package:3pcs,', 0),
(391, 'White with almonds', 86, ':500gr,', 0),
(392, 'Dark with berries', 86, ':500gr,', 0),
(393, 'Milk chocolate', 86, ':250gr,', 0),
(394, 'Salt chips', 87, ':500gr,', 0),
(395, 'Oregano chips', 87, ':250gr,', 0),
(396, 'Latte cake', 88, ':,', 0),
(397, 'Ordinary cake', 88, ':,', 0),
(398, 'Barbeque chips', 87, ':500gr,', 0),
(399, 'Ferrero chocolate', 86, ':,', 0),
(400, 'Ferrero cake', 88, ':,', 0),
(401, '', 10, ':,', 0),
(402, 'item name ', 59, 'book:10,', 0),
(403, 'testtt', 53, 'gloves:14,', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `id_anak` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_support` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_anathesi` datetime NOT NULL,
  `date_complete` datetime NOT NULL,
  `qty_sup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `requests`
--

INSERT INTO `requests` (`id`, `item`, `qty`, `type`, `id_anak`, `id_user`, `id_support`, `status`, `date_create`, `date_anathesi`, `date_complete`, `qty_sup`) VALUES
(6, 16, 43, 'Προσφορά', 9, 14, 0, 'Αναμονή', '2024-09-27 19:59:00', '2024-10-03 11:00:15', '0000-00-00 00:00:00', 0),
(7, 17, 5, 'Προσφορά', 9, 14, 9, 'Ολοκλήρωση', '2024-09-27 20:00:31', '2024-10-03 14:41:48', '0000-00-00 00:00:00', 0),
(10, 16, 3, 'Προσφορά', 12, 15, 16, 'Ανάθεση', '2024-09-28 18:44:37', '2024-09-28 20:27:59', '0000-00-00 00:00:00', 0),
(12, 16, 3, 'Αίτημα', 0, 15, 9, 'Ολοκλήρωση', '2024-09-28 18:58:10', '2024-10-03 14:30:39', '0000-00-00 00:00:00', 0),
(13, 25, 2, 'Αίτημα', 0, 1, 16, 'Ανάθεση', '2024-09-28 19:29:47', '2024-09-28 20:21:42', '0000-00-00 00:00:00', 0),
(14, 20, 3, 'Προσφορά', 12, 2, 0, 'Αναμονή', '2024-09-28 19:30:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(15, 20, 2, 'Αίτημα', 0, 4, 16, 'Ανάθεση', '2024-09-28 19:30:52', '2024-09-28 20:50:33', '0000-00-00 00:00:00', 0),
(16, 16, 0, 'Προσφορά', 9, 1, 0, 'Αναμονή', '2024-10-02 15:50:28', '2024-10-03 14:39:38', '0000-00-00 00:00:00', 0),
(17, 16, 2, 'Προσφορά', 9, 4, 9, 'Ολοκλήρωση', '2024-10-03 12:46:22', '2024-10-03 14:39:50', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `lat` float(15,8) NOT NULL,
  `lot` float(15,8) NOT NULL,
  `type` varchar(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `lat`, `lot`, `type`, `fullname`, `phone`, `email`) VALUES
(1, 'user1', '1234', 38.23839569, 21.75344467, 'user', 'user111', '3425235', 'p@ppp.gr'),
(2, 'user2', '1234', 38.23834229, 21.80305481, 'user', 'user2', '444444', 'user2@user.gr'),
(3, 'admin', 'admin', 38.23487473, 21.75104141, 'admin', '', '', ''),
(4, 'user10', '1234', 38.25510025, 21.76185608, 'user', 'user10 user10', '7777', 'u10@gmail.com'),
(6, 'dst1', '1234', 38.26103592, 21.75395966, 'support', '', '', ''),
(9, 'dias10', '1234', 38.23521805, 21.74846649, 'support', '', '', ''),
(10, 'testuser', '123456789', 38.25447083, 21.75816536, 'user', 'test user', '43321234', 'testuser@gmail.com'),
(14, 'user22', '1234', 38.25644684, 21.75619125, 'user', 'user22 test', '34435635', 'user22@gmail.com'),
(15, 'user50', '1234', 38.23013687, 21.74589157, 'user', 'user 50 test', '3332221111', 'user50@gmail.com'),
(16, 'support1', '1234', 38.23507690, 21.74752235, 'support', '', '', '');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `anakoinoseis`
--
ALTER TABLE `anakoinoseis`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `anakoinosi_items`
--
ALTER TABLE `anakoinosi_items`
  ADD PRIMARY KEY (`id_item`,`id_ananakoinosi`),
  ADD KEY `id_ananakoinosi` (`id_ananakoinosi`);

--
-- Ευρετήρια για πίνακα `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Ευρετήρια για πίνακα `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `anakoinoseis`
--
ALTER TABLE `anakoinoseis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT για πίνακα `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT για πίνακα `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `anakoinosi_items`
--
ALTER TABLE `anakoinosi_items`
  ADD CONSTRAINT `anakoinosi_items_ibfk_1` FOREIGN KEY (`id_ananakoinosi`) REFERENCES `anakoinoseis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
