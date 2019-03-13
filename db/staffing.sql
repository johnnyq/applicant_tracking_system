-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 12, 2018 at 11:34 AM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `staffing`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `birth_day` date NOT NULL,
  `social_security` varchar(20) NOT NULL,
  `candidate_avatar` varchar(255) NOT NULL,
  `location_applied_at` int(11) NOT NULL,
  `agree_terms` tinyint(1) NOT NULL,
  `current_status` varchar(255) NOT NULL,
  `online` int(11) NOT NULL,
  `last_login` int(11) NOT NULL,
  `candidate_created_at` int(11) NOT NULL,
  `candidate_updated_at` int(11) DEFAULT NULL,
  `candidate_updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_education`
--

CREATE TABLE `candidate_education` (
  `education_id` int(11) NOT NULL,
  `education_type` varchar(255) NOT NULL,
  `education_name` varchar(255) NOT NULL,
  `education_address` varchar(255) NOT NULL,
  `education_city` varchar(255) NOT NULL,
  `education_state` varchar(255) NOT NULL,
  `education_zip` varchar(255) NOT NULL,
  `education_date_from` date NOT NULL,
  `education_date_to` date NOT NULL,
  `graduate` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `candidate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_emergency_contacts`
--

CREATE TABLE `candidate_emergency_contacts` (
  `emergency_contact_id` int(11) NOT NULL,
  `emergency_contact_name` varchar(250) NOT NULL,
  `emergency_contact_relationship` varchar(250) NOT NULL,
  `emergency_contact_phone` varchar(250) NOT NULL,
  `candidate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_employment`
--

CREATE TABLE `candidate_employment` (
  `employment_id` int(11) NOT NULL,
  `employment_company` varchar(255) NOT NULL,
  `employment_address` varchar(255) NOT NULL,
  `employment_city` varchar(255) NOT NULL,
  `employment_state` varchar(255) NOT NULL,
  `employment_zip` varchar(255) NOT NULL,
  `employment_phone` varchar(255) NOT NULL,
  `employment_supervisor` varchar(255) NOT NULL,
  `employment_job_title` varchar(255) NOT NULL,
  `employment_starting_salary` float NOT NULL,
  `employment_ending_salary` float NOT NULL,
  `employment_responsibilities` text NOT NULL,
  `employment_date_from` date NOT NULL,
  `employment_date_to` date NOT NULL,
  `employment_reason_for_leave` text NOT NULL,
  `employment_allow_contact` varchar(255) NOT NULL,
  `candidate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_references`
--

CREATE TABLE `candidate_references` (
  `reference_id` int(11) NOT NULL,
  `reference_name` varchar(255) NOT NULL,
  `reference_relationship` varchar(255) NOT NULL,
  `reference_company` varchar(255) NOT NULL,
  `reference_address` varchar(255) NOT NULL,
  `reference_city` varchar(255) NOT NULL,
  `reference_state` varchar(255) NOT NULL,
  `reference_zip` varchar(255) NOT NULL,
  `reference_phone` varchar(255) NOT NULL,
  `candidate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_work_history`
--

CREATE TABLE `candidate_work_history` (
  `work_history_id` int(11) NOT NULL,
  `work_history_job` varchar(255) NOT NULL,
  `hired_date` int(11) NOT NULL,
  `start_date` int(11) NOT NULL,
  `showed_up` int(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_address` varchar(200) NOT NULL,
  `company_city` varchar(200) NOT NULL,
  `company_state` varchar(2) NOT NULL,
  `company_zip` varchar(5) NOT NULL,
  `company_created_at` int(11) NOT NULL,
  `company_updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_title` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_created_at` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `event_created_at` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_location` varchar(255) NOT NULL,
  `uploaded_at` int(11) NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `job_openings` int(11) NOT NULL,
  `job_created_at` int(11) NOT NULL,
  `job_created_by` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `location_address` varchar(255) NOT NULL,
  `location_city` varchar(255) NOT NULL,
  `location_state` varchar(255) NOT NULL,
  `location_zip` varchar(255) NOT NULL,
  `location_timezone` varchar(255) NOT NULL,
  `location_created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `note_created_at` int(11) NOT NULL,
  `note_created_by` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `title` varchar(250) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `current_location_id` int(11) NOT NULL,
  `online` int(11) NOT NULL,
  `last_login` int(11) NOT NULL,
  `user_created` int(11) NOT NULL,
  `user_modified` int(11) DEFAULT NULL,
  `user_access` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `candidate_education`
--
ALTER TABLE `candidate_education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `candidate_emergency_contacts`
--
ALTER TABLE `candidate_emergency_contacts`
  ADD PRIMARY KEY (`emergency_contact_id`);

--
-- Indexes for table `candidate_employment`
--
ALTER TABLE `candidate_employment`
  ADD PRIMARY KEY (`employment_id`);

--
-- Indexes for table `candidate_references`
--
ALTER TABLE `candidate_references`
  ADD PRIMARY KEY (`reference_id`);

--
-- Indexes for table `candidate_work_history`
--
ALTER TABLE `candidate_work_history`
  ADD PRIMARY KEY (`work_history_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_education`
--
ALTER TABLE `candidate_education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_emergency_contacts`
--
ALTER TABLE `candidate_emergency_contacts`
  MODIFY `emergency_contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_employment`
--
ALTER TABLE `candidate_employment`
  MODIFY `employment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_references`
--
ALTER TABLE `candidate_references`
  MODIFY `reference_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_work_history`
--
ALTER TABLE `candidate_work_history`
  MODIFY `work_history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
