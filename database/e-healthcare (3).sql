-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 01:09 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
`id` int(11) NOT NULL,
  `username` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL,
  `verify_token` varchar(55) DEFAULT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=unverified, 1=verified',
  `role` varchar(55) DEFAULT NULL COMMENT 'encoder=limited feature, admin=can access all feature',
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `email`, `password`, `verify_token`, `verify_status`, `role`, `date_created`) VALUES
(11, 'admin', 'olshopee@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'd16509f6eaca1022bd8f28d6bc582cae', 1, 'Admin', '2021-10-19'),
(14, 'encoder', 'olshopee1230@gmail.com', '724a00e315992b82d662231ea0dcbe50', 'c1b8bf9e071c0dabb899e7a27f353762', 1, 'Encoder', '2021-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `bp_monitoring`
--

CREATE TABLE IF NOT EXISTS `bp_monitoring` (
`id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `upperbp` float NOT NULL,
  `lowerbp` float NOT NULL,
  `level` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bp_monitoring`
--

INSERT INTO `bp_monitoring` (`id`, `client_id`, `upperbp`, `lowerbp`, `level`, `date`) VALUES
(1, 50, 120, 110, 'Grade 2- Hypertension (moderate)', '2021-11-03'),
(2, 50, 80, 60, 'Low', '2021-11-04'),
(3, 50, 120, 80, 'Normal', '2021-11-14'),
(4, 50, 120, 80, 'Normal', '2021-11-14'),
(5, 51, 120, 80, 'Normal', '2021-11-14'),
(6, 50, 120, 80, 'Normal', '2021-11-14'),
(7, 50, 120, 80, 'Normal', '2021-11-14'),
(8, 50, 120, 70, 'Normal', '2021-11-14'),
(9, 52, 200, 120, 'Grade 3- Hypertension (severe)', '2021-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`client_id` int(11) NOT NULL,
  `client_fname` varchar(55) DEFAULT NULL,
  `client_mi` varchar(5) DEFAULT NULL,
  `client_lname` varchar(55) DEFAULT NULL,
  `client_bdate` date DEFAULT NULL,
  `client_gender` varchar(55) DEFAULT NULL,
  `client_brgy` varchar(55) DEFAULT NULL,
  `client_street` varchar(255) DEFAULT NULL,
  `client_purok` varchar(255) DEFAULT NULL,
  `client_mother` varchar(255) DEFAULT NULL,
  `client_father` varchar(255) DEFAULT NULL,
  `client_phone` varchar(55) DEFAULT NULL,
  `client_status` varchar(55) DEFAULT NULL,
  `client_immu_status` varchar(55) NOT NULL,
  `client_joindate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_fname`, `client_mi`, `client_lname`, `client_bdate`, `client_gender`, `client_brgy`, `client_street`, `client_purok`, `client_mother`, `client_father`, `client_phone`, `client_status`, `client_immu_status`, `client_joindate`) VALUES
(50, 'Ramon', 'S.', 'Ramos', '1998-12-30', 'Male', 'Cagsalaosao', 'Maharlika', '4', 'Sample Sample', 'Sample Sample', '09267475521', 'Active', 'Not Fully Immunized', '2021-10-27'),
(51, 'Fely', 'S.', 'Reyes', '1995-12-30', 'Female', 'Cagsalaosao', 'Maharlika', '3', 'Sample Sample', 'Sample Sample', '09352713721', 'Active', 'Not Fully Immunized', '2021-11-04'),
(52, 'Diosdado', 'A', 'Delgado', '2020-02-02', 'Male', 'Cagsalaosao', 'Maharlika', '3', 'Sample Sample', 'Sample Sample', '09267475521', 'Active', 'Not Fully Immunized', '2021-11-14'),
(53, 'Jeramae', 'M', 'Mercader', '2021-01-01', 'Female', 'Marcatubig', 'Rosales', '3', 'Mayel Montano', 'Kenneth Ramos', '09267475521', 'Active', 'Fully Immunized', '2021-11-23'),
(54, 'Romy', 'S', 'Salazar', '1959-12-30', 'Male', 'Cagsalaosao', 'Sample', '3', 'Sample Sample', 'Sample Sample', '09159191195', 'Active', '', '2021-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `client_immunization`
--

CREATE TABLE IF NOT EXISTS `client_immunization` (
`client_immu_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_immu_date` date NOT NULL,
  `hw_id` int(11) NOT NULL,
  `client_immu_remarks` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_immunization`
--

INSERT INTO `client_immunization` (`client_immu_id`, `vaccine_id`, `client_id`, `client_immu_date`, `hw_id`, `client_immu_remarks`) VALUES
(19, 14, 0, '2021-11-14', 5, 'ok'),
(20, 14, 51, '2021-11-14', 5, 'ok'),
(21, 4, 52, '2021-01-14', 5, 'ok'),
(22, 5, 52, '2021-03-14', 5, 'ok'),
(23, 4, 53, '2021-11-23', 5, 'Ok'),
(24, 5, 53, '2021-11-23', 5, 'OK'),
(25, 15, 53, '2021-11-23', 5, 'OK'),
(26, 6, 53, '2021-11-23', 5, 'ok'),
(27, 7, 53, '2021-11-23', 6, 'OK'),
(28, 8, 53, '2021-11-23', 5, 'OK'),
(29, 9, 53, '2021-11-23', 5, 'OK'),
(30, 10, 53, '1970-01-01', 5, 'OK'),
(31, 11, 53, '1970-01-01', 5, 'OK'),
(32, 12, 53, '2021-11-23', 5, 'OK'),
(33, 13, 53, '2021-11-23', 5, 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
`consultation_id` int(11) NOT NULL,
  `client_id` int(55) DEFAULT NULL,
  `consultation_complaints` varchar(255) DEFAULT NULL,
  `consultation_upperbp` varchar(55) DEFAULT NULL,
  `consultation_lowerbp` float NOT NULL,
  `consultation_resprate` varchar(55) DEFAULT NULL,
  `consultation_cr` varchar(55) DEFAULT NULL,
  `consultation_temp` varchar(55) DEFAULT NULL,
  `consultation_weight` int(55) DEFAULT NULL,
  `consultation_prate` varchar(55) DEFAULT NULL,
  `consultation_diag` varchar(55) DEFAULT NULL,
  `consultation_treatment` varchar(55) DEFAULT NULL,
  `consultation_date` date DEFAULT NULL,
  `hw_id` int(55) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`consultation_id`, `client_id`, `consultation_complaints`, `consultation_upperbp`, `consultation_lowerbp`, `consultation_resprate`, `consultation_cr`, `consultation_temp`, `consultation_weight`, `consultation_prate`, `consultation_diag`, `consultation_treatment`, `consultation_date`, `hw_id`) VALUES
(6, 50, 'excessive urinating at night                                                                                                                                                                                                                                   ', '120', 80, '00', '00', '37.8', 60, '000', 'UTI', 'SAMPLE TREATMENT', '2021-11-16', 5),
(7, 51, 'sample', '120', 80, 'sample', 'sample', '37.5', 60, 'sample', 'sample', 'sample', '2021-11-14', 5),
(8, 51, 'sample', '120', 80, 'sample', 'sample', '37.5', 60, 'sample', 'sample', 'sample', '2021-11-14', 5);

-- --------------------------------------------------------

--
-- Table structure for table `healthworker`
--

CREATE TABLE IF NOT EXISTS `healthworker` (
`hw_id` int(11) NOT NULL,
  `hw_fname` varchar(55) DEFAULT NULL,
  `hw_mi` varchar(5) DEFAULT NULL,
  `hw_lname` varchar(55) DEFAULT NULL,
  `hw_email` varchar(55) DEFAULT NULL,
  `hw_bdate` date DEFAULT NULL,
  `hw_gender` varchar(55) DEFAULT NULL,
  `hw_brgy` varchar(55) DEFAULT NULL,
  `hw_city` varchar(55) DEFAULT NULL,
  `hw_province` varchar(55) DEFAULT NULL,
  `hw_phone` varchar(55) DEFAULT NULL,
  `hw_status` varchar(55) DEFAULT NULL,
  `hw_joindate` date DEFAULT NULL,
  `hw_designation` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `healthworker`
--

INSERT INTO `healthworker` (`hw_id`, `hw_fname`, `hw_mi`, `hw_lname`, `hw_email`, `hw_bdate`, `hw_gender`, `hw_brgy`, `hw_city`, `hw_province`, `hw_phone`, `hw_status`, `hw_joindate`, `hw_designation`) VALUES
(5, 'Kenneth', 'S', 'Ramos', 'neth3039@gmail.com', '1998-12-30', 'Male', 'CAGSALAOSAO', 'CALBAYOG CITY', 'Region VIII - WESTERN SAMAR', '09352713721', 'Active', '2021-10-29', 'Nurse'),
(6, 'Kendy', 'S', 'Mercader', 'olshopee1230@gmail.com', '2021-11-01', 'Female', 'CAGSALAOSAO', 'CALBAYOG CITY', 'Region VIII - WESTERN SAMAR', '09267475521', 'Active', '2021-11-01', 'Nurse'),
(7, 'Leticia', 'B', 'Menaya', 'leticia@gmail.com', '1986-12-30', 'Female', 'CAGSALAOSAO', 'CALBAYOG CITY', 'Region VIII - WESTERN SAMAR', '09267475525', 'Active', '2021-12-13', 'Midwfe');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
`id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `client_id`, `activity`, `date`) VALUES
(5, 50, 'has been diagnosed for SAMPLE DIAGNOSIS', '2021-11-05'),
(6, 50, 'has consulted BP check-up with BP:120/80', '0000-00-00'),
(7, 51, 'has been diagnosed for sample', '2021-11-14'),
(8, 51, 'has been diagnosed for sample', '2021-11-14'),
(9, 51, 'has consulted BP check-up with BP:120/80', '2021-11-14'),
(10, 50, 'has consulted BP check-up with BP:120/80', '2021-11-14'),
(11, 50, 'has consulted BP check-up with BP:120/80', '2021-11-14'),
(12, 50, 'has consulted BP check-up with BP:120/70', '2021-11-14'),
(13, 51, 'has consulted prenatal check-up.', '2021-11-14'),
(14, 52, 'has consulted BP check-up with BP:120/80', '2021-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`log_id` int(11) NOT NULL,
  `log_user` int(11) DEFAULT NULL,
  `log_activity` varchar(255) DEFAULT NULL,
  `log_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_user`, `log_activity`, `log_date`) VALUES
(64, 11, 'updated BP Monitoring record ID no.2', '2021-11-16 04:23:04'),
(65, 11, 'have changed the settings', '2021-11-20 12:54:19'),
(67, 11, 'have changed the settings', '2021-11-20 12:59:20'),
(68, 14, 'sent SMS text message to 09352713721', '2021-11-20 02:22:08'),
(69, 11, 'added new Client.', '2021-11-23 09:22:24'),
(70, 11, 'updated client details ID no.52', '2021-11-23 09:27:08'),
(71, 11, 'updated client details ID no.51', '2021-11-23 09:39:07'),
(72, 11, 'updated client details ID no.50', '2021-11-23 09:39:15'),
(73, 11, 'added new immunization record.', '2021-11-23 09:40:20'),
(74, 11, 'sent SMS text message to 09352713721', '2021-11-23 10:30:13'),
(75, 11, 'have changed the settings', '2021-11-23 03:33:48'),
(76, 11, 'have changed the settings', '2021-11-23 03:41:00'),
(77, 11, 'added new immunization record.', '2021-11-23 04:07:47'),
(78, 11, 'updated vaccine details for vaccine ID No.15', '2021-11-23 04:10:45'),
(79, 11, 'added new immunization record.', '2021-11-23 04:11:29'),
(80, 11, 'added new immunization record.', '2021-11-23 04:11:47'),
(81, 11, 'added new immunization record.', '2021-11-23 04:12:14'),
(82, 11, 'added new immunization record.', '2021-11-23 04:12:34'),
(83, 11, 'added new immunization record.', '2021-11-23 04:12:53'),
(84, 11, 'added new immunization record.', '2021-11-23 04:13:10'),
(85, 11, 'added new immunization record.', '2021-11-23 04:13:33'),
(86, 11, 'added new immunization record.', '2021-11-23 04:13:50'),
(87, 11, 'added new immunization record.', '2021-11-23 04:14:08'),
(88, 11, 'updated client details ID no.53', '2021-12-08 09:35:24'),
(89, 11, 'added new Client.', '2021-12-13 08:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `maternity`
--

CREATE TABLE IF NOT EXISTS `maternity` (
`maternity_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `maternity_bmi` float NOT NULL,
  `maternity_mensdate` date NOT NULL,
  `maternity_expectdate` date NOT NULL,
  `maternity_pregnum` int(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maternity`
--

INSERT INTO `maternity` (`maternity_id`, `client_id`, `maternity_bmi`, `maternity_mensdate`, `maternity_expectdate`, `maternity_pregnum`) VALUES
(2, 51, 24.5, '2021-11-01', '2021-11-30', 3);

-- --------------------------------------------------------

--
-- Table structure for table `prenatal`
--

CREATE TABLE IF NOT EXISTS `prenatal` (
`prenatal_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `prenatal_type` varchar(55) NOT NULL,
  `prenatal_checknum` int(11) DEFAULT NULL,
  `prenatal_date` date DEFAULT NULL,
  `prenatal_weight` int(11) DEFAULT NULL,
  `prenatal_height` int(11) DEFAULT NULL,
  `prenatal_age_gest` varchar(55) DEFAULT NULL,
  `prenatal_upperbp` int(55) DEFAULT NULL,
  `prenatal_lowerbp` int(11) DEFAULT NULL,
  `prenatal_nutristat` varchar(55) DEFAULT NULL,
  `prenatal_pregstat` varchar(55) DEFAULT NULL,
  `prenatal_creationbplan` varchar(55) DEFAULT NULL,
  `prenatal_bplanchanges` varchar(55) DEFAULT NULL,
  `prenatal_advice` varchar(255) DEFAULT NULL,
  `prenatal_dental` varchar(55) DEFAULT NULL,
  `prenatal_labtest` varchar(55) DEFAULT NULL,
  `prenatal_hemog` varchar(55) DEFAULT NULL,
  `prenatal_urinalysis` varchar(55) DEFAULT NULL,
  `prenatal_cbc` varchar(55) DEFAULT NULL,
  `prenatal_bloodrh` varchar(55) DEFAULT NULL,
  `prenatal_etiotest` varchar(55) DEFAULT NULL,
  `prenatal_papsmear` varchar(55) DEFAULT NULL,
  `prenatal_gestdiab` varchar(55) DEFAULT NULL,
  `prenatal_bacteriuria` varchar(55) DEFAULT NULL,
  `prenatal_STI` varchar(55) DEFAULT NULL,
  `prenatal_stool` varchar(55) DEFAULT NULL,
  `prenatal_acetic` varchar(55) DEFAULT NULL,
  `prenatal_tetanus` varchar(55) DEFAULT NULL,
  `prenatal_datereturn` date DEFAULT NULL,
  `prenatal_provname` varchar(55) DEFAULT NULL,
  `prenatal_hospref` varchar(55) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prenatal`
--

INSERT INTO `prenatal` (`prenatal_id`, `client_id`, `prenatal_type`, `prenatal_checknum`, `prenatal_date`, `prenatal_weight`, `prenatal_height`, `prenatal_age_gest`, `prenatal_upperbp`, `prenatal_lowerbp`, `prenatal_nutristat`, `prenatal_pregstat`, `prenatal_creationbplan`, `prenatal_bplanchanges`, `prenatal_advice`, `prenatal_dental`, `prenatal_labtest`, `prenatal_hemog`, `prenatal_urinalysis`, `prenatal_cbc`, `prenatal_bloodrh`, `prenatal_etiotest`, `prenatal_papsmear`, `prenatal_gestdiab`, `prenatal_bacteriuria`, `prenatal_STI`, `prenatal_stool`, `prenatal_acetic`, `prenatal_tetanus`, `prenatal_datereturn`, `prenatal_provname`, `prenatal_hospref`) VALUES
(4, 51, '1st Trimester', 2, '2021-11-12', 49, 150, 'sample', 130, 80, 'Underweight', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', '2021-11-01', '2021-11-30', 'SAMPLE', 'SAMPLE'),
(5, 51, '2nd Trimester', 3, '2021-11-14', 60, 128, 'sampl', 120, 80, 'Normal', 'normal', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', '2021-11-01', '2021-11-01', 'sample', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `contact_person` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `telephone` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `contact_person`, `address`, `email`, `phone`, `telephone`) VALUES
(1, 'Cagsalaosao Health Center', 'SAMPLE', 'Purok 2 Brgy. Cagsalaosao, Calbayog City', 'sample@gmail.com', '09267475521', '222-222-222');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE IF NOT EXISTS `vaccine` (
`vaccine_id` int(11) NOT NULL,
  `vaccine_name` varchar(55) NOT NULL,
  `vaccine_dosage` varchar(55) NOT NULL COMMENT 'drops or ml',
  `vaccine_dose_type` varchar(55) DEFAULT NULL,
  `vaccine_brand` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`vaccine_id`, `vaccine_name`, `vaccine_dosage`, `vaccine_dose_type`, `vaccine_brand`) VALUES
(4, 'BCG 1', '0.02', 'ml', 'N/A'),
(5, 'DPT 1', '0.2', 'ml', 'N/A'),
(6, 'DPT 3', '0.1', 'ml', 'Ambot'),
(7, 'Hepatitis B1', '0.02', 'ml', 'N/A'),
(8, 'Hepatitis B2', '0.02', 'ml', 'Sample'),
(9, 'Hepatitis B3', '0.05', 'ml', 'N/A'),
(10, 'Measles', '0.1', 'drops', 'N/A'),
(11, 'OPV1', '0.1', 'ml', 'N/A'),
(12, 'OPV2', '0.5', 'drops', 'N/A'),
(13, 'OPV3', '0.1', 'ml', 'N/A'),
(14, 'Anti-Tetanus 1', '0.5', 'ml', 'N/A'),
(15, 'DPT 2', '20.5', 'ml', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
`id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `visit_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`id`, `client_id`, `visit_date`) VALUES
(5, 51, '2021-11-14'),
(7, 50, '2021-11-01'),
(8, 52, '2021-11-14'),
(9, 52, '2021-11-01'),
(10, 52, '2021-01-14'),
(11, 52, '2021-03-14'),
(12, 53, '2021-11-23'),
(13, 53, '1970-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bp_monitoring`
--
ALTER TABLE `bp_monitoring`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_immunization`
--
ALTER TABLE `client_immunization`
 ADD PRIMARY KEY (`client_immu_id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
 ADD PRIMARY KEY (`consultation_id`);

--
-- Indexes for table `healthworker`
--
ALTER TABLE `healthworker`
 ADD PRIMARY KEY (`hw_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `maternity`
--
ALTER TABLE `maternity`
 ADD PRIMARY KEY (`maternity_id`);

--
-- Indexes for table `prenatal`
--
ALTER TABLE `prenatal`
 ADD PRIMARY KEY (`prenatal_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
 ADD PRIMARY KEY (`vaccine_id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `bp_monitoring`
--
ALTER TABLE `bp_monitoring`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `client_immunization`
--
ALTER TABLE `client_immunization`
MODIFY `client_immu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
MODIFY `consultation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `healthworker`
--
ALTER TABLE `healthworker`
MODIFY `hw_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `maternity`
--
ALTER TABLE `maternity`
MODIFY `maternity_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `prenatal`
--
ALTER TABLE `prenatal`
MODIFY `prenatal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
