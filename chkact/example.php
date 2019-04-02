<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <script>
        var last_page = "";
        dataPerPage = 2;
        var filer = "";

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
                    if (Math.ceil((activityArray.length - 1)/dataPerPage) < page) {
                        page = Math.ceil((activityArray.length - 1)/dataPerPage);
                        end = page * dataPerPage;
                        startFrom = (page-1) * dataPerPage;
                    }

                    //last_page = document.getElementById("page-input-no").value = page;

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
                                "<td><button type='button' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_edit' onclick='editActivity(\""+activityArray2[0].split(" ").join("_").split("\'").join("-")+"\")'>Edit</button>\n<button type='button' id='"+activityArray2[0].split(" ").join("_").split("\'").join("-")+"_delete' onclick='deleteActivity(\""+activityArray2[0].split(" ").join("_").split("\'").join("-")+"\")'>Delete</button></td>\n"+
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

            filter = document.getElementById("activity-selector-input").value.toUpperCase;

            queryNo = 0;

            queryType = getQueryType();
            if (queryType == "Activity Name") {
                queryNo = 0;
            } else if (queryType == "Activity Date") {
                queryNo = 2;
            } else if (queryType == "Activity Venue") {
                queryNo = 1;
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
                    if (Math.ceil((activityArray.length - 1)/dataPerPage) < page) {
                        page = Math.ceil((activityArray.length - 1)/dataPerPage);
                        end = page * dataPerPage;
                        startFrom = (page-1) * dataPerPage;
                    }

                    //last_page = document.getElementById("page-input-no").value = page;

                    for (var i = startFrom; i<end ;i++) {
                        if (activityArray[i] == null || activityArray[i] == "") {

                        } else {
                            activityArray2 = activityArray[i].split("/");   

                            if (activityArray2[queryNo].toUpperCase.indexOf(filter) > -1) {
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
    </script>
    <table id="data-table">

    </table>
</body>
</html>