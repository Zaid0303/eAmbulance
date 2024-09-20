<?php
include("Includes/header.php");
include("Includes/nav.php");
include("config.php");
?>

<!-- hero section start -->
<section class="hero d-flex align-items-center text-white" id="hero">
    <div class="container text-center">
        <h2 class="display-4 animate-text">EMERGENCY AMBULANCE SERVICE</h2>
        <p class="lead animate-text" style="color: rgb(229, 229, 229);">Fast & Reliable Ambulance Booking at
            Your Fingertips</p>

        <!-- Booking Form -->
        <div class="booking-form mt-4 p-4 rounded shadow-lg animate-form bg-white text-dark">
            <h3 class="mb-4">BOOK AN AMBULANCE NOW</h3>
            <!-- <div class="underline"></div>                         -->
            <form action="insert-book.php" id="ambulanceBookingForm" class="mt-2" method="post" role="form">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <input type="text" name="pname" class="form-control" id="pname" placeholder="Enter Patient Name"
                            required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" name="rname" class="form-control" id="rname"
                            placeholder="Enter Relative Name" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="tel" class="form-control" name="phone" id="phone"
                            placeholder="Enter Relative Phone Number" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="date" name="hdate" class="form-control" id="hdate" placeholder="Hiring Date"
                            required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <input type="time" name="htime" class="form-control" id="htime" placeholder="Hiring Time"
                            required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select name="ambulancetype" id="ambulancetype" class="form-select">
                            <option value="">Select Type of Ambulance</option>
                            <option value="1">Basic Life Support (BLS) Ambulances</option>
                            <option value="2">Advanced Life Support (ALS) Ambulances</option>
                            <option value="3">Non-Emergency Patient Transport Ambulances</option>
                            <option value="4">Boat Ambulance</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address"
                            required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <input type="text" name="city" class="form-control" id="city" placeholder="Enter City" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <input type="text" class="form-control" name="state" id="state" placeholder="Enter State"
                            required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <textarea class="form-control" name="message" rows="5"
                            placeholder="Message (Optional)"></textarea>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary w-100 btn-animate" value="Book Now">
            </form>
        </div>
    </div>
</section>
<!-- Hero Section with Full-Width Image Slider END -->

<!-- About Section START-->
<section id="about" class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <?php
            $ret = mysqli_query($connection, "SELECT * FROM `about`");
            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="about-image-wrapper">
                        <img src="images/about-ambulance.jpg" class="img-fluid rounded shadow-sm" alt="About Us">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="styled-heading">ABOUT US</h2>
                    <div class="underline"></div>

                    <!-- Short Description -->
                    <p class="lead text-center mt-4" id="shortDescription">
                        <?php echo substr($row['PageDescription'], 0, 150); ?>...
                    </p>

                    <!-- Full Description (Hidden by default) -->
                    <p class="lead text-center mt-4" id="fullDescription" style="display: none;">
                        <?php echo $row['PageDescription']; ?>
                    </p>

                    <!-- Show More / Show Less Button -->
                    <button id="showMoreBtn" class="btn btn-primary scale-on-hover text-center mt-3">
                        Show More
                    </button>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<script>
    document.getElementById('showMoreBtn').addEventListener('click', function () {
        const shortDescription = document.getElementById('shortDescription');
        const fullDescription = document.getElementById('fullDescription');
        const showMoreBtn = document.getElementById('showMoreBtn');

        // Toggle between showing the short and full descriptions
        if (fullDescription.style.display === 'none') {
            fullDescription.style.display = 'block';
            shortDescription.style.display = 'none';
            showMoreBtn.textContent = 'Show Less';
        } else {
            fullDescription.style.display = 'none';
            shortDescription.style.display = 'block';
            showMoreBtn.textContent = 'Show More';
        }
    });
</script>

<!-- About Section END-->

