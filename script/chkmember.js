function displayData() {
    document.getElementById("content-box-a").style.display = "none";
    document.getElementById("content-box-b").style.display = "block";
}

function getQueryType() {
    return document.getElementById("query-type-selector-input").value;
}