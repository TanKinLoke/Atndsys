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

            if(!empty($_POST["ActivityName"]) && !empty($_POST["ActivityVenue"]) && !empty($_POST["ActivityDate"]) && !empty($_POST["ActivityStartTime"]) && !empty($_POST["ActivityEndTime"])) {
                //If everything is inserted
                $ActivityName = $_POST["ActivityName"];
                $ActivityVenue = $_POST["ActivityVenue"];

                //Date and Time special code
                $rawdate = htmlentities($_POST['ActivityDate']);
                $ActivityDate = date('Y-m-d', strtotime($rawdate));

                $rawtime = htmlentities($_POST['ActivityStartTime']);
                $ActivityStartTime = date('h:i a', strtotime($rawtime));

                $rawtime = htmlentities($_POST['ActivityEndTime']);
                $ActivityEndTime = date('h:i a', strtotime($rawtime));

                $sql = ("INSERT INTO activity_record (Activity_Name,Activity_Venue,Activity_Date,Activity_Start_Time,Activity_End_Time) VALUES ('$ActivityName','$ActivityVenue','$ActivityDate','$ActivityStartTime','$ActivityEndTime')");
                
                if(mysqli_query($conn,$sql)) {
                    echo "New record created successfully";
                    header("Location: /index.php");
                    exit;
                } else {
                    echo "Failed to create record".mysqli_error($conn);
                }

                //Close MySQL Connection
                mysqli_close($conn);
            }
?>
<html lang="en">
    <head>
        <head>
            <title>ATNDSYS Activity Record</title>
            <meta name="viewport" content="width=device-width,initial-scale=1.0" initial-scale="1"/>
            <meta charset="utf-8"/>
            <link rel="stylesheet" href="../css/global.css"/>
            <link rel="stylesheet" href="../css/actrecord.css"/>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        </head>
    </head>
    <body>
        <div class="header">
            <div class="header-content-box">
                <div class="header-image-box">
                    <img src="../img/i-Creatorz-Logo-Black.png" draggable="false"/>
                </div>
                <div class="header-project-name-box">
                    ATTENDANCE SYSTEM
                </div>
                <div class="header-page-name-box">
                    ACTIVITY RECORD
                </div>
            </div>
        </div>
        <div class="content-box">
            <div class="popup-venue-box-container" id="popup-venue-box-container" onclick="closeVenueBox();">
                <div class="popup-venue-box" id="popup-venue-box">
                    <div class="popup-venue-boxcontent">
                    <table>
    <tr>
        <th>Venue Name</th>
        <th> Option</th>
    </tr>
    <?php
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
        $sql = ("SELECT * FROM Activity_Venue");
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                //Table row
                echo "<tr id='".str_replace(" ","_",$row['Venue'])."'>";
                echo "<td>".$row['Venue']."</td>\n";
                echo "<td><button type='button' value='".$row['Venue']."'>Edit</button><button type='button' onclick='deleteVenue(\"".$row['Venue']."\")'>Delete</button></td>\n";
                echo "</tr>\n";
            }
        } else {
            
        }

        mysqli_close($conn);

    ?>
    </table>
    <button type='button'>Add Venue</button>
                    </div>
                </div>
            </div>
            <div class="content-box-container-0" id="content-box-container-0">
                <form onsubmit="return false">
                <div class="c1-box">
                    <div class="c1a">
                        <div class="c1a-title">ACTIVITY NAME</div>
                        <div class="c1a-box">
                            <input type="text" class="c1a-inputbox" id="inputnamebox">
                        </div>
                    </div>
                    <div class="c1a">
                        <div class="c1a-title">ACTIVITY VENUE</div>
                        <div class="c1a-box">
                            <input type="text" class="c1a-inputbox" id="inputvenuebox" list="Venue">
                            <datalist id="Venue">
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

            $sql = ("SELECT * FROM Activity_Venue");
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    //Datalist for dropdown menu
                    echo "<option value=\"".$row["Venue"]."\">";
                }
            } else {
                
            }
    
            mysqli_close($conn);
        ?>
        <!-- <option value="i-CreatorZ Hub">
        <option value="Auditorium">
        <option value="Penang Science Cluster"> -->
        </datalist>
                        </div>
                    </div>
                    <div class="c1a">
                        <div class="c1a-title">ACTIVITY DATE</div>
                        <div class="c1a-box">
                            <input type="date" class="c1a-inputbox" id="inputdatebox" value="<?php $date = date('Y-m-d',time()); echo $date ; ?>">
                        </div>
                    </div>
                </div><!--
                --><div class="c2-box">
                    <div class="c1a">
                        <div class="c1a-title">START TIME</div>
                        <div class="c1a-box">
                            <input type="time" class="c1a-inputbox" id="inputstarttimebox">
                        </div>
                    </div>
                    <div class="c1a">
                        <div class="c1a-title">END TIME</div>
                        <div class="c1a-box">
                            <input type="time" class="c1a-inputbox" id="inputendtimebox">
                        </div>
                    </div>
                    <div class="submit-box">
                        <span class="add-text" onclick="showVenueBox();">
                            Add New Activity Venue
                        </span>
                        <button class="submit" onclick="inputDatas();">SUBMIT</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="content-box-container-1" id="content-box-container-1">
                <div class="container1-center-box">
                    <div class="output-name-box" id="output-name-box"></div>
                    <div class="output-venue-box" id="output-venue-box"></div>
                    <div class="output-date-box" id="output-date-box"></div>
                    <div class="output-time-box" id="output-time-box"></div>
                    <button class="confirm" id="confirm" onclick="confirmRecord();" autofocus>CONFIRM</button>
                </div>
            </div>
            <div class="content-box-container-2" id="content-box-container-2">
                <form method="post" id="center2form">
                    <input id="submitName" name="ActivityName" type="text"/>
                    <input id="submitVenue" name="ActivityVenue" type="text"/>
                    <input id="submitDate" name="ActivityDate" type="date"/>
                    <input id="submitStartTime" name="ActivityStartTime" type="time"/>
                    <input id="submitEndTime" name="ActivityEndTime" type="time"/>
                </form>
            </div>
        </div>
        <script src="../script/actrecord.js"></script>

    </body>
</html>