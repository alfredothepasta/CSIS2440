function TakeOff() {
    try {
        statusInd = document.getElementById('status');
        statusInd.innerHTML = "";

        if (document.getElementById('ECOn').checked){
            statusInd.innerHTML += "<li>Too much engine Coolant, cannot keep engines hot</li>";
            return false;
        }

        if (document.getElementById('Burn').value < 20){
            statusInd.innerHTML += "<li>Burn is too low</li>";
            return false;
        } else if(document.getElementById('Burn').value > 30) {
            statusInd.innerHTML +="<li>Burn is too high</li>";
            return false;
        } else {
            statusInd.innerHTML += "<li>Goldilocks is on fire, someone save her. Fuel is just right.</li>";
        }

        codeString = document.getElementById('Code').value;

        if (codeString != ""){
            statusInd.innerHTML += "<li>" + codeString.toUpperCase() + "</li>";
        } else {
            statusInd.innerHTML += "<li>You are missing a Launch Code</li>"
            return false;
        }

        // countdown
        for (i = 10; i > 0; i--){
            statusInd.innerHTML += "<li>" + i + "</li>";
        }

        statusInd.innerHTML += "<li>Launch</li>";

    } catch (err) {
        console.log(err);
    }
}

function errorHandler(message, url, line) {
    out = "Sorry, an error was encountered.\n\n";
    out += "Error: " + message + "\n";
    out += "URL: " + url + "\n";

}