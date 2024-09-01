<?php

// $conn = mysqli_connect("localhost", "root", "");

// $sql = "CREATE DATABASE `EduManage`";

// mysqli_query($conn, $sql);

$conn = mysqli_connect("localhost", "root", "", "edumanage");

// $sql = "CREATE TABLE professor (
//     `id` INT AUTO_INCREMENT PRIMARY KEY,
//     `first_name` VARCHAR(50) NOT NULL,
//     `last_name` VARCHAR(50) NOT NULL,
//     `email` VARCHAR(100) NOT NULL UNIQUE,
//     `password` VARCHAR(255) NOT NULL,
//     `phone_number` VARCHAR(20),
//     `department` VARCHAR(100),
//     `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $sql = "CREATE TABLE students (
//     `id` INT AUTO_INCREMENT PRIMARY KEY,
//     `student_number` VARCHAR(50) NOT NULL UNIQUE,
//     `first_name` VARCHAR(50) NOT NULL,
//     `last_name` VARCHAR(50) NOT NULL,
//     `email` VARCHAR(100) NOT NULL UNIQUE,
//     `password` VARCHAR(255) NOT NULL,
//     `phone_number` VARCHAR(20),
//     `date_of_birth` DATE,
//     `gender` ENUM('Male', 'Female') NOT NULL,
//     `address` TEXT,
//     `enrollment_date` DATE NOT NULL,
//     `major` VARCHAR(100),
//     `status` ENUM('Active', 'Inactive', 'Graduated', 'Suspended') DEFAULT 'Active',
//     `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $sql = "INSERT INTO students (
//     student_number, first_name, last_name, email, password, phone_number, date_of_birth, gender, address, enrollment_date, major, status, created_at, updated_at
// ) VALUES (
//     'S12345678', 'Ali', 'Ahmed', 'ali@gmail.com', '123456789', '0123456789', '2002-01-15', 'Male', '123 Elm Street, City', '2021-09-01', 'Computer Science', 'Active', NOW(), NOW()
// )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $sql = "INSERT INTO professor (first_name, last_name, email, password, phone_number, department, created_at, updated_at)
// VALUES 
// ('Hashem', 'Fathallah', 'hashem@gmail.com', '123456789', '0123456789', 'Philosophy and Psychology', NOW(), NOW())
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $sql = "CREATE TABLE courses (
//     course_id INT PRIMARY KEY AUTO_INCREMENT,
//     course_name VARCHAR(255) NOT NULL,
//     year ENUM('First Year', 'Second Year', 'Third Year', 'Fourth Year') NOT NULL,
//     major ENUM('Arabic Language', 'Geography', 'Chemistry', 'Physics', 'English Language', 'French Language', 'Science', 'Social Studies', 'Biology', 'Mathematics') NOT NULL,
//     lecture_times VARCHAR(255),  
//     lecturer_name VARCHAR(255) DEFAULT 'Dr. Hashem Fathallah',  
//     lecture_location VARCHAR(255)  
// )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $sql = "CREATE TABLE students (
//     `student_id` INT PRIMARY KEY AUTO_INCREMENT,
//     `first_name` VARCHAR(100) NOT NULL,
//     `last_name` VARCHAR(100) NOT NULL,
//     `email` VARCHAR(255) NOT NULL UNIQUE,
//     `password` VARCHAR(255) NOT NULL,
//     `phone_number` VARCHAR(15),
//     `course_id` INT,
//     `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     FOREIGN KEY (course_id) REFERENCES courses(course_id)
// )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $sql = "INSERT INTO courses (course_name, year, major, lecture_times, lecturer_name, lecture_location)
// VALUES
//     ('Teaching Profession and Teacher Roles', 'First Year', 'Arabic Language', 'Monday 10:00 AM - 12:00 PM', 'Dr. Hashem Fathallah', 'Room 101'),
//     ('Teaching Profession and Teacher Roles', 'First Year', 'Geography', 'Tuesday 2:00 PM - 4:00 PM', 'Dr. Hashem Fathallah', 'Room 102'),
//     ('Teaching Profession and Teacher Roles', 'First Year', 'Chemistry', 'Wednesday 9:00 AM - 11:00 AM', 'Dr. Hashem Fathallah', 'Room 103'),
//     ('Teaching Profession and Teacher Roles', 'First Year', 'Physics', 'Thursday 1:00 PM - 3:00 PM', 'Dr. Hashem Fathallah', 'Room 104'),
//     ('Teaching Profession and Teacher Roles', 'First Year', 'English Language', 'Friday 10:00 AM - 12:00 PM', 'Dr. Hashem Fathallah', 'Room 105'),
//     ('Education and Contemporary Issues', 'Second Year', 'Arabic Language', 'Monday 2:00 PM - 4:00 PM', 'Dr. Hashem Fathallah', 'Room 201'),
//     ('Education and Contemporary Issues', 'Second Year', 'French Language', 'Tuesday 11:00 AM - 1:00 PM', 'Dr. Hashem Fathallah', 'Room 202'),
//     ('Principles of Adult Education', 'Third Year', 'Science', 'Wednesday 3:00 PM - 5:00 PM', 'Dr. Hashem Fathallah', 'Room 301'),
//     ('Principles of Adult Education', 'Third Year', 'Social Studies', 'Thursday 10:00 AM - 12:00 PM', 'Dr. Hashem Fathallah', 'Room 302'),
//     ('Principles of Adult Education', 'Third Year', 'Arabic Language', 'Friday 1:00 PM - 3:00 PM', 'Dr. Hashem Fathallah', 'Room 303'),
//     ('Principles of Adult Education', 'Third Year', 'English Language', 'Monday 10:00 AM - 12:00 PM', 'Dr. Hashem Fathallah', 'Room 304'),
//     ('Principles of Education', 'Fourth Year', 'Arabic Language', 'Tuesday 2:00 PM - 4:00 PM', 'Dr. Hashem Fathallah', 'Room 401'),
//     ('Principles of Education', 'Fourth Year', 'English Language', 'Wednesday 9:00 AM - 11:00 AM', 'Dr. Hashem Fathallah', 'Room 402'),
//     ('Principles of Education', 'Fourth Year', 'Geography', 'Thursday 1:00 PM - 3:00 PM', 'Dr. Hashem Fathallah', 'Room 403'),
//     ('Principles of Education', 'Fourth Year', 'Chemistry', 'Friday 10:00 AM - 12:00 PM', 'Dr. Hashem Fathallah', 'Room 404'),
//     ('Principles of Education', 'Fourth Year', 'Biology', 'Monday 2:00 PM - 4:00 PM', 'Dr. Hashem Fathallah', 'Room 405'),
//     ('Principles of Education', 'Fourth Year', 'Mathematics', 'Tuesday 11:00 AM - 1:00 PM', 'Dr. Hashem Fathallah', 'Room 406')
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $sql = "INSERT INTO students (first_name, last_name, email, password, phone_number, course_id, created_at, updated_at)
// VALUES
//     ('Ahmed', 'Ali', 'ahmed.ali1@gmail.com', '123456789', '01011122334', 1, NOW(), NOW()),
//     ('Sara', 'Hassan', 'sara.hassan1@gmail.com', '123456789', '01022334455', 1, NOW(), NOW()),
//     ('Mohamed', 'Khaled', 'mohamed.khaled1@gmail.com', '123456789', '01033445566', 1, NOW(), NOW()),
//     ('Laila', 'Mokhtar', 'laila.mokhtar1@gmail.com', '123456789', '01044556677', 1, NOW(), NOW()),
//     ('Omar', 'Shaban', 'omar.shaban1@gmail.com', '123456789', '01055667788', 1, NOW(), NOW()),

