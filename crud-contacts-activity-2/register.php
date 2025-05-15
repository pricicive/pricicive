<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2><i class="bi bi-person-plus-fill"></i> Register</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form action="register.php" method="POST">
        <div class="form-group">
            <label><i class="bi bi-person-fill"></i> Username:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label><i class="bi bi-lock-fill"></i> Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-success">
            <i class="bi bi-person-plus"></i> Register
        </button>
    </form>
</div>
</body>
</html>
