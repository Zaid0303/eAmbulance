<?php
include("Includes/header.php");
include("Includes/nav.php");
include("config.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Category Section -->
<section class="team-section my-3">
    <div class="container py-5">
        <h2 class="styled-heading">OUR CATEGORIES</h2>
        <div class="underline" style="border-radius: 50px;"></div>

        <!-- Search and Filter Section -->
        <div class="row mb-5 mt-5 d-flex justify-content-end">
            <!-- Search Input with Icon -->
            <div class="col-md-4 position-relative">
                <i class="fas fa-search icon-style"></i> <!-- Search Icon -->
                <input type="text" id="searchArea" class="form-control styled-input"
                    placeholder="Search by Area/Region">
            </div>

            <!-- Price Filter Dropdown with Icon -->
            <div class="col-md-4 position-relative">
                <i class="fas fa-dollar-sign icon-style"></i> <!-- Dollar Icon -->
                <select id="priceFilter" class="form-control styled-input">
                    <option value="all">Filter by Price</option>
                    <?php
                    $query = mysqli_query($con, "SELECT DISTINCT cat_cost FROM category");
                    while ($row = mysqli_fetch_array($query)) {
                        echo '<option value="' . $row['cat_cost'] . '">' . $row['cat_cost'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Type Filter Dropdown with Icon -->
            <div class="col-md-4 position-relative">
                <i class="fas fa-list icon-style"></i> <!-- List Icon -->
                <select id="typeFilter" class="form-control styled-input">
                    <option value="all">Filter by Type</option>
                    <?php
                    $query = mysqli_query($con, "SELECT DISTINCT cat_name FROM category");
                    while ($row = mysqli_fetch_array($query)) {
                        echo '<option value="' . $row['cat_name'] . '">' . $row['cat_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>


        <p id="noResultMessage" style="display: none; text-align: center;">No result found</p>

        <!-- Ambulance Cards Section -->
        <div class="row mt-5" id="ambulanceCards">
            <?php
            $query = mysqli_query($con, "SELECT * FROM category");
            $counter = 0;
            while ($row = mysqli_fetch_array($query)) {
                $counter++;
                $hiddenClass = $counter > 6 ? 'd-none' : '';
                ?>
                <div class="col-md-6 col-lg-4 mb-4 ambulance-card mt-5 <?php echo $hiddenClass; ?>"
                    data-region="<?php echo $row['cat_address']; ?>" data-cost="<?php echo $row['cat_cost']; ?>"
                    data-type="<?php echo $row['cat_name']; ?>">
                    <div class="card h-100 hover-scale">
                        <a href="category.php"><img src="<?php echo 'assets/img/category-img/' . $row['cat_img']; ?>"
                                class="card-img-top img-fluid" alt="<?php echo $row['cat_name']; ?>"
                                style="height: 250px; width: 100%; object-fit: cover;"></a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['cat_name']; ?></h5>
                            <p class="card-text">
                                <strong>Size:</strong> <?php echo $row['cat_capacity']; ?><br>
                                <strong>Equipment:</strong> <?php echo $row['cat_equipment']; ?><br>
                                <strong>Cost:</strong> <?php echo $row['cat_cost']; ?><br>
                                <strong>Specialization:</strong> <?php echo $row['cat_specialization']; ?><br>
                                <strong>Area/Region:</strong> <?php echo $row['cat_address']; ?>
                            </p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="index.php"><button class="btn btn-primary scale-on-hover" style="border-radius: 50px;">Book Now</button></a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <!-- Show More Button -->
        <div class="text-center mt-5">
            <button id="showMoreBtn" class="btn btn-primary"style="border-radius: 50px;">
                <i class="fas fa-chevron-down" style="margin-right: 8px;"></i> Show More
            </button>
        </div>



    </div>
</section>


<!-- JavaScript for Show More, Search, Sort, and Filter -->
<script>

    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchArea');
        const priceFilter = document.getElementById('priceFilter');
        const typeFilter = document.getElementById('typeFilter');
        const cards = document.querySelectorAll('.ambulance-card');
        const showMoreBtn = document.getElementById('showMoreBtn');
        const noResultMessage = document.getElementById('noResultMessage');
        let showingAll = false;

        // Show or hide cards based on filters
        function filterCards() {
            let searchValue = searchInput.value.toLowerCase();
            let priceValue = priceFilter.value;
            let typeValue = typeFilter.value.toLowerCase(); // Lowercase for comparison
            let visibleCount = 0;

            cards.forEach(card => {
                const region = card.getAttribute('data-region').toLowerCase();
                const cost = card.getAttribute('data-cost');
                const type = card.getAttribute('data-type').toLowerCase(); // Lowercase for comparison

                // Check if card matches the filters
                let isVisible = (region.includes(searchValue) || searchValue === '') &&
                    (priceValue === 'all' || cost === priceValue) &&
                    (typeValue === 'all' || type === typeValue);

                if (isVisible) {
                    card.classList.remove('d-none');
                    visibleCount++;
                } else {
                    card.classList.add('d-none');
                }
            });

            noResultMessage.style.display = visibleCount === 0 ? 'block' : 'none';
        }

        // Show more functionality
        showMoreBtn.addEventListener('click', function () {
            const icon = showMoreBtn.querySelector('i');
            if (!showingAll) {
                cards.forEach(card => card.classList.remove('d-none'));
                showMoreBtn.textContent = ' Show Less'; // Reset text content
                showMoreBtn.prepend(icon); // Re-append the icon to ensure it's not removed
                icon.classList.replace('fa-chevron-down', 'fa-chevron-up'); // Change icon
                showingAll = true;
            } else {
                // Hide all except first 6
                cards.forEach((card, index) => {
                    if (index >= 6) card.classList.add('d-none');
                });
                showMoreBtn.textContent = ' Show More';
                showMoreBtn.prepend(icon);
                icon.classList.replace('fa-chevron-up', 'fa-chevron-down'); // Change icon back
                showingAll = false;
            }
        });

        // Filter on input changes
        searchInput.addEventListener('input', filterCards);
        priceFilter.addEventListener('change', filterCards);
        typeFilter.addEventListener('change', filterCards);
    });

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

    /* General Input & Select Styling */
    .styled-input {
        padding-left: 40px;
        /* To give space for the icons */
        border-radius: 30px;
        border: 2px solid #ccc;
        transition: border-color 0.3s ease;
    }

    .styled-input:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    /* Icon Styling */
    .icon-style {
        position: absolute;
        top: 50%;
        left: 25px;
        transform: translateY(-50%);
        font-size: 18px;
        color: #007bff;
    }

    /* Hover Effect for Input/Dropdown Fields */
    .styled-input:hover {
        border-color: #007bff;
    }

    /* Transition for Smooth Hover */
    .styled-input,
    .icon-style {
        transition: all 0.3s ease;
    }

    #showMoreBtn i {
        margin-right: 8px;
        /* Adds space between icon and text */
    }
</style>
<!-- Category page Styling -->


<?php
include("Includes/footer.php");
?>