//     ('Ahmed', 'Sayed', 'ahmed.sayed1@gmail.com', '123456789', '01066778899', 2, NOW(), NOW()),
//     ('Sara', 'Nabil', 'sara.nabil1@gmail.com', '123456789', '01077889900', 2, NOW(), NOW()),
//     ('Mohamed', 'Mokhtar', 'mohamed.mokhtar2@gmail.com', '123456789', '01088990011', 2, NOW(), NOW()),
//     ('Laila', 'Ali', 'laila.ali2@gmail.com', '123456789', '01099001122', 2, NOW(), NOW()),
//     ('Omar', 'Khaled', 'omar.khaled2@gmail.com', '123456789', '01100112233', 2, NOW(), NOW()),

//     ('Amina', 'Saleh', 'amina.saleh1@gmail.com', '123456789', '01111223344', 3, NOW(), NOW()),
//     ('Hassan', 'Jamal', 'hassan.jamal1@gmail.com', '123456789', '01122334455', 3, NOW(), NOW()),
//     ('Layla', 'Yousef', 'layla.yousef1@gmail.com', '123456789', '01133445566', 3, NOW(), NOW()),
//     ('Tariq', 'Hassan', 'tariq.hassan1@gmail.com', '123456789', '01144556677', 3, NOW(), NOW()),
//     ('Salma', 'Omar', 'salma.omar1@gmail.com', '123456789', '01155667788', 3, NOW(), NOW()),

