<?php
    $function = $_REQUEST["function"];
    $data = $_REQUEST["data"];

    if ($function == "delete") {
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

        //SQL commands
        $sql = ("DELETE FROM Activity_Venue WHERE Venue=$data");
        $result = mysqli_query($conn,$sql);
        echo $result;
    }
?>