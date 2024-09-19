 <!-- Main Content -->
 <div id="content" style="display: none;">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
            <div class="container ms-auto">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="images/logo-ambulance1.png" alt="Logo" class="logo me-2"> LIFELINK
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

                    <!-- Login/Signup Button (visible before login) -->
                    <div class="ms-3">
                        <a href="login.html">
                            <button class="btn btn-primary" id="loginSignupBtn">LOGIN</button>
                        </a>
                    </div>

                    <!-- Profile Dropdown (visible after login) -->
                    <!-- <button class="btn btn-primary" id="loginSignupBtn" >Login/Signup</button> -->

                    <!-- <div class="dropdown ms-3 d-none" id="profileDropdown">
                        <button class="btn dropdown-toggle d-flex align-items-center" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="images/avatar.png" alt="Avatar" class="rounded-circle me-2"
                                style="width: 30px; height: 30px;">
                            <span>John Doe</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">My Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div> -->
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

            /* Search Form */
            .search-form {
                transition: transform 0.3s ease;
            }

            .search-input {
                border: none;
                border-radius: 25px;
                padding: 0.5rem 1rem;
                background-color: #f1f1f1;
            }

            .search-btn {
                border: none;
                border-radius: 50%;
                padding: 0.5rem;
                background-color: #007bff;
                color: white;
                transition: background-color 0.3s ease;
            }

            .search-btn:hover {
                background-color: #0056b3;
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
            window.addEventListener('scroll', function () {
                var navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        </script>
        <!-- navbar ki script end -->