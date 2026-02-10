<?php
require_once 'admin/config.php';

// Add organization column
$sql = "SHOW COLUMNS FROM awards LIKE 'organization'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $sql = "ALTER TABLE awards ADD COLUMN organization VARCHAR(255) NOT NULL AFTER id";
    if ($conn->query($sql) === TRUE) {
        echo "Column organization added successfully\n";

        // Update dummy data
        $conn->query("UPDATE awards SET organization = 'Awwwards' WHERE year = '2004'");
        $conn->query("UPDATE awards SET organization = 'Behance' WHERE year = '2025'");
        $conn->query("UPDATE awards SET organization = 'Themeforest' WHERE year = '2008'");
    } else {
        echo "Error adding column: " . $conn->error . "\n";
    }
} else {
    echo "Column organization already exists\n";
}

$conn->close();
?>