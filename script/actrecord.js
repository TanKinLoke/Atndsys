var content0 = document.getElementById("content-box-container-0");
var content1 = document.getElementById("content-box-container-1");
var content2 = document.getElementById("content-box-container-2");
var input_name;
var input_venue;
var input_date;
var input_starttime;
var input_endtime;
var input_showtime;
var output_name = document.getElementById("output-name-box");
var output_venue = document.getElementById("output-venue-box");
var output_date = document.getElementById("output-date-box");
var output_time = document.getElementById("output-time-box");
var submit_name = document.getElementById("submitName");
var submit_venue = document.getElementById("submitVenue");
var submit_date = document.getElementById("submitDate");
var submit_starttime = document.getElementById("submitStartTime");
var submit_endtime = document.getElementById("submitEndTime");
var last_focus_id = "";
var last_focus_text;
var venueArray;
var last_page;
var editActRes;
dataPerPage = 10;

function inputDatas() {
    input_name = document.getElementById("inputnamebox").value;
    input_venue = document.getElementById("inputvenuebox").value;
    input_date = document.getElementById("inputdatebox").value;
    input_starttime = document.getElementById("inputstarttimebox").value;
    input_endtime = document.getElementById("inputendtimebox").value;
    if (input_name !== "") {
        if (input_venue !== "") {
            if (input_date !== "") {
                if (input_starttime !== "") {
                    if (input_endtime !== "") {
                        input_showtime = input_starttime + " - " + input_endtime;
                        console.log(input_showtime);
                        content0.style.display = "none";
                        content1.style.display = "inline-block";
                        showDatas();
                    }
                }
            }
        }
    }
}

function showDatas() {
    output_name.innerText = input_name;
    output_venue.innerText = input_venue;
    output_date.innerText = input_date;
    output_time.innerText = input_showtime;
    document.getElementById("confirm").focus();
}

function getMemberByPage() {
    getMemberBySearch(getPageValue());
}

function checkPageInput() {
    if (document.getElementById("popup-venue-pg-input") == document.activeElement) {
                
    } else {
        document.getElementById("popup-venue-pg-input").value = last_page;
    }
}

function confirmRecord() {
    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "done") {
                window.alert("Activity record added.");
                //Back to home page
                window.history.back();
            } else if (this.responseText == "fail") {
                window.alert("Error occured. Please contact system administrator, @Cheah Zixu and @Kin Loke");
            }
        }
    };
    xmlhttp.open("POST", "addAct.php?ActivityName="+input_name+"&ActivityVenue="+input_venue+"&ActivityDate="+input_date+"&ActivityStartTime="+input_starttime+"&ActivityEndTime="+input_endtime,true);
    xmlhttp.send();
}

function showVenueBox() {
    document.getElementById("popup-venue-box-container").style.display = "block";
}

function closeVenueBox() {
    document.getElementById("popup-venue-box-container").style.display = "none";
}

document.getElementById("popup-venue-box").onclick = function (e) {
    e.stopPropagation();
}

function deleteVenue(venue) {
    venue = venue.split("_").join(" ").split("-").join("\'");

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            getVenue(last_page);
        }
    };
    xmlhttp.open("POST", "sql.php?function=delete&data=" + venue + "", true);
    xmlhttp.send();
}

function editVenueText(venue) {
    if (last_focus_id != "" && last_focus_id != null) {
        doneVenueText(last_focus_text.split(" ").join("_"));
    }

    lastClick(venue);
    $("#"+venue+"_edit").addClass("toDone");
    $("#"+venue+"_edit").attr("onclick","doneVenueText('"+venue+"')");
    $("#"+venue+"_text").attr("readonly",false);
    document.getElementById(venue+"_text").focus(); 
}

function doneVenueText(venue) {
    rmLastClick();
    $("#"+venue+"_edit").removeClass("toDone");
    $("#"+venue+"_edit").attr("onclick","editVenueText('"+venue+"')");
    $("#"+venue+"_text").attr("readonly",true);

    editVenue(venue);
}

function editVenue(venue) {
    var venue2 = document.getElementById(venue+"_text").value;
    venue = venue.split("_").join(" ").split("-").join("\'");
    editActRec("check",venue,venue2);

    venue = venue.split(" ").join("_").split("\'").join("-");

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "done") {
                //Success
                venue2 = venue2.split(" ").join("_").split("\'").join("-");
                $("#"+venue+"_text").attr("onclick","lastClick('"+venue2+"')");
                $("#"+venue+"_edit").attr("onclick","editVenueText('"+venue2+"')");
                $("#"+venue+"_delete").attr("onclick","deleteVenue('"+venue2+"')");
                $("#"+venue+"_text").attr("id",venue2+"_text");
                $("#"+venue+"_edit").attr("id",venue2+"_edit");
                $("#"+venue+"_delete").attr("id",venue2+"_delete");
            } else {
                //Error
                window.alert("Error occured. Please contact system administrator, @Cheah Zixu and @Kin Loke.");
            }
        }
    };

    //Replace _ with spaces, so the data in the SQL database is same as what user typed
    venue = venue.split("_").join(" ").split("-").join("\'");
    xmlhttp.open("POST","sql.php?function=edit&data=" + venue + "&data2=" + venue2,true);
    //Change back to prevent any upcoming code error
    venue = venue.split(" ").join("_").split("\'").join("-");
    xmlhttp.send();
}   

