function displayData() {
    document.getElementById("content-box-a").style.display = "none";
    document.getElementById("content-box-b").style.display = "block";
}

function getQueryType() {
    //Get user selected value on search query type
    return document.getElementById("query-type-selector-input").value;
}