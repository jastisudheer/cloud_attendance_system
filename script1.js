window.onload = function() {
    var message = document.getElementById("message");
    if (message.innerHTML !== "") {
        setTimeout(function() {
            message.innerHTML = "";
        }, 5000);
    }
};