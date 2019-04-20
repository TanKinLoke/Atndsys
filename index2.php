<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ATNDSYS | Dashboard</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0" initial-scale="1"/>
        <meta charset="utf-8"/>
        <link rel="icon" href="./img/favicon.png"/>
        <link rel="stylesheet" href="styles/global.css"/>
        <link rel="stylesheet" href="styles/home.css"/>
    </head>
    <body>
        <section class="header">
            <div class="header-contents">
                <div class="header-logo">
                    <img src="./img/logowhite.png" draggable="false"/>
                </div>
                <div class="header-title">
                    ATTENDANCE SYSTEM
                </div>
            </div>
        </section>
        <section class="content">
            <div class="content-box">
                <div class="content-box-center">
                    <div class="c1">
                        <div class="c1-content">
                            <div class="c1a">
                                <div class="c1aa">
                                    <img src="./img/gitlab-icon-rgb.svg" draggable="false"/>
                                </div>
                                <div class="c1ab">OPEN SOURCED</div>
                            </div>
                            <div class="c1c">
                                <button class="contribute-btn" onclick="window.open('https://gitlab.com/icreatorz/atndsys','_blank')">
                                    <p>SEE REPO</p>
                                    <img src="./img/icons8-bookmark.svg" draggable="false"/>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="c2">
                        <div class="c2a">
                            <div class="c2a-content">
                                <div class="c2a-1">
                                    <?php
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
                                    
                                        $sql = "SELECT COUNT(*) FROM student_info";
                                        $result = mysqli_query($conn,$sql);
                                        $result = mysqli_fetch_assoc($result);

                                        echo $result['COUNT(*)'];
                                    ?>
                                </div>
                                <div class="c2a-2">MEMBERS REGISTERED</div>
                            </div>
                        </div>
                        <div class="c2b">
                            <button class="chkmb-btn" onclick="location.replace('./chkmember/')">
                                <p>CHECK MEMBER</p>
                                <img src="./img/icons8-search.svg" draggable="false"/>
                            </button>
                            <button class="addmb-btn" onclick="location.replace('./memberreg/')">
                                <p>ADD MEMBER</p>
                                <img src="./img/icons8-plus.svg" draggable="false"/>
                            </button>
                        </div>
                    </div>
                    <div class="c3">
                        <div class="c3a">
                            <div class="c3a-content">
                                <div class="c3a-1">
                                    LATEST ACTIVITY
                                </div>
                                <div class="c3a-2">
                                    <?php
                                    $sql = "SELECT * FROM `activity_record` ORDER BY pkey DESC";
                                    $result = mysqli_query($conn,$sql);
                                    $result = mysqli_fetch_assoc($result);

                                    echo $result['Activity_Name'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="c3b">
                            <button class="export-btn" onclick="location.replace('./actexport/')">
                                <p>EXPORT</p>
                                <img src="./img/icons8-box.svg" draggable="false"/>
                            </button>
                            <button class="atdtake-btn" onclick="location.replace('./actatnd/')">
                                <p>MARK ATTENDANCE</p>
                                <img src="./img/icons8-ok.svg" draggable="false"/>
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="c4">
                        <div class="c4a">
                            <div class="c4a-content">
                                <div class="c4a-1">
                                    <?php
                                        $sql = "SELECT COUNT(*) FROM activity_record";
                                        $result = mysqli_query($conn,$sql);
                                        $result = mysqli_fetch_assoc($result);

                                        echo $result['COUNT(*)'];
                                    ?>
                                </div>
                                <div class="c4a-2">ACTIVITIES CREATED</div>
                            </div>
                        </div>
                        <div class="c4b">
                            <button class="export-btn" onclick="location.replace('./chkact/')">
                                <p>CHECK ACTIVITY</p>
                                <img src="./img/icons8-search.svg" draggable="false"/>
                            </button>
                            <button class="atdtake-btn" onclick="location.replace('./actrecord/')">
                                <p>ADD ACTIVITY</p>
                                <img src="./img/icons8-plus.svg" draggable="false"/>
                            </button>
                        </div>
                    </div>
                    <div class="c5">
                        <div class="c5a">
                            <div class="c5a-content">
                                <img src="./img/Messenger_Logo_Color_RGB.svg" draggable="false"/>
                                <div class="c5a-text">MESSENGER PLATFORM</div>
                            </div>
                        </div>
                        <div class="c5b">
                            <button class="export-btn" onclick="">
                                <p>CHECK</p>
                                <img src="./img/icons8-search.svg" draggable="false"/>
                            </button>
                            <button class="atdtake-btn" onclick="">
                                <p>SEND</p>
                                <img src="./img/icons8-plus.svg" draggable="false"/>
                            </button>
                        </div>
                    </div>
                    <div class="c6">
                        <div class="c6a">
                            <div class="c6a-content">
                                <div class="c6a-1">
                                    ATNDSYS VERSION
                                </div>
                                <div class="c6a-2">
                                    V1.0
                                </div>
                            </div>
                        </div>
                        <div class="c6b">
                            <button class="contribute-btn" onclick="location.replace('./about/')">
                                <p>LEARN MORE</p>
                                <img src="./img/icons8-bookmark.svg" draggable="false"/>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>