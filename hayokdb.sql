-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 11:55 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hayokdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` varchar(255) NOT NULL,
  `outgoing_msg_id` varchar(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, '2021565432', '5823328', 'lkdidod'),
(2, '2021565432', '5823328', 'how are you doing'),
(3, '2021565432', '5823328', 'ksks'),
(4, '2021565432', '5823328', 'ldk,d'),
(5, '2021565432', '5823328', 'kzkskds'),
(6, '2021565432', '5823328', 'ldkdkd'),
(7, '2021565432', '5823328', 'lclc'),
(8, '2021565432', '5823328', 'kckck'),
(9, '2021565432', '5823328', 'lclclc'),
(10, '2021565432', '5823328', 'lclc'),
(11, '2021565432', '5823328', ',clc'),
(12, '2021565432', '5823328', 'osos'),
(13, '2021565432', '5823328', '.s;s;'),
(14, '2021565432', '5823328', 'dldl\''),
(15, '2021565432', '5823328', '.x;x;'),
(16, '2021565432', '5823328', ';ddp'),
(17, '2021565432', '3304329', 'hehe'),
(18, '2021565432', '5823328', 'hello'),
(19, '2021565432', '5823328', 'hhe'),
(20, '2021565432', '5823328', 'kwkw'),
(21, '2021565432', '5823328', 'jwjw'),
(22, '2021565432', '5823328', 'nsjsjs'),
(23, '2021565432', '5823328', 'rhrhr'),
(24, '2021565432', '5823328', 'mkkkkk'),
(25, '2021565432', '5823328', 'hello'),
(26, '2021565432', '3304329', 'hello'),
(27, '2021565432', '3304329', 'me'),
(28, '2021565432', '3304329', 'how are you doing'),
(29, '5064537265', '5823328', 'Hello'),
(30, '7832497', '805423476', 'hello'),
(31, '7832497', '805423476', 'hello'),
(32, '7832497', '805423476', 'heeeey'),
(33, '7832497', '805423476', 'hi'),
(34, '7832497', '805423476', 'go'),
(35, '7832497', '805423476', 'myhome'),
(36, '7832497', '805423476', 'ado'),
(37, '7832497', '805423476', 'bbabababa'),
(38, '7832497', '805423476', 'yayayayayay'),
(39, '7832497', '805423476', 'azazazaaz'),
(40, '7832497', '805423476', 'hi'),
(41, '805423476', '7832497', 'hello'),
(42, '7832497', '805423476', 'hi'),
(43, '805423476', '7832497', 'watsup'),
(44, '7832497', '805423476', 'am good'),
(45, '805423476', '7832497', 'ok'),
(46, '805423476', '7832497', 'all set ?'),
(47, '4786190', '805423476', 'go');

-- --------------------------------------------------------

--
-- Table structure for table `encountertb`
--

CREATE TABLE `encountertb` (
  `encid` int(11) NOT NULL,
  `encpatid` varchar(15) NOT NULL,
  `encdate` varchar(20) NOT NULL,
  `enctime` varchar(20) NOT NULL,
  `encvisit` varchar(20) NOT NULL,
  `encweight` double NOT NULL,
  `encheight` double NOT NULL,
  `encbmi` double NOT NULL,
  `encbp` double NOT NULL,
  `enctemp` double NOT NULL,
  `encrr` double NOT NULL,
  `enccomplaint` text NOT NULL,
  `encdiagnosis` varchar(20) NOT NULL,
  `enctreatment` text NOT NULL,
  `enchwid` int(11) NOT NULL,
  `encstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `encountertb`
--

