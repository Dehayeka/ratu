<?php
require_once 'admin/config.php';

echo "<h1>Database Debugger</h1>";

// Check Connection
if ($conn->connect_error) {
    die("<p style='color:red'>Connection failed: " . $conn->connect_error . "</p>");
} else {
    echo "<p style='color:green'>Database Connected Successfully</p>";
}

// Check Projects Table
echo "<h2>Projects Table Content</h2>";
$sql = "SELECT * FROM projects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5'><tr><th>ID</th><th>Title</th><th>Category</th><th>Image URL</th><th>Created At</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['category']) . "</td>";
        echo "<td>" . htmlspecialchars($row['image_url']) . "</td>";
        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No projects found in the database.</p>";
}

// Check Profile Table (for index page)
echo "<h2>Profile Table Content</h2>";
$sql_profile = "SELECT * FROM profile";
$result_profile = $conn->query($sql_profile);
if ($result_profile->num_rows > 0) {
    while ($row = $result_profile->fetch_assoc()) {
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
} else {
    echo "<p>No profile found.</p>";
}
?>