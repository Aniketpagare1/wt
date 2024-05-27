CREATE DATABASE IF NOT EXISTS empu;

USE empu;

CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL
);

INSERT INTO employees (name, email, position) VALUES
('John Doe', 'john@example.com', 'Manager'),
('Jane Smith', 'jane@example.com', 'Developer'),
('Bob Johnson', 'bob@example.com', 'Designer');
