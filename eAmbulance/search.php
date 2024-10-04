<?php
include('config.php');

if (isset($_POST['searchdata'])) {
  $searchdata = $_POST['searchdata'];

  $query = "SELECT ID, BookingNumber, PatientName, RelativeConNum, HiringDate, HiringTime, BookingDate, Status 
            FROM tblambulancehiring 
            WHERE BookingNumber LIKE '%$searchdata%' 
            OR PatientName LIKE '%$searchdata%' 
            OR RelativeConNum LIKE '%$searchdata%'";

  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    echo '<table class="custom-table">
            <thead>
              <tr>
                <th>S.NO</th>
                <th>Booking Number</th>
                <th>Patient Name</th>
                <th>Relative Contact Number</th>
                <th>Hiring Date/Time</th>
                <th>Request Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
    
    $cnt = 1;
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>
              <td>' . $cnt . '</td>
              <td>' . $row['BookingNumber'] . '</td>
              <td>' . $row['PatientName'] . '</td>
              <td>' . $row['RelativeConNum'] . '</td>
              <td>' . $row['HiringDate'] . ' : ' . $row['HiringTime'] . '</td>
              <td>' . $row['BookingDate'] . '</td>
              <td>';

      $pstatus = $row['Status'];
      if ($pstatus == "") {
        echo "<span class='badge bg-warning'>New</span>";
      } elseif ($pstatus == "Assigned") {
        echo "<span class='badge bg-info'>Assigned</span>";
      } elseif ($pstatus == "On the way") {
        echo "<span class='badge bg-primary'>On the Way</span>";
      } elseif ($pstatus == "Pickup") {
        echo "<span class='badge bg-success'>Patient Picked</span>";
      } elseif ($pstatus == "Reached") {
        echo "<span class='badge bg-success'>Reached Hospital</span>";
      } elseif ($pstatus == "Rejected") {
        echo "<span class='badge bg-danger'>Rejected</span>";
      }

      echo '</td>
              <td>
                <a href="booking-details.php?id=' . $row['ID'] . '" class="custom-btn"><i class="fas fa-eye"></i> View</a>
              </td>
            </tr>';
      $cnt++;
    }

    echo '</tbody></table>';
  } else {
    echo '<p class="text-danger">No records found.</p>';
  }
}
?>
