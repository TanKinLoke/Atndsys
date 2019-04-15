<?php
            //phpmyadmin login details
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

            //Check if Student Info are inserted or not
            if (!empty($_REQUEST["StudentID"]) && !empty($_REQUEST["CardID"]) && !empty($_REQUEST["StudentName"]) && !empty($_REQUEST["Class"])) {
                //If everything is inserted
                $StudentID = $_REQUEST["StudentID"];
                $CardID = $_REQUEST["CardID"];
                $StudentName = htmlspecialchars($_REQUEST["StudentName"],ENT_QUOTES);
                $Class = $_REQUEST["Class"];

                $sql = "SELECT COUNT(*) FROM student_info WHERE Student_ID='$StudentID'";
                $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
                if ($result['COUNT(*)'] == 1) {
                    echo "exist";
                    exit;
                }
    
                //SQL code
                $sql = "INSERT INTO student_info (Student_Name, Student_ID, Card_ID, Class) VALUES ('$StudentName','$StudentID','$CardID','$Class')";
                
                //SQL Result
                if (mysqli_query($conn, $sql)) {
                    //Success
                    echo "done";
                } else {
                    //Fail
                    $error = mysqli_error($conn);
                    echo "$error";
                }
            } else {
                //If something is not inserted
                echo "empty";
            }
        //Close MySQL Connection
        mysqli_close($conn);
    ?>