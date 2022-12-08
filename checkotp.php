<?php
$otp   = $_POST['otp'];
$email = $_POST['email'];
session_start();
$db = mysqli_connect('localhost', 'root', '', 'library_database');
$query = "SELECT * FROM otp WHERE otp='$otp' AND email='$email'";
$results = mysqli_query($db, $query);
if (mysqli_num_rows($results)>0) {
    $mailBody = '<div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
    <div><h4>You Have Logged in to Knowledge-HUB Successfully...</h4></div>
    <div><h1>Happy Learning......:)</h1></div>
    <div>Team , Knowledge-HUB</div>
    </div>';


    $subject = "Knowledge-HUB (Online Learning Platform)";
    $from = 'mailsurya366@gmail.com';
    $to = $email;
    $emailFrom = 'KNOWLEDGE-HUB';
    $headers = 'From: ' . $emailFrom . "\r\n";
    $headers .= 'Reply-To: ' . $to . "\r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $mailBody, $headers);

    header('location:books.html');
}
else{
    header('location:otpindex.php');
}

?>