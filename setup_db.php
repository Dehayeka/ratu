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

$conn->close();
?>