INSERT INTO `encountertb` (`encid`, `encpatid`, `encdate`, `enctime`, `encvisit`, `encweight`, `encheight`, `encbmi`, `encbp`, `enctemp`, `encrr`, `enccomplaint`, `encdiagnosis`, `enctreatment`, `enchwid`, `encstatus`) VALUES
(1054394, '04054554321', '2021-07-16', '04:20', 'First', 432, 37, 3155.59, 45.45, 23.2, 47.1, 'pain', 'Malaria', 'medication', 5823328, 0),
(1920083, '02021565432', '2021-07-10', '14:13', 'First', 421, 35, 3437, 23, 24, 12, 'pain', 'Hypertension', 'test', 5823328, 0),
(2402418, '03054376543', '2021-07-09', '19:18', 'First', 282, 18.9, 7894.52, 23.65, 49.43, 12.56, 'joint paint', 'Malaria', 'CHECKUP', 5823328, 0),
(3239122, '02021565432', '2021-07-17', '14:30', 'Repeat', 421, 35, 3436.73, 34.12, 32.54, 33.6, 'ok', 'Diabetes', 'ok', 5823328, 0),
(9600623, '03034567654', '2021-07-02', '09:42', 'First', 120, 22, 2479, 24, 12, 11, 'pain', 'Pneumonia', 'checkup', 6442634, 0);

-- --------------------------------------------------------

--
-- Table structure for table `enctranmsfer`
--

