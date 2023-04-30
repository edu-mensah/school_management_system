-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2023 at 06:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management_system_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `admin_id` varchar(10) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `other_name` varchar(30) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `bith_date` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `res_address` varchar(30) DEFAULT NULL,
  `pass_word` varchar(255) NOT NULL,
  `hire_date` date DEFAULT curdate(),
  `profile_picture` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`admin_id`, `last_name`, `first_name`, `other_name`, `email`, `phone_number`, `bith_date`, `gender`, `res_address`, `pass_word`, `hire_date`, `profile_picture`) VALUES
('ad201-23', 'adwoa', 'nana', 'addy', 'nanaadwoa@gmail.com', '0545879632', '1997-06-15', 'female', 'ba 75 swedru', '$2y$10$ln74y6KEYENi/9iut2FHo.Z.YXp2m4xtHqUgteVHHDaiuYPsVLpzK', '2023-04-06', 'ad201-23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `student_id` varchar(10) DEFAULT NULL,
  `module_id` varchar(10) DEFAULT NULL,
  `quiz_mark` double DEFAULT NULL,
  `exams_mark` double DEFAULT NULL,
  `grade` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`student_id`, `module_id`, `quiz_mark`, `exams_mark`, `grade`) VALUES
('stu39-23', 'orcl-a1', 35, 55, 'A'),
('stu144-23', 'orcl-a1', 20, 55, 'b+');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_books`
--

CREATE TABLE `assigned_books` (
  `student_id` varchar(10) DEFAULT NULL,
  `book_id` varchar(10) DEFAULT NULL,
  `assigned_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `batch_id` varchar(10) NOT NULL,
  `start_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `instructor_id` varchar(10) DEFAULT NULL,
  `completion_status` varchar(5) DEFAULT 'NO',
  `class_time` varchar(30) DEFAULT NULL,
  `batch_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batch_id`, `start_date`, `completion_date`, `instructor_id`, `completion_status`, `class_time`, `batch_name`) VALUES
('bg1452', '2023-04-02', '2024-02-13', 'ins210-23', 'no', 'weekends 08am - 04pm', 'database 10 - 12'),
('bg311-23', '2023-04-02', '2023-05-01', 'ins210-23', 'no', 'week days 10am - 12pm', 'graphics and web design 10 - 12');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` varchar(10) NOT NULL,
  `book_title` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `quantity`) VALUES
('dbt 102', 'database concepts', 10),
('gwd 142', 'introduction to graph design', 12);

-- --------------------------------------------------------

--
-- Table structure for table `class_times`
--

CREATE TABLE `class_times` (
  `class_id` int(11) NOT NULL,
  `class_time` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_times`
--

INSERT INTO `class_times` (`class_id`, `class_time`) VALUES
(1, 'week days 10am - 12pm'),
(2, 'weekends 08am - 04pm');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(10) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `course_fee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_title`, `course_fee`) VALUES
('dbt', 'database technology', 6500),
('gwd', 'graphics and web design', 4500),
('se', 'software enigneering', 4520);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` varchar(10) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `other_names` varchar(30) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `res_address` varchar(30) DEFAULT NULL,
  `pass_word` varchar(255) NOT NULL,
  `hire_date` date DEFAULT curdate(),
  `course_id` varchar(10) DEFAULT NULL,
  `profile_picture` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `last_name`, `first_name`, `other_names`, `email`, `phone_number`, `birth_date`, `gender`, `res_address`, `pass_word`, `hire_date`, `course_id`, `profile_picture`) VALUES
('ins117-23', 'mensah', 'edu', '', 'edu@gmail.com', '0214586932', '2000-10-10', 'male', 'SD 4751', '$2y$10$p6X5QxyL7tvvPDQ6alpQXOrJIvKZ2/kF6jQA0.rxp52TyCV/pH.Ri', '2020-10-10', 'dbt', 'ins117-23.jpg'),
('ins210-23', 'sam', 'romio', 'kwame', 'romio@gmail.com', '024578965', '1999-02-12', 'male', 'CC - 1245', '123456789', '2023-04-07', NULL, 'ins210-23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_id` varchar(10) NOT NULL,
  `module_title` varchar(50) DEFAULT NULL,
  `course_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module_title`, `course_id`) VALUES
