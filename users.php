<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <title>Online E-learning Portal</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- custom style file link -->
    <link rel="stylesheet" href="style.css">

    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;

        }

        th {
            background-color: #588c7e;
            color: white;
            border: 2px solid black;
            padding: 10px;
        }


        td {
            background-color: white;
            color: #588c7e;
            border: 2px solid #588c7e;
            padding: 10px;
        }

        th:hover {
            background-color: green;
        }

        td:hover {
            background-color: yellow;
        }

        #database {
            margin: 5rem 1rem;
        }

        @media screen and (max-width: 500px) {
            table {

                font-size: 12.5px;

            }

            th,
            td {
                padding: 2px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="assets/logo.jpg" download><img id="logo" src="assets/logo.jpg" alt="logo"></a>

            <button title="toggler" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="books.html"><i class="fa fa-book fa-fw"></i> books</a>
                    </li>
                    <!-- <li class="nav-item">
            <a class="nav-link" href="books.html">Books</a>
          </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="mailto:mailsurya@gmail.com"><i class="fa fa-fw fa-envelope"></i> Query</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>



    <div id="database" class="fluid-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Mobile Number</th>
                <th>Email</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "library_database");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT id,username,mobilenumber,email FROM registration";
            $result = $conn->query($sql);

            // database must contain atleast one row / must extract one row
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"]
                        . "</td><td>" . $row["mobilenumber"] . "</td><td>" . $row["email"] . "</td></tr>";
                }
                echo "</table>";
            } else {

                echo "No Users Found....";
                header('location:404ErrorNotFound.html');
            }

            $conn->close();

            ?>



        </table>
    </div>



</body>

</html>