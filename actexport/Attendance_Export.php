<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form method="post">
    <select name="FileType">
    <option value="PDF">PDF</option>
    <option value="Excel">Excel</option>
    </select><br>
    <button>Export</button>
    <?php
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="i-Attendance";
        $filename="i-CreatorZ Attendance Record";

        //Create a connection
        $conn = new mysqli($servername,$username,$password,$dbname);

        //Check if the connection is successful or not
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);  
        }

        $sql = ("SELECT * FROM activity_attendance");
        $result = mysqli_query($conn,$sql);

    ?>
    </form>
</body>
</html>