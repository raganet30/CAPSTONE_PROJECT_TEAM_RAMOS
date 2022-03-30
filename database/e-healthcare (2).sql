-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 07:29 PM
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
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
`appointment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `appointment_purpose` varchar(55) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_status` varchar(55) NOT NULL,
  `appointment_message` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `client_phone` varchar(55) DEFAULT NULL,
  `client_status` varchar(55) DEFAULT NULL,
  `client_joindate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_fname`, `client_mi`, `client_lname`, `client_bdate`, `client_gender`, `client_brgy`, `client_street`, `client_purok`, `client_phone`, `client_status`, `client_joindate`) VALUES
(50, 'Ramon', 'S.', 'Ramos', '1998-12-30', 'Male', 'Cagsalaosao', 'Maharlika', '4', '09352713721', 'Active', '2021-10-27');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_immunization`
--

INSERT INTO `client_immunization` (`client_immu_id`, `vaccine_id`, `client_id`, `client_immu_date`, `hw_id`, `client_immu_remarks`) VALUES
(15, 14, 50, '2021-10-30', 4, 'TEST'),
(16, 7, 50, '2021-10-30', 4, 'SAMPLE');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
`consultation_id` int(11) NOT NULL,
  `client_id` int(55) DEFAULT NULL,
  `consultation_complaints` varchar(255) DEFAULT NULL,
  `consultation_bp` varchar(55) DEFAULT NULL,
  `consultation_resprate` varchar(55) DEFAULT NULL,
  `consultation_cr` varchar(55) DEFAULT NULL,
  `consultation_temp` varchar(55) DEFAULT NULL,
  `consultation_weight` int(55) DEFAULT NULL,
  `consultation_prate` varchar(55) DEFAULT NULL,
  `consultation_diag` varchar(55) DEFAULT NULL,
  `consultation_treatment` varchar(55) DEFAULT NULL,
  `consultation_group` varchar(55) DEFAULT NULL,
  `consultation_date` date DEFAULT NULL,
  `hw_id` int(55) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`consultation_id`, `client_id`, `consultation_complaints`, `consultation_bp`, `consultation_resprate`, `consultation_cr`, `consultation_temp`, `consultation_weight`, `consultation_prate`, `consultation_diag`, `consultation_treatment`, `consultation_group`, `consultation_date`, `hw_id`) VALUES
(1, 50, 'A                                                                                ', 'A', 'A', 'A', '12', 12, 'AS', 'AS', 'ASA', 'BP MOnitoring', '2021-10-27', 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `healthworker`
--

INSERT INTO `healthworker` (`hw_id`, `hw_fname`, `hw_mi`, `hw_lname`, `hw_email`, `hw_bdate`, `hw_gender`, `hw_brgy`, `hw_city`, `hw_province`, `hw_phone`, `hw_status`, `hw_joindate`, `hw_designation`) VALUES
(4, 'Kendy', 'S', 'Mercader', 'olshopee1230@gmail.com', '1980-12-30', 'Female', 'Trinidad', 'CALBAYOG CITY', 'WESTERN SAMAR', '09267475521', 'Active', '2021-10-27', 'Doctor'),
(5, 'Kenneth', 'S.', 'Ramos', 'neth3039@gmail.com', '1998-12-30', 'Male', 'CAGSALAOSAO', 'CALBAYOG CITY', 'Region VIII - WESTERN SAMAR', '09352713721', 'Active', '2021-10-29', 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`log_id` int(11) NOT NULL,
  `log_user` int(11) DEFAULT NULL,
  `log_activity` varchar(255) DEFAULT NULL,
  `log_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_user`, `log_activity`, `log_date`) VALUES
(2, 11, 'have changed the settings', '2021-10-27 03:31:09'),
(3, 0, 'updated vaccine details for vaccine ID No.6', '0000-00-00 00:00:00'),
(4, 11, 'updated vaccine details for vaccine ID No.6', '0000-00-00 00:00:00'),
(5, 11, 'updated vaccine details for vaccine ID No.6', '0000-00-00 00:00:00'),
(6, 11, 'updated vaccine details for vaccine ID No.6', '0000-00-00 00:00:00'),
(7, 11, 'updated vaccine details for vaccine ID No.4', '2021-10-29 12:05:31'),
(8, 11, 'updated vaccine details for vaccine ID No.5', '2021-10-29 12:33:05'),
(9, 11, 'updated vaccine details for vaccine ID No.5', '2021-10-29 12:33:25'),
(10, 11, 'updated vaccine details for vaccine ID No.6', '2021-10-29 12:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `maternity`
--

CREATE TABLE IF NOT EXISTS `maternity` (
`maternity_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `maternity_bmi` int(11) NOT NULL,
  `maternity_mensdate` date NOT NULL,
  `maternity_expectdate` date NOT NULL,
  `maternity_pregnum` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prenatal`
--

CREATE TABLE IF NOT EXISTS `prenatal` (
`prenatal_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `prenatal_checknum` int(11) NOT NULL,
  `prenatal_date` date NOT NULL,
  `prenatal_weight` int(11) NOT NULL,
  `prenatal_height` int(11) NOT NULL,
  `prenatal_age_gest` varchar(55) NOT NULL,
  `prenatal_bp` varchar(55) NOT NULL,
  `prenatal_nutristat` varchar(55) NOT NULL,
  `prenatal_pregstat` varchar(55) NOT NULL,
  `prenatal_creationbplan` varchar(55) NOT NULL,
  `prenatal_bplanchanges` varchar(55) NOT NULL,
  `prenatal_advice` varchar(255) NOT NULL,
  `prenatal_dental` varchar(55) NOT NULL,
  `prenatal_labtest` varchar(55) NOT NULL,
  `prenatal_hemog` varchar(55) NOT NULL,
  `prenatal_urinalysis` varchar(55) NOT NULL,
  `prenatal_cbc` varchar(55) NOT NULL,
  `prenatal_bloodrh` varchar(55) NOT NULL,
  `prenatal_etiotest` varchar(55) NOT NULL,
  `prenatal_papsmear` varchar(55) NOT NULL,
  `prenatal_gestdiab` varchar(55) NOT NULL,
  `prenatal_bacteriuria` varchar(55) NOT NULL,
  `prenatal_STI` varchar(55) NOT NULL,
  `prenatal_stool` varchar(55) NOT NULL,
  `prenatal_acetic` varchar(55) NOT NULL,
  `prenatal_tetanus` varchar(55) NOT NULL,
  `prenatal_treatment` varchar(55) NOT NULL,
  `prenatal_datereturn` date NOT NULL,
  `prenatal_provname` varchar(55) NOT NULL,
  `prenatal_hospref` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `contact_person` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `telephone` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `contact_person`, `address`, `postalcode`, `email`, `phone`, `telephone`) VALUES
(1, 'Baranggay E-Healthcare', 'SAMPLE', 'Purok 2 Brgy. Cagsalaosao, Calbayog City', 6710, 'sample@gmail.com', '09267475521', '222-222-222');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

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
(14, 'Anti-Tetanus 1', '0.5', 'ml', 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
 ADD PRIMARY KEY (`appointment_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `client_immunization`
--
ALTER TABLE `client_immunization`
MODIFY `client_immu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
MODIFY `consultation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `healthworker`
--
ALTER TABLE `healthworker`
MODIFY `hw_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `maternity`
--
ALTER TABLE `maternity`
MODIFY `maternity_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prenatal`
--
ALTER TABLE `prenatal`
MODIFY `prenatal_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
