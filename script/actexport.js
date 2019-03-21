var atndlistStatus = false;

function seeAttendance() {
    if (!atndlistStatus) {
        var displayTitle = document.getElementById("activity-selector-input").value;
        document.getElementById("content-box-b").style.display = "block";
        document.getElementById("content-title").innerText = displayTitle;
        atndlistStatus = true;

        var xmlhttp = new XMLHttpRequest;
        xmlhttp.onreadystatechange = function() {
            if (this.status == 200 && this.readyState == 4) {
                var response = this.responseText;
                var ActandStdinfo = response.split(":");
                var Actname = ActandStdinfo[0];
                var Stdinfo = ActandStdinfo[1].split(",");

                for (x in Stdinfo) {
                    var Stddata = Stdinfo[x].split("|");
                    var Stdname = Stddata[0];
                    var Stdid = Stddata[1];

                    $("#export-table").append("<tr>\n"+
                    "<td>"+Stdname+"</td>"+"<td>"+Stdid+"</td>"
                    +"\n</tr>\n");
                }
            }
        };
        xmlhttp.open("POST","sql.php?Actname="+displayTitle,true);
        xmlhttp.send();

    } else {
        document.getElementById("content-box-b").style.display = "none";
        atndlistStatus = false;
    }
}