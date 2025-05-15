<?php
session_start();
require_once("dbConnection.php");

// Redirect to login if not authenticated
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch contact data
$result = mysqli_query($mysqli, "SELECT * FROM info ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2><i class="bi bi-person-lines-fill"></i> Welcome, <?= htmlspecialchars($_SESSION['username']) ?></h2>
    <p>
        <a href="add.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Contact
        </a>
        <a href="logout.php" class="btn btn-danger">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </p>

    <table class="table table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th><i class="bi bi-person-fill"></i> Name</th>
                <th><i class="bi bi-telephone-fill"></i> Number</th>
                <th><i class="bi bi-envelope-fill"></i> Email</th>
                <th><i class="bi bi-gear-fill"></i> Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($res = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($res['name']) ?></td>
                    <td><?= htmlspecialchars($res['number']) ?></td>
                    <td><?= htmlspecialchars($res['email']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $res['id'] ?>" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <a href="delete.php?id=<?= $res['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            <i class="bi bi-trash"></i> Delete
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
