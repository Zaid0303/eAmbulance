<!-- Main Content -->
 <?php 
 include("./config.php");

 ?>
<div id="content">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
        <div class="container ms-auto">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="images/logo-ambulance1.png" alt="Logo" class="logo me-2 img-fluid" style="max-height: 40px;">
                LIFELINK
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">ABOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="#types">CATEGORY</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">SERVICES</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">GALLERY</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">CONTACT</a></li>
                </ul>

                <div class="ms-3">
                <?php
    // Initialize name as an empty string
    $name = "";

    // Check if session contains a role and user ID
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'User') {
        $adid = $_SESSION['userid'];
        
        $ret = mysqli_query($con, "SELECT username FROM tbllogin_users WHERE ID='$adid'");
        $row = mysqli_fetch_array($ret);
        $name = $row['username'];
    }

    // If user is logged in, show dropdown with username and logout option
    if ($name != "") {
?>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" style="border-radius: 50px;" type="button" id="profileDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span><?php echo $name; ?></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="ambulance-tracking.php">Ambulance Tracking</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </div>
<?php
    } else {
        // If not logged in, show login button
?>
        <a href="login.php">
            <button class="btn btn-primary" id="loginSignupBtn">LOGIN</button>
        </a>
<?php
    }
?>

</div>

            </div>
        </div>
    </nav>

    <!-- navbar ki styling -->
    <style>
        /* Navbar Styling */
        .navbar {
            font-family: 'Poppins', sans-serif;
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 600;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.1);
        }

        .nav-item .nav-link {
            font-size: 1rem;
            padding: 0.75rem 1rem;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        .nav-item .nav-link:hover {
            background-color: rgba(0, 123, 255, 0.1);
            color: #007bff;
            border-radius: 50px;
        }

        .nav-item .nav-link.active {
            font-weight: bold;
            color: #007bff;
        }

        .navbar-toggler-icon {
            border-radius: 50%;
            padding: 0.2rem;
        }

        /* Navbar Scroll Animation */
        .navbar.sticky-top {
            transition: background-color 0.3s ease;
        }

        .navbar.scrolled {
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
    <!-- navbar ki styling end -->

    <!-- navbar ki script start -->
    <script>
        // Select all nav links
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

        // Add click event listener to each link
        navLinks.forEach(link => {
            link.addEventListener('click', function () {
                // Remove the active class from all links
                navLinks.forEach(nav => nav.classList.remove('active'));

                // Add the active class to the clicked link
                this.classList.add('active');
            });
        });
    </script>
    <!-- navbar ki script end -->