<!-- Types Section Start -->
<!-- eAmbulance Type Section -->
<section id="types" class="py-5">
    <div class="container">
        <h2 class="styled-heading">CHOOSE YOUR AMBULANCE</h2>
        <div class="underline"></div>
        <div class="row mt-5">
            <!-- Ambulance Type Card 1 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 hover-scale">
                    <img src="images/ambulance.png" class="card-img-top" alt="Basic Ambulance">
                    <div class="card-body">
                        <h5 class="card-title">Basic Ambulance</h5>
                        <p class="card-text">
                            <strong>Size:</strong> Medium<br>
                            <strong>Equipment:</strong> First Aid Kit, Oxygen Cylinder<br>
                            <strong>Cost:</strong> $50/hour<br>
                            <strong>Specialization:</strong> Non-A/C, Non-ICU
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-primary scale-on-hover">Book Now</button>
                    </div>
                </div>
            </div>
            <!-- Ambulance Type Card 2 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 hover-scale">
                    <img src="images/ambulance.png" class="card-img-top" alt="Advanced Ambulance">
                    <div class="card-body">
                        <h5 class="card-title">Advanced Ambulance</h5>
                        <p class="card-text">
                            <strong>Size:</strong> Large<br>
                            <strong>Equipment:</strong> Defibrillator, Ventilator, Oxygen Cylinder<br>
                            <strong>Cost:</strong> $100/hour<br>
                            <strong>Specialization:</strong> A/C, ICU Equipped
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-primary scale-on-hover">Book Now</button>
                    </div>
                </div>
            </div>
            <!-- Ambulance Type Card 3 -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 hover-scale">
                    <img src="images/ambulance.png" class="card-img-top" alt="ICCU Ambulance">
                    <div class="card-body">
                        <h5 class="card-title">ICCU Ambulance</h5>
                        <p class="card-text">
                            <strong>Size:</strong> Extra Large<br>
                            <strong>Equipment:</strong> Full ICU Setup, Defibrillator, Ventilator, ECG
                            Machine<br>
                            <strong>Cost:</strong> $150/hour<br>
                            <strong>Specialization:</strong> A/C, ICCU Equipped
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-primary scale-on-hover">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- types section end -->

