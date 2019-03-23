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
            //CardID
            $CardID = $_REQUEST["CardID"];

            //Get info from student_info table
            $Cardsql = "SELECT * FROM student_info WHERE Card_ID=$CardID";
            $CardResult = mysqli_query($conn,$Cardsql);
            $row = mysqli_fetch_assoc($CardResult);

            //Get student name and student ID
            $StudentName = $row["Student_Name"];
            $StudentID = $row["Student_ID"];
            $StudentClass = $row["Class"];
            //echo $row["Student_Name"];

            //Activity Name
            $ActivityName = $_REQUEST["ActivitySelection"];
            
            //Check for duplication
            $DuplicateSQL = "SELECT COUNT(*) FROM activity_attendance WHERE Activity_Name='$ActivityName' AND Student_ID='$StudentID'";
            $Duplicate = mysqli_query($conn,$DuplicateSQL);
            $Duplicate = mysqli_fetch_assoc($Duplicate);

            if ($Duplicate['COUNT(*)'] == 0) {
                //Mark attendance
                $AttendanceSql = "INSERT INTO activity_attendance (Activity_Name,Student_Name,Student_ID,Class) VALUES ('$ActivityName','$StudentName','$StudentID','$StudentClass')";
                if (mysqli_query($conn,$AttendanceSql)) {
                    //Success
                    echo "done,$StudentID";
                } else {
                    //Fail
                    echo "fail,$StudentID"; 
                }
            } else {
                //Duplicate
                echo "Duplicate,$StudentID";
            }
        
        } else {
            //Card ID is empty
            echo "CardEmpty";
        }

        mysqli_close($conn);
    ?>