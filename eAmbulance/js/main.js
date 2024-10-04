// Loader Function
function hideLoader() {
    setTimeout(function () {
        document.getElementById('loader').style.display = 'none';
        document.getElementById('content').style.display = 'block';
    }, 2000); // Loader will be visible for 2 seconds
}

////////////// Navbar \\\\\\\\\\\\\\\\\
// Scroll to sections on nav click
$('a[href*="#"]').on('click', function (e) {
    e.preventDefault();

    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top - 100
    }, 500);
});
////////////// Navbar \\\\\\\\\\\\\\\\\


////////////// Login & SignUp \\\\\\\\\\\\\\\\\
// Function to toggle eye icon password visibility
function togglePassword(inputId, iconId) {
    const passwordField = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
////////////// Login & SignUp \\\\\\\\\\\\\\\\\


