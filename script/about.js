var contributors_name = [];
var contributors_username = [];
var contributors_email = [];

function getContributorsData() {
    var fileContent = new XMLHttpRequest();
    fileContent.open("GET", "../CONTRIBUTORS.md", true);
    fileContent.onreadystatechange = function ()
    {
        if(fileContent.readyState === 4)
        {
            if(fileContent.status === 200 || fileContent.status == 0)
            {
                var data = fileContent.responseText;
                data = data.split("\n");
                for (var i = 0; i <= data.length - 1; i++) {
                    contributors_name.push(data[i].split(" - ")[0]);
                    contributors_username.push(data[i].split(" - ")[1].split("(")[1].split(")")[0]);
                    contributors_email.push(data[i].split(" - ")[2].split("(")[1].split(")")[0]);
                }
                appendData();
            }
        }
    }
    fileContent.send();
}

function appendData() {
    for (var i = 0; i <= contributors_name.length - 1;i++) {
        var elem1 = document.createElement("div");
        elem1.classList.add("contributor");
        var elem2 = document.createElement("span");
        elem2.classList.add("contributor-img");
        elem2.id = contributors_username[i] + "contimg";
        var elem3 = document.createElement("span");
        elem3.classList.add("contributor-details");
        var elem4 = document.createElement("div");
        elem4.classList.add("contributor-details-box");
        var elem5 = document.createElement("h2");
        elem5.classList.add("contributor-name");
        elem5.id = contributors_username[i] + "contname";
        var elem6 = document.createElement("h3");
        elem6.classList.add("contributor-username");
        elem6.id = contributors_username[i] + "contusrname";
        elem4.appendChild(elem5);
        elem4.appendChild(elem6);
        elem3.appendChild(elem4);
        elem1.appendChild(elem2);
        elem1.appendChild(elem3);
        document.getElementById("contributors-box").appendChild(elem1);
        var temp1 = contributors_username[i] + "contimg";
        var temp2 = contributors_username[i] + "contname";
        var temp3 = contributors_username[i] + "contusrname";
        document.getElementById(temp2).innerText = contributors_name[i];
        document.getElementById(temp3).innerText = contributors_username[i];
        getAvatarURL(i);
    }
}

function getAvatarURL(i) {
    var avatarURL = new XMLHttpRequest();
    avatarURL.open("GET", "https://gitlab.com/api/v4/avatar?email=" + contributors_email[i], true);
    avatarURL.onreadystatechange = function ()
    {
        if(avatarURL.readyState === 4)
        {
            if(avatarURL.status === 200 || avatarURL.status == 0)
            {
                var temp1 = avatarURL.responseText;
                var temp2 = JSON.parse(temp1)["avatar_url"];
                console.log(contributors_username[i] + "contimg");
                console.log(temp2);
                document.getElementById(contributors_username[i] + "contimg").style.backgroundImage = "url('" + temp2 + "')";
            }
        }
    }
    avatarURL.send();
}

window.onload = getContributorsData();