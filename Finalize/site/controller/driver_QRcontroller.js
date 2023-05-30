function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        var currentURL = window.location.href;
        var parentURL = currentURL.substring(0, currentURL.lastIndexOf('/'));
        var grandParentURL = parentURL.substring(0, parentURL.lastIndexOf('/'));
        var grandgrandParentURL = parentURL.substring(0, grandParentURL.lastIndexOf('/'));


        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };

    xmlhttp.open("GET", grandgrandParentURL + "/controller/qr-module/gethint.php?q=" + str, true);
    xmlhttp.send();

    // window.open(grandgrandParentURL + "/controller/qr-module/gethint.php?q=" + str); // --> for debugging
    }
}

function onScanSuccess(qrCodeMessage) {
    document.getElementById("result").value = qrCodeMessage;
    //window.open("https://www.w3schools.com"); 
    showHint(qrCodeMessage);
}

function onScanError(errorMessage) {
//handle scan error
}

function HTML5ScanQRCode () {
    var html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess, onScanError);
}