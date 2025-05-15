<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="container mt-5">
        <h2><i class="bi bi-person-plus-fill"></i> Add Contact</h2>
        <p>
            <a href="index.php" class="btn btn-primary">
                <i class="bi bi-house-door-fill"></i> Home
            </a>
        </p>

        <?php
        require_once("dbConnection.php");

        if (isset($_POST['submit'])) {
            $name = mysqli_real_escape_string($mysqli, $_POST['name']);
            $number = mysqli_real_escape_string($mysqli, $_POST['number']);
            $email = mysqli_real_escape_string($mysqli, $_POST['email']);
            
            if (!is_numeric($number) || $number < 0 || strlen($number) > 11) {
                echo '<div class="alert alert-danger" role="alert">';
                echo '<i class="bi bi-exclamation-circle-fill"></i> Number must be a valid positive number and less than or equal to 11 digits.<br/>';
                echo '</div>';
            } else {
                if (empty($name) || empty($number) || empty($email)) {
                    echo '<div class="alert alert-danger" role="alert">';
                    if (empty($name)) {
                        echo '<i class="bi bi-x-circle-fill"></i> Name field is empty.<br/>';
                    }
                    if (empty($number)) {
                        echo '<i class="bi bi-x-circle-fill"></i> Number field is empty.<br/>';
                    }
                    if (empty($email)) {
                        echo '<i class="bi bi-x-circle-fill"></i> Email field is empty.<br/>';
                    }
                    echo '</div>';
                } else {
                    $result = mysqli_query($mysqli, "INSERT INTO info (`name`, `number`, `email`) VALUES ('$name', '$number', '$email')");
                    
                    echo '<div class="alert alert-success" role="alert">';
                    echo '<i class="bi bi-check-circle-fill"></i> Data added successfully!';
                    echo '</div>';
                    echo "<a href='index.php' class='btn btn-primary mt-2'><i class='bi bi-arrow-left-circle'></i> View Result</a>";
                }
            }
        }
        ?>

        <form action="" method="post" name="add" class="mt-4">
            <div class="form-group">
                <label for="name"><i class="bi bi-person-fill"></i> Name:</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="number"><i class="bi bi-telephone-fill"></i> Number:</label>
                <input type="text" name="number" class="form-control" id="number" required maxlength="11">
            </div>
            <div class="form-group">
                <label for="email"><i class="bi bi-envelope-fill"></i> Email:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success">
                <i class="bi bi-plus-circle-fill"></i> Add
            </button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
