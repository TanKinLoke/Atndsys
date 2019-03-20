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
            $Cardcondition = $_REQUEST["CardID"];
            $Cardsql = "SELECT * FROM student_info WHERE Card_ID=$Cardcondition";
            $CardResult = mysqli_query($conn,$Cardsql);
            $row = mysqli_fetch_assoc($CardResult);
            $CardName = $row["Student_Name"];   
            //echo $row["Student_Name"];

            //Activity Name
            $Activitycondition = $_REQUEST["ActivitySelection"];
            //$Activitysql = "SELECT Activity_Name FROM activity_record WHERE Activity_Name = $Activitycondition";
            //$ActivityResult = mysqli_query($conn,$Activitysql);

            //Insert into Database
            //echo $Cardcondition." and ".$Activitycondition." and ".$row["Student_Name"];
            $DuplicateSQL = "SELECT COUNT(*) FROM activity_attendance WHERE Activity_Name='$Activitycondition' AND Student_ID='$Cardcondition'";
            $Duplicate = mysqli_query($conn,$DuplicateSQL);
            $Duplicate = mysqli_fetch_assoc($Duplicate);

            if ($Duplicate['COUNT(*)'] == 0) {
                $AttendanceSql = "INSERT INTO activity_attendance (Activity_Name,Student_Name,Student_ID) VALUES ('$Activitycondition','$CardName','$Cardcondition')";
                if (mysqli_query($conn,$AttendanceSql)) {
                    echo "done";
                } else {
                    echo "fail"; 
                }
            } else {
                echo "Duplicate";
            }
        
        } else {
            echo "CardEmpty";
        }

        mysqli_close($conn);
    ?>