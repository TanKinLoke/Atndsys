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

    $sql1 = "SELECT COUNT(*) FROM student_info";
    $result1 = mysqli_query($conn,$sql1);
    $result1 = mysqli_fetch_assoc($result1);

    $sql2 = "SELECT * FROM `activity_record` ORDER BY pkey DESC";
    $result2 = mysqli_query($conn,$sql2);
    $result2 = mysqli_fetch_assoc($result2);

    $sql3 = "SELECT COUNT(*) FROM activity_record";
    $result3 = mysqli_query($conn,$sql3);
    $result3 = mysqli_fetch_assoc($result3);

    echo $result1['COUNT(*)'].",".$result2['Activity_Name'].",".$result3['COUNT(*)'];
?>