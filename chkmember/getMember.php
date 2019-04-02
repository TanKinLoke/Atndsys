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

    $sql = ("SELECT * FROM student_info");
    $result = mysqli_query($conn,$sql);
    $response = "";

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $response .= htmlspecialchars_decode($row['Student_Name'],ENT_QUOTES).":";
            $response .= $row['Student_ID'].":";
            $response .= $row['Card_ID'].":";
            $response .= $row['Class'].":,";
        }
    } else {
        
    }

    echo $response;

    mysqli_close($conn);
?>