-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Sep 09, 2023 at 07:03 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vgubusdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `email`, `password`) VALUES
('admin10', 'Hoan', 'Tran Kim', 'admin10@admin.vgu.edu.vn', '$2y$10$Ov1ad/Y6Ek5UEIFUg0lCLu0zBAGnyXl1IKVk1TNXRrurg5ls2oIyG');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `student_id` varchar(20) NOT NULL,
  `ticket_id` int NOT NULL,
  `bus_id` int NOT NULL,
  `qrcode` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`student_id`, `ticket_id`, `bus_id`, `qrcode`) VALUES
('17965', 1, 1, 'id=17965@t1@b1'),
('17965', 2, 1, 'id=17965@t2@b1'),
('17965', 3, 2, 'id=17965@t3@b2'),
('17965', 5, 1, 'id=17965@t5@b1'),
('18810', 1, 2, 'id=18810@t1@b2'),
('18810', 2, 2, 'id=18810@t2@b2'),
('18810', 6, 4, 'id=18810@t6@b4'),
('18812', 1, 1, 'id=18812@t1@b1'),
('18812', 2, 1, 'id=18812@t2@b1');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int NOT NULL,
  `seat_num` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `seat_num`) VALUES
(1, 2),
(2, 65),
(3, 65),
(4, 60);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `first_name`, `last_name`, `email`, `password`) VALUES
('driver20', 'Nam', 'Tran Dai', 'driver20@driver.vgu.edu.vn', '$2y$10$KG5YEhecgSlN/AjuP.FmQ.FIHVoJZNQrOm/WlIZKR5.s3gJXIDUqO');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int NOT NULL,
  `date` date NOT NULL,
  `content` varchar(5000) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `date`, `content`, `title`) VALUES