//     ('Youssef', 'Khaled', 'youssef.khaled1@gmail.com', '123456789', '01166778899', 4, NOW(), NOW()),
//     ('Hanan', 'Fouad', 'hanan.fouad1@gmail.com', '123456789', '01177889900', 4, NOW(), NOW()),
//     ('Ibrahim', 'Nasr', 'ibrahim.nasr1@gmail.com', '123456789', '01188990011', 4, NOW(), NOW()),
//     ('Nadia', 'Saleh', 'nadia.saleh1@gmail.com', '123456789', '01199001122', 4, NOW(), NOW()),
//     ('Othman', 'Youssef', 'othman.youssef1@gmail.com', '123456789', '01200112233', 4, NOW(), NOW()),

//     ('Yasser', 'Khalil', 'yasser.khalil1@gmail.com', '123456789', '01211223344', 5, NOW(), NOW()),
//     ('Noor', 'Mohammed', 'noor.mohammed1@gmail.com', '123456789', '01222334455', 5, NOW(), NOW()),
//     ('Hadi', 'Amin', 'hadi.amin1@gmail.com', '123456789', '01233445566', 5, NOW(), NOW()),
//     ('Mariam', 'Saad', 'mariam.saad1@gmail.com', '123456789', '01244556677', 5, NOW(), NOW()),
//     ('Rasha', 'Said', 'rasha.said1@gmail.com', '123456789', '01255667788', 5, NOW(), NOW()),

//     ('Youssef', 'Khaled', 'youssef.khaled2@gmail.com', '123456789', '01266778899', 6, NOW(), NOW()),
//     ('Hanan', 'Fouad', 'hanan.fouad2@gmail.com', '123456789', '01277889900', 6, NOW(), NOW()),
//     ('Ibrahim', 'Nasr', 'ibrahim.nasr2@gmail.com', '123456789', '01288990011', 6, NOW(), NOW()),
//     ('Nadia', 'Saleh', 'nadia.saleh2@gmail.com', '123456789', '01299001122', 6, NOW(), NOW()),
//     ('Othman', 'Youssef', 'othman.youssef2@gmail.com', '123456789', '01300112233', 6, NOW(), NOW()),

//     ('Ali', 'Gamal', 'ali.gamal1@gmail.com', '123456789', '01311223344', 7, NOW(), NOW()),
//     ('Mona', 'Elsayed', 'mona.elsayed1@gmail.com', '123456789', '01322334455', 7, NOW(), NOW()),
//     ('Hossam', 'Fathy', 'hossam.fathy1@gmail.com', '123456789', '01333445566', 7, NOW(), NOW()),
//     ('Rania', 'Zaki', 'rania.zaki1@gmail.com', '123456789', '01344556677', 7, NOW(), NOW()),
//     ('Said', 'Mohsen', 'said.mohsen1@gmail.com', '123456789', '01355667788', 7, NOW(), NOW()),

//     ('Yasser', 'Khalil', 'yasser.khalil2@gmail.com', '123456789', '01366778899', 8, NOW(), NOW()),
//     ('Noor', 'Mohammed', 'noor.mohammed2@gmail.com', '123456789', '01377889900', 8, NOW(), NOW()),
//     ('Hadi', 'Amin', 'hadi.amin2@gmail.com', '123456789', '01388990011', 8, NOW(), NOW()),
//     ('Mariam', 'Saad', 'mariam.saad2@gmail.com', '123456789', '01399001122', 8, NOW(), NOW()),
//     ('Rasha', 'Said', 'rasha.said2@gmail.com', '123456789', '01400112233', 8, NOW(), NOW()),
    
//     ('Ayman', 'Gaber', 'ayman.gaber1@gmail.com', '123456789', '01411223344', 9, NOW(), NOW()),
//     ('Fatima', 'Hassan', 'fatima.hassan1@gmail.com', '123456789', '01422334455', 9, NOW(), NOW()),
//     ('Sami', 'Farid', 'sami.farid1@gmail.com', '123456789', '01433445566', 9, NOW(), NOW()),
//     ('Huda', 'Shahin', 'huda.shahin1@gmail.com', '123456789', '01444556677', 9, NOW(), NOW()),
//     ('Jamal', 'Aly', 'jamal.aly1@gmail.com', '123456789', '01455667788', 9, NOW(), NOW()),

