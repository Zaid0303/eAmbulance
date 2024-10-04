<?php 
session_start();

include('config.php');
$abc=$_SESSION['userid'];

    $query = "SELECT UserLocation FROM tblambulancehiring WHERE user_id = $abc";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        list($latitude, $longitude) = explode(',', $row['UserLocation']);
    } else {

        $latitude = '24.9288595';
        $longitude = '67.0338113';
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Car GPS Tracker</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOfoQEnSeEMhNmp8NI6ZZGulHloVCIZUA&callback=initMap"></script>
    <script>
    var map, directionsService, directionsRenderer, carMarker;
    var sourceLocation = { lat: 25.9288594, lng: 68.0338113 };
    var destinationLocation = { lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?> };

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            center: sourceLocation
        });

        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

        carMarker = new google.maps.Marker({
            position: sourceLocation,
            map: map,
            title: "Car's Starting Location"
        });

        calculateAndDisplayRoute();
    }

    function calculateAndDisplayRoute() {
        var request = {
            origin: sourceLocation,
            destination: destinationLocation,
            travelMode: 'DRIVING'
        };

        directionsService.route(request, function(result, status) {
            if (status == 'OK') {
                directionsRenderer.setDirections(result);
            }
        });

        moveCar();
    }

    function moveCar() {
        var step = 0;
        var steps = 500;
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
                requestAnimationFrame(animateCar);
            }
        }

        animateCar();
    }
    function useCurrentLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                sourceLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                carMarker.setPosition(sourceLocation);
                map.setCenter(sourceLocation);

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

<div id="map" style="height: 500px; width: 100%;"></div>



</body>
</html>
