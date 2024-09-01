-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 11:40 PM
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
-- Database: `edumanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `task_link` varchar(255) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `student_id`, `course_id`, `lecture_id`, `task_link`, `submission_date`, `updated_at`, `feedback`) VALUES
(18, 86, 1, 11, 'https://drive.google.com/drive/folders/124fOy2FtZYP6SmgluWP6NudyV7P7PWHs?usp=sharing', '2024-09-01 07:14:38', '2024-09-01 07:14:58', NULL),
(19, 97, 1, 11, 'https://drive.google.com/drive/folders/1NakHhF7x0EjdOljdX6Dd0bjJdRBMEnCJ?usp=sharing', '2024-09-01 07:16:23', '2024-09-01 07:16:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `year` enum('First Year','Second Year','Third Year','Fourth Year') NOT NULL,
  `major` enum('Arabic Language','Geography','Chemistry','Physics','English Language','French Language','Science','Social Studies','Biology','Mathematics') NOT NULL,
  `lecture_times` varchar(255) DEFAULT NULL,
  `lecturer_name` varchar(255) DEFAULT 'Dr. Hashem Fathallah',
  `lecture_location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `year`, `major`, `lecture_times`, `lecturer_name`, `lecture_location`) VALUES
(1, 'Teaching Profession and Teacher Roles', 'First Year', 'Arabic Language', 'Monday 10:00 AM - 12:00 PM', 'Dr. Hashem Fathallah', 'Room 101'),
(2, 'Teaching Profession and Teacher Roles', 'First Year', 'Geography', 'Tuesday 2:00 PM - 4:00 PM', 'Dr. Hashem Fathallah', 'Room 102'),
(3, 'Teaching Profession and Teacher Roles', 'First Year', 'Chemistry', 'Wednesday 9:00 AM - 11:00 AM', 'Dr. Hashem Fathallah', 'Room 103'),
(4, 'Teaching Profession and Teacher Roles', 'First Year', 'Physics', 'Thursday 1:00 PM - 3:00 PM', 'Dr. Hashem Fathallah', 'Room 104'),
(5, 'Teaching Profession and Teacher Roles', 'First Year', 'English Language', 'Friday 10:00 AM - 12:00 PM', 'Dr. Hashem Fathallah', 'Room 105'),
(6, 'Education and Contemporary Issues', 'Second Year', 'Arabic Language', 'Monday 2:00 PM - 4:00 PM', 'Dr. Hashem Fathallah', 'Room 201'),
(7, 'Education and Contemporary Issues', 'Second Year', 'French Language', 'Tuesday 11:00 AM - 1:00 PM', 'Dr. Hashem Fathallah', 'Room 202'),
(8, 'Principles of Adult Education', 'Third Year', 'Science', 'Wednesday 3:00 PM - 5:00 PM', 'Dr. Hashem Fathallah', 'Room 301'),
(9, 'Principles of Adult Education', 'Third Year', 'Social Studies', 'Thursday 10:00 AM - 12:00 PM', 'Dr. Hashem Fathallah', 'Room 302'),
(10, 'Principles of Adult Education', 'Third Year', 'Arabic Language', 'Friday 1:00 PM - 3:00 PM', 'Dr. Hashem Fathallah', 'Room 303'),
(11, 'Principles of Adult Education', 'Third Year', 'English Language', 'Monday 10:00 AM - 12:00 PM', 'Dr. Hashem Fathallah', 'Room 304'),
(12, 'Principles of Education', 'Fourth Year', 'Arabic Language', 'Tuesday 2:00 PM - 4:00 PM', 'Dr. Hashem Fathallah', 'Room 401'),
(13, 'Principles of Education', 'Fourth Year', 'English Language', 'Wednesday 9:00 AM - 11:00 AM', 'Dr. Hashem Fathallah', 'Room 402'),
(14, 'Principles of Education', 'Fourth Year', 'Geography', 'Thursday 1:00 PM - 3:00 PM', 'Dr. Hashem Fathallah', 'Room 403'),
(15, 'Principles of Education', 'Fourth Year', 'Chemistry', 'Friday 10:00 AM - 12:00 PM', 'Dr. Hashem Fathallah', 'Room 404'),
(16, 'Principles of Education', 'Fourth Year', 'Biology', 'Monday 2:00 PM - 4:00 PM', 'Dr. Hashem Fathallah', 'Room 405'),
(17, 'Principles of Education', 'Fourth Year', 'Mathematics', 'Tuesday 11:00 AM - 1:00 PM', 'Dr. Hashem Fathallah', 'Room 406');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `exam_date` date DEFAULT curdate(),
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `total_marks` int(11) NOT NULL,
  `passing_marks` int(11) NOT NULL,
  `exam_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_name`, `course_id`, `exam_date`, `start_time`, `end_time`, `total_marks`, `passing_marks`, `exam_link`) VALUES
