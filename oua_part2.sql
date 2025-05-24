-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 02:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oua_part2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'banana123');

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `JobReferenceNumber` varchar(5) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `StreetAddress` varchar(100) NOT NULL,
  `SuburbTown` varchar(50) NOT NULL,
  `State` char(3) NOT NULL,
  `Postcode` char(4) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Skill1` varchar(50) NOT NULL,
  `Skill2` varchar(50) NOT NULL,
  `OtherSkills` text NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `JobReferenceNumber`, `FirstName`, `LastName`, `StreetAddress`, `SuburbTown`, `State`, `Postcode`, `EmailAddress`, `PhoneNumber`, `Skill1`, `Skill2`, `OtherSkills`, `Status`) VALUES
(1, 'CE451', 'Nathan', 'Kiremitciyan', '64 Flinders Street Mentone', 'Mentone', 'VIC', '3194', 'dwarvenshark@gmail.com', '0491120770', 'CSS', 'JavaScript', 'People Skills', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `JobRef` varchar(10) NOT NULL,
  `JobTitle` varchar(100) NOT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `SalaryRange` varchar(50) DEFAULT NULL,
  `ReportsTo` varchar(100) DEFAULT NULL,
  `PositionType` varchar(50) DEFAULT NULL,
  `Office` varchar(100) DEFAULT NULL,
  `WorkMode` varchar(50) DEFAULT NULL,
  `StartDate` varchar(50) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `CompanyInfo` text DEFAULT NULL,
  `Responsibilities` text DEFAULT NULL,
  `ReportingStructure` text DEFAULT NULL,
  `EssentialSkills` text DEFAULT NULL,
  `PreferredAttributes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`JobRef`, `JobTitle`, `Location`, `SalaryRange`, `ReportsTo`, `PositionType`, `Office`, `WorkMode`, `StartDate`, `Description`, `CompanyInfo`, `Responsibilities`, `ReportingStructure`, `EssentialSkills`, `PreferredAttributes`) VALUES
('CE451', 'Cloud Engineer', 'Hawthorn, Melbourne', '$100,000 - $110,000 per year', 'Senior DevOps Manager', 'Full Time', 'Advanced Technologies Centre', 'Hybrid', 'ASAP', 'We are looking for a motivated Cloud Engineer to join our infrastructure team. You’ll design and manage scalable, secure cloud-based environments across AWS and Azure...', 'Overachieving Underachievers is a global leader in next-generation digital services and consulting...', 'Design cloud infra, CI/CD pipelines, ensure security compliance, monitor systems, and collaborate with dev teams.', 'Reports to Senior DevOps Manager and works with platform engineers, developers, and analysts.', 'Bachelor’s degree in CS, 1–3 yrs cloud experience, scripting, networking, IaC experience (Terraform/CloudFormation)', 'Experience with Kubernetes, certifications (AWS/Azure), Linux/CI/CD, strong problem-solving, good communication.'),
('SD302', 'Software Developer', 'Hawthorn, Melbourne', '$90,000 - $105,000 per year', 'Lead Software Architect', 'Full Time', 'Innovation & Code Centre', 'Hybrid/Flexible', 'Negotiable', 'We’re on the lookout for a capable and creative Software Developer to help us build and maintain scalable codebases...', 'Overachieving Underachievers is a globally recognized provider of effortless solutions, combining sarcasm with scalable tech...', 'Write clean code, sprint planning, test writing, collaborate with designers, document systems.', 'Reports to Lead Software Architect and works with PMs, QA, and DevOps in a multidisciplinary team.', 'Bachelor’s degree in SE/IT, 2+ yrs dev experience, JS + backend lang, Git/APIs/React, CI/CD + Agile experience.', 'Cloud experience (AWS), TypeScript/Docker/serverless, communication, testing tools, and meme appreciation.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`JobRef`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
