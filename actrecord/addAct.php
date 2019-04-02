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

            if(!empty($_REQUEST["ActivityName"]) && !empty($_REQUEST["ActivityVenue"]) && !empty($_REQUEST["ActivityDate"]) && !empty($_REQUEST["ActivityStartTime"]) && !empty($_REQUEST["ActivityEndTime"])) {
                //If everything is inserted
                $ActivityName = htmlspecialchars($_REQUEST["ActivityName"],ENT_QUOTES);
                $ActivityVenue = htmlspecialchars($_REQUEST["ActivityVenue"],ENT_QUOTES);

                //Date and Time special code
                $rawdate = htmlentities($_REQUEST['ActivityDate']);
                $ActivityDate = date('Y-m-d', strtotime($rawdate));

                $rawtime = htmlentities($_REQUEST['ActivityStartTime']);
                $ActivityStartTime = date('h:i a', strtotime($rawtime));

                $rawtime = htmlentities($_REQUEST['ActivityEndTime']);
                $ActivityEndTime = date('h:i a', strtotime($rawtime));

                $sql = ("INSERT INTO activity_record (Activity_Name,Activity_Venue,Activity_Date,Activity_Start_Time,Activity_End_Time) VALUES ('$ActivityName','$ActivityVenue','$ActivityDate','$ActivityStartTime','$ActivityEndTime')");
                
                if(mysqli_query($conn,$sql)) {
                    echo "done";
                } else {
                    echo "fail";
                }

                //Close MySQL Connection
                mysqli_close($conn);
            }
?>