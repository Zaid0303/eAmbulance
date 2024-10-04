<?php 
session_start();
include("config.php");

if(isset($_POST['feedback'])) {
    $fname = $_POST['f-name'];
    $femail = $_POST['f-email'];
    $fmess = $_POST['f-mess'];
   
    $query = mysqli_query($con, "INSERT INTO `feedback` (`f_id`, `f_name`, `f_email`, `f_mess`, `status`) VALUES (NULL, '$fname', '$femail', '$fmess', '1')");

    if($query){
        $_SESSION['status1'] = "Thank You FeedBack - LifeLink";
        header("Location: {$_SERVER["HTTP_REFERER"]}");
        exit(0);
      }  
      else{
         $_SESSION['status1'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}')";
         header("Location: {$_SERVER["HTTP_REFERER"]}");
         exit(0);
      }   
}

?>