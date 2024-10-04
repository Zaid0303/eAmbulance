<?php
include("Includes/header.php");
include("Includes/nav.php");
include("config.php");
?>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
</head>

<style>
    h2,
    p,
    h3 {
        font-family: 'Roboto', sans-serif !important;
    }

    .text-styling {
        font-family: 'Roboto', sans-serif;
        font-size: 1.1rem;
        line-height: 1.6;
        color: #6c757d;
        /* Light gray text */
        font-weight: 400;
        text-align: left;
        /* Adjust as per requirement */
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
        <h2 class="styled-heading mt-5">OUR ABOUT</h2>
        <div class="underline"></div>
    </div>
</section>

<section class="about-summary py-5">
    <div class="container">
        <div class="row align-items-center">
            <?php
            $ret = mysqli_query($con, "select * from tblpage where PageType='aboutus' ");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <div class="col-lg-6 mb-4">
                    <img src="<?php echo 'assets/img/' . $row["PageImage"]; ?>" alt="Ambulance Service"
                        class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="styled-heading">Leading Ambulance Service Since 2010</h2>
                    <p><?php echo $row['PageDescription']; ?></p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-primary"></i> 24/7 Emergency Service</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Advanced Life Support</li>
                        <li><i class="fas fa-check-circle text-primary"></i> Medical Transportation</li>
                    </ul>
                    <!-- <a href="more-about.php" class="btn btn-primary mt-3" style="border-radius: 50px;">More About Us <i
                        class="fas fa-arrow-right ms-2"></i></a> -->
                </div>
                <?php
            }
            ?>
        </div>

        <!-- Stats Section -->
        <div class="row text-center mt-5">
            <div class="col-md-6">
                <div class="stats-box bg-primary text-white p-4 rounded shadow">
                    <?php
                    $query = "SELECT COUNT(*) AS pro_count FROM `tbltrackinghistory`";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $pro_count = $row['pro_count'];
                    } else {
                        $pro_count = 0; 
                    }
                    ?>
                    <h3><?php echo number_format($pro_count); ?></h3>
                    <p>Successful Emergency Rides</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stats-box bg-primary text-white p-4 rounded shadow">
                    <?php
                    $query = "SELECT COUNT(*) AS pro_count FROM `feedback`";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $pro_count = $row['pro_count'];
                    } else {
                        $pro_count = 0;
                    }
                    ?>
                    <h3><?php echo number_format($pro_count); ?>%</h3>
                    <p>Satisfaction Rate</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services-section bg-light py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="service-box p-4 shadow bg-white rounded hover-effect">
                    <i class="fas fa-ambulance fa-3x text-primary mb-3"></i>
                    <h4>Our Mission</h4>
                    <p>To provide the fastest and safest emergency transportation services for those in need.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="service-box p-4 shadow bg-white rounded hover-effect">
                    <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
                    <h4>Our Planning</h4>
                    <p>Expanding our service network to reach more communities effectively.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="service-box p-4 shadow bg-white rounded hover-effect">
                    <i class="fas fa-heartbeat fa-3x text-primary mb-3"></i>
                    <h4>Our Vision</h4>
                    <p>To be the leader in emergency medical transport, known for professionalism and care.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonials-section py-5">
    <div class="container">
        <h2 class="styled-heading mt-5">OUR HAPPY PATIENTS</h2>
        <div class="underline"></div>
        <div class="row text-center mt-5">
            <?php
            $ret = mysqli_query($con, "select * from feedback");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <div class="col-md-4">
                    <div class="testimonial p-4 shadow bg-white rounded">
                        <img src="images/user_img/default-avatar.png" alt="Patient Testimonial" class="rounded-circle mb-3"
                            width="80">
                        <p>"<?php echo $row['f_mess']; ?>"</p>
                        <h5><?php echo $row['f_name']; ?></h5>
                        <p class="text-muted">Recovered Patient</p>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </div>
</section>

<style>
    .hero-section {
        background-blend-mode: darken;
        padding: 100px 0;
        background-color: rgba(0, 0, 0, 0.6);
    }

    .stats-box {
        transition: transform 0.3s ease-in-out;
    }

    .stats-box:hover {
        transform: scale(1.05);
    }

    .service-box {
        transition: all 0.3s ease-in-out;
    }

    .service-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .testimonial {
        transition: transform 0.3s ease-in-out;
    }

    .testimonial:hover {
        transform: scale(1.05);
    }

    .styled-heading {
        font-size: 36px;
        font-weight: bold;
        color: #333;
    }

    .underline {
        width: 50px;
        height: 5px;
        background-color: #007bff;
        margin: 10px auto;
        border-radius: 50px;
    }
</style>


<section class="team-section">
    <div class="container">
        <h2 class="styled-heading mt-5">MEET OUR DEDICATED DRIVERS</h2>
        <div class="underline"></div>
        <div class="row mt-5">
            <?php
            $ret = mysqli_query($con, "select * from tblambulance LIMIT 3");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {
                ?>
                <div class="col-md-4 team-member">
                    <img src="images/user_img/default-avatar.png" alt="CEO">
                    <h5><?php echo $row['DriverName']; ?></h5>
                    <p><?php echo $row['DriverContactNumber']; ?></p>
                </div>
                <?php
            }
            ?>
        </div>

    </div>
</section>



<?php
include("Includes/footer.php");
?>