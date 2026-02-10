<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS ratu_lawyer_db";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

$conn->select_db("ratu_lawyer_db");

// sql to create table admin
$sql = "CREATE TABLE IF NOT EXISTS admin (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table admin created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Insert default admin user if not exists
$conn->query("INSERT IGNORE INTO admin (id, username, password) VALUES (1, 'admin', '" . password_hash('admin', PASSWORD_DEFAULT) . "')");

// sql to create table profile
$sql = "CREATE TABLE IF NOT EXISTS profile (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
title VARCHAR(100) NOT NULL,
description TEXT,
image_url VARCHAR(255),
cv_link VARCHAR(255),
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table profile created successfully\n";
    // Insert default profile data
    $conn->query("INSERT IGNORE INTO profile (id, name, title, description, image_url) VALUES (1, 'Ratu Lawyer', 'Professional Lawyer', 'Experienced lawyer in Mataram.', 'images/bg/h1-Man.png')");
} else {
    echo "Error creating table: " . $conn->error . "\n";
}


// Connection kept open for further queries


// Create clients table
$sql = "CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    company VARCHAR(100),
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table clients created successfully\n";
    // Insert dummy clients
    $password = password_hash('password123', PASSWORD_DEFAULT);
    $conn->query("INSERT IGNORE INTO clients (id, name, email, password, company, image_url) VALUES 
        (1, 'Arlene McCoy', 'arlene@example.com', '$password', 'Co. Founder', 'images/testimonials/thumb1.jpg'),
        (2, 'Maya White', 'maya@example.com', '$password', 'Founder', 'images/testimonials/thumb2.jpg'),
        (3, 'Samuel Connolly', 'samuel@example.com', '$password', 'Admin', 'images/testimonials/thumb3.jpg'),
        (4, 'Michael Smith', 'michael@example.com', '$password', 'CEO', 'images/testimonials/man.png')
    ");
} else {
    echo "Error creating table clients: " . $conn->error . "\n";
}

// Create reviews table
$sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    client_id INT(6) UNSIGNED,
    project_name VARCHAR(255),
    rating INT(1) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table reviews created successfully\n";
    // Insert dummy reviews
    $conn->query("INSERT IGNORE INTO reviews (id, client_id, project_name, rating, comment) VALUES 
        (1, 1, 'Finance App', 5, 'The team provided exceptional financial guidance tailored to my needs. Their expert advice helped grow my investments while ensuring financial security for the future. I highly recommend their services!'),
        (2, 2, 'E-commerce Site', 5, 'Professional, efficient, and great to work with. They delivered the project on time and exceeded our expectations.'),
        (3, 3, 'Corporate Portal', 4, 'Great work on the portal. The design is intuitive and the functionality is exactly what we needed. A few minor tweaks were handled quickly.'),
        (4, 4, 'Mobile App', 5, 'Outstanding service! The mobile app is user-friendly and looks amazing. Will definitely work with them again.')
    ");
} else {
    echo "Error creating table reviews: " . $conn->error . "\n";
}

$conn->close();
?>