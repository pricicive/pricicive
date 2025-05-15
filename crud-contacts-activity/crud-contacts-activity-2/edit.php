<?php
require_once("dbConnection.php");

// Check if 'id' is set and is a valid number
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("❌ Invalid or missing ID.");
}

$id = intval($_GET['id']);

// Fetch the specific record
$result = mysqli_query($mysqli, "SELECT * FROM info WHERE id = $id");

if (!$result || mysqli_num_rows($result) === 0) {
    die("⚠️ Record not found.");
}

$resultData = mysqli_fetch_assoc($result);
$name = $resultData['name'];
$number = $resultData['number'];
$email = $resultData['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Info</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="container mt-5">
        <h2><i class="bi bi-pencil-square"></i> Edit Contact</h2>
        <p>
            <a href="index.php" class="btn btn-primary">
                <i class="bi bi-house-door-fill"></i> Home
            </a>
        </p>
        
        <form name="edit" method="post" action="editAction.php" class="mt-4">
            <div class="form-group">
                <label for="name"><i class="bi bi-person-fill"></i> Name:</label>
                <input type="text" name="name" class="form-control" id="name" value="<?= htmlspecialchars($name) ?>" required>
            </div>
            <div class="form-group">
                <label for="number"><i class="bi bi-telephone-fill"></i> Number:</label>
                <input type="text" name="number" class="form-control" id="number" value="<?= htmlspecialchars($number) ?>" required>
            </div>
            <div class="form-group">
                <label for="email"><i class="bi bi-envelope-fill"></i> Email:</label>
                <input type="email" name="email" class="form-control" id="email" value="<?= htmlspecialchars($email) ?>" required>
            </div>
            <input type="hidden" name="id" value="<?= $id ?>">
            <button type="submit" name="update" class="btn btn-success">
                <i class="bi bi-check-circle-fill"></i> Update
            </button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
