<html lang="en">
    <head>
        <head>
            <title>ATNDSYS Check Activity</title>
            <meta name="viewport" content="width=device-width,initial-scale=1.0" initial-scale="1"/>
            <meta charset="utf-8"/>
            <link rel="icon" href="../img/favicon.png">
            <link rel="stylesheet" href="../css/global.css"/>
            <link rel="stylesheet" href="../css/chkact.css"/>
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
                    CHECK ACTIVITY
                </div>
            </div>
        </div>
        <div class="content-box">
            <div class="content-box-a" id="content-box-a">
            <div class="content-box-center">
                <div class="select-activity-box">
                    SEARCH QUERY
                    <input id= "activity-selector-input" class="activity-selector-input"/>
                    <div class="query-type-selector-box">
                        <select class="query-type-selector-input" id="query-type-selector-input">
                            <option>Activity Name</option>
                            <option>Activity Date</option>
                            <option>Activity Venue</option>
                        </select>
                    </div>
                </div>
                <div class="confirm-selection-box">
                    <button class="confirm-selection-input" onclick="displayData();">CHECK</button>
                </div>
            </div>
            </div>
            <div class="content-box-b" style="display:none;" id="content-box-b">
                <table id="data-table">
                    
                </table>
            </div>
        </div>
        <script src="../script/chkact.js"></script>
    </body>
</html>