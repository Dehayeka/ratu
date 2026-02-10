<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("location: index.php");
    exit;
}
require_once 'config.php';

$name = "";
$logo_url = "";
$id = "";
$msg = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM partners WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $logo_url = $row['logo_url'];
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    // Handle File Upload
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
        $target_dir = "../uploads/partners/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $file_extension = pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
        $new_filename = "partner_" . time() . "." . $file_extension;
        $target_file = $target_dir . $new_filename;

        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
            $logo_url = "uploads/partners/" . $new_filename;
        } else {
            $msg = "Error uploading file.";
        }
    }

    if (empty($msg)) {
        if ($id) {
            // Update
            $sql = "UPDATE partners SET name=?, logo_url=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $name, $logo_url, $id);
        } else {
            // Insert
            $sql = "INSERT INTO partners (name, logo_url) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $name, $logo_url);
        }

        if ($stmt->execute()) {
            header("location: partners.php");
            exit;
        } else {
            $msg = "Error saving partner: " . $conn->error;
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
        <?php echo $id ? 'Edit' : 'Add'; ?> Partner - Ratu Lawyer
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
                <a class="nav-link" href="awards.php">Awards</a>
                <a class="nav-link active" href="partners.php">Partners</a>
                <a class="nav-link btn btn-outline-light ms-2" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>
            <?php echo $id ? 'Edit' : 'Add New'; ?> Partner
        </h2>

        <?php if ($msg): ?>
            <div class="alert alert-danger">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Partner Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Logo Image</label>
                <input type="file" name="logo" class="form-control">
                <?php if ($logo_url): ?>
                    <div class="mt-2">
                        <img src="../<?php echo htmlspecialchars($logo_url); ?>" alt="Current Logo"
                            style="max-height: 50px; background: #ccc;">
                    </div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Save Partner</button>
            <a href="partners.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>