<?php
session_start();
if (!isset($_SESSION['client_logged_in']) || $_SESSION['client_logged_in'] !== true) {
    header("location: index.php");
    exit;
}
require_once '../admin/config.php';

$client_id = $_SESSION['client_id'];

// Handle Review Submission
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_name = $_POST['project_name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO reviews (client_id, project_name, rating, comment) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isis", $client_id, $project_name, $rating, $comment);

    if ($stmt->execute()) {
        $message = "Review submitted successfully!";
    } else {
        $message = "Error submitting review: " . $conn->error;
    }
    $stmt->close();
}

// Fetch existing reviews
$sql = "SELECT * FROM reviews WHERE client_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $client_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard - Ratu Lawyer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Client Dashboard</a>
            <div class="d-flex">
                <span class="navbar-text me-3">Welcome,
                    <?php echo htmlspecialchars($_SESSION['client_name']); ?>
                </span>
                <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <?php if ($message): ?>
            <div class="alert alert-info">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Submit a Review</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label class="form-label">Project Name</label>
                                <input type="text" name="project_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Rating</label>
                                <select name="rating" class="form-select" required>
                                    <option value="5">5 - Excellent</option>
                                    <option value="4">4 - Very Good</option>
                                    <option value="3">3 - Good</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="1">1 - Poor</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Comment</label>
                                <textarea name="comment" class="form-control" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>My Reviews</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($result->num_rows > 0): ?>
                            <ul class="list-group list-group-flush">
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <li class="list-group-item">
                                        <h5>
                                            <?php echo htmlspecialchars($row['project_name']); ?>
                                            <span class="badge bg-warning text-dark float-end">
                                                <?php echo $row['rating']; ?>/5
                                            </span>
                                        </h5>
                                        <p>
                                            <?php echo htmlspecialchars($row['comment']); ?>
                                        </p>
                                        <small class="text-muted">
                                            <?php echo $row['created_at']; ?>
                                        </small>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted">No reviews submitted yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>