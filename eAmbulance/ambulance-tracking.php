<?php
session_start();
include("config.php");
include("includes/header.php");
include("includes/nav.php");
// Check if user is logged in (assuming user ID is stored in session)
if (isset($_SESSION['userid'])) {
  // Save the userid to a variable
  $userId = $_SESSION['userid'];

  // Show an alert and then redirect to login page
}

?>

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Ambulance Tracking</h2>
    
    </div>

  </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page">
  <div class="container">
    <form class="cmxform form-horizontal" method="post" action="" name="search">
                               
                                
                                <div class="form-group ">
                                    <label for="username" class="control-label col-lg-12" style="font-weight: bolder;padding-bottom: 10px;">Search by Request Number / Patient Name / User Mobile No:</label>

                                    <div class="col-lg-12">
                                        <input type="text" name="searchdata" id="searchdata" class="form-control" value="" required="true">
                                    </div>
                                </div>
                                <br>
                               
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                      <p style="text-align: center;"> <button class="btn btn-primary" type="submit" name="search">Search</button></p>
                                       
                                    </div>
                                </div>

                            </form>
                            <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
?>

<div class="panel-heading">

      Result against "<?php echo $sdata;?>" keyword</div>

  <table class="table" ui-jq="footable" ui-options='{
    "paging": {
      "enabled": true
    },
    "filtering": {
      "enabled": true
    },
    "sorting": {
      "enabled": true
    }}'>
    <thead>

   <thead>
       <tr>
        <th data-breakpoints="xs">S.NO</th>
        <th>Booking Number</th>
        <th>Patient Name</th>
        <th>Relative Contact Number</th>
        <th>Hiring Date/Time</th>
        <th>Request Date</th>
        <th>Status</th>
        <th data-breakpoints="xs">Action</th>
      </tr>
    </thead>
      
     <?php
     $io=$_SESSION['userid'];
   
     $ret = mysqli_query($con, "SELECT * FROM tblambulancehiring WHERE (tblambulancehiring.BookingNumber LIKE '%$sdata%' OR tblambulancehiring.PatientName LIKE '%$sdata%' OR tblambulancehiring.RelativeConNum LIKE '%$sdata%') AND user_id = '$io'");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count>0){
while ($row=mysqli_fetch_array($ret)) {

?>
    
    <tr data-expanded="true">
        <td><?php echo $cnt;?></td>
          <td><?php  echo $row['BookingNumber'];?></td>
          <td><?php  echo $row['PatientName'];?></td>
              <td><?php  echo $row['RelativeConNum'];?></td>
              <td><?php  echo $row['HiringDate'];?> : <?php  echo $row['HiringTime'];?></td>
              <td><?php  echo $row['BookingDate'];?></td>

                               <td> <?php   $pstatus=$row['Status'];  
             if($pstatus==""){ ?>
<span>New</span>
<?php } elseif($pstatus=="Assigned"){ ?>
<span } >Assigned</span>
<?php } elseif($pstatus=="On the way"){ ?>
<span >On the Way</span>
<?php } elseif($pstatus=="Pickup"){ ?>
<span>Patient Pick</span>
<?php } elseif($pstatus=="Reached"){ ?>
<span>Patient Reached Hospital</span>
<?php } elseif($pstatus=="Rejected"){ ?>
<span>Rejected</span>

<?php } ?>
</td>
              <td><a href="booking-details.php?id=<?php echo $row['ID'];?>&&bookingnum=<?php echo $row['BookingNumber'];?>" class="btn btn-primary">View</a></td>
            </tr>
            <?php 
$cnt=$cnt+1;
}} else {?>
<tr>
<td colspan="9" style="color:red">No Record Found</td>
</tr>

<?php } ?>  
</tbody>
        </table>
        <?php } ?>
  </div>
</section>

</main><!-- End #main -->




<style>
  .custom-form-group {
    position: relative;
  }

  .custom-search-icon {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 16px;
    color: #999;
  }

  #searchdata {
    padding-left: 35px;
    width: 100%;
  }

  .custom-breadcrumbs {
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 5px;
    margin-bottom: 20px;
    animation: fadeIn 1.5s ease;
  }

  .custom-breadcrumbs h2 {
    font-weight: bold;
    color: #333;
    animation: slideIn 1.2s ease-out;
  }

  /* Animations */
  @keyframes slideIn {
    0% {
      transform: translateX(-100%);
      opacity: 0;
    }

    100% {
      transform: translateX(0);
      opacity: 1;
    }
  }

  @keyframes fadeIn {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }

  /* Form Styling */
  .custom-form-control {
    border: 2px solid #007bff;
    border-radius: 30px;
    padding: 10px;
    transition: all 0.3s ease;
  }

  .custom-form-control:hover {
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
  }

  /* Button Styling */
  .custom-btn {
    background-color: #007bff;
    border: none;
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 1.2rem;
    transition: transform 0.3s ease;
  }

  .custom-btn:hover {
    transform: scale(1.1);
    background-color: #0056b3;
  }

  /* Table Styling */
  .custom-table {
    width: 100%;
    border: 1px solid #ddd;
    border-collapse: collapse;
    margin-top: 20px;
    animation: fadeIn 1.5s ease;
  }

  .custom-table th,
  .custom-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
  }

  .custom-table th {
    background-color: #007bff;
    color: white;
  }

  .custom-table td {
    background-color: #f9f9f9;
  }

  /* Hover Effect for Rows */
  .custom-table tbody tr:hover {
    background-color: #e9ecef;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  /* Icon Hover Effect */
  .custom-btn i {
    margin-right: 5px;
  }

  .custom-btn:hover i {
    transform: rotate(360deg);
    transition: transform 0.5s ease;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .custom-form-group {
      text-align: center;
    }

    .custom-btn {
      width: 100%;
    }

    .table-responsive {
      overflow-x: auto;
    }

    .custom-table th,
    .custom-table td {
      padding: 8px;
    }
  }
</style>


<?php include('includes/footer.php'); ?>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>