CREATE TABLE `enctranmsfer` (
  `id` int(11) NOT NULL,
  `transferencounter` varchar(15) NOT NULL,
  `transferfrom` varchar(15) NOT NULL,
  `transferto` varchar(15) NOT NULL,
  `transferdate` datetime NOT NULL,
  `encstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enctranmsfer`
--

INSERT INTO `enctranmsfer` (`id`, `transferencounter`, `transferfrom`, `transferto`, `transferdate`, `encstatus`) VALUES
(1, '  1920083', '5823328', '7832497', '2021-07-22 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `healthworkertb`
--

CREATE TABLE `healthworkertb` (
  `id` int(11) NOT NULL,
  `hw_id` varchar(15) NOT NULL,
  `hw_email` varchar(50) NOT NULL,
  `hw_password` text NOT NULL,
  `hw_name` varchar(50) NOT NULL,
  `hw_sname` varchar(50) NOT NULL,
  `hw_gender` varchar(10) NOT NULL,
  `hw_age` int(11) NOT NULL,
  `hw_cadre` varchar(50) NOT NULL,
  `hw_dept` varchar(50) NOT NULL,
  `date_reg` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `healthworkertb`
--

INSERT INTO `healthworkertb` (`id`, `hw_id`, `hw_email`, `hw_password`, `hw_name`, `hw_sname`, `hw_gender`, `hw_age`, `hw_cadre`, `hw_dept`, `date_reg`, `status`) VALUES
(8, '3713946', 'sarahpam@hayok.com', '$2y$10$jO/iHIfytjPJI0E4HRZVD.BCam1NZbsEb5h6dopio3RuF0IuvjTrO', 'Sarah', 'Pam', 'F', 45, 'doctor', 'Medicine', '2021-07-20', 0),
(10, '7832497', 'waleoni@hayok.com', '$2y$10$yaVp8NuHyLzvDa.Rl9YqTukmX2SzMbFyqIDvoeBRBhD9atQuBb.2y', 'Wale', 'Oni', 'M', 37, 'doctor', 'Medicine', '2021-07-20', 0),
(11, '3569411', 'rachealinmo@hayok.com', '$2y$10$8xkY4KCyHgWgzyuFEQswgecR2W1YF9iDqolGlqdN/ZVXrFBigeGVi', 'Racheal', 'Inmo', 'F', 29, 'doctor', 'Medicine', '2021-07-20', 0),
(12, '5823328', 'oluyemiamujo@gmail.com', '$2y$10$vj3yVM06IDJHoV65KTT/q.E47M.rVozFvg7aTp2VZOm0.xum5sopu', 'Yemi', 'Amujo', 'M', 37, 'doctor', 'Medicine', '2021-07-21', 0),
(13, '3304329', 'idrisabu@hayok.com', '$2y$10$N6PYA0amQ1WQNVbnc3MtI./sgYJ5baWLwcc.JMbcnsHuz9PMj6Bi6', 'Idris', 'Abu', 'M', 34, 'doctor', 'Medicine', '2021-07-21', 0),
(14, '4786190', 'abdulmissy@yahok.com', '$2y$10$Qax0s0fy5EH63zjPaSzxLe33iUUHjjoqyHJtEWiIzj79rih364G2i', 'Abdul', 'Missy', 'F', 36, 'nurse', 'Medicine', '2021-07-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_phone` varchar(15) NOT NULL,
  `p_password` text NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_surname` varchar(50) NOT NULL,
  `p_age` int(11) NOT NULL,
  `p_gender` varchar(10) NOT NULL,
  `p_height` double NOT NULL,
  `p_weight` double NOT NULL,
  `p_bmi` double NOT NULL,
  `p_ward` varchar(50) NOT NULL,
  `p_lga` varchar(50) NOT NULL,
  `p_pix` varchar(200) NOT NULL,
  `p_date_reg` datetime NOT NULL,
  `registered_by` varchar(15) NOT NULL,
  `p_set` int(11) NOT NULL,
  `p_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_phone`, `p_password`, `p_name`, `p_surname`, `p_age`, `p_gender`, `p_height`, `p_weight`, `p_bmi`, `p_ward`, `p_lga`, `p_pix`, `p_date_reg`, `registered_by`, `p_set`, `p_status`) VALUES
('01023456541', '$2y$10$vi7lQ7JX45tPr8kemrdoRugxdUSFHLRdbbC4edDv4kZClZSJAyBb6', 'Aminat', 'Salako', 34, 'F', 60, 70, 194.44, '07', 'Ado-Ekiti', '329378dna.png', '2021-07-22 14:09:53', '5823328', 1, 0),
('01234567890', '$2y$10$RUAXN1yoLlVC2SbDzURl9e1mNuOLXoJdE9sftk2sTpxic8B3xSys2', 'Nanle', 'Luke', 55, 'M', 67, 345, 768.55, '10', 'Brass', '933412img489.jpg', '2021-07-23 11:30:32', '5823328', 1, 0),
('02021565432', '$2y$10$mJ4cLTrhleOw7gufHhbadO6uxeHGHYqDBcq0AA7aVkjer2eWe4V1K', 'Aminat', 'Khadija', 37, 'F', 35, 421, 3436.73, '06', 'Municipal', '493423atomic.png', '2021-07-21 03:09:04', '5823328', 1, 0),
('02065346761', '$2y$10$63qIXcZJ7AJ9CRjtLFThOem.CBnpj19EMS99U58J24.G33RiQ6o/q', 'Omolara', 'Badmuis', 43, 'F', 63, 138, 347.69, '05', 'Ador', '659563img545.jpg', '2021-07-23 09:45:22', '5823328', 1, 0),
('02476542345', '$2y$10$S.uA1AS6WABKZ2hx1hU7ResKB3S12v2vjv43e50uLTo4wSZwNaQru', 'Khadijat', 'Ismail', 36, 'F', 52, 250, 924.56, '02', 'Abadan', '98259img606.jpg', '2021-07-23 11:13:54', '5823328', 1, 0),
('03054376543', '$2y$10$GxfX4EufG1BmklGYWS9RXuT10DzBBYWgQQpAcJzOOitf0OVxt4e4e', 'Rabiu', 'Suleiman', 41, 'M', 18.9, 282, 7894.52, '04', 'Brnin Gwari', '295814cardiogram.png', '2021-07-21 03:08:08', '5823328', 1, 0),
('03098765432', '$2y$10$PFU4dmW4pkuopqzmPqvAP.QnbZW579GMsOLRaj3cmtTbW63wbiXni', 'Faisal ', 'Nasru', 35, 'M', 48, 333, 1445.31, '08', 'Kwali', '942670img490.jpg', '2021-07-23 11:19:21', '5823328', 1, 0),
('04054554321', '$2y$10$a9lBsmuFg0fDvtAt7vqq/uK5MwPNgmkbsS9l.QkpdvJqIBikhuau6', 'Janet', 'Smart', 64, 'F', 37, 432, 3155.59, '04', 'Aguata', '665469hospital.png', '2021-07-21 03:10:05', '5823328', 1, 0),
('04073683763', '$2y$10$0Xp6R..pbIQNd5ZvyBRTze0wOn6fHeJZ5UtZlndbHetf1PQ/HNfrO', 'Sliu', 'Jelili', 23, 'M', 65, 176, 416.57, '06', 'Chukun', '231371img469.jpg', '2021-07-23 11:06:41', '5823328', 1, 0),
('04325341645', '$2y$10$LEY90b2.RYrnsKY9F4q5TuTOqpy5h12.EcmK/qfK9GenTVv9mL6HS', 'Aliu', 'Jamiu', 21, 'M', 46, 120, 567.11, '08', 'Demsa', '209609molecule.png', '2021-07-22 14:02:07', '5823328', 1, 0),
('05064537265', '$2y$10$KpTwB4tx50DiuwN5WIlG4u2mfOeu4TixLK3omv8ZBuUr5fue5M.mq', 'Julianah', 'Obasa', 34, 'F', 165, 72, 26.45, '10', 'Akoko-Edo', '60561cervicalCancer_Grafik1.png', '2021-07-22 14:05:38', '5823328', 1, 0),
('05087654345', '$2y$10$QfVuqmjuqLTLqWmdrMWtnui2z2quCGp8iPJzKn5ufRnITqgIt6nXS', 'Zarah', 'Buhari', 34, 'F', 65, 233, 551.48, '09', 'Igabi', '455754img227.jpg', '2021-07-23 11:08:28', '5823328', 1, 0),
('06076542345', '$2y$10$7M3fdSIv67gu/ZaQBLuF6.KxuCvQ1ea04yCPUzBJ1yYZiliZ0xake', 'Khadijah', 'Aliyu', 45, 'F', 43, 172, 930.23, '05', 'Ajigi', '370593img361.jpg', '2021-07-23 11:10:10', '5823328', 1, 0),
('06528730987', '$2y$10$RYVYHl3LDSPfGISeEFcohuDLDtn8reBJpps1eQUnW3NNjuh2E9QIC', 'Chibudom', 'Onuorah', 28, 'F', 47, 189, 855.59, '06', 'Awgu', '986790img135.jpg', '2021-07-23 11:35:33', '5823328', 1, 0),
('07052763456', '$2y$10$1KLS5DmQKxbba8.VTR1umuw2SFuwc7g6vbjRhSfAmDBgW84RjIYau', 'Salami', 'James', 21, 'M', 23.5, 300, 5432.32, '08', 'Akpabuyo', '908243bacteria(1).png', '2021-07-21 03:06:53', '5823328', 1, 0),
('07098765431', '$2y$10$.hdro0ENfKErk8vzpktWcORjSxqMwzGjLpHjQrQ2pdjAMt.wkBSYu', 'Akeem', 'Agbaje', 42, 'M', 41, 321, 1909.58, '08', 'Ekiti-south-west', '344254img219.jpg', '2021-07-23 11:16:05', '5823328', 1, 0),
('0805423476', '$2y$10$04nijhD8nQw.GZDBhK6vc.OWp0MxKvRoBZAUhcEAGvy05xvlhdM9e', 'John', 'Ade', 56, 'M', 160, 75, 29.3, '06', 'Bwari', '589478hospital.png', '2021-07-22 14:04:27', '5823328', 1, 0),
('08065456782', '$2y$10$7BgsBZCRrZkha.xfZlWumO4wkZOzWbqu6Hx42CE65/MDsd1WypN5.', 'BArry', 'Pam', 42, 'M', 34.87, 176.9, 1454.87, '01', 'Bwari', '46118bacteria.png', '2021-07-21 03:05:13', '5823328', 1, 0),
('09054321234', '$2y$10$qjQFgD2ZZfQeCN/K5s/FJOYBwBpzRzYw8pK2HPlTIQoG9yAFjTW12', 'Alan', 'Green', 34, 'M', 34.56, 341.23, 2856.93, '03', 'Ga', '869752cardiogram.png', '2021-07-21 00:27:42', '5823328', 1, 0),
('09063453234', '$2y$10$TC03I56ctem9GyE0HqCykuRtZDiV4iqWUElaWyVW3dJDpLm0syTn6', 'Alice', 'Price', 65, 'F', 23, 34, 642.72, '03', 'Abak', '822879img174.jpg', '2021-07-23 09:41:09', '5823328', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `encountertb`
--
ALTER TABLE `encountertb`
  ADD PRIMARY KEY (`encid`);

--
-- Indexes for table `enctranmsfer`
--
ALTER TABLE `enctranmsfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `healthworkertb`
--
ALTER TABLE `healthworkertb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `enctranmsfer`
--
ALTER TABLE `enctranmsfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `healthworkertb`
--
ALTER TABLE `healthworkertb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
