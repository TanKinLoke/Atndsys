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

    $originalID = $_REQUEST['id'];

    $sql = "DELETE FROM student_info WHERE Student_ID='$originalID'";

    $result = mysqli_query($conn,$sql);

    if ($result == 1) {
        echo "done";
    } else if ($result == 0) {
        $error = mysqli_error($conn);
        echo "$error";
    } else {
        echo $result;
    }
    
    mysqli_close($conn);
?>