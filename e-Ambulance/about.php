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
            <h2>OUR ABOUT</h2>
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
                <div class="col-md-4 team-member">
                    <img src="https://via.placeholder.com/150" alt="CEO">
                    <h5>Dr. Sarah Johnson</h5>
                    <p>CEO & Founder</p>
                </div>
                <div class="col-md-4 team-member">
                    <img src="https://via.placeholder.com/150" alt="Manager">
                    <h5>Mark Wilson</h5>
                    <p>Operations Manager</p>
                </div>
                <div class="col-md-4 team-member">
                    <img src="https://via.placeholder.com/150" alt="Paramedic">
                    <h5>Lisa Carter</h5>
                    <p>Lead Paramedic</p>
                </div>
            </div>
        </div>
    </section>


   
<?php
include("Includes/footer.php");
?>