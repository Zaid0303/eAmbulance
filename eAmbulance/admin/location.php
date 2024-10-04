<?php 

// Assuming you've already connected to your database
include('includes/dbconnection.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    // Fetch the latlng data from the database
    $query = "SELECT UserLocation FROM tblambulancehiring WHERE id = $id"; // Replace with your actual query
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // Split the latitude and longitude
        list($latitude, $longitude) = explode(',', $row['UserLocation']);
    } else {
        // Default values in case data is not found
        $latitude = '24.9288595';
        $longitude = '67.0338113';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car GPS Tracker</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOfoQEnSeEMhNmp8NI6ZZGulHloVCIZUA&callback=initMap"></script>
    <script>
    var map, directionsService, directionsRenderer, carMarker;
    var sourceLocation = { lat: 25.9288594, lng: 68.0338113 }; // Default source location
    var destinationLocation = { lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?> }; // Destination from DB

    function initMap() {
        // Create the map, centered at the default source location
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7, // Adjust zoom level as needed
            center: sourceLocation
        });

        // Create DirectionsService and DirectionsRenderer objects
        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

        // Marker for the car, initially placed at the source location
        carMarker = new google.maps.Marker({
            position: sourceLocation,
            map: map,
            title: "Car's Starting Location"
        });

        // Display initial route
        calculateAndDisplayRoute();
    }

    function calculateAndDisplayRoute() {
        var request = {
            origin: sourceLocation, // Starting point
            destination: destinationLocation, // End point
            travelMode: 'DRIVING' // Can be changed to 'WALKING', 'BICYCLING', etc.
        };

        directionsService.route(request, function(result, status) {
            if (status == 'OK') {
                directionsRenderer.setDirections(result);
            }
        });

        // Simulate car movement by updating the marker's position
        moveCar();
    }

    function moveCar() {
        var step = 0;
        var steps = 500; // Total number of steps to animate the car
        var latIncrement = (destinationLocation.lat - sourceLocation.lat) / steps;
        var lngIncrement = (destinationLocation.lng - sourceLocation.lng) / steps;

        function animateCar() {
            if (step <= steps) {
                var newLat = sourceLocation.lat + latIncrement * step;
                var newLng = sourceLocation.lng + lngIncrement * step;
                var newPosition = new google.maps.LatLng(newLat, newLng);
                carMarker.setPosition(newPosition);
                map.setCenter(newPosition);
                step++;
                requestAnimationFrame(animateCar); // Move the car every frame
            }
        }

        // Start the car movement
        animateCar();
    }

    // Function to get user's current location and update the source location
    function useCurrentLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                sourceLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                // Update the car's position to the new source location
                carMarker.setPosition(sourceLocation);
                map.setCenter(sourceLocation);

                // Recalculate and display the route
                calculateAndDisplayRoute();
            }, function(error) {
                alert('Error fetching location: ' + error.message);
            });
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }
    </script>
</head>
<body onload="initMap()">

<h3>Car's Route from Source to Destination</h3>
<!-- The div element for the map -->
<div id="map" style="height: 500px; width: 100%;"></div>

<!-- Button to use current location -->
<button onclick="useCurrentLocation()">Use My Current Location</button>

</body>
</html>
