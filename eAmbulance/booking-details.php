<?php
include("Includes/header.php");
include("Includes/nav.php");
include("config.php");
?>
<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Ambulance Tracking</h2>
      <ol>
        <li><a href="index.php" href="#hero">Home</a></li>
        <li>Ambulance Tracking</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page">
  <div class="container">
   <?php
$id = $_GET['id'];   
$ret = mysqli_query($con, "SELECT tblambulancehiring.*,tblambulance.AmbRegNum, tblambulance.DriverName,tblambulance.DriverContactNumber FROM tblambulancehiring 
left join tblambulance on tblambulance.AmbRegNum=tblambulancehiring.AmbulanceRegNo  WHERE tblambulancehiring.ID = '$id'");


while ($row = mysqli_fetch_array($ret)) {
$arnum = $row['AmbulanceRegNo'];
?>
<table border="1" class="table table-bordered mg-b-0">
<tr align="center">
    <th colspan="6" style="font-size:20px;color:blue;text-align: center;">
        View Request Details of #<?php echo $row['BookingNumber']; ?></th>
    
</tr>
<tr>
    <th>Patient Name</th>
    <td><?php echo $row['PatientName']; ?></td>
    <th>Relative Name</th>
    <td><?php echo $row['RelativeName']; ?></td>
</tr>
<tr>
<th>Relative Contact Number</th>
<td><?php  echo $row['RelativeConNum'];?></td>
<th>Hiring Date</th>
<td><?php  echo $row['HiringDate'];?></td>

</tr>
<tr>
<th>Hiring Time</th>
<td><?php  echo $row['HiringTime'];?></td>
 <th>Booking Date</th>
 <td><?php  echo $row['BookingDate'];?></td>
 <tr>
    <tr>
<th>Address</th>
<td><?php  echo $row['Address'];?></td>
<th>City</th>
<td><?php  echo $row['City'];?></td>
</tr>
<tr>
<th>State</th>
<td><?php  echo $row['State'];?></td>
<th>Message</th>
<td><?php  echo $row['Message'];?></td>
</tr>
<!-- Display other request details -->

<?php
$atype = $row['AmbulanceType'];  
$ambulanceTypeText = "";
switch ($atype) {
    case "1":
        $ambulanceTypeText = "Basic Life Support (BLS) Ambulances";
        break;
    case "2":
        $ambulanceTypeText = "Advanced Life Support (ALS) Ambulances";
        break;
    case "3":
        $ambulanceTypeText = "Non-Emergency Patient Transport Ambulances";
        break;
    case "4":
        $ambulanceTypeText = "Boat Ambulance";
        break;
    default:
        $ambulanceTypeText = "Unknown";
        break;
}
?>
<tr>
    <th>Ambulance Type</th>
    <td colspan="3"><?php echo $ambulanceTypeText; ?></td>
</tr>
<!-- Display other request details -->

<?php if ($row['Remark'] != ''): ?>
<tr>
    <th>Remark</th>
    <td><?php echo $row['Remark']; ?></td>
    <?php if ($row['Status'] != ''): ?>
    <th>Status</th>
    <td><?php echo $row['Status']; ?></td>
    <?php endif; ?>
</tr>

</tr>
<?php endif; ?>
 <?php if ($row['Status'] != ''){ ?>

<?php }else {?>
<tr>     
   <th>Driver Name</th>
    <td>Not Assigned Yet</td>
     <th>Driver Contact Number</th>
    <td>Not Assigned Yet</td>
  </tr><?php }?>
</table>

<?php
}
?>

<?php 
$bookingnum=$_GET['bookingnum'];
$query1=mysqli_query($con,"SELECT Remark,Status,UpdationDate,BookingNumber,AmbulanceRegNum FROM tbltrackinghistory

where BookingNumber='$bookingnum'");
$count=mysqli_num_rows($query1);
if($count>0){
 ?>
<div class="col-12">
    <table class="table table-bordered" border="1" width="100%">
                                    <tr>
                                        <th colspan="6" style="text-align:center;">Tracking History</th>
                                    </tr>
                                    <tr>
                                        <th>Remark</th>
                                        <th>Status</th>
                                        
                                        <th>Action Date</th>
                                    </tr>
<?php 
while($row1=mysqli_fetch_array($query1))
{
?>  

<tr>
<td><?php echo htmlentities($row1['Remark']);?></td>
             <td> <?php   $pstatus=$row1['Status'];  
             if($pstatus==""){ ?>
<span>New</span>
<?php } elseif($pstatus=="Assigned"){ ?>
<span>Assigned</span>
<?php } elseif($pstatus=="On the way"){ ?>
<span>On the Way</span>
<?php } elseif($pstatus=="Pickup"){ ?>
<span>Patient Pick</span>
<?php } elseif($pstatus=="Reached"){ ?>
<span>Patient Reached Hospital</span>
<?php } elseif($pstatus=="Rejected"){ ?>
<span>Rejected</span>

<?php } ?>
</td>
<td><?php echo htmlentities($row1['UpdationDate']);?></td>
         
</tr>
<?php } ?>

</table>
<?php } ?>
  </div>
</section>
<div class="text-center mt-4">
    <a href="location.php" class="btn btn-primary" target="blank">Track Location</a>
</div>

</main><!-- End #main -->
<?php
include("Includes/footer.php");
?>