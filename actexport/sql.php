<?php
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="i-Attendance";
        $filename="i-CreatorZ Attendance Record";

        //Get from POST request
        $Actname = $_REQUEST['Actname']; 

        //Create a connection
        $conn = new mysqli($servername,$username,$password,$dbname);

        //Check if the connection is successful or not
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);  
        }

        $sql = "SELECT * FROM activity_attendance WHERE Activity_Name='$Actname'";
        $result = mysqli_query($conn,$sql);

        $response = "$Actname:";

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $value1 = $row['Student_Name'];
                $value2 = $row['Student_ID'];
                $response .= "$value1|$value2,";
            }
            $response = rtrim($response,",");

        } else {
            
        }

        echo $response;

    ?>