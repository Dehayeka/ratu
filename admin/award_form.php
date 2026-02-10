<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("location: index.php");
    exit;
}
require_once 'config.php';

$title = "";
$organization = "";
$year = "";
$category = "";
$image_url = "";
$id = "";
$msg = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM awards WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $organization = $row['organization'];
        $year = $row['year'];
        $category = $row['category'];
        $image_url = $row['image_url'];
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $organization = $_POST['organization'];
    $year = $_POST['year'];
    $category = $_POST['category'];

    // Handle File Upload
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
        $target_dir = "../uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $file_extension = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
        $new_filename = "award_" . time() . "." . $file_extension;
        $target_file = $target_dir . $new_filename;

        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
            $image_url = "uploads/" . $new_filename;
        } else {
            $msg = "Error uploading file.";
        }
    }

    if (empty($msg)) {
        if ($id) {
            // Update
            $sql = "UPDATE awards SET title=?, organization=?, year=?, category=?, image_url=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $title, $organization, $year, $category, $image_url, $id);
        } else {
            // Insert
            $sql = "INSERT INTO awards (title, organization, year, category, image_url) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $title, $organization, $year, $category, $image_url);
        }

        if ($stmt->execute()) {
            header("location: awards.php");
            exit;
        } else {
            $msg = "Error saving award: " . $conn->error;
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $id ? 'Edit' : 'Add'; ?> Award - Ratu Lawyer
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Ratu Lawyer Admin</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="dashboard.php">Profile</a>
                <a class="nav-link" href="projects.php">Projects</a>
                <a class="nav-link active" href="awards.php">Awards</a>
                <a class="nav-link" href="partners.php">Partners</a>
                <a class="nav-link btn btn-outline-light ms-2" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>
            <?php echo $id ? 'Edit' : 'Add New'; ?> Award
        </h2>

        <?php if ($msg): ?>
            <div class="alert alert-danger">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Award Title/Name (e.g., Behance Winner)</label>
                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($title); ?>"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Organization (e.g., Awwwards Site)</label>
                <input type="text" name="organization" class="form-control"
                    value="<?php echo htmlspecialchars($organization); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category (e.g., Site of the day)</label>
                <input type="text" name="category" class="form-control"
                    value="<?php echo htmlspecialchars($category); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Year</label>
                <input type="text" name="year" class="form-control" value="<?php echo htmlspecialchars($year); ?>"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Logo Image</label>
                <input type="file" name="logo" class="form-control">
                <?php if ($image_url): ?>
                    <div class="mt-2">
                        <img src="../<?php echo htmlspecialchars($image_url); ?>" alt="Current Logo"
                            style="max-height: 100px;">
                    </div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Save Award</button>
            <a href="awards.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>