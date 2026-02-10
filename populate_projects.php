<?php
require_once 'admin/config.php';

echo "<h1>Populating Projects Table</h1>";

$projects = [
    [
        'title' => 'Corporate Rebranding',
        'category' => 'Branding',
        'description' => 'Complete overhaul of corporate identity.',
        'image_url' => 'images/projects/project_1.jpg'
    ],
    [
        'title' => 'E-Commerce Platform',
        'category' => 'Web Development',
        'description' => 'Scalable online store for retail giant.',
        'image_url' => 'images/projects/project_2.jpg'
    ],
    [
        'title' => 'Mobile App Design',
        'category' => 'UI/UX Design',
        'description' => 'User-centric design for fintech app.',
        'image_url' => 'images/projects/project_3.jpg'
    ],
    [
        'title' => 'Digital Marketing Campaign',
        'category' => 'Marketing',
        'description' => 'Successful social media strategy.',
        'image_url' => 'images/projects/project_4.jpg'
    ],
    [
        'title' => 'Annual Report Design',
        'category' => 'Print Design',
        'description' => 'Award-winning annual report layout.',
        'image_url' => 'images/projects/project_5.jpg'
    ],
    [
        'title' => 'Tech Startup Branding',
        'category' => 'Branding',
        'description' => 'Identity for emerging tech company.',
        'image_url' => 'images/projects/project_6.jpg'
    ]
];

$stmt = $conn->prepare("INSERT INTO projects (title, category, description, image_url) VALUES (?, ?, ?, ?)");

foreach ($projects as $project) {
    $stmt->bind_param("ssss", $project['title'], $project['category'], $project['description'], $project['image_url']);
    if ($stmt->execute()) {
        echo "<p style='color:green'>Inserted: " . $project['title'] . "</p>";
    } else {
        echo "<p style='color:red'>Error inserting " . $project['title'] . ": " . $stmt->error . "</p>";
    }
}

echo "<p>Done. <a href='page-projects-style-01.php'>View Projects Page</a></p>";
?>