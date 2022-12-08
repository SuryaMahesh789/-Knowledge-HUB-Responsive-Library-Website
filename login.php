<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>Login Page</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- custom style file link -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

</body>

</html>


<?php

// receieving all the inputs
$username = $_POST['username'];
$password = $_POST['password'];
$email    = $_POST['email'];

session_start();

$db = mysqli_connect('localhost', 'root', '', 'library_database');

$query = "SELECT * FROM registration WHERE username='$username' AND password='$password'";
$results = mysqli_query($db, $query);
if (mysqli_num_rows($results) ==1) {
    echo "yes";
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now Logged in Successfully.....";


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
} else {

?>
    <script>
        swal("Login Failed ( Password/Username Incorrect) ...");
    </script>
<?php
    header('location:404ErrorNotFound.html');
    echo "Login Failed ( Password/Username Incorrect) ....";

    // array_push($errors, "Wrong Username/Password !!!");
}
?>