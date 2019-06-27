function showList(str, typeSearch) {
    console.log(typeSearch);
    if (str == "") {
        txtHint.innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(typeSearch == "list"){
                    var myArr = JSON.parse(xmlhttp.responseText);
                    printArray(myArr);
                }
                if(typeSearch == "answer"){
                    txtHint.innerHTML = xmlhttp.responseText;
                }
            }
        }
        xmlhttp.open("GET","ajax.php?q="+str+"&type="+typeSearch,true);
        xmlhttp.send();
    }
}

function printArray(arr) {
    var out = "";
    var i;
    for(i = 0; i < arr.length; i++) {
        out += '<span id="'  + arr[i] + '" onClick="showList(this.id,\'answer\')">'+ arr[i] + '</span><br>';
    }
    document.getElementById("txtHint").innerHTML = out;

}
