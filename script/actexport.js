var atndlistStatus = false;

function seeAttendance() {
    //Let user check Attendance List after selecting activity
    if (!atndlistStatus) {
        //Get activity value
        var displayTitle = document.getElementById("activity-selector-input").value;
        document.getElementById("content-box-b").style.display = "block";
        document.getElementById("content-title").innerText = displayTitle;
        atndlistStatus = true;

        //Create POST request
        var xmlhttp = new XMLHttpRequest;
        //Function after getting response from sql.php
        xmlhttp.onreadystatechange = function() {
            if (this.status == 200 && this.readyState == 4) {
                //Splitting response into array
                var response = this.responseText;
                var ActandStdinfo = response.split(":");
                var Actname = ActandStdinfo[0];
                var Stdinfo = ActandStdinfo[1].split(",");

                //Loop through all student info
                for (x in Stdinfo) {
                    var Stddata = Stdinfo[x].split("|");
                    var Stdname = Stddata[0];
                    var Stdid = Stddata[1];
                    var Stdclass = Stddata[2];

                    //Append Student info into table
                    $("#export-table").append("<tr>\n"+
                    "<td class='student_name_td'>"+Stdname+"</td>"+"<td class='student_id_td'>"+Stdid+"</td>"+"<td class='student_cls_td'>"+Stdclass+"</td>"
                    +"\n</tr>\n");
                }
            }
        };
        //Set POST request and send it
        xmlhttp.open("POST","sql.php?Actname="+displayTitle,true);
        xmlhttp.send();

    } else {
        document.getElementById("content-box-b").style.display = "none";
        atndlistStatus = false;
    }
}