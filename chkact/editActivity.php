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

    $originalAct = htmlspecialchars($_REQUEST['originalAct'],ENT_QUOTES);
    $ActivityDate = $_REQUEST['activityDate'];
    $ActivityEndTime = $_REQUEST['activityEndTime'];
    $ActivityName = $_REQUEST['activityName'];
    $ActivityStartTime = $_REQUEST['activityStartTime'];
    $ActivityVenue = $_REQUEST['activityVenue'];
    
    $ActivityName = htmlspecialchars($ActivityName,ENT_QUOTES);
    $ActivityVenue = htmlspecialchars($ActivityVenue,ENT_QUOTES);

    $rawdate = htmlentities($ActivityDate);
    $ActivityDate = date('Y-m-d', strtotime($rawdate));

    $rawtime = htmlentities($ActivityStartTime);
    $ActivityStartTime = date('h:i a', strtotime($rawtime));

    $rawtime = htmlentities($ActivityEndTime);
    $ActivityEndTime = date('h:i a', strtotime($rawtime));

    $sql = "UPDATE activity_record SET Activity_Name='$ActivityName',Activity_Venue='$ActivityVenue',Activity_Date='$ActivityDate',Activity_Start_Time='$ActivityStartTime',Activity_End_Time='$ActivityEndTime' WHERE Activity_Name='$originalAct'";
    
    if(mysqli_query($conn,$sql)) {
        //Update activity attendance as well
        $sql = "UPDATE activity_attendance SET Activity_Name='$ActivityName' WHERE Activity_Name='$originalAct'";
        if (mysqli_query($conn,$sql)) {
            echo "done";
        } else {
            $error = mysqli_error($conn);
            echo "$error";
        }
    } else {
        $error = mysqli_error($conn);
        echo "$error";
    }

    //Close MySQL Connection
    mysqli_close($conn);
?>