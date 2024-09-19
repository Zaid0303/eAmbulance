<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeLink</title>

    <!-- Favicon link -->
    <link rel="shortcut icon" href="Images/logo-ambulance1.png" type="image/x-icon">

    <!-- font awesome links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="./css/style.css">

</head>

<body onload="hideLoader()">

    <!-- Loader ki styling Start -->
    <style>
        /* Loader Styles */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .spinner {
            border: 8px solid #f3f3f3;
            /* Light grey */
            border-top: 8px solid #007bff;
            /* Blue */
            border-radius: 50%;
            width: 80px;
            height: 80px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Content will appear after loader disappears */
        #content {
            display: none;
        }

        /* Navbar Logo */
        .navbar-brand img {
            max-width: 50px;
            margin-right: 10px;
        }

        /* Custom Hover Effects */
        .scale-on-hover {
            transition: transform 0.3s ease;
        }

        .scale-on-hover:hover {
            transform: scale(1.1);
        }

        /* loader styling start */

        /* Loader Container */
        #loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            /* Background color during loading */
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Loader Image Animation */
        .lds-logo {
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: spin 2s infinite ease-in-out;
            /* Animation effect */
        }

        /* Image size can be adjusted as needed */
        .lds-logo img {
            width: 80px;
            /* You can adjust the size of the logo */
            height: 80px;
            object-fit: contain;
            animation: bounce 1.5s infinite ease-in-out;
        }

        /* Spin Animation */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Bounce Animation */
        @keyframes bounce {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        /* loader styling end */

        /* Reset. */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-size: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Panels. */
        .splitview {
            position: relative;
            width: 100%;
            min-height: 45vw;
            overflow: hidden;
        }

        .panel {
            position: absolute;
            width: 100vw;
            min-height: 45vw;
            overflow: hidden;
        }

        .panel .content {
            position: absolute;
            width: 100vw;
            min-height: 45vw;
            color: #FFF;
        }

        .panel .description {
            width: 25%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
        }

        .panel img {
            box-shadow: 0 0 20px 20px rgba(0, 0, 0, 0.15);
            width: 35%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }


        .bottom {
            background-color: rgb(44, 44, 44);
            z-index: 1;
        }

        .bottom .description {
            right: 5%;
        }

        .top {
            background-color: #007bff;
            z-index: 2;
            width: 50vw;

            /*-webkit-clip-path: polygon(60% 0, 100% 0, 100% 100%, 40% 100%);
    clip-path: polygon(60% 0, 100% 0, 100% 100%, 40% 100%);*/
        }

        .top .description {
            left: 5%;
        }

        /* Handle. */
        .handle {
            height: 100%;
            position: absolute;
            display: block;
            background-color: rgb(253, 171, 0);
            width: 5px;
            top: 0;
            left: 50%;
            z-index: 3;
        }

        /* Skewed. */
        .skewed .handle {
            top: 50%;
            transform: rotate(30deg) translateY(-50%);
            height: 200%;
            -webkit-transform-origin: top;
            -moz-transform-origin: top;
            transform-origin: top;
        }

        .skewed .top {
            transform: skew(-30deg);
            margin-left: -1000px;
            width: calc(50vw + 1000px);
        }

        .skewed .top .content {
            transform: skew(30deg);
            margin-left: 1000px;
        }

        /* Responsive. */
        @media (max-width: 900px) {
            body {
                font-size: 75%;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var parent = document.querySelector('.splitview'),
                topPanel = parent.querySelector('.top'),
                handle = parent.querySelector('.handle'),
                skewHack = 0,
                delta = 0;

            // If the parent has .skewed class, set the skewHack var.
            if (parent.className.indexOf('skewed') != -1) {
                skewHack = 1000;
            }

            parent.addEventListener('mousemove', function (event) {
                // Get the delta between the mouse position and center point.
                delta = (event.clientX - window.innerWidth / 2) * 0.5;

                // Move the handle.
                handle.style.left = event.clientX + delta + 'px';

                // Adjust the top panel width.
                topPanel.style.width = event.clientX + skewHack + delta + 'px';
            });
        });
    </script>

    <!-- Loader ki styling end -->

    <div id="loader">
        <div class="lds-logo">
            <img src="Images/logo-ambulance1.png" alt="Ambulance Logo">
        </div>
    </div>