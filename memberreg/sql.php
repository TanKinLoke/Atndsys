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
            if (!empty($_POST["StudentID"]) && !empty($_POST["CardID"]) && !empty($_POST["StudentName"]) && !empty($_POST["Class"])) {
                //If everything is inserted
                $StudentID = $_POST["StudentID"];
                $CardID = $_POST["CardID"];
                $StudentName = $_POST["StudentName"];
                $Class = $_POST["Class"];
    
                //SQL code
                $sql = "INSERT INTO student_info (Student_Name, Student_ID, Card_ID, Class) VALUES ('$StudentName','$StudentID','$CardID','$Class')";
                
                //SQL Result
                if (mysqli_query($conn, $sql)) {
                    //Success
                    echo "New record created successfully for ".$StudentID;
                } else {
                    //Fail
                    echo "<script>console.log('Error: " . $sql . mysqli_error($conn)."');</script>";
                }
            } else {
                //If something is not inserted
                echo "<script>console.log('Something is not inserted');</script>";
            }
        //Close MySQL Connection
        mysqli_close($conn);
    ?>