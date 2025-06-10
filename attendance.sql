DROP DATABASE school;
CREATE DATABASE school;
USE school;

CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100),
    date DATE,
    status ENUM('Present', 'Absent', 'Late')
);
