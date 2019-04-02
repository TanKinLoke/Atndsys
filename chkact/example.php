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
                    asetArray = this.responseText;
                    asetArray = asetArray.split(",");
                    
                    //Prevent page more than existing pages
                    if (Math.ceil((asetArray.length - 1)/dataPerPage) < page) {
                        page = Math.ceil((asetArray.length - 1)/dataPerPage);
                        end = page * dataPerPage;
                        startFrom = (page-1) * dataPerPage;
                    }

                    //last_page = document.getElementById("page-input-no").value = page;

                    for (var i = startFrom; i<end ;i++) {
                        if (asetArray[i] == null || asetArray[i] == "") {

                        } else {
                            asetArray2 = asetArray[i].split("/");
                            code = code.concat(
                                "<tr id='"+asetArray2[0].split(" ").join("_")+"'>\n"+
                                "<td><input type='text' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_text' value='"+asetArray2[0].split("\'").join("&#039;")+"' readonly=\"true\"></td>\n"+
                                "<td><input type='text' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_ID_text' value='"+asetArray2[1].split("\'").join("&#039;")+"' readonly=\"true\"></td>\n"+
                                "<td><input type='date' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_jenis_text' value='"+asetArray2[2]+"' readonly=\"true\"></td>\n"+
                                "<td><input type='time' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_bilangan_text' value='"+asetArray2[3]+"' readonly=\"true\"></td>\n"+
                                "<td><input type='time' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_bilangan_text' value='"+asetArray2[4]+"' readonly=\"true\"></td>\n"+
                                "<td><button type='button' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_edit' onclick='editAset(\""+asetArray2[0].split(" ").join("_").split("\'").join("-")+"\")'>Edit</button>\n<button type='button' id='"+asetArray2[0].split(" ").join("_").split("\'").join("-")+"_delete' onclick='deleteAset(\""+asetArray2[0].split(" ").join("_").split("\'").join("-")+"\")'>Delete</button></td>\n"+
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
    </script>
    <table id="data-table">

    </table>
</body>
</html>