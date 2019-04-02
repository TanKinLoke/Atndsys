<?php
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

    $response = "";

    //SQL commands
    $sql = ("SELECT * FROM Activity_Venue");
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $response .= htmlspecialchars_decode($row['Venue'],ENT_QUOTES).",";
        }
    } else {
        
    }

    echo $response;

    mysqli_close($conn);

?>