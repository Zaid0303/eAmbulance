<?php 
session_start();
include("config.php");

if(isset($_POST['addcontact'])){
    $contact_name = $_POST['contact-name'];
    $contact_email = $_POST['contact-email'];
    $contact_message = $_POST['contact-message'];

    if(!empty($contact_name) AND !empty($contact_email) 
    AND !empty($contact_message)){

        $insert_contact = "INSERT INTO `contact` 
        (`contact_id`, `contact_name`, `contact_email`, `contact_mess`, `status`)
         VALUES (NULL, '$contact_name', '$contact_email', '$contact_message', '1')";

        $contact_result = mysqli_query($con, $insert_contact);

        // if($contact_result){
        //     echo "<script> 
        //     alert('Message Successfully Submitted');
        //     window.location.href='index.php'
        //     </script>";
        // }
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['addcontact'])) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->Username = 'smurtazasmurtaza41@gmail.com';
        $mail->Password = 'sybi kvlh foxr dmdx';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->setFrom('smurtazasmurtaza41@gmail.com', 'Syed Murtaza');
        $mail->addAddress('smurtazasmurtaza41@gmail.com', 'Syed Murtaza');

        $mail->isHTML(true);
        $mail->Subject = 'New Enquiry - LifeLink Contact Form';
        $mail->Body    = '<h2>Hello, you got a new enquiry</h2>
                          <h4>Full Name : '.$contact_name.' </h4>
                          <h4>Email : '.$contact_email.'</h4>
                          <h4>Message : '.$contact_message.'</h4>';

         if($mail->send()){
           $_SESSION['status'] = "Thank You Conatct Us - LifeLink";
           header("Location: {$_SERVER["HTTP_REFERER"]}");
           exit(0);
         }  
         else{
            $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}')";
            header("Location: {$_SERVER["HTTP_REFERER"]}");
            exit(0);
         }               


    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}
else{
    header('Location: index.php');
    exit(0);
}

?>