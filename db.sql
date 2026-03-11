-- Create Database
CREATE DATABASE blood_donation;
USE blood_donation;

-- Table for Donors
CREATE TABLE donors (
  donor_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  gender VARCHAR(10),
  age INT,
  blood_group VARCHAR(5) NOT NULL,
  phone VARCHAR(15),
  email VARCHAR(100),
  city VARCHAR(100),
  last_donation_date DATE
);

-- Table for Blood Requests
CREATE TABLE blood_requests (
  request_id INT AUTO_INCREMENT PRIMARY KEY,
  patient_name VARCHAR(100) NOT NULL,
  required_blood_group VARCHAR(5) NOT NULL,
  city VARCHAR(100),
  contact_number VARCHAR(15),
  units_required INT,
  request_date DATE DEFAULT CURRENT_DATE
);

-- Table for Contact Messages
CREATE TABLE contact_messages (
  message_id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  subject VARCHAR(200),
  message TEXT,
  sent_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for Admin Login
CREATE TABLE admin (
  admin_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Insert sample admin account (Username: admin, Password: admin123)
INSERT INTO admin (username, password)
VALUES ('admin', 'admin123');
