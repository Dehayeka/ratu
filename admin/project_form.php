<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("location: index.php");
    exit;
}
require_once 'config.php';

$id = '';
$title = '';
$category = '';
$description = '';
$image_url = '';
$is_edit = false;

if (isset($_GET['id'])) {
    $is_edit = true;
    $id = $_GET['id'];
    $sql = "SELECT * FROM projects WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $category = $row['category'];
        $description = $row['description'];
        $image_url = $row['image_url'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Handle File Upload
    $new_image_url = $image_url;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../uploads/";
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $new_filename = "project_" . time() . "." . $file_extension;
        $target_file = $target_dir . $new_filename;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $new_image_url = "uploads/" . $new_filename;
        }
    }

    if ($is_edit) {
        $sql = "UPDATE projects SET title=?, category=?, description=?, image_url=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $title, $category, $description, $new_image_url, $id);
    } else {
        $sql = "INSERT INTO projects (title, category, description, image_url) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $title, $category, $description, $new_image_url);
    }

    if ($stmt->execute()) {
        header("location: projects.php");
        exit;
    } else {
        $error = "Error saving project: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $is_edit ? 'Edit' : 'Add'; ?> Project - Ratu Lawyer
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Ratu Lawyer Admin</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="dashboard.php">Profile</a>
                <a class="nav-link active" href="projects.php">Projects</a>
                <a class="nav-link" href="awards.php">Awards</a>
                <a class="nav-link" href="partners.php">Partners</a>
                <a class="nav-link btn btn-outline-light ms-2" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>
            <?php echo $is_edit ? 'Edit' : 'Add New'; ?> Project
        </h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Title (Case Name)</label>
                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($title); ?>"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label">Category (Practice Area)</label>
                <input type="text" name="category" class="form-control"
                    value="<?php echo htmlspecialchars($category); ?>" placeholder="e.g. Family Law, Corporate"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label">Short Description</label>
                <textarea name="description" class="form-control"
                    rows="3"><?php echo htmlspecialchars($description); ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Project Image</label>
                <input type="file" name="image" class="form-control" <?php echo ($is_edit ? '' : 'required'); ?>>
                <?php if ($image_url): ?>
                    <div class="mt-2">
                        <img src="../<?php echo htmlspecialchars($image_url); ?>" alt="Current Image"
                            style="height: 100px;">
                    </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Save Project</button>
            <a href="projects.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>