function addVenue() {
    var venue = document.getElementById("add_venue_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            if (this.responseText == "done" && venue != "") {
                //Success
                // $("#venue-settings").append(
                // "<tr id='"+venue.split(" ").join("_")+"'>\n"+
                // "<td><input type='text' id='"+venue.split(" ").join("_")+"_text' value='"+venue+"' readonly></td>\n"+
                // "<td><button type='button' id='"+venue.split(" ").join("_")+"_edit' onclick='editVenueText(\""+venue.split(" ").join("_")+"\")'>Edit</button>\n<button type='button' id='"+venue.split(" ").join("_")+"_delete' onclick='deleteVenue(\""+venue.split(" ").join("_")+"\")'>Delete</button></td>\n"+
                // "</tr>\n");

                getVenue(last_page);

                document.getElementById("add_venue_text").value = "";
                venue = ""; 
            }
        }

    };

    xmlhttp.open("POST","sql.php?function=add&data="+venue+"",true);
    xmlhttp.send();

    //Below 2 codes caused system doesn't work on Firefox
    // sessionStorage.setItem("activityAdded", "true");
    // location.reload();
}

window.onload = function() {
    getVenue(1);
    if (sessionStorage.getItem("activityAdded")) {
        sessionStorage.setItem("activityAdded", "false");
        showVenueBox();
    }
}

$(document).keypress(function(e) { 
    if (e.which == 13) clickEnter();   // enter (works as expected)
});

$(document).keyup(function(e) { 
    if (e.which == 27) undoEdit(); // esc   (does not work in keypress)
    if (e.which == 38)  getVenue(last_page+1); //up arrow
    if (e.which == 39)  getVenue(last_page+1); //right arrow
    if (e.which == 40)  getVenue(last_page-1); //down arrow
    if (e.which == 37)  getVenue(last_page-1); //left arrow
});

function lastClick(venue) {
    //Record last clicked "Edit" button
    last_focus_id = venue+"_text";
    last_focus_text = document.getElementById(last_focus_id).value;
}

function rmLastClick() {
    //Remove the variable so it wouldn't affect the "venue" after clicked "Done" button
    last_focus_id = "";
    last_focus_text = "";
}

function undoEdit() {
    //Undo the changes to "Add Venue"
    document.getElementById(last_focus_id).value = last_focus_text;
    var localvenue = last_focus_text.split(" ").join("_");
    console.log(localvenue);
    doneVenueText(localvenue);
}

function clickEnter() {
    if (last_focus_id == "" || last_focus_text == "" || last_focus_id == null || last_focus_text == null) {
        if (document.getElementById("add_venue_text").value != "" && document.getElementById("add_venue_text").value != null)
            addVenue();
    } else {
        var localvenue = last_focus_text.split(" ").join("_").split("\'").join("-");
        doneVenueText(localvenue);
    }

}

function getVenue(page) {
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
            venueArray = this.responseText;
            venueArray = venueArray.split(",");
            
            //Prevent page more than existing pages
            if (Math.ceil((venueArray.length - 1)/dataPerPage) < page) {
                page = Math.ceil((venueArray.length - 1)/dataPerPage);
                end = page * dataPerPage;
                startFrom = (page-1) * dataPerPage;
            }

            last_page = page;
            if (document.getElementById("popup-venue-pg-input") == document.activeElement) {
                
            } else {
                document.getElementById("popup-venue-pg-input").value = page;
            }

            for (var i = startFrom; i<end ;i++) {
                if (venueArray[i] == null || venueArray[i] == "") {

                } else {
                    code = code.concat(
                    "<tr id='"+venueArray[i].split(" ").join("_").split("\'").join("-")+"'>\n"+
                    "<td><input type='text' id='"+venueArray[i].split(" ").join("_").split("\'").join("-")+"_text' value='"+venueArray[i].split("\'").join("&#039;")+"' readonly></td>\n"+
                    "<td><button type='button' id='"+venueArray[i].split(" ").join("_").split("\'").join("-")+"_edit' class='edit-btn' onclick='editVenueText(\""+venueArray[i].split(" ").join("_").split("\'").join("-")+"\")'></button>\n<button type='button' id='"+venueArray[i].split(" ").join("_").split("\'").join("-")+"_delete' class='delete-btn' onclick='deleteVenue(\""+venueArray[i].split(" ").join("_").split("\'").join("-")+"\")'></button></td>\n"+
                    "</tr>\n");
                }
            };
            $("#venue-settings").html("");
            $("#venue-settings").append("<tbody>"+code+"</tbody>");
        }
    };

    xmlhttp.open("POST","getVenue.php",true);
    xmlhttp.send();
}

function editActRec(perform,venue,venue2) {
    if (perform != "edit" && perform != "check") {
        return;
    }

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            if (perform == "check") {
                if (this.responseText == "exist"){
                    editActRes = confirm("Edit activity that have this venue as well?");
                    if (editActRes == true) {
                        console.log('test');
                        editActRec("edit",venue,venue2);
                    }
                }
            } else if (perform == "edit") {
                if (this.responseText == "done") {
                    console.log('done');
                } else {
                    window.alert("Error occured. Please contact system administrator, @Cheah Zixu and @Kin Loke.");
                }
            }
        }
    }
    xmlhttp.open("POST","checkActRec.php?function="+perform+"&data="+venue+"&data2="+venue2,true);
    xmlhttp.send();
}