<?php 
include('includes/dbconnection.php');

if(isset($_POST["serviceupdate"])){
    $ser_id = $_POST["serid"];
    $name = $_POST['name'];
    $pname = $_POST['pname'];
    $service_img = $_FILES['img']['name'];
    $service_tmp_img = $_FILES['img']['tmp_name'];

    $update_service = "UPDATE `service` SET `ser_name`='$name',`ser_para`='$pname',`ser_img`='$service_img' WHERE `ser_id`='$ser_id'";
    $update_result = mysqli_query($con, $update_service);
    move_uploaded_file($service_tmp_img, '../assets/img/service-img/' . $service_img);
  
    if ($update_result) {
        echo "<script>alert('Service has been updated.'); window.location.href='manage-service.php'</script>";
       
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
?>
