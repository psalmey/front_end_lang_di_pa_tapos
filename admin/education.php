<?php
require_once __DIR__ . '/../config/configuration.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $grade = $_POST['grade'];
    $school_name = $_POST['school_name'];
    $info = $_POST['info'];

    // Prepare the SQL statement to insert data
    $sql = "INSERT INTO education (grade, school_name, info) VALUES (?, ?, ?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the variables to the prepared statement as parameters
        $stmt->bind_param("sss", $grade, $school_name, $info);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "<div class='container mt-5'><div class='alert alert-success'>Record inserted successfully.</div></div>";
        } else {
            echo "<div class='container mt-5'><div class='alert alert-danger'>Error: Could not execute the query: $stmt->error</div></div>";
        }
        // Close the statement
        $stmt->close();
    } else {
        echo "<div class='container mt-5'><div class='alert alert-danger'>Error: Could not prepare the query: $conn->error</div></div>";
    }
    // Close the connection
    $conn->close();
} else {
    echo "<div class='container mt-5'><div class='alert alert-warning'>Invalid request.</div></div>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Education Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <h2 class="mb-4">Send Education Details</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="grade">Grade</label>
                <input type="text" class="form-control" id="grade" name="grade" required>
            </div>
            <div class="form-group">
                <label for="school_name">School Name</label>
                <input type="text" class="form-control" id="school_name" name="school_name" required>
            </div>
            <div class="form-group">
                <label for="info">Info</label>
                <textarea class="form-control" id="info" name="info" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
