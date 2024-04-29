<?php
session_start();

$username = "";
$photo = "";

if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];
    if(isset($_SESSION['user_photo'])) {
        $photo = $_SESSION['user_photo'];
    }
}

if (isset($_POST['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();
    // Destroy the session.
    session_destroy();
    // Redirect to the home page after logout
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Zaytuna</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../logo.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Groovin
    * Template URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
    * Updated: Mar 17 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <style>
        /* CSS for the loading screen */
        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(218, 221, 6, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        #loading-text {
            font-size: 24px;
        }

        #content {
            display: none;
        }
    </style>
</head>

<body>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="home.php" class="logo"><img src="../logo.png" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="home.php" class="nav-link scrollto ">Home</a></li>
                    <li><a href="about.php" class="nav-link scrollto">About</a></li>
                    <li><a class="nav-link scrollto" href="bookingView.php">Bookings</a></li>
                    <li><a class="nav-link scrollto " href="#">Shop</a></li>

                    <!-- User info or Get Started button based on login status -->
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li>
                            <div class="user-info">
                                <?php if (!empty($photo)) { ?>
                                    <li><a href="home.php" class="logo"><img src="../uploads/<?php echo $photo; ?>"  class="img-fluid"></a></li>
                                <?php } ?>
                                <li><span class="username" style="color:white;"><?php echo $username; ?></span></li>
                            </div>
                        </li>
                        <li>
                            <form id="logoutForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <li><button style="background-color: #6ab82a; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease; margin-top: -5px; margin-right: -5px;" type="submit" name="logout">Logout</button></li>

                            </form>
                        </li>
                    <?php } else { ?>
                        <li><a href="login.php" class="getstarted scrollto" id="getstarted">Get Started</a></li>
                    <?php } ?>
                    <!-- End User info or Get Started button -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->


    <div id="loading-screen">
        <p id="loading-text">Loading...</p>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script>
        // Show loading screen when the page starts loading
        window.addEventListener('load', function() {
            document.getElementById('loading-screen').style.display = 'none';

        });
    </script>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
</body>

</html>
