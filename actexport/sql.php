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

        //Select everything from the table
        $sql = "SELECT * FROM activity_attendance WHERE Activity_Name='$Actname'";
        $result = mysqli_query($conn,$sql);

        //Add activity name into response
        $response = "$Actname:";

        //Loop through the result
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $stdname = $row['Student_Name'];
                $stdID = $row['Student_ID'];
                $class = $row['Class'];
                $response .= "$stdname|$stdID|$class,";
            }
            //Remove , from the last character in response
            $response = rtrim($response,",");

        } else {
            
        }

        //Return the response
        echo $response;

    ?>