('orcl-a1', 'oracle administration workshop 1', 'dbt');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_header` varchar(30) DEFAULT NULL,
  `notice_body` text DEFAULT NULL,
  `notice_picture` varchar(50) DEFAULT NULL,
  `notice_by` varchar(10) DEFAULT NULL,
  `notice_to` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_header`, `notice_body`, `notice_picture`, `notice_by`, `notice_to`) VALUES
(1, 'courses registration', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque earum illum recusandae sed. Assumenda eveniet esse minus dignissimos, quae cumque reprehenderit nostrum rerum perspiciatis officiis laboriosam consectetur quam ratione consequatur autem eos provident harum aut ipsam mollitia omnis vitae aperiam? Libero consectetur aliquid, unde deserunt quam rem autem odit quae.', NULL, 'ad201-23', 'all students'),
(2, 'Collection of books', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque earum illum recusandae sed. Assumenda eveniet esse minus dignissimos, quae cumque reprehenderit nostrum rerum perspiciatis officiis laboriosam consectetur quam ratione consequatur autem eos provident harum aut ipsam mollitia omnis vitae aperiam? Libero consectetur aliquid, unde deserunt quam rem autem odit quae.', NULL, 'ad201-23', 'all students');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `recieved_by` varchar(10) DEFAULT NULL,
  `date_paid` date DEFAULT curdate(),
  `amount` double NOT NULL,
  `balance` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `student_id`, `recieved_by`, `date_paid`, `amount`, `balance`) VALUES
(1, 'stu39-23', 'ad201-23', '2023-04-24', 1200, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(10) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `other_names` varchar(30) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `res_address` varchar(30) DEFAULT NULL,
  `pass_word` varchar(255) NOT NULL,
  `guardian_name` varchar(50) NOT NULL,
  `guardian_contact` varchar(60) NOT NULL,
  `batch_id` varchar(10) DEFAULT NULL,
  `course_id` varchar(10) DEFAULT NULL,
  `profile_picture` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `last_name`, `first_name`, `other_names`, `email`, `phone_number`, `birth_date`, `gender`, `res_address`, `pass_word`, `guardian_name`, `guardian_contact`, `batch_id`, `course_id`, `profile_picture`) VALUES
('stu144-23', 'anag-bey', 'kwame', '', 'bey@gmail.com', '0245879658', '1990-10-10', 'male', 'CD - 4573', '$2y$10$eBht/wh/Set2Wri4nBiE0urD9LrU90GuLZd3RccqFaATwvnZsAHly', 'kweku bey', '0245784578', 'bg311-23', 'gwd', 'stu144-23.jpg'),
('stu39-23', 'bonney', 'yaw', 'blay', 'yaw@gmail.com', '0245245802', '2000-10-10', 'male', 'CD 454', '$2y$10$gLTHPx1f5A3so52qZvDzA.Uwsc7FjT1V06t7TFlUHHqDJ05IQmtCu', 'kweku blay', '0242545875', 'bg1452', 'gwd', 'stu39-23.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD KEY `FK_assessments_students` (`student_id`),
  ADD KEY `FK_assessments_modules` (`module_id`);

--
-- Indexes for table `assigned_books`
--
ALTER TABLE `assigned_books`
  ADD KEY `FK_assigned_books_students` (`student_id`),
  ADD KEY `FK_assigned_books_books` (`book_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batch_id`),
  ADD KEY `FK_batches_instructors` (`instructor_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `class_times`
--
ALTER TABLE `class_times`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`),
  ADD KEY `FK_instructors_course` (`course_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`),
  ADD KEY `FK_modules_courses` (`course_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `FK_payments_administrators` (`recieved_by`),
  ADD KEY `FK_students_payments` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_times`
--
ALTER TABLE `class_times`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `FK_assessments_modules` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_id`),
  ADD CONSTRAINT `FK_assessments_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `assigned_books`
--
ALTER TABLE `assigned_books`
  ADD CONSTRAINT `FK_assigned_books_books` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `FK_assigned_books_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `FK_batches_instructors` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`);

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `FK_instructors_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `FK_instructors_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `FK_modules_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FK_payments_administrators` FOREIGN KEY (`recieved_by`) REFERENCES `administrators` (`admin_id`),
  ADD CONSTRAINT `FK_students_payments` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `FK_students_batches` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`batch_id`),
  ADD CONSTRAINT `FK_students_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
