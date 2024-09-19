       <!-- Footer -->
       <footer class="container-fluid bg-light">
            <div class="container footer-content">
                <div class="footer-logo">
                    <img src="Images/logo-ambulance1.png" alt="E-Ambulance Logo">
                    <h1>LifeLink</h1> <!-- Add hospital name here -->
                </div>
                <div>
                    <h5>Quick Links</h5>
                    <p><a href="#">Home</a></p>
                    <p><a href="#">About Us</a></p>
                    <p><a href="#">Services</a></p>
                    <p><a href="#">Contact</a></p>
                    <p><a href="#">FAQs</a></p>
                </div>
                <div>
                    <h5>Contact Us</h5>
                    <p>Email: info@eambulance.com</p>
                    <p>Phone: +123 456 7890</p>
                    <p>Address: 123 Ambulance St, City, Country</p>
                </div>
                <div>
                    <h5>Feedback</h5>
                    <form class="feedback-form">
                        <div class="form-group my-2">
                            <!-- <label for="feedback-name">Name</label> -->
                            <input type="text" class="form-control" id="feedback-name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group my-2">
                            <!-- <label for="feedback-email">Email address</label> -->
                            <input type="email" class="form-control" id="feedback-email" placeholder="Your Email"
                                required>
                        </div>
                        <div class="form-group my-2">
                            <!-- <label for="feedback-message">Your Feedback</label> -->
                            <textarea class="form-control" id="feedback-message" rows="3" placeholder="Your Feedback"
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary my-2">Submit Feedback</button>
                    </form>
                </div>
            </div>
        </footer>

        <style>
            /* Footer Styling */
            footer {
                color: #fff;
                padding: 2rem 0;
            }

            .footer-logo {
                display: flex;
                align-items: center;
                margin-bottom: 1rem;
            }

            .footer-logo img {
                width: 50px;
                /* Adjust the size of the logo */
                height: auto;
            }

            .footer-logo h1 {
                margin-left: 1rem;
                font-size: 2rem;
                font-weight: bold;
                color: #007bff;
                line-height: 1.2;
            }

            .footer-logo:hover img {
                transform: scale(1.05);
                /* Slightly zoom the logo on hover */
                transition: transform 0.3s ease;
            }

            .footer-social a {
                color: #fff;
                font-size: 1.75rem;
                margin: 0 0.75rem;
                transition: color 0.3s ease, transform 0.3s ease;
            }

            .footer-social a:hover {
                color: #007bff;
                /* Highlight color */
                transform: scale(1.1);
            }

            .footer-content {
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
                gap: 1rem;
                padding: 1rem 0;
            }

            .footer-content div {
                flex: 1;
                min-width: 200px;
            }

            .footer-content h5 {
                margin-bottom: 1rem;
                font-size: 1.25rem;
                font-weight: bold;
                color: #007bff;
                /* Section title color */
            }

            .footer-content p,
            .footer-content a {
                font-size: 0.875rem;
                color: black;
                text-decoration: none;
                transition: color 0.3s ease;
            }

            .footer-content a:hover {
                color: #007bff;
                /* Highlight color */
            }

            .feedback-form .form-control {
                border-radius: 5px;
            }

            .feedback-form .btn-primary {
                border-radius: 5px;
                background-color: #007bff;
                /* Button background color */
                border: none;
            }

            .feedback-form .btn-primary:hover {
                background-color: #0056b3;
                /* Darker shade for hover */
            }

            /* Responsive Adjustments */
            @media (max-width: 768px) {
                .footer-content {
                    text-align: center;
                }

                .footer-logo {
                    flex-direction: column;
                    align-items: center;
                    margin-bottom: 2rem;
                }

                .footer-logo h1 {
                    font-size: 1.5rem;
                    margin-left: 0;
                    margin-top: 0.5rem;
                }

                .footer-social a {
                    font-size: 1.5rem;
                }

                .feedback-form input[type="text"],
                .feedback-form input[type="email"],
                .feedback-form textarea,
                .feedback-form button {
                    width: 100%;
                    margin: 0;
                }
            }
        </style>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script>

    </script>


</body>

</html>