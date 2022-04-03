function getProductInfo() {
    //run AJAX here
    let product = document.getElementById("product").value;
    if(product == '--') return false;

    let data_file = "ProductInfo?ID=" + product;
    console.log(data_file);
    let http_request = AJAXRequest();
    http_request.onreadystatechange = function () {
        if (http_request.readyState == 4) {
            // Javascript function JSON.parse to parse JSON data;
            console.log("Using my code");
            document.getElementById("productInfo").innerHTML = http_request.responseText;
        }
    }

    http_request.open("GET", data_file, true);
    http_request.send();
    return false;
}

function getCart(action) {
    //run AJAX here
    let product = document.getElementById("product").value;

    let data_file = "GetCart?ID=" + product + "&Action=" + action;
    console.log(data_file);
    let http_request = AJAXRequest();
    http_request.onreadystatechange = function () {
        if (http_request.readyState == 4) {
            // Javascript function JSON.parse to parse JSON data;
            console.log("Using my code");
            document.getElementById("cart").innerHTML = http_request.responseText;
        }
    }

    http_request.open("GET", data_file, true);
    http_request.send();
    return false;
}