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
    <select name="ActivitySelection">
    <?php
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="i-Attendance";

        //Create a connection
        $conn = new mysqli($servername,$username,$password,$dbname);

        //Check if the connection is successful or not
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM activity_record ORDER BY pkey DESC";
        $result = mysqli_query($conn,$sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //Datalist for dropdown menu
                echo "<option value=\"".$row["Activity_Name"]."\">".$row["Activity_Name"]."</option>";
            }
        } else {
            echo "<option value=\"No result\">No result</option>";
        }

        mysqli_close($conn);
        echo "<br>";
    ?>
    </select>
    <br>
    Scan your card here: <input type="text" name="CardID"><br>  
    <input type="submit" value="Submit" name="submit"><br>
    <?php
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="i-Attendance";

        //Create a connection
        $conn = new mysqli($servername,$username,$password,$dbname);

        //Check if the connection is successful or not
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);  
        }

        if(!empty($_POST["CardID"])) {
            //CardID and Student Name Link
            $Cardcondition = $_POST["CardID"];
            $Cardsql = "SELECT * FROM student_info WHERE Card_ID=$Cardcondition";
            $CardResult = mysqli_query($conn,$Cardsql);
            $row = mysqli_fetch_assoc($CardResult);
            $CardName = $row["Student_Name"];
            //echo $row["Student_Name"];

            //Activity Name
            $Activitycondition = $_POST["ActivitySelection"];
            //$Activitysql = "SELECT Activity_Name FROM activity_record WHERE Activity_Name = $Activitycondition";
            //$ActivityResult = mysqli_query($conn,$Activitysql);

            //Insert into Database
            //echo $Cardcondition." and ".$Activitycondition." and ".$row["Student_Name"];
            $AttendanceSql = "INSERT INTO activity_attendance (Activity_Name,Student_Name,Student_ID) VALUES ('$Activitycondition','$CardName','$Cardcondition')";
            if (mysqli_query($conn,$AttendanceSql)) {
                echo "Record created successfully for ".$CardName."(".$Cardcondition.")";
                $_POST = array();
            } else {
                echo "Error: ".mysqli_error($conn); 
            }
        
        } else {
            echo "Card ID is empty";
        }

        $_POST = array();
        mysqli_close($conn);
    ?>
    </form>
</body>
</html>