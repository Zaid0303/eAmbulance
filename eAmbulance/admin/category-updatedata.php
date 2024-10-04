<?php 
include('includes/dbconnection.php');

if(isset($_POST["categoryupdate"])){
    $cat_id = $_POST["catid"];
    $cat_name = $_POST['catname'];
    $cat_capacity = $_POST['catcapacity'];
    $cat_equipment = $_POST['catequipment'];
    $cat_cost = $_POST['catcost'];
    $cat_specialization = $_POST['catspecialization'];
    $cat_address = $_POST['cataddress'];
    $cat_img = $_FILES['catimg']['name'];
    $cat_tmp_img = $_FILES['catimg']['tmp_name'];

    $update_category = "UPDATE `category` SET `cat_name`='$cat_name',`cat_capacity`='$cat_capacity',`cat_equipment`='$cat_equipment',`cat_cost`='$cat_cost',`cat_specialization`='$cat_specialization',`cat_address`='$cat_address',`cat_img`='$cat_img' WHERE `cat_id`='$cat_id'";
    $update_result = mysqli_query($con, $update_category);
    move_uploaded_file($cat_tmp_img, '../assets/img/category-img/' . $cat_img);
    // Ensure directories exist and have proper permissions
    if ($update_result) {
        echo "<script>alert('Category has been updated.'); window.location.href='manage-category.php'</script>";
       
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
?>
