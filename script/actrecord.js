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
var last_focus_id;
var last_focus_text;
var venueArray;

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
    venue = venue.split("_").join(" ");

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#"+venue.split(" ").join("_")).remove();
        }
    };
    xmlhttp.open("POST", "sql.php?function=delete&data=\"" + venue + "\"", true);
    xmlhttp.send();
}

function editVenueText(venue) {
    lastClick(venue);
    $("#"+venue+"_edit").text("Done");
    $("#"+venue+"_edit").attr("onclick","doneVenueText('"+venue+"')");
    $("#"+venue+"_text").attr("readonly",false);
    document.getElementById(venue+"_text").focus(); 
}

function doneVenueText(venue) {
    rmLastClick();
    $("#"+venue+"_edit").text("Edit");
    $("#"+venue+"_edit").attr("onclick","editVenueText('"+venue+"')");
    $("#"+venue+"_text").attr("readonly",true);

    editVenue(venue);
}

function editVenue(venue) {
    var venue2 = document.getElementById(venue+"_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "done") {
                //Success
                venue2 = venue2.split(" ").join("_");
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
    venue = venue.replace("_"," ");
    xmlhttp.open("POST","sql.php?function=edit&data=\"" + venue + "\"&data2=\"" + venue2 + "\"",true);
    //Change back to prevent any upcoming code error
    venue = venue.replace(" ","_");
    xmlhttp.send();
}   

function addVenue() {
    var venue = document.getElementById("add_venue_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            if (this.responseText == "done" && venue != "") {
                //Success
                $("#venue-settings").append(
                "<tr id='"+venue.split(" ").join("_")+"'>\n"+
                "<td><input type='text' id='"+venue.split(" ").join("_")+"_text' value='"+venue+"' readonly></td>\n"+
                "<td><button type='button' id='"+venue.split(" ").join("_")+"_edit' onclick='editVenueText(\""+venue.split(" ").join("_")+"\")'>Edit</button>\n<button type='button' id='"+venue.split(" ").join("_")+"_delete' onclick='deleteVenue(\""+venue.split(" ").join("_")+"\")'>Delete</button></td>\n"+
                "</tr>\n");

                document.getElementById("add_venue_text").value = "";
                venue = ""; 
            }
        }

    };

    xmlhttp.open("POST","sql.php?function=add&data=\""+venue+"\"",true);
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
    if (e.which == 27) console.log('test2'); // esc   (does not work)
});

$(document).keyup(function(e) { 
    if (e.which == 27) undoEdit(); // esc   (does not work in keypress)
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
        addVenue();
    } else {
        var localvenue = last_focus_text.split(" ").join("_");
        doneVenueText(localvenue);
    }

}

function getVenue(page) {
    end = page * 5;

    var startFrom = (page-1) * 5;

    var code = "";

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            venueArray = this.responseText;
            venueArray = venueArray.split(",");
            for (var i = startFrom; i<end ;i++) {
                if (venueArray[i] == null || venueArray[i] == "") {

                } else {
                    code = code.concat(
                    "<tr id='"+venueArray[i]+"'>\n"+
                    "<td><input type='text' id='"+venueArray[i]+"_text' value='"+venueArray[i]+"' readonly></td>\n"+
                    "<td><button type='button' id='"+venueArray[i]+"_edit' onclick='editVenueText(\""+venueArray[i]+"\")'>Edit</button>\n<button type='button' id='"+venueArray[i]+"_delete' onclick='deleteVenue(\""+venueArray[i]+"\")'>Delete</button></td>\n"+
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