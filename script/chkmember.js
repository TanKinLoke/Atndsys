var zixuArray = "";

function displayData() {
    // document.getElementById("content-box-a").style.display = "none";
    // document.getElementById("content-box-b").style.display = "block";
    getMember();
}

function getQueryType() {
    return document.getElementById("query-type-selector-input").value;
}

function getMember() {
    zixuArray = "";
    input = document.getElementById("member-selector-input").value.toUpperCase();

    var queryType = getQueryType();
    queryNo = 0;

    if (queryType == "Member School Number") {
        queryNo = 1;
    } else if (queryType == "Member Name") {
        queryNo = 0;
    } else if (queryType == "Member Class") {
        queryNo = 3;
    }
    
    var code = "";

    var xmlhttp = new XMLHttpRequest;
    xmlhttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == 4) {
            asetArray = this.responseText;
            asetArray = asetArray.split(",");

            for (var i = 0; i<asetArray.length ;i++) {
                if (asetArray[i] == null || asetArray[i] == "") {

                } else {
                    asetArray2 = asetArray[i].split(":");

                    if (asetArray2[queryNo].toUpperCase().indexOf(input) > -1) {
                        code = code.concat("<option id='"+asetArray2[queryNo]+"'>"+
                        asetArray2[queryNo]+
                        "</option>");
                        zixuArray = zixuArray.concat(asetArray2[0]+","+asetArray2[1]+","+asetArray2[2]+","+asetArray2[3]+":");
                                           

                    } else {

                    }

                    // code = code.concat(
                    //     "<tr id='"+asetArray2[0].split(" ").join("_")+"'>\n"+
                    //     "<td><input type='text' class='data-bold' id='"+asetArray2[0].split(" ").join("_")+"_text' value='"+asetArray2[0]+"' readonly=\"true\"></td>\n"+
                    //     "<td><input type='text' class='data-bold' id='"+asetArray2[0].split(" ").join("_")+"_ID_text' value='"+asetArray2[1]+"' readonly=\"true\"></td>\n"+
                    //     "<td><input type='text' class='data-bold' id='"+asetArray2[0].split(" ").join("_")+"_jenis_text' value='"+asetArray2[2]+"' readonly=\"true\"></td>\n"+
                    //     "<td><input type='number' class='aset-input-no data-bold' id='"+asetArray2[0].split(" ").join("_")+"_bilangan_text' value='"+asetArray2[3]+"' readonly=\"true\"></td>\n"+
                    //     "<td><button type='button' id='"+asetArray2[0].split(" ").join("_")+"_edit' onclick='editAset(\""+asetArray2[0].split(" ").join("_")+"\")'>Edit</button>\n<button type='button' id='"+asetArray2[0].split(" ").join("_")+"_delete' onclick='deleteAset(\""+asetArray2[0].split(" ").join("_")+"\")'>Delete</button></td>\n"+
                    //     "</tr>\n"
                    // )
            };
            $("#member-id").html("");
            $("#member-id").append(code);
        }
    }
    };

    xmlhttp.open("POST","getMember.php",true);
    xmlhttp.send();

}