//     ('Ibrahim', 'Youssef', 'ibrahim.youssef1@gmail.com', '123456789', '01466778899', 10, NOW(), NOW()),
//     ('Mona', 'Elkady', 'mona.elkady1@gmail.com', '123456789', '01477889900', 10, NOW(), NOW()),
//     ('Omar', 'Saeed', 'omar.saeed1@gmail.com', '123456789', '01488990011', 10, NOW(), NOW()),
//     ('Dalia', 'Kamal', 'dalia.kamal1@gmail.com', '123456789', '01499001122', 10, NOW(), NOW()),
//     ('Ali', 'Mohamed', 'ali.mohamed1@gmail.com', '123456789', '01500112233', 10, NOW(), NOW()),

//     ('Rami', 'Khalil', 'rami.khalil1@gmail.com', '123456789', '01511223344', 11, NOW(), NOW()),
//     ('Hala', 'Omar', 'hala.omar1@gmail.com', '123456789', '01522334455', 11, NOW(), NOW()),
//     ('Ziad', 'Mokhtar', 'ziad.mokhtar1@gmail.com', '123456789', '01533445566', 11, NOW(), NOW()),
//     ('Samira', 'Elgazar', 'samira.elgazar1@gmail.com', '123456789', '01544556677', 11, NOW(), NOW()),
//     ('Karim', 'Salem', 'karim.salem1@gmail.com', '123456789', '01555667788', 11, NOW(), NOW()),

//     ('Rania', 'Sayed', 'rania.sayed1@gmail.com', '123456789', '01566778899', 12, NOW(), NOW()),
//     ('Youssef', 'Mahmoud', 'youssef.mahmoud1@gmail.com', '123456789', '01577889900', 12, NOW(), NOW()),
//     ('Nadia', 'Hussein', 'nadia.hussein1@gmail.com', '123456789', '01588990011', 12, NOW(), NOW()),
//     ('Ibrahim', 'Sherif', 'ibrahim.sherif1@gmail.com', '123456789', '01599001122', 12, NOW(), NOW()),
//     ('Mona', 'Amin', 'mona.amin1@gmail.com', '123456789', '01600112233', 12, NOW(), NOW()),

//     ('Hossam', 'Othman', 'hossam.othman1@gmail.com', '123456789', '01611223344', 13, NOW(), NOW()),
//     ('Nour', 'Farouk', 'nour.farouk1@gmail.com', '123456789', '01622334455', 13, NOW(), NOW()),
//     ('Rami', 'Mohsen', 'rami.mohsen1@gmail.com', '123456789', '01633445566', 13, NOW(), NOW()),
//     ('Heba', 'Khaled', 'heba.khaled1@gmail.com', '123456789', '01644556677', 13, NOW(), NOW()),
//     ('Ahmed', 'Gad', 'ahmed.gad1@gmail.com', '123456789', '01655667788', 13, NOW(), NOW()),

//     ('Dina', 'Sami', 'dina.sami1@gmail.com', '123456789', '01666778899', 14, NOW(), NOW()),
//     ('Mohamed', 'Hassan', 'mohamed.hassan2@gmail.com', '123456789', '01677889900', 14, NOW(), NOW()),
//     ('Nour', 'Ali', 'nour.ali2@gmail.com', '123456789', '01688990011', 14, NOW(), NOW()),
//     ('Rania', 'Hussein', 'rania.hussein2@gmail.com', '123456789', '01699001122', 14, NOW(), NOW()),
//     ('Omar', 'Gaber', 'omar.gaber2@gmail.com', '123456789', '01700112233', 14, NOW(), NOW()),

//     ('Nadia', 'Shahin', 'nadia.shahin1@gmail.com', '123456789', '01711223344', 15, NOW(), NOW()),
//     ('Tariq', 'Gamal', 'tariq.gamal1@gmail.com', '123456789', '01722334455', 15, NOW(), NOW()),
//     ('Hanan', 'Khalil', 'hanan.khalil2@gmail.com', '123456789', '01733445566', 15, NOW(), NOW()),
//     ('Ibrahim', 'Saleh', 'ibrahim.saleh1@gmail.com', '123456789', '01744556677', 15, NOW(), NOW()),
//     ('Huda', 'Omar', 'huda.omar2@gmail.com', '123456789', '01755667788', 15, NOW(), NOW()),

//     ('Salma', 'Mokhtar', 'salma.mokhtar2@gmail.com', '123456789', '01766778899', 16, NOW(), NOW()),
//     ('Ayman', 'Fouad', 'ayman.fouad2@gmail.com', '123456789', '01777889900', 16, NOW(), NOW()),
//     ('Ziad', 'Mohamed', 'ziad.mohamed2@gmail.com', '123456789', '01788990011', 16, NOW(), NOW()),
//     ('Fatima', 'Nasr', 'fatima.nasr2@gmail.com', '123456789', '01799001122', 16, NOW(), NOW()),
//     ('Ali', 'Fathy', 'ali.fathy2@gmail.com', '123456789', '01800112233', 16, NOW(), NOW()),

