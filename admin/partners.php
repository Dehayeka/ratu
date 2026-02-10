<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("location: index.php");
    exit;
}
require_once 'config.php';

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM partners WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $msg = "Partner deleted successfully.";
    } else {
        $msg = "Error deleting partner.";
    }
}

// Fetch Partners
$sql = "SELECT * FROM partners ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Partners - Ratu Lawyer</title>
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Manage Partners</h2>
            <a href="partner_form.php" class="btn btn-primary">Add New Partner</a>
        </div>

        <?php if (isset($msg)): ?>
            <div class="alert alert-info">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td style="width: 150px;">
                            <?php if ($row['logo_url']): ?>
                                <img src="../<?php echo htmlspecialchars($row['logo_url']); ?>" alt="img"
                                    style="max-width: 100px; max-height: 50px; object-fit: contain; background: #ccc;">
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($row['name']); ?>
                        </td>
                        <td>
                            <a href="partner_form.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="partners.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>