<!-- types section styling start -->
<style>
    /* General Styling */
    strong {
        font-family: "Roboto", sans-serif;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        overflow: hidden;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-family: 'Arial', sans-serif;
        font-size: 1.25rem;
        font-weight: bold;
        color: #007bff;
    }

    .card-text {
        font-family: 'Arial', sans-serif;
        font-size: 1rem;
        color: #333;
    }

    /* Hover Effects */
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .card-img-top {
        transition: transform 0.3s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.1);
    }

    .btn-primary {
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    /* Animations */
    .fade-in {
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hover-scale:hover {
        transform: scale(1.05);
        transition: all 0.3s ease;
    }
</style>
<!-- types section styling end -->

<!-- Services Section Start-->

<section id="services" class="py-5">
    <div class="container">
        <h2 class="styled-heading">OUR SERVICES</h2>
        <div class="underline"></div>
        <div class="row text-center mt-5">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 hover-effect">
                    <img src="images/ambulance.png" class="card-img-top" alt="Emergency Ambulance">
                    <div class="card-body">
                        <h5 class="card-title">Emergency Ambulance</h5>
                        <p class="card-text">Quick response to emergency situations 24/7.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 hover-effect">
                    <img src="images/ambulance.png" class="card-img-top" alt="Emergency Ambulance">
                    <div class="card-body">
                        <h5 class="card-title">Emergency Ambulance</h5>
                        <p class="card-text">Quick response to emergency situations 24/7.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 hover-effect">
                    <img src="Images/ambulance.png" class="card-img-top" alt="Event Ambulance">
                    <div class="card-body">
                        <h5 class="card-title">Event Ambulance</h5>
                        <p class="card-text">On-site medical assistance for public and private events.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service section styling start -->
<style>
    /* Services Section */
    #services {
        background-color: #f8f9fa;
    }

    .card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .card-img-top {
        border-bottom: 5px solid #007bff;
    }

    .card-body {
        padding: 1.5rem;
        text-align: center;
    }

    .card-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 1.25rem;
        color: #333;
        margin-bottom: 0.75rem;
    }

    .card-text {
        font-family: "Roboto", sans-serif;
        font-size: 1rem;
        color: #666;
    }

    .card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transform: translateY(-10px);
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }

    .card-img-container {
        position: relative;
        overflow: hidden;
    }

    .card-img-top {
        transition: transform 0.3s ease;
    }

    .hover-effect {
        position: relative;
    }

    .hover-effect::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.1);
        transition: opacity 0.3s ease;
        opacity: 0;
        z-index: 1;
    }

    .hover-effect:hover::before {
        opacity: 1;
    }

    .hover-effect .card-body {
        position: relative;
        z-index: 2;
    }

    .fade-in {
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>
<!-- service section styling end -->

<!-- Services Section End-->

<!-- Gallery Section Start -->
<section id="gallery" class="container py-5">
    <h2 class="styled-heading">OUR GALLERY</h2>
    <div class="underline"></div>
    <div class="row g-4 mt-5">
        <!-- Gallery Item 1 -->
        <div class="col-lg-4 col-md-6 gallery-container">
            <a href="#image1">
                <img src="Images/ambulance.png" class="gallery-photo img-fluid" alt="eAmbulance 1">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </a>
        </div>

        <!-- Gallery Item 2 -->
        <div class="col-lg-4 col-md-6 gallery-container">
            <a href="#image2">
                <img src="Images/ambulance.png" class="gallery-photo img-fluid" alt="eAmbulance 2">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </a>
        </div>

        <!-- Gallery Item 3 -->
        <div class="col-lg-4 col-md-6 gallery-container">
            <a href="#image3">
                <img src="Images/ambulance.png" class="gallery-photo img-fluid" alt="eAmbulance 3">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </a>
        </div>

        <!-- Gallery Item 4 -->
        <div class="col-lg-4 col-md-6 gallery-container">
            <a href="#image1">
                <img src="Images/ambulance.png" class="gallery-photo img-fluid" alt="eAmbulance 1">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </a>
        </div>

        <!-- Gallery Item 5 -->
        <div class="col-lg-4 col-md-6 gallery-container">
            <a href="#image2">
                <img src="Images/ambulance.png" class="gallery-photo img-fluid" alt="eAmbulance 2">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </a>
        </div>

        <!-- Gallery Item 6 -->
        <div class="col-lg-4 col-md-6 gallery-container">
            <a href="#image3">
                <img src="Images/ambulance.png" class="gallery-photo img-fluid" alt="eAmbulance 3">
                <div class="gallery-overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="gallery.php"><button class="btn btn-primary scale-on-hover text-center jus mt-5">Show More</button></a>
    </div>
</section>
<!-- Lightbox Modals -->
<div id="image1" class="lightbox-view mt-5">
    <a href="#" class="lightbox-close-btn">&times;</a>
    <img src="Images/ambulance.png" alt="eAmbulance 1">
</div>

<div id="image2" class="lightbox-view mt-5">
    <a href="#" class="lightbox-close-btn">&times;</a>
    <img src="Images/ambulance.png" alt="eAmbulance 2">
</div>

<div id="image3" class="lightbox-view mt-5">
    <a href="#" class="lightbox-close-btn">&times;</a>
    <img src="Images/ambulance.png" alt="eAmbulance 3">
</div>

<!-- Gallery Styling Start -->
<style>
    /* Custom gallery styling */
    .gallery-container {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .gallery-container:hover {
        transform: translateY(-12px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    /* Image styling */
    .gallery-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease-in-out;
    }

    /* Image hover zoom */
    .gallery-container:hover .gallery-photo {
        transform: scale(1.15);
    }

    /* Overlay customization */
    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .gallery-container:hover .gallery-overlay {
        opacity: 1;
    }

    /* Overlay content */
    .gallery-overlay i {
        font-size: 35px;
        color: #fff;
    }

    /* Lightbox styling */
    .lightbox-view {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .lightbox-view img {
        max-width: 85%;
        max-height: 85%;
        border-radius: 15px;
    }

    .lightbox-view:target {
        display: flex;
    }

    /* Close button styling */
    .lightbox-close-btn {
        position: absolute;
        top: 50px;
        /* Adjusted to move the button lower */
        right: 30px;
        font-size: 40px;
        color: white;
        text-decoration: none;
    }
</style>

<!-- Gallery Section End -->

<!-- JavaScript for Lightbox Functionality -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all gallery links
        const galleryLinks = document.querySelectorAll('.gallery-container a');

        // Get all lightbox views
        const lightboxViews = document.querySelectorAll('.lightbox-view');

        // Function to open lightbox
        function openLightbox(e) {
            e.preventDefault(); // Prevent default link behavior
            const targetId = this.getAttribute('href'); // Get the target lightbox id
            document.querySelector(targetId).style.display = 'flex'; // Show the lightbox
        }

        // Function to close lightbox
        function closeLightbox(e) {
            e.preventDefault(); // Prevent default link behavior
            this.parentElement.style.display = 'none'; // Hide the lightbox
        }

        // Add event listeners to gallery links
        galleryLinks.forEach(link => {
            link.addEventListener('click', openLightbox);
        });

        // Add event listeners to close buttons
        lightboxViews.forEach(view => {
            const closeButton = view.querySelector('.lightbox-close-btn');
            closeButton.addEventListener('click', closeLightbox);
        });
    });
</script>

<!-- Gallery Section End -->

<!--///////////////////////// Catalog Section start /////////////////////////////-->

<!-- <style>
            .catalog-section {
                padding: 60px 0;
                background: #f0f4f8;
            }

            .catalog-card {
                border: none;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .catalog-card:hover {
                transform: scale(1.05);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            }

            .catalog-card img {
                border-radius: 10px 10px 0 0;
                transition: opacity 0.3s;
            }

            .catalog-card:hover img {
                opacity: 0.9;
            }

            .catalog-card-body {
                padding: 20px;
            }

            .catalog-card-title {
                font-size: 1.25rem;
                margin-bottom: 10px;
            }

            .catalog-card-text {
                color: #6c757d;
                margin-bottom: 20px;
            }

            .catalog-card-price {
                font-size: 1.5rem;
                color: #007bff;
            }

            .btn-primary {
                border-radius: 5px;
                background-color: #007bff;
                border: none;
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }
        </style> -->
<!-- <section class="catalog-section">
            <div class="container">
                <div class="row">
                  
                    <div class="col-md-4 mb-4">
                        <div class="card catalog-card">
                            <img src="Images/ambulance-slider.jpg!sw800" class="card-img-top" alt="Ambulance Type 1">
                            <div class="card-body catalog-card-body">
                                <h5 class="card-title catalog-card-title">Ambulance Type 1</h5>
                                <p class="card-text catalog-card-text">A brief description of Ambulance Type 1 with its
                                    features and benefits.</p>
                                <p class="catalog-card-price">$500 - $800</p>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                 
                    <div class="col-md-4 mb-4">
                        <div class="card catalog-card">
                            <img src="Images/ambulance-slider.jpg!sw800" class="card-img-top" alt="Ambulance Type 2">
                            <div class="card-body catalog-card-body">
                                <h5 class="card-title catalog-card-title">Ambulance Type 2</h5>
                                <p class="card-text catalog-card-text">A brief description of Ambulance Type 2 with its
                                    features and benefits.</p>
                                <p class="catalog-card-price">$600 - $900</p>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-4 mb-4">
                        <div class="card catalog-card">
                            <img src="Images/ambulance-slider.jpg!sw800" class="card-img-top" alt="Ambulance Type 3">
                            <div class="card-body catalog-card-body">
                                <h5 class="card-title catalog-card-title">Ambulance Type 3</h5>
                                <p class="card-text catalog-card-text">A brief description of Ambulance Type 3 with its
                                    features and benefits.</p>
                                <p class="catalog-card-price">$700 - $1000</p>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

<!--///////////////////////// Catalog Section end //////////////////////////////-->


<!-- Contact Section -->
<section id="contact" class="py-5 fade-in">
    <div class="container">
        <h2 class="styled-heading">CONTACT US</h2>
        <div class="underline"></div>
        <div class="row mt-5">
            <!-- Contact Form -->
            <div class="col-lg-6 mb-4">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control input-field" id="name" placeholder="Enter your name"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control input-field" id="email" placeholder="Enter your email"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control input-field" id="message" rows="4"
                            placeholder="Enter your message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary scale-on-hover">Submit</button>
                </form>
            </div>
            <!-- Contact Details and Map -->
            <div class="col-lg-6">
                <h4>Contact Details</h4>
                <p><strong>Phone:</strong> 123-456-7890</p>
                <p><strong>Email:</strong> info@eambulance.com</p>
                <p><strong>Address:</strong> 123 Medical Road, Health City</p>
                <!-- Embedded Map -->
                <div class="map-container mt-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.089042972266!2d-122.3982110846349!3d37.78248597975829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809f7f6e2cf7%3A0x8a0e39f62fc2e1f1!2s123%20Medical%20Road%2C%20Health%20City!5e0!3m2!1sen!2sus!4v1633031234567!5m2!1sen!2sus"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- contact section styling start -->
<style>
    /* Contact Section Styling */
    .fade-in {
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .input-field {
        border-radius: 0.5rem;
        border: 1px solid #ccc;
        transition: border-color 0.3s ease;
    }

    .input-field:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }

    .scale-on-hover {
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .scale-on-hover:hover {
        transform: scale(1.05);
        background-color: #0056b3;
    }

    .map-container {
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h3 {
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        color: #333;
    }

    p {
        font-family: 'Arial', sans-serif;
        color: #666;
    }
</style>
<!-- contact section styling end -->

<?php
include("Includes/footer.php");
?>