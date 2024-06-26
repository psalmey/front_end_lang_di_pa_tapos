<?php
require_once __DIR__ . '/../config/configuration.php';

// Fetch data from database
$sql = "SELECT * FROM contact_form ORDER BY created_at DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for additional styling -->
    <style>
        /* Optional: Custom styles for additional formatting */
        .container {
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .messages {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="messages">Contact Messages</h1>
        <div class="row">
            <?php
            // Check if there are any records
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Name: <?php echo htmlspecialchars($row['name']); ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Email: <?php echo htmlspecialchars($row['email']); ?></h6>
                                <p class="card-text">Message: <?php echo htmlspecialchars($row['message']); ?></p>
                                <p class="card-text">Received at: <?php echo htmlspecialchars($row['created_at']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No messages found.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap JS (optional, for certain components that require JavaScript) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
