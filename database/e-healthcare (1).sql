-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 11:21 AM
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
(14, 'user', 'olshopee1230@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'c1b8bf9e071c0dabb899e7a27f353762', 1, 'Encoder', '2021-10-19');

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
  `client_email` varchar(55) DEFAULT NULL,
  `client_bdate` date DEFAULT NULL,
  `client_gender` varchar(55) DEFAULT NULL,
  `client_brgy` varchar(55) DEFAULT NULL,
  `client_city` varchar(55) DEFAULT NULL,
  `client_province` varchar(55) DEFAULT NULL,
  `client_phone` varchar(55) DEFAULT NULL,
  `client_status` varchar(55) DEFAULT NULL,
  `client_joindate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_fname`, `client_mi`, `client_lname`, `client_email`, `client_bdate`, `client_gender`, `client_brgy`, `client_city`, `client_province`, `client_phone`, `client_status`, `client_joindate`) VALUES
(45, 'Sample', 'S.', 'Ramos', 'rogerwin03@gmail.com', '2021-08-19', 'Male', 'Purok 2 Brgy. Cagsalaosao, Calbayog City', 'Calbayog city', 'Western Samar', '09267475521', 'Active', '2021-10-19'),
(46, 'ROGER', 'S.', 'Omandam', 'rogerwin03@gmail.com', '1997-12-30', 'Male', 'Purok 2 Brgy. Cagsalaosao, Calbayog City', 'Calbayog city', 'Western Samar', '09267475521', 'Active', '2021-10-19');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `healthworker`
--

INSERT INTO `healthworker` (`hw_id`, `hw_fname`, `hw_mi`, `hw_lname`, `hw_email`, `hw_bdate`, `hw_gender`, `hw_brgy`, `hw_city`, `hw_province`, `hw_phone`, `hw_status`, `hw_joindate`, `hw_designation`) VALUES
(3, 'ROGER', 'A.', 'ROSTATA', 'rogerwin03@gmail.com', '1997-12-30', 'Male', 'Cagsalaosao', 'Calbayog city', 'Western Samar', '09267475521', 'Active', '2021-10-19', 'Nurse');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`log_id` int(11) NOT NULL,
  `log_user` int(11) DEFAULT NULL,
  `log_activity` varchar(255) DEFAULT NULL,
  `log_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `person_immunization`
--

CREATE TABLE IF NOT EXISTS `person_immunization` (
`person_immu_id` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `person_immu_date` int(11) NOT NULL,
  `person_immu_remarks` int(11) NOT NULL
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
  `name` varchar(55) NOT NULL,
  `contact_person` varchar(55) NOT NULL,
  `brgy` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  `province` varchar(55) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` varchar(55) NOT NULL,
  `telephone` varchar(55) NOT NULL,
  `web_url` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE IF NOT EXISTS `vaccine` (
`vaccine_id` int(11) NOT NULL,
  `vaccine_name` varchar(55) NOT NULL,
  `vaccine_dosage` varchar(55) NOT NULL,
  `vaccine_brand` varchar(55) NOT NULL,
  `vaccine_manu_date` date NOT NULL,
  `vaccine_expdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `person_immunization`
--
ALTER TABLE `person_immunization`
 ADD PRIMARY KEY (`person_immu_id`);

--
-- Indexes for table `prenatal`
--
ALTER TABLE `prenatal`
 ADD PRIMARY KEY (`prenatal_id`);

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
MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
MODIFY `consultation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `healthworker`
--
ALTER TABLE `healthworker`
MODIFY `hw_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `maternity`
--
ALTER TABLE `maternity`
MODIFY `maternity_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `person_immunization`
--
ALTER TABLE `person_immunization`
MODIFY `person_immu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prenatal`
--
ALTER TABLE `prenatal`
MODIFY `prenatal_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
