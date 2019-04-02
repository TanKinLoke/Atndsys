<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "i-Attendance";

    //Create connection
    $conn = new mysqli($servername,$username,$password,$dbname);

    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = ("SELECT * FROM activity_record");
    $result = mysqli_query($conn,$sql);
    $response = "";

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $response .= $row['Activity_Name']."/";
            $response .= htmlspecialchars_decode($row['Activity_Venue'],ENT_QUOTES)."/";
            $response .= date("Y-m-d",strtotime($row['Activity_Date']))."/";
            $response .= date('H:i', strtotime($row['Activity_Start_Time']))."/";
            $response .= date('H:i',strtotime($row['Activity_End_Time']))."/,";
        }
    } else {
        
    }

    echo $response;

    mysqli_close($conn);
?>