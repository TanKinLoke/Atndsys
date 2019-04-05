// Just contact me if you want to know how this code works, by @VentoBento
var last_page = "";
dataPerPage = 10;
var filer = "";
var zixuArray = "";
var page = "search";
var last_focus_id = "";
var last_activity_name = "";
var last_activity_venue = "";
var last_activity_starttime = "";
var last_activity_endtime = "";
var last_activity_date = "";

function displayData() {
    document.getElementById("content-box-a").style.display = "none";
    document.getElementById("content-box-b").style.display = "block";
    getActivityBySearch(1);
    page = "show";
    $("#back-btn").attr("onclick","backToSearch()");
}

function backToSearch() {
    //Back to search page
    page="search";
    document.getElementById("content-box-a").style.display = "block";
    document.getElementById("content-box-b").style.display = "none";
    $("#back-btn").attr("onclick","location.href='../'");
}

function getQueryType() {
    //Get user selected value on search query type
    return document.getElementById("query-type-selector-input").value;
}

function getActivityByPage() {
    getActivityBySearch(getPageValue());
}

function checkPageInput() {
    if (document.getElementById("pg-selector-input") == document.activeElement) {
                
    } else {
        document.getElementById("pg-selector-input").value = last_page;
    }
}

function getActivity(page) {
    //Prevent page less than 1
    if (page < 1) {
        page = 1;
    }

    end = page * dataPerPage;

    startFrom = (page-1) * dataPerPage;

    var code = "";

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            activityArray = this.responseText;
            activityArray = activityArray.split(",");
            
            //Prevent page more than existing pages
            if (Math.ceil((activityArray.length - 1)/dataPerPage) <= page) {
                page = Math.ceil((activityArray.length - 1)/dataPerPage);
                end = page * dataPerPage;
                startFrom = (page-1) * dataPerPage;
            }

            last_page = page;
            if (document.getElementById("pg-selector-input") == document.activeElement) {
                
            } else {
                document.getElementById("pg-selector-input").value = page;
            }

            for (var i = startFrom; i<end ;i++) {
                if (activityArray[i] == null || activityArray[i] == "") {

                } else {
                    activityArray2 = activityArray[i].split("/");
                    code = code.concat(
                        "<tr id='"+activityArray2[0].split(" ").join("_")+"'>\n"+
                        "<td><input type='text' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_text' value='"+activityArray2[0].split("\'").join("&#039;")+"' readonly=\"true\"></td>\n"+
                        "<td><input type='text' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_venue_text' value='"+activityArray2[1].split("\'").join("&#039;")+"' readonly=\"true\"></td>\n"+
                        "<td><input type='date' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_date_text' value='"+activityArray2[2]+"' readonly=\"true\"></td>\n"+
                        "<td><input type='time' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_starttime_text' value='"+activityArray2[3]+"' readonly=\"true\"></td>\n"+
                        "<td><input type='time' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_endtime_text' value='"+activityArray2[4]+"' readonly=\"true\"></td>\n"+
                        "<td><button type='button' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_edit' class='edit-btn' onclick='editActivity(\""+activityArray2[0].split(" ").join("_").split("\'").join("-")+"\")'></button>\n<button type='button' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_delete' class='delete-btn' onclick='deleteActivity(\""+activityArray2[0].split(" ").join("_").split("\'").join("-")+"\")'></button></td>\n"+
                        "</tr>\n"
                    )
            };
            $("#data-table").html("");
            $("#data-table").append("<tbody>"+code+"</tbody>");
            }
        }
    };

    xmlhttp.open("POST","getActivity.php",true);
    xmlhttp.send();
}

function getActivityBySearch(page) {
    //Prevent page less than 1
    if (page < 1) {
        page = 1;
    }

    end = page * dataPerPage;

    startFrom = (page-1) * dataPerPage;

    filter = document.getElementById("activity-selector-input").value.toUpperCase();
    if (filter == "") {
        getActivity(page);
        return;
    }

    queryNo = 0;

    queryType = getQueryType();
    if (queryType == "Activity Name") {
        queryNo = 0;
    } else if (queryType == "Activity Date") {
        queryNo = 2;
    } else if (queryType == "Activity Venue") {
        queryNo = 1;
    }

    var code = "";

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            activityArray = this.responseText;
            activityArray = activityArray.split(",");

            //Prevent page more than existing pages
            if (Math.ceil((activityArray.length - 1)/dataPerPage) <= page) {
                page = Math.ceil((activityArray.length - 1)/dataPerPage);
                end = page * dataPerPage;
                startFrom = (page-1) * dataPerPage;
            }

            last_page = page;
            if (document.getElementById("pg-selector-input") == document.activeElement) {
                
            } else {
                document.getElementById("pg-selector-input").value = page;
            }

            for (var i = startFrom; i<end ;i++) {
                if (activityArray[i] == null || activityArray[i] == "") {

                } else {
                    activityArray2 = activityArray[i].split("/");   

                    if (activityArray2[queryNo].toUpperCase().indexOf(filter) > -1) {
                        code = code.concat(
                        "<tr id='"+activityArray2[0].split(" ").join("_")+"'>\n"+
                        "<td><input type='text' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_text' value='"+activityArray2[0].split("\'").join("&#039;")+"' readonly=\"true\"></td>\n"+
                        "<td><input type='text' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_venue_text' value='"+activityArray2[1].split("\'").join("&#039;")+"' readonly=\"true\"></td>\n"+
                        "<td><input type='date' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_date_text' value='"+activityArray2[2]+"' readonly=\"true\"></td>\n"+
                        "<td><input type='time' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_starttime_text' value='"+activityArray2[3]+"' readonly=\"true\"></td>\n"+
                        "<td><input type='time' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_endtime_text' value='"+activityArray2[4]+"' readonly=\"true\"></td>\n"+
                        "<td><button type='button' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_edit' onclick='editActivity(\""+activityArray2[0].split(" ").join("_").split("\'").join("-")+"\")'>Edit</button>\n<button type='button' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_delete' onclick='deleteActivity(\""+activityArray2[0].split(" ").join("_").split("\'").join("-")+"\")'>Delete</button></td>\n"+
                        "</tr>\n"
                        )
                    } 
            };
            $("#data-table").html("");
            $("#data-table").append("<tbody>"+code+"</tbody>");
            }
        }
    };

    xmlhttp.open("POST","getActivity.php",true);
    xmlhttp.send();
}

