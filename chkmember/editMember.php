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

    $originalID = $_REQUEST['originalID'];
    $newName = htmlspecialchars($_REQUEST['newName'],ENT_QUOTES);
    $newID = $_REQUEST['newID'];
    $newCard = $_REQUEST['newCard'];
    $newClass = $_REQUEST['newClass'];

    $sql = "UPDATE student_info SET Student_Name='$newName', Student_ID='$newID',Card_ID='$newCard',Class='$newClass' WHERE Student_ID='$originalID'";

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