<?php 
session_start();
?>
<!-- Main Content -->
<div id="content">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
        <div class="container ms-auto">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="images/logo-ambulance1.png" alt="Logo" class="logo me-2 img-fluid" style="max-height: 40px;">
                LIFELINK
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#home">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">ABOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="#types">CATEGORY</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">SERVICES</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">GALLERY</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">CONTACT</a></li>
                </ul>


                <!-- Profile Dropdown (visible after login) -->
                <?php
                    if (isset($_SESSION["userName"])) {
                        ?>
                        <div class="dropdown border-button2">
                            <button class="dropbtn d-flex align-items-center">
                                <?php
                                if (isset($_SESSION['userImage']) && !empty($_SESSION['userImage'])) {
                                    $userImage = './User-Dashboard/assets/images/user_img/' . $_SESSION['user_image'];
                                } else {
                                    // Set a default avatar if user image is not available
                                    $userImage = './User-Dashboard/assets/images/user_img/default-avatar.png';
                                }
                                ?>
                                <img src="<?php echo $userImage; ?>" class="avatar2 rounded-circle me-2" height="38"
                                    width="38" style="object-fit: cover;" alt="User Avatar">

                                <span><?php echo $_SESSION["userName"]; ?></span>
                            </button>
                            <div class="dropdown-content">
                                <a href="user.php">Profile</a>
                                <a href="./User-Dashboard/index.php">My Dashboard</a>
                                <a href="logout.php">LogOut</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="border-button">
                            <a href="form.php" class="sign-in-up"><i class="fa fa-user"></i> Sign In/Up</a>
                        </div>
                        <?php
                    }
                    ?>
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
            border-radius: 5px;
        }

        .nav-item .nav-link.active {
            font-weight: bold;
            color: #007bff;
        }

        .navbar-toggler-icon {
            background-color: #007bff;
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