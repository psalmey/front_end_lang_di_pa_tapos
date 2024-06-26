
<?php

require_once __DIR__ . '../config/configuration.php';

// Fetch data from database
$sql = "SELECT * FROM services";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Services</title>
    <!-- Bootstrap CSS -->
         <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.min.css">

      <!--=============== SWIPER CSS ===============-->
      <link rel="stylesheet" href="css/swiper-bundle.min.css">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="style.css">
       
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
        .services{
            font-size: 33px;
            color:azure;
            margin-bottom: 10px;
        }
           body {
            background-color: black; /* Replace with your desired background color */
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
                    <!--Close button-->
                      
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
      <br>
        <br>
                    <br>

    <div class="container ">
     <div class="services">Services</div>
        <div class="row">
            <?php
            // Check if there are any records
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                  
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../<?php echo $row['image_path']; ?>" class="card-img-top" alt="Service Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['description']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No services found.";
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
