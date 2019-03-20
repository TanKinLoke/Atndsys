<?php
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

        if(!empty($_REQUEST["CardID"])) {
            //CardID and Student Name Link
            $CardID = $_REQUEST["CardID"];

            $Cardsql = "SELECT * FROM student_info WHERE Card_ID=$CardID";
            $CardResult = mysqli_query($conn,$Cardsql);
            $row = mysqli_fetch_assoc($CardResult);

            $StudentName = $row["Student_Name"];
            $StudentID = $row["Student_ID"];
            //echo $row["Student_Name"];

            //Activity Name
            $ActivityName = $_REQUEST["ActivitySelection"];
            //$Activitysql = "SELECT Activity_Name FROM activity_record WHERE Activity_Name = $ActivityName";
            //$ActivityResult = mysqli_query($conn,$Activitysql);

            //Insert into Database
            //echo $CardID." and ".$ActivityName." and ".$row["Student_Name"];
            $DuplicateSQL = "SELECT COUNT(*) FROM activity_attendance WHERE Activity_Name='$ActivityName' AND Student_ID='$StudentID'";
            $Duplicate = mysqli_query($conn,$DuplicateSQL);
            $Duplicate = mysqli_fetch_assoc($Duplicate);

            if ($Duplicate['COUNT(*)'] == 0) {
                $AttendanceSql = "INSERT INTO activity_attendance (Activity_Name,Student_Name,Student_ID) VALUES ('$ActivityName','$StudentName','$StudentID')";
                if (mysqli_query($conn,$AttendanceSql)) {
                    echo "done,$StudentName";
                } else {
                    echo "fail,$StudentName"; 
                }
            } else {
                echo "Duplicate,$StudentName";
            }
        
        } else {
            echo "CardEmpty";
        }

        mysqli_close($conn);
    ?>