(1, '2023-05-15', 'Dear students,\r\n\r\nFrom 15.05.2023, the price for each single-ticket is 100,000 VND. If you have any question, please don\'t hesistate to contact the admin.\r\n\r\nBest regards,\r\nAdmin Team', '[BUS SERVICE] ABOUT THE PRICE FOR A SINGLE-TICKET'),
(2, '2023-05-11', 'Dear Students,\r\n\r\nThe Finance-Accounting Department would like to inform you that all payments for bus services must be made through the following bank account ONLY.\r\n\r\nBank Account details:\r\nAccount holder: TRUONG DAI HOC VIET DUC\r\nAccount number: 100 222 0990\r\nBank name: Vietcombank - Binh Duong Branch\r\nRemarks: Single ticket - Departure date - Student ID - Full name\r\n\r\nPlease be advised that any transaction made to other accounts will not be accepted. We kindly ask for your understanding and cooperation in this matter.\r\n\r\nThank you for your attention.\r\n\r\nBest regards,', '[VGU]_BUS SERVICE: AN UPDATE FROM 13.02.2023'),
(3, '2023-04-11', 'Dear students,\r\n\r\nWe would like to announce some updates on the bus schedule and pick-up destination as follows:\r\n\r\nThe weekly bus schedule on Monday will be updated, the pick-up time will be earlier than usual, please follow the new schedule on our website at https://vgu.edu.vn/en/bus\r\nPlease kindly be at the bus stop at least 10 minutes prior to the departure time.\r\n\r\nThe bus stop: As a new traffic regulation, from 12.04.2023 our shuttle buses are not allowed to stop at Hang Xanh crossroads. So we would like to adjust the bus stop at Hang Xanh to 360 B Xo Viet Nghe Tinh, Ward 25, Binh Thanh District, HCMC (far away about 50 meters from the original stop - Hang Xanh crossroads) from April 12, 2023.\r\n\r\nIf you have any questions or concerns please feel free to contact us by email studentaffairs@vgu.edu.vn or phone (+84(0) 274 222 0990 Ext: 70147).\r\n\r\n\r\nBest Regards,\r\n\r\nStudent Affairs Team.', '[BUS SERVICE] Bus stop and schedule updates from April 12, 2023'),
(4, '2023-02-10', 'Dear students,\r\n\r\nWe are now open for Bus Service Registration for the summer semester (from March 2023)\r\n\r\nIf you want to use the VGU student bus service for this semester, please visit THIS REGISTRATION LINK and follow the instructions. Deadline for registration and fee payment before 5:00pm February 12, 2023.\r\nRemarks: \r\n\r\n- According to the Decision 227/QĐ/ĐHVĐ dated 29/10/2021 on issuing the Tuition fee Regulation for Undergraduate Study Programs and Decision 304/QĐ/ĐHVĐ dated 26/11/2021 On issuing the Tuition fee Regulation for Master Study Programs: the Bus fee will not be refunded under any circumstance. So please kindly notice this information before registration.\r\n\r\n- After 5:00pm February 12, 2023, If you have not paid the fee, your registration will be canceled.\r\n\r\nWith Best Regards,\r\n\r\nThe Academic and Student Affairs Department.', '[VGU] VGU Bus Registration for SS 22/23'),
(5, '2022-01-27', 'Dear Students,\r\n\r\nWe are opening Bus Service Registration for Semester II (from February 2022). We are asking all students who wish to use the bus to and/or from VGU Campus this semester to register for bus now. \r\n\r\nRegistration:\r\nPlease visit Registration Link to learn more and to register. \r\nDeadline is: 09:00am February 10, 2022.\r\n\r\nPayment: via bank transfer. If you already paid the bus fee last semester, it will be transferred to this semester. \r\n\r\nIf you have any questions or concerns, please feel free to contact us.\r\n\r\nThank you and best regards,\r\nStudent Affairs Team - VGU\r\n\r\nLe Lai Street, Hoa Phu Ward, Thu Dau Mot City, Binh Duong Province\r\n\r\nTel: 0274 2220990 - Ext 147    Fax: 0274 2220980\r\n\r\nEmail: studentaffairs@vgu.edu.vn \r\n\r\nWebsite: www.vgu.edu.vn', 'VGU BUS SERVICE REGISTRATION'),
(6, '2021-04-26', 'Dear Students,\r\n\r\nWe would like to announce the public holidays: \r\n- Hung Kings Commemoration Day is on Wednesday, April 21\r\n- Reunification Day is on Friday, April 30\r\n- International Labour Day is on Saturday, May 01\r\nWe will back to work on Tuesday, May 04\r\n\r\nPlease kindly note that all Student Buses will leave VGU Campus/ Dormitory at 04:30 PM on Thursday, April 29 and will be back in service on Tuesday, May 04.\r\n\r\nThank you and best regards, \r\nStudent Affairs Team - VGU\r\n\r\nLe Lai Street, Hoa Phu Ward, Thu Dau Mot City, Binh Duong Province\r\n\r\nTel: 0274 2220990 - Ext 147    Fax: 0274 2220980\r\n\r\nEmail: studentaffairs@vgu.edu.vn \r\n\r\nWebsite: www.vgu.edu.vn', '[BUS ANNOUNCEMENT]_PUBLIC HOLIDAYS');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `intake` varchar(15) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `email`, `password`, `intake`, `phone_number`) VALUES
('16001', 'Andre', 'Van Freeden', '16001@student.vgu.edu.vn', '$2y$10$GOq3byRTRi60jzdIS0hLleNQ5cKlvJAtJw3fRR3wVICwN7GC.5k82', 'CSE 2020', '1664338194'),
('16002', 'Yolanda', 'Clayton', '16002@student.vgu.edu.vn', '$2y$10$vy1ptb8zvdgmZL9JgncD8.pmKnkvECkjwrlmbIrymZE7PJHf05x/G', 'CSE 2020', '2200233699'),
('16003', 'Sibley', 'Erickson', '16003@student.vgu.edu.vn', '$2y$10$.jnulna/IT4xZ0aYeeuz5uXcSm41YAUeMDBdK6sDCe1c9bM/nfU8G', 'CSE 2020', '1102789411'),
('16004', 'Vanessa', 'Dittman', '16004@student.vgu.edu.vn', '$2y$10$eusn8H0O0G71X/ZobI2RFOCVyAgLosk.J9PiI4JGu7ElUOBOZbrZG', 'CSE 2020', '5693503762'),
('16005', 'Gene', 'Franklin', '16005@student.vgu.edu.vn', '$2y$10$eusn8H0O0G71X/ZobI2RFOCVyAgLosk.J9PiI4JGu7ElUOBOZbrZG', 'CSE 2020', '8491366637'),
('16006', 'Winston', 'Fernandez', '16006@student.vgu.edu.vn', '$2y$10$565OP5h5PVSyjSmlEcATTuDshkCF7.CxwQBMLm5e0NvDp7h4REfr2', 'CSE 2020', '3086523516'),
('16007', 'Alanna', 'Elliott', '16007@student.vgu.edu.vn', '$2y$10$565OP5h5PVSyjSmlEcATTuDshkCF7.CxwQBMLm5e0NvDp7h4REfr2', 'CSE 2020', '6478846220'),
('16008', 'Bud', 'Males', '16008@student.vgu.edu.vn', '$2y$10$u8CPlf7zWXuMo/2iAyqxH.5CDvBf.zMLe2WXd/ATWUaBP3JYueaM.', 'CSE 2020', '3170752503'),
('16009', 'Josep', 'Leonard', '16009@student.vgu.edu.vn', '$2y$10$da4.czh.hHP/8YlbeCRoEuqaTantZzLoVTY5U6voPNdnrl0O6P8bm', 'CSE 2020', '4509837963'),
('16010', 'Frank', 'Allen', '16010@student.vgu.edu.vn', '$2y$10$i2Y0cBT9tULPsnAaSaq4He.iNIoHEGgwFxuFpmubMTcm7SKKsnHLq', 'CSE 2020', '7268677823'),
('16011', 'Emily', 'Richardson', '16011@student.vgu.edu.vn', '$2y$10$PKiQjuMgL2KdRPjBpCfYiuMy2VtdwwsLspxGZSvWk7A7yO825263a', 'CSE 2020', '7268677823'),
('16012', 'Denni', 'Swanson', '16012@student.vgu.edu.vn', '$2y$10$G9Aco8qPcP.acaeKbWRnO.YepV82vVtl7B6WBHg7YdQlN.hIZ7h7e', 'CSE 2020', '3921293983'),
('16013', 'Opa', 'Brewer', '16013@student.vgu.edu.vn', '$2y$10$Y91AQMqhb83U4qOS7ilEfOP4Hk5uslXsHce8XjB6NVM5J/nnLQqGC', 'CSE 2020', '1719042188'),
('16014', 'Vergil', 'Hum', '16014@student.vgu.edu.vn', '$2y$10$5rDiiBIiK6m0NhgD6/gBoOPdtnJqDGyMWt/onIN6MHSTlOrC6kJXy', 'CSE 2020', '3416843886'),
('16015', 'Darlene', 'Sowle', '16015@student.vgu.edu.vn', '$2y$10$vATxqxJ8fALLeKu/u8WfA.XH63rSEZGvC//dqIPPcMC.SkoTqgJ6m', 'CSE 2020', '7290870146'),
('16016', 'Manfred', 'Hodges', '16016@student.vgu.edu.vn', '$2y$10$m6vzwiTZsMOgSlOxpWHdquTzOO3HHVVEj7J8fdSlj3OYXqu9BJCMu', 'CSE 2020', '8980492673'),
('16017', 'Vere', 'Simonds', '16017@student.vgu.edu.vn', '$2y$10$LyOeOCfblxagJ.tvqefmCedxvV0X0hPxkTDNKaUZBNrJ.PWDhSfOi', 'CSE 2020', '8980492673'),
('16018', 'Darlene', 'Fitzgerald', '16018@student.vgu.edu.vn', '$2y$10$JecE/A5XPVMsxZmtfj1i4eQyWENnEyye7gaxoLX/uUHU07/pqJBpC', 'CSE 2020', '8657181118'),
('16019', 'Benjamin', 'Fairbank', '16019@student.vgu.edu.vn', '$2y$10$3HniQSUwfdLjOz9Ck7.voe3EL/F4HtyUZsT4enf8nTCBdabuc8dcO', 'CSE 2020', '5569112608'),
('16020', 'Priscilla', 'Greenwood', '16020@student.vgu.edu.vn', '$2y$10$Y/JjHVuU9MmXME7jDhXuCegb8O6UG7gkSxSoR0kvWwjgv2F/I8yv.', 'CSE 2020', '1207658121'),
('16021', 'Jack', 'Garza', '16021@student.vgu.edu.vn', '$2y$10$nwGef7vEmk0xldQdo92YFeedMGwCDfSr6v.pAfZitael.Ku5ZI4r6', 'CSE 2020', '2491719913'),
('16022', 'Frederic', 'Warner', '16022@student.vgu.edu.vn', '$2y$10$j59AOUMSrH5uirKLY750kexB8FSIV5Iq.Q6sObMJm0qfoJM8/r6Yu', 'CSE 2020', '7176913865'),
('16023', 'Curtis', 'Olson', '16023@student.vgu.edu.vn', '$2y$10$LABPoku6VlP.E84uirIQ1usLD9Yk3RmlwlgedCyQ9c62eshj6hfrC', 'CSE 2020', '8229778619'),
('16024', 'Frederick', 'Warner', '16024@student.vgu.edu.vn', '$2y$10$xi1wfLvmUDIw34orfB8np.iiRtXlr47MlAAueOWLJ05K/Vlixkzsm', 'CSE 2020', '1935459234'),
('16025', 'Trix', 'Schneider', '16025@student.vgu.edu.vn', '$2y$10$PGrimfalGeIn7STkrQcjhOLzVHvuvHosUZxiH7l999q4/xtAknp4i', 'CSE 2020', '2533250070'),
('16026', 'Theodora', 'Fisher', '16026@student.vgu.edu.vn', '$2y$10$M.L101kF.GDm3SKHG65jfuT1pS7uY1QRahpjUeXw5HxLM0ngUVgHK', 'CSE 2020', '4442781089'),
('16027', 'Wren', 'Simon', '16027@student.vgu.edu.vn', '$2y$10$sRLqpbLGwQ7y0Ht43Db11usdGj7lc/iKd6NKZVA8NIFEVF5tqC.Sy', 'CSE 2020', '9020929090'),
('16028', 'Terence', 'Johnston', '16028@student.vgu.edu.vn', '$2y$10$1vCPCXYAIsGQVMX4Bm5Pp.KQezVZD1Y55NN8AxOGG7IWP/Hdmw/w.', 'CSE 2020', '3521517378'),
('16029', 'Terence', 'Johnston', '16029@student.vgu.edu.vn', '$2y$10$YxlZkhA4ykxtFQl47zjQ.uzg4H0SMpgnik.PLi3WJI0Dr7Pdl8lHK', 'CSE 2020', '6882587705'),
('16030', 'Porter', 'Mullins', '16030@student.vgu.edu.vn', '$2y$10$.3kJWE9jrBDyw.oZ2kKNL.GGChWuzBTMDCnv/8Fl8HIjJl1OpZNje', 'CSE 2020', '6776515336'),
('16031', 'Jayleen', 'Phillips', '16031@student.vgu.edu.vn', '$2y$10$xhJRTNLDhPXCfuVctToHb.vLy1RFiNHR5x0risz4CgAlq3790pYim', 'CSE 2020', '8960580595'),
('16032', 'Jaide', 'Good', '16032@student.vgu.edu.vn', '$2y$10$xJZuMGCs4Gm2OUWZh6xJ4uk7riAAAfqtervnhSTG/istVYc2Dhw9y', 'CSE 2020', '9609737400'),
('16033', 'Payton', 'Everett', '16033@student.vgu.edu.vn', '$2y$10$2/pCJEPKB14t29KkKkiQiuobSfpEA8iR7cr.yL0jIWvkxi/w1wpRy', 'CSE 2020', '1184000926'),
('16034', 'Danna', 'Bennett', '16034@student.vgu.edu.vn', '$2y$10$IdM13tFBP4cIzNEi6ihhueTbf/oAHUWvWT/bJBXB1fOMmYERa5nly', 'CSE 2020', '9253275391'),
('16035', 'Ana', 'Rosales', '16035@student.vgu.edu.vn', '$2y$10$qtgj9wdP1KNWY696vJPpUu9Il7UHnXoeqJaJm.6JGy5Ed.i9JG3wS', 'CSE 2020', '3288878579'),
('16036', 'Humberto', 'Morrow', '16036@student.vgu.edu.vn', '$2y$10$KoTFRo1I00RE3EyssoqB1epm9MoOqBWic0igxLiCPuwISCv/4PAwG', 'CSE 2020', '7754562268'),
('16037', 'Reynaldo', 'Sherman', '16037@student.vgu.edu.vn', '$2y$10$e5DC8p5OwqMc2Y0ih9azPeANSwFxKhdc5rCBTSencydA2Ctqda/qu', 'CSE 2020', '6801161584'),
('16038', 'Deborah', 'Stafford', '16038@student.vgu.edu.vn', '$2y$10$G8caXRD7O0tjxGVhj/qnEejldfmiUwDbdXkpx54HmIiyAl03ZCNhq', 'CSE 2020', '7243059035'),
('16039', 'Cristina', 'Moss', '16039@student.vgu.edu.vn', '$2y$10$fpxZaGxskS2y02hvRXiTiO//xNBLI0coJyl9xXc9jakm2LVFNQ0G.', 'CSE 2020', '1184000926'),
('16040', 'Angelo', 'Jackson', '16040@student.vgu.edu.vn', '$2y$10$AtcBztmJlFviAINimRCBX.X/5jYKfF7di0uT53IapZ7ubeZj1t1L.', 'CSE 2020', '7754562268'),
('16041', 'Azul', 'Contreras', '16041@student.vgu.edu.vn', '$2y$10$6Fa6X8aiGSSLqeflN5l/He/97VA1.lCbv149x65Iahp.gPshzJE7i', 'CSE 2020', '2521164091'),
('16042', 'Jeffrey', 'Fischer', '16042@student.vgu.edu.vn', '$2y$10$G7PJhKtuPVhejdjH4tZwN.tgu334I2EbCdQrIMd/bfzCWd3sK51S2', 'CSE 2020', '1184000926'),
('16043', 'Cecilia', 'Newton', '16043@student.vgu.edu.vn', '$2y$10$bHVp/lKrFmiZXFogqDHHcOb08yskQTqFTmIw4j0KtImn2RiwHMj/6', 'CSE 2020', '1750016860'),
('16044', 'Uriel', 'Buckle', '16044@student.vgu.edu.vn', '$2y$10$bHVp/lKrFmiZXFogqDHHcOb08yskQTqFTmIw4j0KtImn2RiwHMj/6', 'CSE 2020', '9253253781'),
('16045', 'Makai', 'Compton', '16045@student.vgu.edu.vn', '$2y$10$C0P55ZQSfR4IsbLRZJXza.YJLC3X/rL.kKuYWOmLOfJmku80Ywn6u', 'CSE 2020', '5914299026'),
('16046', 'Gabriella', 'Mcgrath', '16046@student.vgu.edu.vn', '$2y$10$MbEFCAYqKei1JOYIiRUcxe9mXFqkWvhaEv1PeUQjOz7/DCCLotRUC', 'CSE 2020', '3644024812'),
('16047', 'Azul', 'Contreras', '16047@student.vgu.edu.vn', '$2y$10$MbEFCAYqKei1JOYIiRUcxe9mXFqkWvhaEv1PeUQjOz7/DCCLotRUC', 'CSE 2020', '3486716548'),
('16048', 'Catalina', 'Schmidt', '16048@student.vgu.edu.vn', '$2y$10$UxAnWyNSAkpPl1tK9B.RBu3mKcH5Nn6e9IGMf3Rudqr5ZpCTJ3c4i', 'CSE 2020', '9784226837'),
('16049', 'Rory', 'Hart', '16049@student.vgu.edu.vn', '$2y$10$SrGGKIh1aA.1i2I12PlnjOFb/OZ9HAjnXExgt0EWZB0gjzv8Ua81y', 'CSE 2020', '3002821978'),
('16050', 'Saige', 'Dorsey', '16050@student.vgu.edu.vn', '$2y$10$iKfOUPbC2Se21HHgMqFL2uLLlzqGqMa9J3bL7cihv5LZlSzwV1hra', 'CSE 2020', '5092388205'),
('17000', 'Anh', 'Nguyen', '17000@student.vgu.edu.vn', '$2y$10$/tPiH4nLd9Sa.Xs/ticZuu5EUComt8u.JX1.bXGKcN96VCODiq3oO', 'MEN 2018', '0485849583'),
('17001', 'Bao', 'Tran Ngoc', '17001@student.vgu.edu.vn', '$2y$10$FP97rQJ.b0./RrZYSDzc1uGBVTPQDm6LKPHSwQQslO4B22zA8jWba', 'MEN 2018', '0845447615'),
('17002', 'Danh', 'Nguyen Thanh', '17002@student.vgu.edu.vn', '$2y$10$q8cuZQ50o89mS1CCBd3VFecHlqEkMvwv0KxHYWe11RD3mjlpvQJR2', 'BFA 2018', '0889726547'),
('17003', 'Duy', 'Phan Thanh', '17003@student.vgu.edu.vn', '$2y$10$XvfwD437CfQzt9NyBg6H4ucXl6ErIJ0jMtNEDPNkSa4Ja/Oxfv6pq', 'BBA 2018', '0847124598'),
('17004', 'Hung', 'Tran Dinh', '17004@student.vgu.edu.vn', '$2y$10$ii3ddS5OpHXHEPuX.3c.nOYnbqBWUvL9FL2vmB2QeBajHamaNNqPS', 'BBA 2018', '0882201202'),
('17005', 'Hung', 'Tran Kien', '17005@student.vgu.edu.vn', '$2y$10$tkIdaU0YK1RzKv0JmkGW/eqys.3p/43DRYUkfe.IEI.XU3L8wqFb6', 'ECE 2018', '07982222078'),
('17006', 'Huu', 'Hua Tuan', '17006@student.vgu.edu.vn', '$2y$10$zqnPXsuBA2nSUhyrwV19SuepifnRG6z6/Wm3ljr7IocUQKm/9Ubxa', 'CSE 2018', '0797402598'),
('17007', 'Khang', 'Dang Tuan', '17007@student.vgu.edu.vn', '$2y$10$CuV2v22a8FY7fY3E2WMuMOy.C02u89Fq9BsiVLoAx/jk3NRVu0Ov.', 'ECE 2018', '0904562148'),
('17008', 'Khang', 'Trinh Quoc', '17008@student.vgu.edu.vn', '$2y$10$rYu2VjosfROeibumgQ0QwunxhfJq0Xz70cdnuIDr1soNdn78WCUnu', 'MEN 2018', '097852147'),
('17009', 'Khanh', 'Huynh Quoc', '17009@student.vgu.edu.vn', '$2y$10$mBqcxxn4cC87yVy3ypX86eagoPWYdpYhAOlPNYFSPAFw1Y.GLXZ6e', 'ECE 2018', '0978123852'),
('17010', 'Khoa', 'Vo Tien', '17010@student.vgu.edu.vn', '$2y$10$fcr8n1sU4xe.WaS0elXNkOKCwvYyVwIyvsd1jWEQA6A3x/gEDLwVi', 'CSE 2018', '0865124753'),
('17011', 'Khoa', 'Nguyen Tien', '17011@student.vgu.edu.vn', '$2y$10$8wfbyPo2RUOks1cHfVYZW.ncwoVsi3ooMnHgYK6W.1WZOjJbCnAw6', 'ECE 2018', '0358462159'),
('17012', 'Kien', 'Vu Trung', '17012@student.vgu.edu.vn', '$2y$10$vxxaZqnO1/BRq50h1OxpQ.8p1W.x/qV1piMs0NNagBLaa3.50iQxa', 'ECE 2018', '0785201302'),
('17013', 'Linh', 'Vu Thuy', '17013@student.vgu.edu.vn', '$2y$10$Jkzr/ks7gmcn8z7KXIGMwOmPCcAcULl8tOpqbQktI8DFKgFecZnN2', 'ARC 2018', '0903456142'),
('17014', 'Linh', 'Tran Khanh', '17014@student.vgu.edu.vn', '$2y$10$2FyUsKfkVPSMgpuBVnFjCOHJB8dV9w3OIr4iFs4F30tjWTW.zmjS6', 'CSE 2018', '0902148756'),
('17015', 'Loc', 'Nguyen Dinh', '17015@student.vgu.edu.vn', '$2y$10$8X2Q.ei2PQLLazam6IiVq.jIPVQQ1ES693NSAKez2YiZXKTLIXGea', 'BBA 2018', '0999563258'),
('17016', 'Loi', 'Nguyen Thanh', '17016@student.vgu.edu.vn', '$2y$10$WbjmegP44Z5el.5EsDgye.Nk6J5IhdUEaAac4MvZYboOt4LJnm.Cq', 'BFA 2018', '0994135635'),
('17017', 'Minh', 'Vu Duc', '17017@student.vgu.edu.vn', '$2y$10$hnVlvyQ5rKSoUv5Q86U04es9scoG4VE/PgrgfAc2WfeCYJ30N40qS', 'ARC 2018', '0993547105'),
('17018', 'Minh', 'Tu Le', '17018@student.vgu.edu.vn', '$2y$10$Y0VZTQQh/SoocW6g0BzbLeMzDku.5bd.YWzl7zonYQypPrVcZ5FKm', 'CSE 2018', '0951236235'),
('17019', 'Nhat', 'Bui Minh', '17019@student.vgu.edu.vn', '$2y$10$goTwZwQMUo044r0x3eLlaeVWJ.11Wef.eNpRDHuIyZP0py/VPktDq', 'ECE 2018', '0903745759'),
('17020', 'Nhat', 'Do Minh', '17020@student.vgu.edu.vn', '$2y$10$JaJ71EX5.Xu7eW0DXT5iAu87qN9wlAJpJvXA.tpk00Y8aZrJvteEO', 'CSE 2018', '0992456455'),
('17021', 'Phi', 'Dang Hoang', '17021@student.vgu.edu.vn', '$2y$10$du2vfQ4Tu1Vsk.MQWUkN.ei70TyIWgTGI7GfdkiRQ.J2O6mAO1mwG', 'CSE 2018', '07512364595'),
('17022', 'Phuc', 'Le Hoang', '17022@student.vgu.edu.vn', '$2y$10$Gy4XTqz6Z/lKYGdKIWOZAeE.lgOQlOt2fLBadGxLatF3qSHE.GUx.', 'ECE 2018', '0832056423'),
('17023', 'Thinh', 'Nguyen Tien', '17023@student.vgu.edu.vn', '$2y$10$pe1.cmbQcllrPIZZQ/Pcue8vbgmxyBkBriR1aj5mksEMNld8ljbRq', 'ARC 2018', '0833568567'),
('17024', 'Thinh', 'Nguyen Trung', '17024@student.vgu.edu.vn', '$2y$10$asOD4Llr1L1JijUEWwcLiu296HlEyOVS65NKus6PEU.mTYOcM0HUq', 'ARC 2019', '0825462153'),
('17025', 'Thu', 'Nguyen Vu Anh', '17025@student.vgu.edu.vn', '$2y$10$QndaVRbMnXAjJ85vqUOV5OfEkANBI73VAwH5EV2IfnxW5FpQ9vgVa', 'BFA 2019', '0892464236'),
('17026', 'Tin', 'Huynh Xuan', '17026@student.vgu.edu.vn', '$2y$10$GIXyBbJYKkEOCAFq8akmOuZgEUdGIBOEmPZWOh1GN4pVJDyLL2kFe', 'ECE 2019', '0756349569'),
('17027', 'Tin', 'Vuong Trung', '17027@student.vgu.edu.vn', '$2y$10$8TJO.aT9Gm4ixsNIJQ2OSu44SzFRs3D.CJb4d1tzFvlweoN.TxysO', 'CSE 2019', '0795326459'),
('17028', 'Tran', 'Dang Huyen', '17028@student.vgu.edu.vn', '$2y$10$R7c6nx9ww9kgY7qCEAcxLOl2VhFqOVY4DPIo46d.vbtGlqQ1CaC6a', 'BCE 2019', '0804563256'),
('17029', 'Trang', 'Vu Ngoc Khanh', '17029@student.vgu.edu.vn', '$2y$10$n0R79HSJKq3i/X5KcxmzUeqc71OFLbLjlNoE57/B.Y8u8gIh8vtNu', 'MEN 2019', '0804556124'),
('17030', 'Truc', 'Le Thanh Minh', '17030@student.vgu.edu.vn', '$2y$10$vFqtbifuqFM19B80z0k5eO9sTmQ7nzwQC9EqBMuYmZ.2R95g.jmgO', 'BCE 2019', '0985341345'),
('17031', 'Trieu', 'Diep Hai', '17031@student.vgu.edu.vn', '$2y$10$ZlRpdn8ibuJQzRuUAtws4.yHqzs1yQ.kf9rmfro3af7IuwwUbvlFS', 'MEN 2019', '0863365364'),
('17032', 'Anh', 'Pham Hai', '17032@student.vgu.edu.vn', '$2y$10$0efmnD4cMevqxKKlyT0t8.9nvhuZSJl9N8XgpA/3f/FZPfMb.d7oW', 'BBA 2019', '0863460462'),
('17033', 'Anh', 'Tran Thai Van', '17033@student.vgu.edu.vn', '$2y$10$.guWceaEJnq6w2n8/CzNvejkTwWIGaaB/iuJ82R.WC0jpfpFSw6gy', 'BFA 2019', '0862236254'),
('17034', 'Linh', 'Tang Du', '17034@student.vgu.edu.vn', '$2y$10$o3R8sWE2TIDryoT/0HBmkOZ4GxBtqzJ1pJggAQ1CUdjAH37TsVgz6', 'BFA 2019', '0889264356'),
('17035', 'Toan', 'Le Thai', '17035@student.vgu.edu.vn', '$2y$10$LeON2Yb40pmgZTnqcUzLwevoRwdCprSbhGx5PNnOBlKfyxl8BWX0q', 'BBA 2020', '0793351355'),
('17036', 'Tu', 'Tran Diem', '17036@student.vgu.edu.vn', '$2y$10$u6/eLR3ZC6XWRHFkRDe.CuGq1mvqpGX/.quQtvS.HYzo4CqFPqTvG', 'ECE 2020', '0863446793'),
('17037', 'Tuan', 'Nguyen Dinh Anh', '17037@student.vgu.edu.vn', '$2y$10$5VzITPtsT50NHdFt8AIdNe.fYV53IHtk9P4CFz/G/H1C/cqTZuWNO', 'MEN 2020', '0865456459'),
('17038', 'Thao', 'Pham Ngoc Thanh', '17038@student.vgu.edu.vn', '$2y$10$5VzITPtsT50NHdFt8AIdNe.fYV53IHtk9P4CFz/G/H1C/cqTZuWNO', 'MEN 2020', '0892365978'),
('17039', 'Thu', 'Nguyen Thi Anh', '17039@student.vgu.edu.vn', '$2y$10$y3SEMtbJOJAWxVGNdupR8O7pENv1PMc/h.GDGPy8e4w1wqomkOKaG', 'ARC 2020', '0889365412'),
('17040', 'Tri', 'Bui Minh', '17040@student.vgu.edu.vn', '$2y$10$nN5uZ9eR9RothfF3eOQveeL9Fzym52.HeSadur2I7ZBLQbtfwRQL.', 'ECE 2020', '0812364569'),
('17041', 'Vy', 'Le Nguyen Thuy', '17041@student.vgu.edu.vn', '$2y$10$TVMDbxITIVV51Ao1FDxZ4eO5sIQBiKxF46brbUcIVqwOqAYJuse7W', 'CSE 2020', '0965426498'),
('17042', 'Yen', 'Vu Kim', '17042@student.vgu.edu.vn', '$2y$10$7Ev4iCeiMg1RL1qHeVu30OzsSIK8rpik5yzXkHEoxATK7cQOHNMIa', 'CSE 2020', '0982462364'),
('17043', 'Hung', 'Bui Khanh', '17043@student.vgu.edu.vn', '$2y$10$xWR67vPz/q.CFy1FKqZ3oe1MqbpU6o6SD4AUXFHcG7vbv7NmVvIaC', 'MEN 2020', '0682354142'),
('17044', 'Hieu', 'Dao', '17044@student.vgu.edu.vn', '$2y$10$bOFE55KA3ne6z68FTE.gV.8YoKfw.UyTRV3HRTJG/feVX17oeiQvW', 'MEN 2020', '0346125986'),
('17045', 'Minh', 'Nguyen Hoang', '17045@student.vgu.edu.vn', '$2y$10$SgBqCg/kpYzOBeeqB3BX.eTZ4HCO.YD2bOlKe6g2/LVzAqSk9nLLu', 'BBA 2020', '0982646597'),
('17046', 'Thu', 'Nguyen Hoang Minh', '17046@student.vgu.edu.vn', '$2y$10$YO0uzUIw.r30dvg0o87ze.tZvF1iCk71z4wDjqk08kJI3uzi/vocy', 'BCE 2020', '0997236459'),
('17047', 'Trang', 'Nguyen Ngoc Phuong', '17047@student.vgu.edu.vn', '$2y$10$jRQcT2d8umgS/VL.npbbyeS3H8294cP2I/ehydwX4qCaQ6jTgu76u', 'BFA 2020', '0996455139'),
('17048', 'Bao', 'Dinh Ho Gia', '17048@student.vgu.edu.vn', '$2y$10$PWzmtIGs5seIcKlqHza69udYVBifz3i31reSlSitLzsKfoh5jOn0W', 'CSE 2020', '0951325619'),
('17049', 'Binh', 'Tran Huy', '17049@student.vgu.edu.vn', '$2y$10$Kjnxp.avuP6EMM7jLF5xH.MggNbBHfs98stBxkxygOAYh8Kv8Cs/u', 'ARC 2020', '0356194195'),
('17050', 'Phuoc', 'Nguyen Tan', '17050@student.vgu.edu.vn', '$2y$10$QLnG3tRR/RBgXfnlKZ2ymO7GldxrIOWPRmrZKOpECueiSh.zdC6ui', 'ECE 2020', '0769235648'),
('17051', 'Duy', 'Le Ho Minh', '17051@student.vgu.edu.vn', '$2y$10$k8mRPhAQ1b7.7tVDfwZ.Y.lzDz0CicDA/A4Ik94YJWmBP.PJdCD/G', 'BBA 2020', '0793435635'),
('17965', 'Anh', 'Ba Nguyen Quoc', '17965@student.vgu.edu.vn', '$2y$10$C3VQBIsrUCEt7MgJrgXaieyocmaE4s5fIDKTXdUoZp1neRdKuh7gm', 'CSE 2020', '012345678912'),
('18810', 'Hoan', 'Tran Kim', '18810@student.vgu.edu.vn', '$2y$10$ipVzo/kg0PAgK.5G99APiecbyV1z65a1POHRkmAoi69pZwfD4Xnl2', 'CSE 2020', '0912345678'),
('18812', 'Anh', 'Vu Hoang Tuan', '18812@student.vgu.edu.vn', '$2y$10$MbBCv5GF7SRwGbru78v7OetPmH21ZTjq8FkOpF7iKy2KpAAZ/Kn8u', 'CSE 2020', '098765432198');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int NOT NULL,
  `route` varchar(100) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `route`, `time`, `price`) VALUES
(1, 'Turtle Lake - VGU Campus 06:45 am', '2023-05-22', 100000),
(2, 'VGU Campus - Turtle Lake 04:30 pm', '2023-05-22', 100000),
(3, 'Turtle Lake - VGU Campus 06:45 am', '2023-05-23', 100000),
(4, 'VGU Campus - Turtle Lake 04:30 pm', '2023-05-23', 100000),
(5, 'Turtle Lake - VGU Campus 06:45 am', '2023-05-24', 100000),
(6, 'VGU Campus - Turtle Lake 04:30 pm', '2023-05-24', 100000),
(11, 'Turtle Lake - VGU Campus 06:45 am', '2023-05-31', 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`student_id`,`ticket_id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
