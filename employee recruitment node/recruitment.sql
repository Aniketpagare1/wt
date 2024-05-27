-- Create a database
CREATE DATABASE employee_recruitment_system;

-- Use the created database
USE employee_recruitment_system;

-- Create a table to store employee applications
CREATE TABLE employee_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    position VARCHAR(255) NOT NULL,
    resume_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
