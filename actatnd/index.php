<html lang="en">
    <head>
        <head>
            <title>ATNDSYS Activity Attendance</title>
            <meta name="viewport" content="width=device-width,initial-scale=1.0" initial-scale="1"/>
            <meta charset="utf-8"/>
            <link rel="stylesheet" href="../css/global.css"/>
            <link rel="stylesheet" href="../css/actatnd.css"/>
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
                    ACTIVITY ATTENDANCE
                </div>
            </div>
        </div>
        <div class="content-box">
            <div class="content-box-a" id="content-box-a">
            <div class="content-box-center">
                <div class="activity-selector-box">
                    <div class="activity-selector-box-center">
                        <div class="activity-name-selector-box">
                            ACTIVITY NAME
                            <select class="activity-name-selector-input" id="activity-name-selector-input" name="ActivitySelection">
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

                                $sql = "SELECT * FROM activity_record ORDER BY pkey DESC";
                                $result = mysqli_query($conn,$sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        //Datalist for dropdown menu
                                        echo "<option value=\"".$row["Activity_Name"]."\">".$row["Activity_Name"]."</option>";
                                    }
                                } else {
                                    echo "<option value=\"No result\">No result</option>";
                                }

                                mysqli_close($conn);
                                echo "<br>";
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="activity-selector-confirm">
                        <button class="confirm-button" onclick="confirmActivity();">CONFIRM</button>
                    </div>
                </div>
            </div>
            </div>
            <div class="content-box-b" id="content-box-b" style="display:none;">
                <div class="content-box-b-center">
                    <div class="content-box-b-c1">
                        <img src="../img/icons8-card-security-96.png"/>
                    </div>
                    <div class="content-box-b-c2">TAP CARD ON SCANNER TO MARK ATTENDANCE</div>
                    <div class="content-box-b-c3">WAITING FOR CARD</div>
                    <form method="post" id="content-box-b-form">
                        <input type="text" class="CardID" id="CardID" autofocus autocomplete="off">
                    </form>
                </div>
            </div>
        </div>
        <script src="../script/actatnd.js"></script>
    </body>
</html>