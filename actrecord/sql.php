<?php
    $function = $_REQUEST["function"];
    $data = $_REQUEST["data"];
    $data2 = $_REQUEST["data2"];

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

    if ($function == "delete") {
        //SQL commands
        $sql = "DELETE FROM Activity_Venue WHERE Venue=$data";
        $result = mysqli_query($conn,$sql);
        echo $result;
    } else if ($function == "edit") {
        $sql = "UPDATE Activity_Venue SET Venue=$data2 WHERE Venue=$data";
        $result = mysqli_query($conn,$sql);
    } else if ($function == "add") {
        $sql = "INSERT INTO Activity_Venue (Venue) VALUES ($data)";
        $result = mysqli_query($conn,$sql);
        echo "done";
    }
?>