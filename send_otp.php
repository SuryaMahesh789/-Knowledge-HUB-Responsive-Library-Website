<?php

$username = $_POST['username'];
$mobilenumber   = $_POST['mobilenumber'];
$email  = $_POST['email'];
$password   = $_POST['password'];

session_start();
$con = mysqli_connect('localhost', 'root', '', 'library_database');

if ($con->connect_error) 
{
    echo "Registraion Failed...";
    die('connection Failed  :  ' . $conn->connect_error);
    header('location:404ErrorNotFound.html');
} 

else {
    $six_digit_number = random_int(100000, 999999);

    $sql = "INSERT INTO otp (email,otp) VALUES('$email','$six_digit_number')";
    $result = $con->query($sql);

    $mailBody = '<div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
    <div><h3>OTP VerificationNumber</h3></div>
    <div>Hi, ' . $username . '</div>
    <div style="margin: 20px 0px;"><span style="background-color: #000; color: #FFF; padding: 10px;  ">' . $six_digit_number . '</span></div>
    <div>Please use the above OTP to complete registration</div>
    </div>';

    $subject = "Knowledge-HUB -  OTP (One Time Password)";
    $from = 'mailsurya366@gmail.com';
    $to = $email;
    $emailFrom = 'KNOWLEDGE-HUB';
    $headers = 'From: ' . $emailFrom . "\r\n";
    $headers .= 'Reply-To: ' . $to . "\r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $mailBody, $headers);

    header('location:otpindex.php');

    $stmt = $con->prepare("insert into registration(username,mobilenumber,email,password) values(?,?,?,?)");
    $stmt->bind_param("ssss", $username, $mobilenumber, $email, $password);
    $stmt->execute();
   
    $stmt->close();
    $con->close();
}

?>