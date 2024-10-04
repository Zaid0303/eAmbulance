<?php
include("Includes/header.php");
include("Includes/nav.php");
include("config.php");
?>

<section id="gallery" class="container py-5">
    <h2 class="styled-heading">OUR GALLERY</h2>
    <div class="underline" style="border-radius: 50px;"></div>
    <div class="row g-4 mt-5" id="galleryItems">
        <?php
        $query = mysqli_query($con, "SELECT * FROM gallery");
        $counter = 1; // Counter to assign unique IDs
        while ($row = mysqli_fetch_array($query)) {
            $hiddenClass = ($counter > 6) ? 'd-none' : ''; // Hide gallery items after the 6th one
            ?>
            <!-- Gallery Item -->
            <div class="col-lg-4 col-md-6 gallery-container <?php echo $hiddenClass; ?>">
                <a href="#image<?php echo $counter; ?>"> <!-- Unique ID for each image -->
                    <img src="<?php echo 'assets/img/gallery-img/' . $row['gallery_img']; ?>"
                        class="gallery-photo img-fluid" alt="Gallery"
                        style="height: 250px; width: 100%; object-fit: cover;">
                    <div class="gallery-overlay">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </a>
            </div>

            <!-- Lightbox view -->
            <div id="image<?php echo $counter; ?>" class="lightbox-view mt-5">
                <a href="#" class="lightbox-close-btn">&times;</a>
                <img src="<?php echo 'assets/img/gallery-img/' . $row['gallery_img']; ?>" alt="Gallery">
            </div>

            <?php
            $counter++; // Increment the counter for unique IDs
        }
        ?>
    </div>

    <!-- Show More Button -->
    <div class="text-center mt-5">
        <button id="showMoreBtn" class="btn btn-primary" style="border-radius: 50px;">
            <i class="fas fa-chevron-down" style="margin-right: 8px;"></i> Show More
        </button>
    </div>
</section>

<!-- Gallery Styling Start -->
<style>
    .btn i {
        margin-right: 8px;
        /* Adds some space between the icon and text */
    }

    .btn:hover i {
        transform: scale(1.2);
        /* Slightly enlarges the icon on hover */
        transition: all 0.3s ease;
    }

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

    // show more button functionality

    document.addEventListener('DOMContentLoaded', function () {
        const showMoreBtn = document.getElementById('showMoreBtn');
        const galleryItems = document.querySelectorAll('#galleryItems .gallery-container');
        let showingAll = false;

        showMoreBtn.addEventListener('click', function () {
            if (!showingAll) {
                galleryItems.forEach(item => item.classList.remove('d-none'));
                showMoreBtn.innerHTML = '<i class="fas fa-chevron-up" style="margin-right: 8px;"></i> Show Less';
                showingAll = true;
            } else {
                galleryItems.forEach((item, index) => {
                    if (index >= 6) item.classList.add('d-none');
                });
                showMoreBtn.innerHTML = '<i class="fas fa-chevron-down" style="margin-right: 8px;"></i> Show More';
                showingAll = false;
            }
        });
    });



</script>


</body>

</html>

<?php
include("Includes/footer.php");
?>