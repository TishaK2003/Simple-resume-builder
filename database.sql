CREATE DATABASE resume_builder;

USE resume_builder;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100),
    lastName VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20)
);

CREATE TABLE education (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId INT,
    degree VARCHAR(100),
    institution VARCHAR(100),
    startYear YEAR,
    endYear YEAR,
    FOREIGN KEY (userId) REFERENCES users(id)
);

CREATE TABLE experience (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId INT,
    position VARCHAR(100),
    company VARCHAR(100),
    startDate DATE,
    endDate DATE,
    FOREIGN KEY (userId) REFERENCES users(id)
);
