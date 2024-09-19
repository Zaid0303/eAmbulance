<?php
include("Includes/header.php");
include("Includes/nav.php");
include("config.php");
?>

    <style>
        h2,
        p,
        h3 {
            font-family: 'Roboto', sans-serif !important;

        }


        .about-section {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('./Images/herobg.jpg');
            background-size: cover;
            color: white;
            padding: 60px 0;
        }

        .about-section h2 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .about-section p {
            font-size: 1.2rem;
            line-height: 1.7;
        }

        .team-section h3 {
            font-size: 2rem;
            margin-top: 40px;
            text-align: center;
            margin-bottom: 30px;
        }

        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }

        .team-member img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            transition: transform 0.3s ease;
        }

        .team-member img:hover {
            transform: scale(1.1);
        }

        .team-member h5 {
            margin-top: 15px;
            font-size: 1.1rem;
            color: #007bff;
        }

        .team-member p {
            color: #6c757d;
        }

        .hover-underline:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .about-section h2 {
                font-size: 2.5rem;
            }

            .about-section p {
                font-size: 1rem;
            }
        }
    </style>

    <!-- About Us Section -->
    <section class="about-section text-center">
        <div class="container">
            <h2>OUR CATEGORIES</h2>
            <div class="underline"></div>
            <p class="mt-3">At Life Link Ambulance Service, we are dedicated to providing fast, reliable, and
                compassionate medical
                transportation. Serving various regions, our fleet of modern ambulances is equipped with
                state-of-the-art medical technology to ensure patient safety and comfort.</p>
            <p>Our mission is to respond swiftly in emergencies, providing critical support and care during transport to
                medical facilities. We pride ourselves on our commitment to excellence and are trusted by hospitals,
                communities, and individuals.</p>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <h2 class="styled-heading my-5">MEET OUR DEDICATED DRIVERS</h2>
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


   
<?php
include("Includes/footer.php");
?>