function editActivity(name) {
    //Enable user to edit activity's info
    if (last_focus_id != "") {
        doneEditActivity(last_focus_id);
    }

    last_focus_id = name;
    last_activity_date = document.getElementById(name+"_date_text").value;
    last_activity_endtime = document.getElementById(name+"_endtime_text").value;
    last_activity_starttime = document.getElementById(name+"_starttime_text").value;
    last_activity_venue = document.getElementById(name+"_venue_text").value;
    last_activity_name = document.getElementById(name+"_text").value;

    $("#"+name+"_text").attr("readonly",false);
    $("#"+name+"_venue_text").attr("readonly",false);
    $("#"+name+"_endtime_text").attr("readonly",false);
    $("#"+name+"_starttime_text").attr("readonly",false);
    $("#"+name+"_date_text").attr("readonly",false);
    $("#"+name+"_edit").attr("onclick","doneEditActivity('"+name+"')");
    $("#"+name+"_edit").addClass("toDone");
}

function doneEditActivity(name) {
    //Lock editing feature after pressing done button
    editActivitySend(name);

    last_focus_id = "";
    last_activity_date = "";
    last_activity_endtime ="";
    last_activity_starttime = "";
    last_activity_venue = "";
    last_activity_name = "";

    $("#"+name+"_text").attr("readonly",true);
    $("#"+name+"_venue_text").attr("readonly",true);
    $("#"+name+"_endtime_text").attr("readonly",true);
    $("#"+name+"_starttime_text").attr("readonly",true);
    $("#"+name+"_date_text").attr("readonly",true);
    $("#"+name+"_edit").attr("onclick","editActivity('"+name+"')");
    $("#"+name+"_edit").removeClass("toDone");
}

$(document).keypress(function(e) {
    if (e.which == 13) clickEnter(); //Enter
})

$(document).keyup(function(e) {
    if (e.which == 27) clickESC(); //ESC
    if (e.which == 38)  getActivityBySearch(last_page+1); //up arrow
    if (e.which == 39)  getActivityBySearch(last_page+1); //right arrow
    if (e.which == 40)  getActivityBySearch(last_page-1); //down arrow
    if (e.which == 37)  getActivityBySearch(last_page-1); //left arrow
})

function getPageValue() {
    return document.getElementById("pg-selector-input").value;
}

function clickEnter() {
    //Stop editing after pressing Enter button
    if (page == "search") {
        displayData();
    } else if (page == "show") {
        if (last_focus_id != "") {
            doneEditActivity(last_focus_id);
        }
    }
}

function clickESC() {
    //Stop editing after pressing ESC button
    if (page == "show") {
        if (last_focus_id != "") {
            document.getElementById(last_focus_id+"_text").value = last_activity_name;
            document.getElementById(last_focus_id+"_venue_text").value = last_activity_venue;
            document.getElementById(last_focus_id+"_endtime_text").value = last_activity_endtime;
            document.getElementById(last_focus_id+"_starttime_text").value = last_activity_starttime;
            document.getElementById(last_focus_id+"_date_text").value = last_activity_date;
            doneEditActivity(last_focus_id);
        } else {
            backToSearch();
        }
    }
}

function deleteActivity(name) {
    //Enable user to delete a activity data
    var originalAct = document.getElementById(name+"_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            if (this.responseText = "done") {
                $("#"+name).remove();
                window.alert("Data deleted");
                getActivityBySearch(1);
            } else  {
                //fail
                window.alert("Error occured. Please contact system administrator, @Cheah Zixu and @Kin Loke.");
            } 
        }
    };
    xmlhttp.open("POST","delActivity.php?originalAct="+originalAct,true);
    xmlhttp.send();
}

function editActivitySend(name) {
    //Send edited member's name back to database
    send_activity_date = document.getElementById(name+"_date_text").value;
    send_activity_endtime = document.getElementById(name+"_endtime_text").value;
    send_activity_starttime = document.getElementById(name+"_starttime_text").value;
    send_activity_venue = document.getElementById(name+"_venue_text").value;
    send_activity_name = document.getElementById(name+"_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            if (this.responseText == "done") {
                //Success

            } else {
                //Fail
                window.alert("Error occured. Please contact system administrator, @Cheah Zixu and @Kin Loke.");
            }
        }
    };

    xmlhttp.open("POST","editActivity.php?originalAct="+last_activity_name+"&activityName="+send_activity_name+"&activityVenue="+send_activity_venue+"&activityDate="+send_activity_date+"&activityStartTime="+send_activity_starttime+"&activityEndTime="+send_activity_endtime,true);
    xmlhttp.send();
}

