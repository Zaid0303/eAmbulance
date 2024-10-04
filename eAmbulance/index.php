<?php

include("Includes/header.php");
include("Includes/nav.php");
include("config.php");
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<section style="height:100%;" class="hero d-flex align-items-center text-white" id="hero">
    
    <div class="container text-center">
    <br><br><br>
        <h2 class="display-4 animate-text">EMERGENCY AMBULANCE SERVICE</h2>
        <p class="lead animate-text" style="color: rgb(229, 229, 229);">Fast & Reliable Ambulance Booking at Your Fingertips</p>

        <div class="booking-form mt-4 p-4 rounded shadow-lg animate-form bg-white text-dark">
            <h3 class="mb-4">BOOK AN AMBULANCE NOW</h3>

            <form action="insert-book.php" method="post" role="form" class="form-control">
                <div class="row" style="padding-top: 20px;">
                    <div class="col-md-3 form-group">
                        <input type="text" name="pname" class="form-control" id="pname" placeholder="Enter Patient Name" required>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="text" name="rname" class="form-control" id="rname" placeholder="Enter Relative Name" required>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Relative Phone Number" required>
                    </div>
                    <div class="col-md-3 form-group d-flex">
                        <input name="user_location" type="text" class="form-control me-2" id="userLocation" placeholder="Click side icon" readonly>
                        <button type="button" class="btn btn-secondary btn-sm" id="useLocation">
                            <i class="fas fa-location-arrow"></i>
                        </button>
                    </div>
                </div>

                <div class="row" style="padding-top: 10px;">
                    <div class="col-md-3 form-group">
                        <input type="text" name="hospitals" class="form-control" id="hospitalSearch" placeholder="Search for hospitals" required>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="date" name="hdate" class="form-control datepicker" id="hdate" placeholder="Hiring Date" required>
                    </div>
                    <div class="col-md-3 form-group">
                        <input type="time" name="htime" class="form-control datepicker" id="htime" placeholder="Hiring Time" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select name="ambulancetype" id="ambulancetype" class="form-select">
                            <option value="">Select Type of Ambulance</option>
                            <?php
                            $query = mysqli_query($con, "SELECT DISTINCT cat_name FROM category");
                            while ($row = mysqli_fetch_array($query)) {
                                echo '<option value="' . $row['cat_name'] . '">' . $row['cat_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row" style="padding-top: 20px;">
                    <div class="col-md-4 form-group">
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" name="city" class="form-control" id="city" placeholder="Enter City" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" class="form-control" name="state" id="state" placeholder="Enter State" required>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                </div>
                <div class="text-center" style="padding-top: 20px; padding-bottom: 20px;">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <br><br>
    </div>
    <div id="googleMap"></div>
</section>


<script>
let map;
let directionsService;
let directionsRenderer;
let userLocation;

function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(24.9273, 67.0330),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map);

    document.getElementById('useLocation').addEventListener('click', function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            userLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            map.setCenter(userLocation);
            map.setZoom(15);

            new google.maps.Marker({
                position: userLocation,
                map: map,
                title: "Your Location"
            });

            document.getElementById('userLocation').value = position.coords.latitude + ', ' + position.coords.longitude;

        }, function() {
            alert("Geolocation service failed.");
        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
});

    var hospitalInput = document.getElementById('hospitalSearch');
    var autocomplete = new google.maps.places.Autocomplete(hospitalInput, {
        types: ['establishment'],
        componentRestrictions: { country: 'pk' }
    });

    autocomplete.setFields(['name', 'geometry']);

    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            console.log("No details available for input: '" + place.name + "'");
            return;
        }
        map.setCenter(place.geometry.location);
        map.setZoom(15);

        new google.maps.Marker({
            position: place.geometry.location,
            map: map,
            title: place.name
        });

        if (userLocation) {
            calculateAndDisplayRoute(place.geometry.location);
        }
    });
}

