CREATE DATABASE guest_management;

USE guest_management;

CREATE TABLE guests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    phone VARCHAR(15),
    visit_date DATE,
    visit_time TIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
