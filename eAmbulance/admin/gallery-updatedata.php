<?php 
include('includes/dbconnection.php');

if(isset($_POST["galleryupdate"])){
    $gallery_id = $_POST["galleryid"];
    $name = $_POST['name'];
    $gallery_img = $_FILES['img']['name'];
    $gallery_tmp_img = $_FILES['img']['tmp_name'];

    $update_gallery = "UPDATE `gallery` SET `gallery_name`='$name',`gallery_img`='$gallery_img' WHERE `gallery_id`='$gallery_id'";
    $update_result = mysqli_query($con, $update_gallery);
    move_uploaded_file($gallery_tmp_img, '../assets/img/gallery-img/' . $gallery_img);
  
    if ($update_result) {
        echo "<script>alert('Gallery has been updated.'); window.location.href='manage-gallery.php'</script>";
       
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
?>