(2, 'newww exam', 1, '2024-08-30', '08:00:00', '12:00:00', 20, 10, 'https://docs.google.com/forms/d/e/1FAIpQLScvPs7oAhdFXVYs6V75PUhyCshQMI85UjiVrSQZLitELysKcQ/viewform?usp=sf_link'),
(3, 'new exam', 6, '2024-08-30', '09:00:00', '11:00:00', 20, 10, 'https://docs.google.com/forms/d/e/1FAIpQLScvPs7oAhdFXVYs6V75PUhyCshQMI85UjiVrSQZLitELysKcQ/viewform?usp=sf_link'),
(11, 'new exam eraasoft', 1, '2024-09-01', '08:00:00', '12:00:00', 20, 10, 'https://docs.google.com/forms/d/e/1FAIpQLScvPs7oAhdFXVYs6V75PUhyCshQMI85UjiVrSQZLitELysKcQ/viewform?usp=sf_link');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `lecture_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL DEFAULT 2,
  `topic` varchar(255) NOT NULL,
  `drive_link` varchar(255) DEFAULT NULL,
  `lecture_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lecture_id`, `course_id`, `professor_id`, `topic`, `drive_link`, `lecture_date`) VALUES
(11, 1, 2, 'eraaasoft topic', 'https://drive.google.com/drive/folders/108Y50EJUofADI7kMFBeppw_m2BT05E5T?usp=sharing', '2024-09-01 10:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `professor_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`professor_id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `department`, `created_at`, `updated_at`) VALUES
(2, 'Hashem', 'Fathallah', 'hashem@gmail.com', '123456789', '0123456789', 'Philosophy and Psychology', '2024-08-29 00:32:54', '2024-08-29 00:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed', 'Ali', 'ahmed.ali1@gmail.com', '123456789', '01011122334', 2, '2024-08-29 02:00:16', '2024-08-31 06:38:46'),
(6, 'Ahmed', 'Sayed', 'ahmed.sayed1@gmail.com', '123456789', '01066778899', 2, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(7, 'Sara', 'Nabil', 'sara.nabil1@gmail.com', '123456789', '01077889900', 2, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(8, 'Mohamed', 'Mokhtar', 'mohamed.mokhtar2@gmail.com', '123456789', '01088990011', 2, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(9, 'Laila', 'Ali', 'laila.ali2@gmail.com', '123456789', '01099001122', 2, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(10, 'Omar', 'Khaled', 'omar.khaled2@gmail.com', '123456789', '01100112233', 2, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(11, 'Amina', 'Saleh', 'amina.saleh1@gmail.com', '123456789', '01111223344', 3, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(12, 'Hassan', 'Jamal', 'hassan.jamal1@gmail.com', '123456789', '01122334455', 3, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(13, 'Layla', 'Yousef', 'layla.yousef1@gmail.com', '123456789', '01133445566', 3, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(14, 'Tariq', 'Hassan', 'tariq.hassan1@gmail.com', '123456789', '01144556677', 3, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(15, 'Salma', 'Omar', 'salma.omar1@gmail.com', '123456789', '01155667788', 3, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(16, 'Youssef', 'Khaled', 'youssef.khaled1@gmail.com', '123456789', '01166778899', 4, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(17, 'Hanan', 'Fouad', 'hanan.fouad1@gmail.com', '123456789', '01177889900', 4, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(18, 'Ibrahim', 'Nasr', 'ibrahim.nasr1@gmail.com', '123456789', '01188990011', 4, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(19, 'Nadia', 'Saleh', 'nadia.saleh1@gmail.com', '123456789', '01199001122', 4, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(20, 'Othman', 'Youssef', 'othman.youssef1@gmail.com', '123456789', '01200112233', 4, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(21, 'Yasser', 'Khalil', 'yasser.khalil1@gmail.com', '123456789', '01211223344', 5, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(22, 'Noor', 'Mohammed', 'noor.mohammed1@gmail.com', '123456789', '01222334455', 5, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(23, 'Hadi', 'Amin', 'hadi.amin1@gmail.com', '123456789', '01233445566', 5, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(24, 'Mariam', 'Saad', 'mariam.saad1@gmail.com', '123456789', '01244556677', 5, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(25, 'Rasha', 'Said', 'rasha.said1@gmail.com', '123456789', '01255667788', 5, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(26, 'Youssef', 'Khaled', 'youssef.khaled2@gmail.com', '123456789', '01266778899', 2, '2024-08-29 02:00:16', '2024-08-31 08:02:00'),
(27, 'Hanan', 'Fouad', 'hanan.fouad2@gmail.com', '123456789', '01277889900', 6, '2024-08-29 02:00:16', '2024-08-31 08:09:10'),
(28, 'Ibrahim', 'Nasr', 'ibrahim.nasr2@gmail.com', '123456789', '01288990011', 6, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(29, 'Nadia', 'Saleh', 'nadia.saleh2@gmail.com', '123456789', '01299001122', 6, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(30, 'Othman', 'Youssef', 'othman.youssef2@gmail.com', '123456789', '01300112233', 6, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(31, 'Ali', 'Gamal', 'ali.gamal1@gmail.com', '123456789', '01311223344', 7, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(32, 'Mona', 'Elsayed', 'mona.elsayed1@gmail.com', '123456789', '01322334455', 7, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(33, 'Hossam', 'Fathy', 'hossam.fathy1@gmail.com', '123456789', '01333445566', 7, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(34, 'Rania', 'Zaki', 'rania.zaki1@gmail.com', '123456789', '01344556677', 7, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(35, 'Said', 'Mohsen', 'said.mohsen1@gmail.com', '123456789', '01355667788', 7, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(36, 'Yasser', 'Khalil', 'yasser.khalil2@gmail.com', '123456789', '01366778899', 8, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(37, 'Noor', 'Mohammed', 'noor.mohammed2@gmail.com', '123456789', '01377889900', 8, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(38, 'Hadi', 'Amin', 'hadi.amin2@gmail.com', '123456789', '01388990011', 8, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(39, 'Mariam', 'Saad', 'mariam.saad2@gmail.com', '123456789', '01399001122', 8, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(40, 'Rasha', 'Said', 'rasha.said2@gmail.com', '123456789', '01400112233', 8, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(41, 'Ayman', 'Gaber', 'ayman.gaber1@gmail.com', '123456789', '01411223344', 9, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(42, 'Fatima', 'Hassan', 'fatima.hassan1@gmail.com', '123456789', '01422334455', 9, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(43, 'Sami', 'Farid', 'sami.farid1@gmail.com', '123456789', '01433445566', 9, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(44, 'Huda', 'Shahin', 'huda.shahin1@gmail.com', '123456789', '01444556677', 9, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(45, 'Jamal', 'Aly', 'jamal.aly1@gmail.com', '123456789', '01455667788', 9, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(46, 'Ibrahim', 'Youssef', 'ibrahim.youssef1@gmail.com', '123456789', '01466778899', 10, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(47, 'Mona', 'Elkady', 'mona.elkady1@gmail.com', '123456789', '01477889900', 10, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(48, 'Omar', 'Saeed', 'omar.saeed1@gmail.com', '123456789', '01488990011', 10, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(49, 'Dalia', 'Kamal', 'dalia.kamal1@gmail.com', '123456789', '01499001122', 10, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(50, 'Ali', 'Mohamed', 'ali.mohamed1@gmail.com', '123456789', '01500112233', 10, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(51, 'Rami', 'Khalil', 'rami.khalil1@gmail.com', '123456789', '01511223344', 11, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(52, 'Hala', 'Omar', 'hala.omar1@gmail.com', '123456789', '01522334455', 11, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(53, 'Ziad', 'Mokhtar', 'ziad.mokhtar1@gmail.com', '123456789', '01533445566', 11, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(54, 'Samira', 'Elgazar', 'samira.elgazar1@gmail.com', '123456789', '01544556677', 11, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(55, 'Karim', 'Salem', 'karim.salem1@gmail.com', '123456789', '01555667788', 11, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(56, 'Rania', 'Sayed', 'rania.sayed1@gmail.com', '123456789', '01566778899', 12, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(57, 'Youssef', 'Mahmoud', 'youssef.mahmoud1@gmail.com', '123456789', '01577889900', 12, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(58, 'Nadia', 'Hussein', 'nadia.hussein1@gmail.com', '123456789', '01588990011', 12, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(59, 'Ibrahim', 'Sherif', 'ibrahim.sherif1@gmail.com', '123456789', '01599001122', 12, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(60, 'Mona', 'Amin', 'mona.amin1@gmail.com', '123456789', '01600112233', 12, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(61, 'Hossam', 'Othman', 'hossam.othman1@gmail.com', '123456789', '01611223344', 13, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(62, 'Nour', 'Farouk', 'nour.farouk1@gmail.com', '123456789', '01622334455', 13, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(63, 'Rami', 'Mohsen', 'rami.mohsen1@gmail.com', '123456789', '01633445566', 13, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(64, 'Heba', 'Khaled', 'heba.khaled1@gmail.com', '123456789', '01644556677', 13, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(65, 'Ahmed', 'Gad', 'ahmed.gad1@gmail.com', '123456789', '01655667788', 13, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(66, 'Dina', 'Sami', 'dina.sami1@gmail.com', '123456789', '01666778899', 14, '2024-08-29 02:00:16', '2024-08-31 15:04:39'),
(69, 'Rania', 'Hussein', 'rania.hussein2@gmail.com', '123456789', '01699001122', 14, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(70, 'Omar', 'Gaber', 'omar.gaber2@gmail.com', '123456789', '01700112233', 14, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(71, 'Nadia', 'Shahin', 'nadia.shahin1@gmail.com', '123456789', '01711223344', 15, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(72, 'Tariq', 'Gamal', 'tariq.gamal1@gmail.com', '123456789', '01722334455', 15, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(73, 'Hanan', 'Khalil', 'hanan.khalil2@gmail.com', '123456789', '01733445566', 15, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(74, 'Ibrahim', 'Saleh', 'ibrahim.saleh1@gmail.com', '123456789', '01744556677', 15, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(75, 'Huda', 'Omar', 'huda.omar2@gmail.com', '123456789', '01755667788', 15, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(76, 'Salma', 'Mokhtar', 'salma.mokhtar2@gmail.com', '123456789', '01766778899', 16, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(77, 'Ayman', 'Fouad', 'ayman.fouad2@gmail.com', '123456789', '01777889900', 16, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(78, 'Ziad', 'Mohamed', 'ziad.mohamed2@gmail.com', '123456789', '01788990011', 16, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(79, 'Fatima', 'Nasr', 'fatima.nasr2@gmail.com', '123456789', '01799001122', 16, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(80, 'Ali', 'Fathy', 'ali.fathy2@gmail.com', '123456789', '01800112233', 16, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(81, 'Khaled', 'Salem', 'khaled.salem2@gmail.com', '123456789', '01811223344', 17, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(82, 'Mona', 'Mohamed', 'mona.mohamed2@gmail.com', '123456789', '01822334455', 17, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(83, 'Rami', 'Gaber', 'rami.gaber3@gmail.com', '123456789', '01833445566', 17, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(84, 'Hassan', 'Khalil', 'hassan.khalil3@gmail.com', '123456789', '01844556677', 17, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(85, 'Sama', 'Zaki', 'sama.zaki2@gmail.com', '123456789', '01855667788', 17, '2024-08-29 02:00:16', '2024-08-29 02:00:16'),
(86, 'omar ', 'hashem', 'omarhashem20051310@gmail.com', '123456789', '01068296014', 1, '2024-08-31 08:02:28', '2024-08-31 08:02:28'),
(97, 'eraa', 'soft', 'eraasoft@gmail.com', '123456789', '01008138042', 1, '2024-09-01 07:15:51', '2024-09-01 07:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` enum('Open','In Progress','Closed') DEFAULT 'Open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `student_id`, `course_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(2, 86, 1, 'new message', 'Open', '2024-08-31 15:08:35', '2024-08-31 15:08:35'),
(3, 86, 1, 'nijoij', 'Open', '2024-08-31 15:54:42', '2024-08-31 15:54:42'),
(6, 86, 1, 'new support eraasoft', 'Open', '2024-09-01 07:17:38', '2024-09-01 07:17:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `assignments_ibfk_1` (`student_id`),
  ADD KEY `assignments_ibfk_3` (`lecture_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`lecture_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `professor_id` (`professor_id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`professor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `support_ibfk_1` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `assignments_ibfk_3` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`lecture_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_ibfk_4` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `lectures_ibfk_2` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`professor_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `support_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `support_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
