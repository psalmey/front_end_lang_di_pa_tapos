<?php
require_once __DIR__ . '../config/configuration.php';

// Check if form submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO contact_form (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Successful insertion
        echo "<h2>Thank you, $name!</h2>";
        echo "<p>Your message '$message' has been successfully submitted.</p>";
    } else {
        // Error in insertion
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    // Redirect back to the contact form if accessed directly
    header("Location: contact.php");
    exit();
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Optional: Custom styles for additional formatting */
        body {
            background-color: #f9f9f9; /* Replace with your desired background color */
        }
        .container {
            padding: 20px;
        }
        .form-control {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">
                andal.io
            </a>

            <div class="nav__menu" id="nav_menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link ">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="about.php" class="nav__link">About</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">Education</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">Services</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">Portfolio</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">Contact</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">Edit</a>
                    </li>
                </ul>
                <!-- Close button-->
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>

                <div class="nav__social">
                    <a href="https://web.facebook.com/chopatchie.ashley" target="_blank" class="nav__social-link">
                        <i class="ri-facebook-box-fill"></i>
                    </a>
                    <a href="https://www.instagram.com/psalmashlife/" target="_blank" class="nav__social-link">
                        <i class="ri-instagram-fill"></i>
                    </a>
                    <a href="https://x.com/psalmashleyy" target="_blank" class="nav__social-link">
                        <i class="ri-twitter-x-fill"></i>
                    </a>
                    <a href="https://github.com/psalmey" target="_blank" class="nav__social-link">
                        <i class="ri-github-fill"></i>
                    </a>
                    <a href="https://web.whatsapp.com" target="_blank" class="nav__social-link">
                        <i class="ri-whatsapp-fill"></i>
                    </a>
                </div>
            </div>

            <!-- Toggle button-- -->
            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-7-line"></i>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contact Us</h5>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