function calculateAndDisplayRoute(destination) {
    directionsService.route({
        origin: userLocation,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING
    }, function(response, status) {
        if (status === 'OK') {
            directionsRenderer.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOfoQEnSeEMhNmp8NI6ZZGulHloVCIZUA&libraries=places&callback=myMap" async defer></script>

<section id="about" class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <?php
            $ret = mysqli_query($con, "select * from tblpage where PageType='aboutus' ");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="about-image-wrapper">
                        <img src="<?php echo 'assets/img/' . $row["PageImage"]; ?>"
                            class="img-fluid rounded shadow-sm" alt="About Us">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="styled-heading">ABOUT US</h2>
                    <div class="underline" style="border-radius: 50px;"></div>
                    <p class="lead text-center mt-4"><?php echo $row['PageDescription']; ?></p>

                    <div class="text-center mt-4">
                        <a href="about.php" class="btn btn-primary" style="border-radius: 50px;">
                            Read More
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>


<style>
    .about-image-wrapper {
        text-align: center;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        position: relative;
    }

    .about-image-wrapper img {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .about-image-wrapper img:hover {
        transform: scale(1.05);
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
    }

    .about-info h4 {
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        color: #007bff;
        margin-top: 1.5rem;
    }

    .about-info p {
        font-family: 'Arial', sans-serif;
        font-size: 1rem;
        line-height: 1.6;
        color: #333;
    }

    .lead {
        font-family: "Roboto", sans-serif;
        font-size: 1.25rem;
        color: #555;
    }
</style>

<section id="types" class="py-5">
    <div class="container">
        <h2 class="styled-heading">CHOOSE YOUR AMBULANCE</h2>
        <div class="underline" style="border-radius: 50px;"></div>
        <div class="row mt-5">
            <?php
            $query = mysqli_query($con, "SELECT * FROM category LIMIT 3");
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <!-- Ambulance Type Card -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 hover-scale">
                        <img src="<?php echo 'assets/img/category-img/' . $row['cat_img']; ?>"
                            class="card-img-top img-fluid" alt="Category"
                            style="height: 250px; width: 100%; object-fit: cover;">

                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['cat_name']; ?></h5>
                            <p class="card-text">
                                <strong>Size:</strong> <?php echo $row['cat_capacity']; ?><br>
                                <strong>Equipment:</strong> <?php echo $row['cat_equipment']; ?><br>
                                <strong>Cost:</strong> <?php echo $row['cat_cost']; ?><br>
                                <strong>Specialization:</strong> <?php echo $row['cat_specialization']; ?>
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#hero" class="btn btn-primary scale-on-hover" style="border-radius: 50px;">Book Now</a>
                        </div>

                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="category.php">
            <button class="btn btn-primary scale-on-hover text-center jus mt-5" style="border-radius: 50px;">
                <i class="fas fa-ambulance"></i> Explore More Ambulance
            </button>
        </a>
    </div>

</section>

<style>

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

    .btn i {
        margin-right: 8px;
    }

    .btn:hover i {
        transform: scale(1.2);
        transition: all 0.3s ease;
    }
</style>


<section id="services" class="py-5">
    <div class="container">
        <h2 class="styled-heading">OUR SERVICES</h2>
        <div class="underline" style="border-radius: 50px;"></div>
        <div class="row text-center mt-5">
            <?php
            $query = mysqli_query($con, "SELECT * FROM service LIMIT 3");
            while ($row = mysqli_fetch_array($query)) {
                ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 hover-effect">
                        <img src="<?php echo 'assets/img/service-img/' . $row['ser_img']; ?>" class="card-img-top"
                            alt="Service" style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['ser_name']; ?></h5>
                            <p class="card-text"><?php echo $row['ser_para']; ?></p>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </div>
</section>

<style>

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

<section id="gallery" class="container py-5">
    <h2 class="styled-heading">OUR GALLERY</h2>
    <div class="underline" style="border-radius: 50px;"></div>
    <div class="row g-4 mt-5">
        <?php
        $query = mysqli_query($con, "SELECT * FROM gallery LIMIT 3");
        $counter = 1;
        while ($row = mysqli_fetch_array($query)) {
            ?>
            <div class="col-lg-4 col-md-6 gallery-container">
                <a href="#image<?php echo $counter; ?>">
                    <img src="<?php echo 'assets/img/gallery-img/' . $row['gallery_img']; ?>"
                        class="gallery-photo img-fluid" alt="Gallery"
                        style="height: 250px; width: 100%; object-fit: cover;">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
            </div>

            <div id="image<?php echo $counter; ?>" class="lightbox-view mt-5">
                <a href="#" class="lightbox-close-btn">&times;</a>
                <img src="<?php echo 'assets/img/gallery-img/' . $row['gallery_img']; ?>" alt="Gallery">
            </div>

            <?php
            $counter++;
        }
        ?>
    </div>

    <div class="d-flex justify-content-center">
        <a href="gallery.php">
            <button class="btn btn-primary scale-on-hover text-center jus mt-5" style="border-radius: 50px;">
                <i class="fas fa-images"></i> Explore More Gallery
            </button>
        </a>
    </div>
</section>

<style>
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

    .gallery-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease-in-out;
    }

    .gallery-container:hover .gallery-photo {
        transform: scale(1.15);
    }

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

    .gallery-overlay i {
        font-size: 35px;
        color: #fff;
    }

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

    .lightbox-close-btn {
        position: absolute;
        top: 50px;
        right: 30px;
        font-size: 40px;
        color: white;
        text-decoration: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const galleryLinks = document.querySelectorAll('.gallery-container a');

        const lightboxViews = document.querySelectorAll('.lightbox-view');

        function openLightbox(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            document.querySelector(targetId).style.display = 'flex';
        }

        function closeLightbox(e) {
            e.preventDefault();
            this.parentElement.style.display = 'none';
        }

        galleryLinks.forEach(link => {
            link.addEventListener('click', openLightbox);
        });

        lightboxViews.forEach(view => {
            const closeButton = view.querySelector('.lightbox-close-btn');
            closeButton.addEventListener('click', closeLightbox);
        });
    });
</script>

<section id="contact" class="py-5 fade-in">
    <div class="container">
        <h2 class="styled-heading">CONTACT US</h2>
        <div class="underline" style="border-radius: 50px;"></div>
        <div class="row mt-5">
            <?php
            $query = mysqli_query($con, "select * from  tblpage where PageType='contactus'");
            while ($row = mysqli_fetch_array($query)) {


                ?>
                <div class="col-lg-6 mb-4">
                    <form action="insert-contact.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control input-field" id="contact-name" name="contact-name"
                                placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control input-field" id="contact-email" name="contact-email"
                                placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control input-field" name="contact-message" id="contact-message" rows="4"
                                placeholder="Enter your message" required></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary scale-on-hover" name="addcontact" value="Submit"
                            style="border-radius: 50px;">
                    </form>
                </div>

                <div class="col-lg-6">
                    <h4>Contact Details</h4>
                    <p><strong>Phone:</strong> <?php echo $row['MobileNumber']; ?></p>
                    <p><strong>Email:</strong> <?php echo $row['Email']; ?></p>
                    <p><strong>Address:</strong> <?php echo $row['PageDescription']; ?></p>

                    <div class="map-container mt-4">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.089042972266!2d-122.3982110846349!3d37.78248597975829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809f7f6e2cf7%3A0x8a0e39f62fc2e1f1!2s123%20Medical%20Road%2C%20Health%20City!5e0!3m2!1sen!2sus!4v1633031234567!5m2!1sen!2sus"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            <?php } ?>
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


<!-- contact us form email script -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var messageText = "<?= $_SESSION['status'] ?? ''; ?>";

    if (messageText != '') {
        Swal.fire({
            title: "Confirmation Needed",
            text: messageText,
            icon: "warning",  // Use 'warning' icon for confirmation
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, go ahead!",
            cancelButtonText: "Cancel",
            reverseButtons: true,
            background: '#fffbe6', // Light yellow background
            backdrop: `rgba(0,0,0,0.5)`
        }).then((result) => {
            if (result.isConfirmed) {
                // Show success alert if confirmed
                Swal.fire({
                    title: 'Confirmed!',
                    text: 'Your action has been confirmed successfully.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });
            } else {
                // Show error alert if cancelled
                Swal.fire({
                    title: 'Cancelled',
                    text: 'Your action has been cancelled.',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        });
        <?php unset($_SESSION['status']); ?>
    }
</script>

<script>
    var messageText = "<?= $_SESSION['status1'] ?? ''; ?>";

    if (messageText != '') {
        Swal.fire({
            title: "Confirmation Needed",
            text: messageText,
            icon: "warning",  // Use 'warning' icon for confirmation
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, go ahead!",
            cancelButtonText: "Cancel",
            reverseButtons: true,
            background: '#fffbe6', // Light yellow background
            backdrop: `rgba(0,0,0,0.5)`
        }).then((result) => {
            if (result.isConfirmed) {
                // Show success alert if confirmed
                Swal.fire({
                    title: 'Confirmed!',
                    text: 'Your action has been confirmed successfully.',
                    icon: 'success1',
                    showConfirmButton: false,
                    timer: 3000
                });
            } else {
                // Show error alert if cancelled
                Swal.fire({
                    title: 'Cancelled',
                    text: 'Your action has been cancelled.',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        });
        <?php unset($_SESSION['status1']); ?>
    }
</script>


<?php
include("Includes/footer.php");
?>