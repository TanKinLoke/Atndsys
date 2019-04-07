<html lang="en">
    <head>
        <head>
            <title>ATNDSYS Attendance Export</title>
            <meta name="viewport" content="width=device-width,initial-scale=1.0" initial-scale="1"/>
            <meta charset="utf-8"/>
            <link rel="icon" href="../img/favicon.png">
            <link rel="stylesheet" href="../css/global.css"/>
            <link rel="stylesheet" href="../css/actexport.css"/>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
        </head>
    </head>
    <body>
        <a class='back-btn' onclick='location.href="../"'>
            <img src='../img/back-arrow.svg'>
        </a>
        <div id="back-btn"></div>
        <div class="header">
            <div class="header-content-box">
                <div class="header-image-box">
                    <img src="../img/i-Creatorz-Logo-Black.png" draggable="false"/>
                </div>
                <div class="header-project-name-box">
                    ATTENDANCE SYSTEM
                </div>
                <div class="header-page-name-box">
                    ACTIVITY ATTENDANCE EXPORT
                </div>
            </div>
        </div>
        <div class="content-box">
            <div class="content-box-a">
                <div class="content-box-a-center">
                    <div class="activity-selector-box">
                        ACTIVITY NAME
                        <select class="activity-selector-input" id="activity-selector-input">
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
                    <div class="activity-export-box">
                        <button class="export-button" onclick="seeAttendance();">EXPORT</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-box-b" id="content-box-b" style="display: none;">
            <div class="content-contents-box">
                <div class="content-title" id="content-title">ACTIVITY_NAME</div>
                <div class="content-desc">ATTENDANCE LIST</div>
            </div>
            <div class="content-table-box">
                <table id="export-table" class="display" style="width:100%">
                    
                </table>
            </div>
        </div>
        <script src="../script/actexport.js"></script>
    </body>
</html>