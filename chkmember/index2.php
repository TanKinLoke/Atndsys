<html lang="en">
    <head>
        <head>
            <title>ATNDSYS | Check Member</title>
            <meta name="viewport" content="width=device-width,initial-scale=1.0" initial-scale="1"/>
            <meta charset="utf-8"/>
            <link rel="icon" href="../img/favicon.png">
            <link rel="stylesheet" href="../styles/global.css">
            <link rel="stylesheet" href="../styles/chkmember.css">
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        </head>
    </head>
    <body>
        <section class="header">
            <div class="header-contents">
                <div class="header-logo">
                    <img src="../img/logowhite.png" draggable="false"/>
                </div>
                <div class="header-title">
                    ATTENDANCE SYSTEM&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;CHECK MEMBER
                </div>
            </div>
        </section>
        <section class="content-box">
            <div class="sec1">
                <div class="title">
                    SEARCH QUERY: 
                    <img src="../img/icons8-slider-90.png" draggable="false" onclick="launchFilterMenu();"/>
                    <span class="filter-menu">
                        <div class="filter-op-title">Search member by: </div>
                        <div class="filter-op"><input type="checkbox" class="filter-chkbox"/>NAME</div>
                        <div class="filter-op"><input type="checkbox" class="filter-chkbox"/>CLASS</div>
                        <div class="filter-op"><input type="checkbox" class="filter-chkbox"/>SCH NUMBER</div>
                    </span>
                </div>
                <div class="search-box-content">
                    <div class="search-input-box">
                        <input class="search-input" type="text"/><!--
                        --><button class="search-btn">
                            <img src="../img/icons8-search2.svg" draggable="false"/>
                        </button>
                    </div>
                </div>
            </div>
            <div class="sec2"></div>
        </section>
        <script src="../script/chkmember.js"></script>
    </body>
</html>