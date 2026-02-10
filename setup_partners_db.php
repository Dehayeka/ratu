<?php
require_once 'admin/config.php';

// Create partners table
$sql = "CREATE TABLE IF NOT EXISTS partners (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    logo_url VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table partners created successfully\n";

    // Check if table is empty
    $result = $conn->query("SELECT count(*) as count FROM partners");
    $row = $result->fetch_assoc();

    if ($row['count'] == 0) {
        // Insert dummy data
        $stmt = $conn->prepare("INSERT INTO partners (name, logo_url) VALUES (?, ?)");

        $partners = [
            ['Client 1', 'images/clients/client1.png'],
            ['Client 2', 'images/clients/client1.png'],
            ['Client 3', 'images/clients/client1.png'],
            ['Client 4', 'images/clients/client1.png'],
            ['Client 5', 'images/clients/client1.png']
        ];

        foreach ($partners as $partner) {
            $stmt->bind_param("ss", $partner[0], $partner[1]);
            $stmt->execute();
        }

        echo "Dummy partners data inserted successfully\n";
        $stmt->close();
    }
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$conn->close();
?>