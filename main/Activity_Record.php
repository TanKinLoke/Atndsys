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
    <h1>Activity Record</h1>
    <br>
    <br>
    <form method="post">
        Activity Name: <input type="text" name="ActivityName" autofocus><br>
        Activity Venue: <input type="text" name="ActivityVenue" list="Venue"><br>
        <datalist id="Venue">
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

            $sql = ("SELECT * FROM Activity_Venue");
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    //Datalist for dropdown menu
                    echo "<option value=\"".$row["Venue"]."\">";
                }
            } else {
                
            }
    
            mysqli_close($conn);
        ?>
        <!-- <option value="i-CreatorZ Hub">
        <option value="Auditorium">
        <option value="Penang Science Cluster"> -->
        </datalist>
        Activity Date: <input type="date" name="ActivityDate" value="<?php $date = date('Y-m-d',time()); echo $date ; ?>"><br>
        Activity Start Time: <input type="time" name="ActivityStartTime"><br>
        Activity End Time: <input type="time" name="ActivityEndTime"><br>
        <input type="submit" value="Submit" name="Submit"><br>

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

            if(!empty($_POST["ActivityName"]) && !empty($_POST["ActivityVenue"]) && !empty($_POST["ActivityDate"]) && !empty($_POST["ActivityStartTime"]) && !empty($_POST["ActivityEndTime"])) {
                //If everything is inserted
                $ActivityName = $_POST["ActivityName"];
                $ActivityVenue = $_POST["ActivityVenue"];

                //Date and Time special code
                $rawdate = htmlentities($_POST['ActivityDate']);
                $ActivityDate = date('Y-m-d', strtotime($rawdate));

                $rawtime = htmlentities($_POST['ActivityStartTime']);
                $ActivityStartTime = date('h:i a', strtotime($rawtime));

                $rawtime = htmlentities($_POST['ActivityEndTime']);
                $ActivityEndTime = date('h:i a', strtotime($rawtime));

                $sql = ("INSERT INTO activity_record (Activity_Name,Activity_Venue,Activity_Date,Activity_Start_Time,Activity_End_Time) VALUES ('$ActivityName','$ActivityVenue','$ActivityDate','$ActivityStartTime','$ActivityEndTime')");
                
                if(mysqli_query($conn,$sql)) {
                    echo "New record created successfully";
                    $_POST = array();
                } else {
                    echo "Failed to create record".mysqli_error($conn);
                }

                mysqli_close($conn);
                exit;
            }
        ?>
    </form>
</body>
</html>