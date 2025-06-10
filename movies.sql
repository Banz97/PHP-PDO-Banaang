CREATE DATABASE IF NOT EXISTS video_store;
USE video_store;

CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    director VARCHAR(255),
    release_year YEAR,
    available BOOLEAN
);
