<?php
require_once 'admin/config.php';

// Create awards table
$sql = "CREATE TABLE IF NOT EXISTS awards (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    year VARCHAR(10) NOT NULL,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table awards created successfully\n";

    // Check if table is empty
    $result = $conn->query("SELECT count(*) as count FROM awards");
    $row = $result->fetch_assoc();

    if ($row['count'] == 0) {
        // Insert dummy data
        $stmt = $conn->prepare("INSERT INTO awards (year, title, category, image_url) VALUES (?, ?, ?, ?)");

        $awards = [
            ['2004', 'Behance Winner', 'Award', 'images/award/1.png'],
            ['2004', 'Behance Winner', 'Site of the day', 'images/award/2.png'],
            ['2025', 'Design Awards', 'Site of the Month', 'images/award/3.png'],
            ['2008', 'Web Development', 'Designer', 'images/award/4.png']
        ];

        foreach ($awards as $award) {
            $stmt->bind_param("ssss", $award[0], $award[1], $award[2], $award[3]);
            $stmt->execute();
        }

        echo "Dummy awards data inserted successfully\n";
        $stmt->close();
    }
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$conn->close();
?>