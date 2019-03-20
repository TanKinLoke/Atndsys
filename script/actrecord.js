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
    content0.style.display = "none";
    content1.style.display = "none";
    content2.style.display = "inline-block";
    submit_name.value = input_name;
    submit_venue.value = input_venue;
    submit_date.value = input_date;
    submit_starttime.value = input_starttime;
    submit_endtime.value = input_endtime;
    document.getElementById("center2form").submit();
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
    venue = venue.replace("_"," ");

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
    $("#"+venue+"_text").attr("readonly",false);
    document.getElementById(venue+"_text").focus(); 
}

function editVenue(venue) {
    var venue2 = document.getElementById(venue+"_text").value;

    $("#"+venue+"_text").attr("readonly",true);

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        venue2 = venue2.replace(" ","_");
        $("#"+venue+"_text").attr("onchange","editVenue('"+venue2+"')");
        $("#"+venue+"_edit").attr("onclick","editVenueText('"+venue2+"')");
        $("#"+venue+"_delete").attr("onclick","deleteVenue('"+venue2+"')");
        $("#"+venue+"_text").attr("id",venue2+"_text");
        $("#"+venue+"_edit").attr("id",venue2+"_edit");
        $("#"+venue+"_delete").attr("id",venue2+"_delete");
    };

    venue = venue.replace("_"," ");
    xmlhttp.open("POST","sql.php?function=edit&data=\"" + venue + "\"&data2=\"" + venue2 + "\"",true);
    venue = venue.replace(" ","_");
    xmlhttp.send();
}

function addVenue() {
    var venue = document.getElementById("add_venue_text").value;

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (venue != "") {
            setTimeout(function() {
                $("#venue-settings").append(
                "<tr id='"+venue.replace(" ","_")+"'>\n"+
                "<td><input type='text' onchange='editVenue(\""+venue.replace(" ","_")+"\")' id='"+venue.replace(" ","_")+"_text' value='"+venue+"' readonly></td>\n"+
                "<td><button type='button' id='"+venue.replace(" ","_")+"_edit' onclick='editVenueText(\""+venue.replace(" ","_")+"\")'>Edit</button>\n<button type='button' id='"+venue.replace(" ","_")+"_delete' onclick='deleteVenue(\""+venue.replace(" ","_")+"\")'>Delete</button></td>\n"+
                "</tr>\n");
                document.getElementById("add_venue_text").value = "";
                venue = ""; 
            },100);
        }
    };
    xmlhttp.open("POST","sql.php?function=add&data=\""+venue+"\"",true);
    xmlhttp.send();
}