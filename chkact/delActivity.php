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

    $originalAct = $_REQUEST['originalAct'];

    $sql = "DELETE FROM activity_record WHERE Activity_Name='$originalAct'";

    $result = mysqli_query($conn,$sql);

    if ($result == 1) {
        $sql = "DELETE FROM activity_attendance WHERE Activity_Name='$originalAct'";
        if (mysqli_query($conn,$sql)) {
            echo "done";
        } else {
            $error = mysqli_error($conn);
            echo "$error";
        }
    } else if ($result == 0) {
        $error = mysqli_error($conn);
        echo "$error";
    } else {
        echo $result;
    }
    
    mysqli_close($conn);
?>  