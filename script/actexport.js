var atndlistStatus = false;

function seeAttendance() {
    //$("#export-table").append("<a class='back-btn' onclick='location.reload();'><img src='../img/back-arrow.svg'></a>");
    //Let user check Attendance List after selecting activity
    //if (!atndlistStatus) {
        //Get activity value
        setInterval(seeAttendance,3000);
        var displayTitle = document.getElementById("activity-selector-input").value;
        document.getElementById("content-box-b").style.display = "block";
        document.getElementById("content-title").innerText = displayTitle;
        //

        var code = "";
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
                    var Stdname = Stddata[0] || "none";
                    var Stdid = Stddata[1] || "none";
                    var Stdclass = Stddata[2] || "none";

                    //Append Student info into table
                    code = code.concat("<tr>\n"+
                    "<td class='student_name_td'>"+Stdname+"</td>"+"<td class='student_id_td'>"+Stdid+"</td>"+"<td class='student_cls_td'>"+Stdclass+"</td>"
                    +"\n</tr>\n");
                }

                $("#content-table-box").html("<table id='export-table' class='display' style='width:100%''></table>");

                var tableHTML = "<thead><tr><th>Name</th><th>Student ID</th><th>Class</th></tr></thead>"+code;
                $('#export-table').html(tableHTML);

                $('#export-table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                stripHtml: false
                            }
                        },
                    ]
                });
            }
        };
        //Set POST request and send it
        xmlhttp.open("POST","sql.php?Actname="+displayTitle,true);
        xmlhttp.send();

    //} else {
    //    document.getElementById("content-box-b").style.display = "none";
    //    atndlistStatus = false;
    //}
}