//     ('Khaled', 'Salem', 'khaled.salem2@gmail.com', '123456789', '01811223344', 17, NOW(), NOW()),
//     ('Mona', 'Mohamed', 'mona.mohamed2@gmail.com', '123456789', '01822334455', 17, NOW(), NOW()),
//     ('Rami', 'Gaber', 'rami.gaber3@gmail.com', '123456789', '01833445566', 17, NOW(), NOW()),
//     ('Hassan', 'Khalil', 'hassan.khalil3@gmail.com', '123456789', '01844556677', 17, NOW(), NOW()),
//     ('Sama', 'Zaki', 'sama.zaki2@gmail.com', '123456789', '01855667788', 17, NOW(), NOW())
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $sql = "CREATE TABLE lectures (
//     lecture_id INT PRIMARY KEY AUTO_INCREMENT, 
//     course_id INT NOT NULL,
//     professor_id INT NOT NULL DEFAULT 2,
//     topic VARCHAR(255) NOT NULL,  
//     drive_link VARCHAR(255),
//     lecture_date DATETIME DEFAULT CURRENT_TIMESTAMP, -- تعيين الوقت الحالي كقيمة افتراضية
//     FOREIGN KEY (course_id) REFERENCES courses(course_id),
//     FOREIGN KEY (professor_id) REFERENCES professor(professor_id)
// )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $sql = "CREATE TABLE assignments (
//   id INT AUTO_INCREMENT PRIMARY KEY,
//   student_id INT NOT NULL,
//   course_id INT NOT NULL,
//   lecture_id INT NOT NULL,
//   task_link VARCHAR(255) NOT NULL,
//   submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//   updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//   feedback TEXT,
//   FOREIGN KEY (student_id) REFERENCES students(student_id),
//   FOREIGN KEY (course_id) REFERENCES courses(course_id),
//   FOREIGN KEY (lecture_id) REFERENCES lectures(lecture_id)
// )";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $sql = "CREATE TABLE exams (
//     exam_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف الامتحان (مفتاح أساسي)
//     exam_name VARCHAR(255) NOT NULL,         -- اسم الامتحان
//     course_id INT NOT NULL,                  -- معرف الدورة (رابط إلى جدول الدورات)
//     exam_date DATE DEFAULT CURRENT_DATE,     -- تاريخ الامتحان
//     start_time TIME NOT NULL,                -- وقت بدء الامتحان
//     end_time TIME NOT NULL,                  -- وقت انتهاء الامتحان
//     total_marks INT NOT NULL,                -- العلامات الكلية
//     passing_marks INT NOT NULL,              -- العلامات المطلوبة للنجاح
//     exam_link VARCHAR(255) NOT NULL,         -- رابط الامتحان
//     FOREIGN KEY (course_id) REFERENCES courses(course_id)  -- مفتاح خارجي للربط بجدول الدورات
// )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $sql = "CREATE TABLE grades (
//     grade_id INT AUTO_INCREMENT PRIMARY KEY,
//     student_id INT NOT NULL,
//     exam_id INT NOT NULL,
//     marks_obtained INT NOT NULL,
//     FOREIGN KEY (student_id) REFERENCES students(student_id), 
//     FOREIGN KEY (exam_id) REFERENCES exams(exam_id)
// )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $sql = "CREATE TABLE exam_results (
//     result_id INT AUTO_INCREMENT PRIMARY KEY,  -- معرف النتيجة (مفتاح أساسي)
//     exam_id INT NOT NULL,                     -- معرف الامتحان (رابط إلى جدول الامتحانات)
//     student_id INT NOT NULL,                  -- معرف الطالب (رابط إلى جدول الطلاب)
//     obtained_marks INT NOT NULL,              -- العلامات التي حصل عليها الطالب
//     FOREIGN KEY (exam_id) REFERENCES exams(exam_id),     -- مفتاح خارجي للربط بجدول الامتحانات
//     FOREIGN KEY (student_id) REFERENCES students(student_id)  -- مفتاح خارجي للربط بجدول الطلاب
// )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $sql = "CREATE TABLE support (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     student_id INT NOT NULL,
//     course_id INT NOT NULL,
//     message TEXT NOT NULL,
//     status ENUM('Open', 'In Progress', 'Closed') DEFAULT 'Open',
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     FOREIGN KEY (student_id) REFERENCES students(student_id),
//     FOREIGN KEY (course_id) REFERENCES courses(course_id)
// )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);