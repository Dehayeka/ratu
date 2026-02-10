<?php
session_start();
require_once '../admin/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, name, password FROM clients WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['client_logged_in'] = true;
            $_SESSION['client_id'] = $row['id'];
            $_SESSION['client_name'] = $row['name'];
            header("location: dashboard.php");
        } else {
            header("location: index.php?error=Invalid password");
        }
    } else {
        header("location: index.php?error=Invalid email");
    }
    $stmt->close();
    $conn->close();
}
?>