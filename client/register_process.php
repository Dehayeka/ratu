<?php
session_start();
require_once '../admin/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $company = $_POST['company'];
    $image_url = 'images/testimonials/man.png'; // Default image

    // Check if email already exists
    $check_sql = "SELECT id FROM clients WHERE email = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("location: register.php?error=Email already registered");
        exit;
    }
    $stmt->close();

    // Handle File Upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../uploads/clients/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $new_filename = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $new_filename;

        // Basic validation
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_url = 'uploads/clients/' . $new_filename;
            }
        }
    }

    $sql = "INSERT INTO clients (name, email, password, company, image_url) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $password, $company, $image_url);

    if ($stmt->execute()) {
        header("location: index.php?success=Account created successfully. Please login.");
    } else {
        header("location: register.php?error=Error creating account: " . $conn->error);
    }
    $stmt->close();
    $conn->close();
}
?>