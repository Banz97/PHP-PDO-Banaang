CREATE DATABASE IF NOT EXISTS company_db;
USE company_db;

CREATE TABLE timelogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_name VARCHAR(100),
    log_date DATE,
    log_time TIME,
    type ENUM('IN', 'OUT')
);
