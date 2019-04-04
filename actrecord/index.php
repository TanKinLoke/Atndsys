<html lang="en">
    <head>
        <head>
            <title>ATNDSYS Activity Record</title>
            <meta name="viewport" content="width=device-width,initial-scale=1.0" initial-scale="1"/>
            <meta charset="utf-8"/>
            <link rel="icon" href="../img/favicon.png">
            <link rel="stylesheet" href="../css/global.css"/>
            <link rel="stylesheet" href="../css/actrecord.css"/>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
                    ACTIVITY RECORD
                </div>
            </div>
        </div>
        <div class="content-box">
            <div class="popup-venue-box-container" id="popup-venue-box-container" onclick="closeVenueBox();">
                <div class="popup-venue-box" id="popup-venue-box">
                    <div class="popup-venue-boxcontent">
                        <div class="popup-venue-boxcontent-up">
                            <div class="venue-table-box">
                        <table id="venue-settings">
                        <?php
                            // //SQL Login Details
                            // $servername="localhost";
                            // $username="root";
                            // $password="";
                            // $dbname="i-Attendance";

                            // //Create a connection
                            // $conn = new mysqli($servername,$username,$password,$dbname);

                            // //Check if the connection is successful or not
                            // if ($conn->connect_error) {
                            //     die("Connection failed: " . $conn->connect_error);
                            // }

                            // //SQL commands
                            // $sql = ("SELECT * FROM Activity_Venue");
                            // $result = mysqli_query($conn,$sql);

                            // if (mysqli_num_rows($result) > 0) {
                            //     // output data of each row
                            //     while($row = mysqli_fetch_assoc($result)) {
                            //         //Table row
                            //         echo "<tr id='".str_replace(" ","_",$row['Venue'])."'>\n";
                            //         echo "<td><input type='text' id='".str_replace(" ","_",$row['Venue'])."_text' value='".$row['Venue']."' readonly></td>\n";
                            //         echo "<td><button type='button' id='".str_replace(" ","_",$row['Venue'])."_edit' onclick='editVenueText(\"".str_replace(" ","_",$row['Venue'])."\")'>Edit</button>\n<button type='button' id='".str_replace(" ","_",$row['Venue'])."_delete' onclick='deleteVenue(\"".$row['Venue']."\")'>Delete</button></td>\n";
                            //         echo "</tr>\n";
                            //     }
                            // } else {
                                
                            // }

                            // mysqli_close($conn);

                        ?>
                        </table>
                            </div>
                        </div>
                        <div class="popup-venue-boxcontent-middle">
                            <button class="popup-venue-prev-btn" onclick="getVenue(last_page-1)">
                                <img src="../img/icons8-chevron-left-90.png"/>
                            </button>
                            <button class="popup-venue-next-btn" onclick="getVenue(last_page+1)">
                                <img src="../img/icons8-chevron-right-90.png"/>
                            </button>
                            <input class="popup-venue-pg-input" id="popup-venue-pg-input" onkeyup="getVenue(document.getElementById('popup-venue-pg-input').value)" onchange="checkPageInput()"/>
                        </div>
                        <div class="popup-venue-boxcontent-down">
                            <input class="add-venue-input-box" type="text" id="add_venue_text">
                            <button type='button' class="add-venue-submit" onclick="addVenue()">
                                <img src="../img/icons8-plus-96.png"/>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-box-container-0" id="content-box-container-0">
                <form onsubmit="return false">
                <div class="c1-box">
                    <div class="c1a">
                        <div class="c1a-title">ACTIVITY NAME</div>
                        <div class="c1a-box">
                            <input type="text" class="c1a-inputbox" id="inputnamebox" autocomplete="off">
                        </div>
                    </div>
                    <div class="c1a">
                        <div class="c1a-title">ACTIVITY VENUE</div>
                        <div class="c1a-box">
                            <input type="text" class="c1a-inputbox" id="inputvenuebox" list="Venue" autocomplete="off">
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
        </div>
        <script src="../script/actrecord.js"></script>

    </body>
</html>