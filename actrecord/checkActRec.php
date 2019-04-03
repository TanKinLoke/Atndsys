<?php
    $function = $_REQUEST["function"];
    $data  = htmlspecialchars($_REQUEST["data"],ENT_QUOTES);
    $data2= htmlspecialchars($_REQUEST["data2"],ENT_QUOTES);
    $count = (int)0;

    //SQL Login Details
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

    if ($function == "check") {
        $sql = "SELECT * FROM activity_record WHERE Activity_Venue='$data'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $activityName = $row['Activity_Name'];

        $sql = "SELECT COUNT(*) FROM activity_attendance WHERE Activity_Name='$activityName'";
        $result2 = mysqli_query($conn,$sql);
        $result2 = mysqli_fetch_assoc($result2);
        $result2 = (int)$result2['COUNT(*)'];
        $count = (int)$count+$result2;

        if ($count == 0) {  
            echo "clear";
        } else {
            echo "exist";
        }
    } else if ($function == "edit") {
        $sql = "UPDATE activity_record SET Activity_Venue='$data2' WHERE Activity_Venue='$data'";
        $result = mysqli_query($conn,$sql);
        if ($result == 1) {
            echo "done";
        } else {
            $error = mysqli_error($conn);
            echo "$error";
        }
    } 
?>