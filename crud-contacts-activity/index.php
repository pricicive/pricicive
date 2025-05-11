    <?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (latest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Contacts</h2>
        <p>
            <a href="add.php" class="btn btn-primary">Add New Contact</a>
        </p>
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch the next row of a result set as an associative array
                while ($res = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$res['name']."</td>";
                    echo "<td>".$res['number']."</td>";
                    echo "<td>".$res['email']."</td>";    
                    echo "<td>
                            <a href=\"edit.php?id=$res[id]\" class=\"btn btn-warning btn-sm\">Edit</a> 
                            <a href=\"delete.php?id=$res[id]\" class=\"btn btn-danger btn-sm\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>