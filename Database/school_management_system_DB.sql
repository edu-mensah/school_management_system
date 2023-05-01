-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2023 at 12:44 AM
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
('ad201-23', 'adwoa', 'nana', 'addy', 'nanaadwoa@gmail.com', '0254785452', '1997-06-15', 'female', 'ba 75 swedru', '$2y$10$ln74y6KEYENi/9iut2FHo.Z.YXp2m4xtHqUgteVHHDaiuYPsVLpzK', '2023-04-06', 'ad201-23.jpg');

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
('bg1452', '2023-04-02', '2024-01-02', 'ins117-23', 'no', 'weekends 08am - 04pm', 'database 10 - 12'),
('bg311-23', '2020-12-20', '2023-05-01', 'ins912-23', 'no', 'week days 10am - 12pm', 'graphics and web design 10 - 12'),
('bg399-23', '2021-05-20', '2022-05-20', 'ins117-23', 'no', 'week days 08am - 10am', 'database'),
('bg506-23', '2023-10-20', '2024-10-20', 'ins210-23', 'no', 'weekends 08am - 04pm', 'software engineering'),
('bg679-23', '2023-10-02', '2024-10-02', 'ins807-23', 'yes', 'weekends 08am - 04pm', 'foundation 10 - 12');

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
('dbadw2', 'oracle administration workshop 2', 9),
('dbt 102', 'database concepts', 31),
('gwd 142', 'introduction to graph design', 12),
('ms41', 'microsoft office', 12);

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
(2, 'weekends 08am - 04pm'),
(3, 'week days 1pm - 3pm'),
(4, 'week days 08am - 10am'),
(5, 'week days 3pm - 5pm');

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
('cs12', 'cyber security', 4200),
('dbt', 'database technology', 6500),
('fnd', 'Foundation', 1250),
('gwd', 'graphics and web design', 4500),
('hwe', 'hardware and networking', 4520),
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
('ins117-23', 'mensah', 'edu', '', 'edu@gmail.com', '0214586932', '2000-10-10', 'male', 'SD 4751', '$2y$10$th0kA53WVktiUsTAM9cwIubD8tXZJP7EupSy/55JcHt6xkCnAKH6e', '2020-10-10', 'dbt', 'ins117-23.jpg'),
('ins210-23', 'sam', 'romio', 'kwame', 'romio@gmail.com', '024578965', '1999-02-12', 'male', 'CC - 1245', '123456789', '2023-04-07', NULL, 'ins210-23.jpg'),
('ins807-23', 'mensah', 'lydia', 'abena', 'lydia@gmail.com', '0245896587', '1999-10-10', 'female', 'CA - 4582', '$2y$10$ZeIsFaK06tjBgfLjd29PKO508csG351jfToijWhvDsgU7w8l25q2W', '2020-10-10', 'gwd', 'ins807-23.jpg'),
('ins912-23', 'eduful', 'seth', '', 'eduful@gmail.com', '0245879658', '2000-04-21', 'female', '', '$2y$10$.jRrGdxaURLgn1.PQiePKe5tc9gl1qzLenbjuGInPSuJueMl6/jWu', '2020-05-10', 'se', 'ins912-23.jpg'),
('ins93-23', 'appiah', 'philip', 'yaw', 'appiahyaw@gmail.com', '0254785475', '1995-05-20', 'male', 'kwapro', '$2y$10$LXK8g5EiNjxK8.hoxcOziuJMaknLenol3un.UFzPMnTwuK9vEgIJ.', '2020-02-22', 'cs12', 'ins93-23.jpg');

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
('dtc14', 'database concepts', 'dbt'),
('hwd102', 'introduction', 'hwe'),
('int45', 'introduction to cyber security', 'cs12'),
('msof', 'microsoft office suit', 'fnd'),
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
(2, 'Collection of books', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque earum illum recusandae sed. Assumenda eveniet esse minus dignissimos, quae cumque reprehenderit nostrum rerum perspiciatis officiis laboriosam consectetur quam ratione consequatur autem eos provident harum aut ipsam mollitia omnis vitae aperiam? Libero consectetur aliquid, unde deserunt quam rem autem odit quae.', NULL, 'ad201-23', 'all students'),
(3, 'instructors meeting', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque earum illum recusandae sed. Assumenda eveniet esse minus dignissimos, quae cumque reprehenderit nostrum rerum perspiciatis officiis laboriosam consectetur quam ratione consequatur autem eos provident harum aut ipsam mollitia omnis vitae aperiam? Libero consectetur aliquid, unde deserunt quam rem autem odit q', NULL, 'ad201-23', 'all instructors');

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
(1, 'stu39-23', 'ad201-23', '2023-04-24', 1200, NULL),
(2, 'stu39-23', 'ad201-23', '2023-04-30', 2000, NULL),
(3, 'stu144-23', 'ad201-23', '2023-04-30', 2500, NULL),
(4, 'stu231-23', 'ad201-23', '2023-04-30', 1200, NULL);

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
('stu110-23', 'bonney', 'philip', 'kweku', 'phil@gmail.com', '0254785468', '1995-02-20', 'male', 'winneba', '$2y$10$bkvuh.sBCo9NTzTfBy33Ne0xsGtR.gLQnZS.qlYVCymYjnZFX8PJi', 'mary bonney', '024586584', 'bg1452', 'dbt', 'stu110-23.jpeg'),
('stu144-23', 'anag-bey', 'kwame', '', 'bey@gmail.com', '0245879658', '1990-10-10', 'male', 'CD - 4573', '$2y$10$eBht/wh/Set2Wri4nBiE0urD9LrU90GuLZd3RccqFaATwvnZsAHly', 'kweku bey', '0245784578', 'bg1452', 'dbt', 'stu144-23.jpg'),
('stu231-23', 'koram', 'priscilla', 'yaa', 'priscy@gmail.com', '0245821548', '1998-08-20', 'female', 'benso', '$2y$10$HmUg1Ephy/y7.m8riBIEp.bPkXPQpECAYzqlJ6QESMZEyNtRLT7Ei', 'maame yaa', '02154854639', 'bg1452', 'dbt', 'stu231-23.jpg'),
('stu39-23', 'bonney', 'yaw', 'blay', 'bonney@gmail.com', '0245245802', '2000-10-10', 'male', 'CD 454', '$2y$10$gLTHPx1f5A3so52qZvDzA.Uwsc7FjT1V06t7TFlUHHqDJ05IQmtCu', 'kweku blay', '0242545875', 'bg1452', 'gwd', 'stu39-23.jpg'),
('stu619-23', 'blay', 'kofi', '', 'blay@gmail.com', '0256987452', '2000-06-23', 'male', 'duakwa', '$2y$10$klTq90/.KSfHRBZKGZh/0uqTE9e.W7MutJGNTVlOQ7OBELXvj6V06', 'yaw blay', '0214589658', 'bg399-23', 'dbt', 'stu619-23.jpg'),
('stu896-23', 'appiah', 'kweku', '', 'appiah@gmail.com', '0245879658', '2000-12-02', 'male', 'swedru', '$2y$10$zH/vN/mkYAB8te8JCTpL9u5qdkfZe0CPkWYioe3WxiWATtfS5hjzK', 'Benjamin appiah', '0215458552', 'bg1452', 'dbt', 'stu896-23.jpg'),
('stu996-23', 'gyan', 'kwame', '', 'gyan@gmail.com', '0245854524', '1994-12-23', 'male', 'CC - 45217', '$2y$10$Uri9Nkwizdp8q1AChv1Ac.bjFvPHn4NOlRYQxVab5UjBHXflqqqpi', 'grace gyan', '0245854785', 'bg1452', 'dbt', 'stu996-23.jpg');

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
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
