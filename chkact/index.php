<html lang="en">
    <head>
        <head>
            <title>ATNDSYS Check Activity</title>
            <meta name="viewport" content="width=device-width,initial-scale=1.0" initial-scale="1"/>
            <meta charset="utf-8"/>
            <link rel="icon" href="../img/favicon.png">
            <link rel="stylesheet" href="../css/global.css"/>
            <link rel="stylesheet" href="../css/chkact.css"/>
        </head>
    </head>
    <body>
        <a class="back-btn" onclick="location.href='../'">
            <img src="../img/back-arrow.svg">
        </a>
        <div class="header">
            <div class="header-content-box">
                <div class="header-image-box">
                    <img src="../img/i-Creatorz-Logo-Black.png" draggable="false"/>
                </div>
                <div class="header-project-name-box">
                    ATTENDANCE SYSTEM
                </div>
                <div class="header-page-name-box">
                    CHECK ACTIVITY
                </div>
            </div>
        </div>
        <div class="content-box">
            <div class="content-box-a" id="content-box-a">
            <div class="content-box-center">
                <div class="select-activity-box">
                    ACTIVITY NAME
                    <select class="activity-selector-input">
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

                                //Close connection
                                mysqli_close($conn);
                                echo "<br>";
                            ?>
                    </select>
                </div>
                <div class="confirm-selection-box">
                    <button class="confirm-selection-input" onclick="displayData();">CHECK</button>
                </div>
            </div>
            </div>
            <div class="content-box-b" style="display:none;" id="content-box-b">
                <table id="data-table"></table>
            </div>
        </div>
        <script src="../script/chkact.js"></script>
    </body>
</html>