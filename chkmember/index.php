<html lang="en">
    <head>
        <head>
            <title>ATNDSYS Check Member</title>
            <meta name="viewport" content="width=device-width,initial-scale=1.0" initial-scale="1"/>
            <meta charset="utf-8"/>
            <link rel="icon" href="../img/favicon.png">
            <link rel="stylesheet" href="../css/global.css"/>
            <link rel="stylesheet" href="../css/chkmember.css"/>
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
                    CHECK MEMBER DATA
                </div>
            </div>
        </div>
        <div class="content-box">
            <div class="content-box-a" id="content-box-a">
            <div class="content-box-center">
                <div class="select-member-box">
                    SEARCH QUERY
                    <input type="text" class="member-selector-input" list="member-id" autocomplete="off">
                    <div class="query-type-selector-box">
                        <select class="query-type-selector-input" id="query-type-selector-input">
                            <option>Member School Number</option>
                            <option>Member Name</option>
                            <option>Member Class</option>
                        </select>
                    </div>
                    <datalist id="member-id">
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
            
                        $sql = ("SELECT * FROM student_info");
                        $result = mysqli_query($conn,$sql);
            
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                //Datalist for dropdown menu
                                echo "<option value=\"".$row["Student_Name"]."\">";
                            }
                        } else {
                            
                        }
                
                        mysqli_close($conn);
                    ?>
                    </datalist>
                    </select>
                </div>
                <div class="confirm-selection-box">
                    <button class="confirm-selection-input" onclick="displayData();">SEARCH</button>
                </div>
            </div>
            </div>
            <div class="content-box-b" style="display:none;" id="content-box-b"></div>
        </div>
        <script src="../script/chkmember.js"></script>
    </body>
</html>