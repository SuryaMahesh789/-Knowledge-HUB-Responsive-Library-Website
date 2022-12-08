<?php

$username = $_POST['username'];
$email = $_POST['email'];
$bookname = $_POST['bname'];
$genre = $_POST['genre'];
$authorname = $_POST['aname'];

$file = $_FILES["file"];
move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);

$conn = mysqli_connect('localhost', 'root', '', 'library_database');

if ($conn->connect_error) {
    // echo "Upload Failed...";
    die('connection Failed  :  ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into books(username,bookname,genre,authorname) values(?,?,?,?)");
    $stmt->bind_param("ssss", $username, $bookname, $genre, $authorname);
    $stmt->execute();
    // echo "Upload Successfull....";


    $mailBody = '<div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
    <div><h4>Thanks For Your Contribution To Knowledge-HUB...</h4></div>
    <div><h5>We Will Verify Soon, and Make It available For Everyone.....:)</h5></div>
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

    // header('location:books.html');

    $stmt->close();
    $conn->close();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>Appreciation Page</title>

    <style>
        #h1 {
            color: green;
        }

        #h4 {
            color: royalblue;
        }

        #h2 {
            color: brown;
        }
    </style>

</head>


<body>

    <center>
        <h1 id="h1">Thanks For Your Contribution...</h1>
        <h3 id="h3">We Will Verify Soon, and Make It available For Everyone...</h3>
        <h4 id="h4"> With regards,</h4>
        <h1 id="h2"><a href="books.html">Knowledge-HUB</a></h1>

    </center>
</body>

</html>