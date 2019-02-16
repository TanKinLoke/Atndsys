<html lang="en">
    <head>
        <head>
            <title>ATNDSYS Member Registration</title>
            <meta name="viewport" content="width=device-width,initial-scale=1.0" initial-scale="1"/>
            <meta charset="utf-8"/>
            <link rel="stylesheet" href="../css/global.css"/>
            <link rel="stylesheet" href="../css/memberreg.css"/>
        </head>
    </head>
    <body>
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
                echo "<script>console.log('Everything is not inserted');</script>";
            }
        //Close MySQL Connection
        mysqli_close($conn);
    ?>
        <div class="header">
            <div class="header-content-box">
                <div class="header-image-box">
                    <img src="../img/i-Creatorz-Logo-Black.png" draggable="false"/>
                </div>
                <div class="header-project-name-box">
                    ATTENDANCE SYSTEM
                </div>
                <div class="header-page-name-box">
                    MEMBER REGISTRATION
                </div>
            </div>
        </div>
        <div class="center0" id="center0">
            <div class="center0-box">
                <div class="center0-content-box">
                    <form onsubmit="return false">
                    <div class="c1">
                        <div class="c1a">MEMBER NAME</div>
                        <input type="text" class="c1b" id="StudentName">
                    </div>
                    <div class="c2">
                        <div class="c2a">MEMBER SCHOOL NUMBER</div>
                        <input type="text" class="c2b" id="StudentID">
                    </div>
                    <div class="c3">
                        <div class="c3a">MEMBER CLASS</div>
                        <input type="text" class="c3b" id="Class">
                    </div>
                    <div class="submit-box">
                        <button class="submit" onclick="submitDetails();">SUBMIT</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="center1" id="center1">
            <div class="center1-box">
                <div class="c4">
                    <div class="c4-box">
                        <div class="c4a" id="c4a">MEMBER_NAME</div>
                        <div class="c4b" id="c4b">MEMBER_SCHNO</div>
                        <div class="c4c" id="c4c">MEMBER_CLASS</div>
                    </div>
                </div>
                <div class="c5">
                    <div class="c5a">
                        <img src="../img/icons8-credit-card-96.png" draggable="false"/>
                    </div>
                    <div class="c5b" id="c5b">TAP CARD ON SCANNER TO FINISH PROCESS</div>
                    <div class="c5c" id="c5c">SCANNER IS IDLE</div>
                    <input type="text" class="CardID" id="CardID" autofocus>
                </div>
            </div>
        </div>
        <div class="center2" id="center2">
            <div class="center2-box">
                <div class="c6">DONE ADDING MEMBER DATA</div>
                <div class="back-box">
                    <button class="back" onclick="backtoInit();">BACK</button>
                </div>
            </div>
        </div>
        <div class="center3" id="center3">
            <form method="post" id="center3form">
                <input id="StudentName2" name="StudentName" type="text"/>
                <input id="StudentID2" name="StudentID" type="text"/>
                <input id="Class2" name="Class" type="text"/>
                <input id="CardID2" name="CardID" type="text"/>
                <button type="submit">SUBMIT</button>
            </form>
        </div>
        <script src="../script/memberreg.js"></script>
    </body>
</html>