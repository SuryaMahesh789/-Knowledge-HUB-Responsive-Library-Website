
<?php
session_start();
$username =$_POST['username'];
$mobilenumber   =$_POST['mobilenumber'];
$email  =$_POST['email'];
$password   =$_POST['password'];

//database connection
// library_database -- database name

// $conn=new mysqli('localhost','root','','library_database');

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'library_database');

if($conn->connect_error)
{
    header('location:404ErrorNotFound.html');
    echo "Registraion Failed...";
    die('connection Failed  :  '.$conn->connect_error);
}
else
{
$stmt=$conn->prepare("insert into registration(username,mobilenumber,email,password) values(?,?,?,?)");
$stmt->bind_param("ssss",$username,$mobilenumber,$email,$password);
$stmt->execute();
echo "Registration Successfull....";
header('location:books.html');

$stmt->close();
$conn->close();
}

?>