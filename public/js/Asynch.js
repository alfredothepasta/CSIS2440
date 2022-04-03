
function AJAXRequest(){
    try {
        // Works in the newer browsers
        http_request = new XMLHttpRequest()
    } catch (e) {
        try {
            http_request = new ActiveXObject("Maxm12.XMLHTTP");
        } catch (e) {
            // Something went wrong
            alert("Your browser broke!");
            return false;
        }
    }
    return http_request;
}

