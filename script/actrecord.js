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
    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            $("#"+venue.split(" ").join("_")).remove();
        }
    };
    xmlhttp.open("POST", "sql.php?function=delete&data=\"" + venue + "\"", true);
    xmlhttp.send();
}