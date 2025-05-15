<?php

require_once("dbConnection.php");


$id = '';
$name = '';
$number = '';
$email = '';


if (isset($_POST['update'])) {
    
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $number = mysqli_real_escape_string($mysqli, $_POST['number']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);    
    
   
    if (empty($name) || empty($number) || empty($email)) {
        $error_message = '<div class="alert alert-danger" role="alert">';
        if (empty($name)) {
            $error_message .= "Name field is empty.<br/>";
        }
        
        if (empty($number)) {
            $error_message .= "Number field is empty.<br/>";
        }
        
        if (empty($email)) {
            $error_message .= "Email field is empty.<br/>";
        }
        $error_message .= '</div>';
    } else {
      
        $result = mysqli_query($mysqli, "UPDATE info SET `name` = '$name', `number` = '$number', `email` = '$email' WHERE `id` = $id");
        
        
        $success_message = '<div class="alert alert-success" role="alert">';
        $success_message .= "Data updated successfully!";
        $success_message .= '</div>';
    }
}

// Fetch user data for the form (assuming you have the user ID)
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        $name = $user['name'];
        $number = $user['number'];
        $email = $user['email'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Info</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Info</h2>
        
        <?php
        // Display error or success messages
        if (isset($error_message)) {
            echo $error_message;
        }
        if (isset($success_message)) {
            echo $success_message;
        }
        ?>

        <form action="" method="post" class="mt-4">
            <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Include the ID for the update -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>
            <div class="form-group">
                <label for="number">Number:</label>
                <input type="number" name="number" class="form-control" id="number" value="<?php echo htmlspecialchars($number); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-success">Update Data</button>
            <a href="index.php" class="btn btn-secondary">Home</a>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>