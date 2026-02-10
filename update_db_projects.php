<?php
require_once 'admin/config.php';

// sql to create table projects
$sql = "CREATE TABLE IF NOT EXISTS projects (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(100) NOT NULL,
category VARCHAR(100) NOT NULL,
image_url VARCHAR(255),
description TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table projects created successfully\n";

    // Add dummy data for testing
    $dummy_sql = "INSERT IGNORE INTO projects (id, title, category, image_url, description) VALUES 
    (1, 'Divorce Settlement', 'Family Law', 'images/projects/project_1.jpg', 'Successful settlement in a complex high-net-worth divorce case.'),
    (2, 'Corporate Merger', 'Business Law', 'images/projects/project_2.jpg', 'facilitated merger between two large tech firms.'),
    (3, 'Land Dispute Resolution', 'Property Law', 'images/projects/project_3.jpg', 'Resolved a 10-year land dispute in clients favor.')";

    if ($conn->query($dummy_sql) === TRUE) {
        echo "Dummy projects inserted.\n";
    }

} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$conn->close();
?>