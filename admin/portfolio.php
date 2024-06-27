<?php
require_once __DIR__ . '/../config/configuration.php';

// Check if form submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $uploadOk = 1; // Initialize upload flag

    // File upload handling
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageFileName = $_FILES['image']['name'];
        $imageTempName = $_FILES['image']['tmp_name'];
        $imageUploadPath = __DIR__ . '/../uploads/' . $imageFileName;

        // Move uploaded file to destination
        if (!move_uploaded_file($imageTempName, $imageUploadPath)) {
            echo "Sorry, there was an error uploading your file.";
            $uploadOk = 0;
        }

        $image_path = 'uploads/' . $imageFileName;  // Store relative path for database
    } else {
        echo "Sorry, there was an error uploading your file.";
        $uploadOk = 0;
    }

    // Check if image file is a actual image or fake image
    // if ($uploadOk && isset($_POST["submit"])) {
    //     $check = getimagesize($imageTempName);
    //     if (!$check) {
    //         echo "File is not an image.";
    //         $uploadOk = 0;
    //     }
    // }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $imageFileType = strtolower(pathinfo($imageUploadPath, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Proceed with database insertion if no errors
    if ($uploadOk) {
        $description = $_POST['description'];

        $sql = "INSERT INTO services (image_path, description) VALUES ('$image_path', '$description')";

        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Service</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for additional styling -->
    <style>
        /* Optional: Custom styles for additional formatting */
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-container">
                    <h2 class="text-center mb-4">Upload Service</h2>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="image" class="form-label">Choose an image:</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for certain components that require JavaScript) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
