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
                    <input type="text" class="CardID" id="CardID" autocomplete="off" autofocus>
                </div>
            </div>
        </div>
        <script src="../script/memberreg.js"></script>
    </body>
</html>