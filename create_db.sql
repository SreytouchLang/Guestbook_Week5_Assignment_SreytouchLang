-- create_db.sql
CREATE DATABASE IF NOT EXISTS guestbook DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE guestbook;
CREATE TABLE IF NOT EXISTS guestbook (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150),
    website VARCHAR(255),
    message TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- sample row
INSERT INTO guestbook (name, email, website, message) VALUES ('Alice Example','alice@example.com','https://example.com','Hello from sample data.');
