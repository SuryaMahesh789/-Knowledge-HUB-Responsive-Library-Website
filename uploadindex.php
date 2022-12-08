<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            width: 60%;
            margin: 5% auto;
            background-image: url("assets/library_pic.jpg");
            background-size: cover;
            height: 100vh;
        }

        * {
            box-sizing: border-box;
        }

        input[type=text],
        input[type=email],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <center>
            <h1>Upload Form</h1>
        </center>
        <form method="POST" enctype="multipart/form-data" action="upload.php">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Your username..">

            <label for="email">Email Id</label>
            <input type="email" id="email" name="email" placeholder="Your Email..">
            <br>

            <label for="country">Country</label>
            <select id="country" name="country">
                <option value="australia">Australia</option>
                <option value="canada">Canada</option>
                <option value="usa">USA</option>
                <option value="India">India</option>
                <option value="England">England</option>
                <option value="Newzealand">Newzealand</option>
            </select>

            <label for="bname">Book Name</label>
            <input type="text" id="bname" name="bname" required>

            <label for="genre">Genre Type</label>
            <input type="text" id="genre" name="genre" required>

            <label for="aname">Author Name</label>
            <input type="text" id="aname" name="aname" id="" required>

            <input type="file" name="file" required>

            <input type="submit" value="Upload">
        </form>
    </div>

    <p id="thanks"></p>

</body>

</html>