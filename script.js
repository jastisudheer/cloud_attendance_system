function generateCode() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "attendance.php", true);
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("code").innerHTML = "Secret Code: " + this.responseText;
        }
    };
    xhr.send();
}