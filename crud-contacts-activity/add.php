<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Add Contact</h2>
        <p>
            <a href="index.php" class="btn btn-primary">Home</a>
        </p>

        <?php
        // Include the database connection file
        require_once("dbConnection.php");

        if (isset($_POST['submit'])) {
            // Escape special characters in string for use in SQL statement	
            $name = mysqli_real_escape_string($mysqli, $_POST['name']);
            $number = mysqli_real_escape_string($mysqli, $_POST['number']);
            $email = mysqli_real_escape_string($mysqli, $_POST['email']);
            
            // Validate number input
            if (!is_numeric($number) || $number < 0 || strlen($number) > 11) {
                echo '<div class="alert alert-danger" role="alert">';
                echo "Number must be a valid positive number and less than or equal to 11 digits.<br/>";
                echo '</div>';
            } else {
                // Check for empty fields
                if (empty($name) || empty($number) || empty($email)) {
                    echo '<div class="alert alert-danger" role="alert">';
                    if (empty($name)) {
                        echo "Name field is empty.<br/>";
                    }
                    
                    if (empty($number)) {
                        echo "Number field is empty.<br/>";
                    }
                    
                    if (empty($email)) {
                        echo "Email field is empty.<br/>";
                    }
                    echo '</div>';
                } else { 
                    // If all the fields are filled (not empty) 

                    // Insert data into database
                    $result = mysqli_query($mysqli, "INSERT INTO users (`name`, `number`, `email`) VALUES ('$name', '$number', '$email')");
                    
                    // Display success message
                    echo '<div class="alert alert-success" role="alert">';
                    echo "Data added successfully!";
                    echo '</div>';
                    echo "<a href='index.php' class='btn btn-primary'>View Result</a>";
                }
            }
        }
        ?>

        <form action="" method="post" name="add" class="mt-4">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="number">Number:</label>
                <input type="text" name="number" class="form-control" id="number" required maxlength="11">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Add</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>