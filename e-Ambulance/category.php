<?php
include("Includes/header.php");
include("Includes/nav.php");
include("config.php");
?>

<!-- Category Section -->
<section class="team-section my-3">
    <div class="container py-5">
        <h2 class="styled-heading">OUR CATEGORIES</h2>
        <div class="underline"></div>

        <!-- Search and Filter Section -->
        <div class="row mb-5 mt-5 d-flex justify-content-end">
            <div class="col-md-4">
                <input type="text" id="searchArea" class="form-control" placeholder="Search by Area/Region">
            </div>
            <div class="col-md-4">
                <select id="priceFilter" class="form-control">
                    <option value="all">Sort by Price</option>
                    <option value="low">Low to High</option>
                    <option value="high">High to Low</option>
                </select>
            </div>
            <div class="col-md-4">
                <select id="typeFilter" class="form-control">
                    <option value="all">Filter by Type</option>
                    <option value="Basic Ambulance">Basic Ambulance</option>
                    <option value="Advanced Ambulance">Advanced Ambulance</option>
                    <option value="ICCU Ambulance">ICCU Ambulance</option>
                </select>
            </div>
        </div>


        <!-- Ambulance Cards Section -->
        <div class="row mt-5" id="ambulanceCards">
            <!-- Ambulance Type Card 1 -->
            <div class="col-md-6 col-lg-4 mb-4 ambulance-card" data-region="Chicago" data-price="50"
                data-type="Basic Ambulance">
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
            <div class="col-md-6 col-lg-4 mb-4 ambulance-card" data-region="New York" data-price="100"
                data-type="Advanced Ambulance">
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
            <div class="col-md-6 col-lg-4 mb-4 ambulance-card" data-region="Chicago" data-price="150"
                data-type="ICCU Ambulance">
                <div class="card h-100 hover-scale">
                    <img src="images/ambulance.png" class="card-img-top" alt="ICCU Ambulance">
                    <div class="card-body">
                        <h5 class="card-title">ICCU Ambulance</h5>
                        <p class="card-text">
                            <strong>Size:</strong> Extra Large<br>
                            <strong>Equipment:</strong> Full ICU Setup, Defibrillator, Ventilator, ECG Machine<br>
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

        <p id="noResultMessage" style="display: none; text-align: center;">No result found</p>
    </div>
</section>
<!-- Category Section -->

<!-- JavaScript for Search, Sort, and Filter -->
<script>
    document.getElementById('searchArea').addEventListener('input', filterAmbulances);
    document.getElementById('priceFilter').addEventListener('change', filterAmbulances);
    document.getElementById('typeFilter').addEventListener('change', filterAmbulances);

    function filterAmbulances() {
        const areaInput = document.getElementById('searchArea').value.toLowerCase();
        const priceSort = document.getElementById('priceFilter').value;
        const typeFilter = document.getElementById('typeFilter').value;

        const ambulanceCards = document.querySelectorAll('.ambulance-card');
        let isResultFound = false;

        // Filter cards based on area/region and type
        ambulanceCards.forEach(card => {
            const region = card.getAttribute('data-region').toLowerCase();
            const price = parseInt(card.getAttribute('data-price'));
            const type = card.getAttribute('data-type');

            let matchesArea = region.includes(areaInput);
            let matchesType = (typeFilter === 'all' || type === typeFilter);

            if (matchesArea && matchesType) {
                card.style.display = 'block';
                isResultFound = true; // Set true if a match is found
            } else {
                card.style.display = 'none';
            }
        });

        // Display 'No result found' message if no matches are found
        const noResultMessage = document.getElementById('noResultMessage');
        if (!isResultFound) {
            noResultMessage.style.display = 'block';
        } else {
            noResultMessage.style.display = 'none';
        }

        // Sort by price
        if (priceSort !== 'all') {
            let sortedCards = [...ambulanceCards].sort((a, b) => {
                const priceA = parseInt(a.getAttribute('data-price'));
                const priceB = parseInt(b.getAttribute('data-price'));
                return priceSort === 'low' ? priceA - priceB : priceB - priceA;
            });
            const cardsContainer = document.getElementById('ambulanceCards');
            cardsContainer.innerHTML = '';
            sortedCards.forEach(card => {
                cardsContainer.appendChild(card);
            });
        }
    }

</script>

<!-- Category page Styling -->
<style>
    h2,
    p,
    h3 {
        font-family: 'Roboto', sans-serif !important;

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

    /* Category Cards Styling */
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
<!-- Category page Styling -->


<?php
include("Includes/footer.php");
?>