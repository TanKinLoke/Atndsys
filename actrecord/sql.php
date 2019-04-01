<?php
    $function = $_REQUEST["function"];
    $data = htmlspecialchars($_REQUEST["data"],ENT_QUOTES);
    $data2 = htmlspecialchars($_REQUEST["data2"],ENT_QUTES);

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
        //Delete venue
        $sql = "DELETE FROM Activity_Venue WHERE Venue='$data'";
        $result = mysqli_query($conn,$sql);
        echo $result;
    } else if ($function == "edit") {
        //Edit venue
        $sql = "UPDATE Activity_Venue SET Venue=$data2 WHERE Venue='$data'";
        $result = mysqli_query($conn,$sql);
        echo "done";
    } else if ($function == "add") {
        $sql = "INSERT INTO Activity_Venue (Venue) VALUES ('$data')";
        $result = mysqli_query($conn,$sql);
        echo "done";
    }
?>