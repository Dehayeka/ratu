<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("location: index.php");
    exit;
}

require_once 'config.php';

// Fetch current profile data
$sql = "SELECT * FROM profile WHERE id = 1";
$result = $conn->query($sql);
$profile = $result->fetch_assoc();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cv_link = $_POST['cv_link'];

    // Handle File Upload
    $image_url = $profile['image_url']; // Default to existing
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../uploads/";
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $new_filename = "profile_" . time() . "." . $file_extension;
        $target_file = $target_dir . $new_filename;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_url = "uploads/" . $new_filename;
        } else {
            $message = "Error uploading file.";
        }
    }

    // Update Database
    $update_sql = "UPDATE profile SET name=?, title=?, description=?, image_url=?, cv_link=? WHERE id=1";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssss", $name, $title, $description, $image_url, $cv_link);

    if ($stmt->execute()) {
        $message = "Profile updated successfully!";
        // Refresh data
        $result = $conn->query($sql);
        $profile = $result->fetch_assoc();
    } else {
        $message = "Error updating profile: " . $conn->error;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ratu Lawyer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Ratu Lawyer Admin</a>
            <a href="logout.php" class="btn btn-outline-light">Logout</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Edit Profile</h2>
        <?php if ($message): ?>
            <div class="alert alert-info">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control"
                    value="<?php echo htmlspecialchars($profile['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control"
                    value="<?php echo htmlspecialchars($profile['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Key Description (Banner Text)</label>
                <textarea name="description" class="form-control"
                    rows="4"><?php echo htmlspecialchars($profile['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">CV Download Link</label>
                <input type="text" name="cv_link" class="form-control"
                    value="<?php echo htmlspecialchars($profile['cv_link'] ?? ''); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Profile Image</label>
                <input type="file" name="image" class="form-control">
                <?php if ($profile['image_url']): ?>
                    <div class="mt-2">
                        <img src="../<?php echo htmlspecialchars($profile['image_url']); ?>" alt="Current Profile"
                            style="max-height: 150px;">
                    </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>

</html>
