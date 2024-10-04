<?php
session_start();
include('config.php');

if (!isset($_SESSION['userid'])) {
    echo "<script>
        alert('For booking, you need to login first.');
        window.location.href = 'login.php';
    </script>";
    
}else{

if (isset($_POST['submit'])) {

    $bookingnum = mt_rand(100000000, 999999999);
    $pname = $_POST['pname'];
    $rname = $_POST['rname'];
    $phone = $_POST['phone'];
    $hospital = $_POST['hospitals'];
    $hdate = $_POST['hdate'];
    $htime = $_POST['htime'];
    $ambulancetype = $_POST['ambulancetype'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $message = $_POST['message'];
    $location = $_POST['user_location'];
    $abcid=$_SESSION['userid'];

    $query = mysqli_query($con, "INSERT INTO tblambulancehiring (BookingNumber, PatientName, RelativeName, RelativeConNum, hospital, HiringDate, HiringTime, AmbulanceType, Address, City, State, Message, UserLocation,user_id) VALUES ('$bookingnum', '$pname', '$rname', '$phone', '$hospital', '$hdate', '$htime', '$ambulancetype', '$address', '$city', '$state', '$message', '$location','$abcid')");

    if ($query) {
        echo "<script>alert('Your request has been sent successfully. Your Booking Number is: $bookingnum');</script>";
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
}
?>
