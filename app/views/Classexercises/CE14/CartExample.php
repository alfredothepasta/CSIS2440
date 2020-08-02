<?php

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Space Station Market</title>

        <script>
            function productInfo(key) {
                //creates the datafile with query string
                var data_file = "CartInfo.php?info=" + key;
                //this is making the http request
                var http_request = new XMLHttpRequest();
                try {
                    // Opera 8.0+, Firefox, Chrome, Safari
                    http_request = new XMLHttpRequest();
                } catch (e) {
                    // Internet Explorer Browsers
                    try {
                        http_request = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            http_request = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }
                http_request.onreadystatechange = function () {
                    if (http_request.readyState == 4)
                    {
                        var text = http_request.responseText;

                        //this is adding the elements to the HTML in the page
                        document.getElementById("productInformation").innerHTML = text;
                    }
                }
                http_request.open("GET", data_file, true);
                http_request.send();
            }
        </script>

        <?php
        include 'Header.php';
        ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div>

                </div></div>
            <div class="col-sm-8">
                <form action="CartExample.php" method="Post">
                    <div >
                        <p><span class="text">Please Select a product:</span>
                            <select id="Select_Product" name="Select_Product" class="select">
                                <?php
                                
                                ?>
                            </select></p>
                        <table>
                            <tr>
                                <td>
                                    <input id="button_Add" type="submit" value="Add" name="action" class="button"/>
                                </td>
                                <td>
                                    <input name="action" type="submit" class="button" id="button_Remove" value="Remove"/>
                                </td>
                                <td>
                                    <input name="action" type="submit" class="button" id="button_empty" value="Empty"/>
                                </td>
                                <td>
                                    <input name="action" type="button" class="button" id="button_Info" value="Info" onclick="productInfo(document.getElementById('Select_Product').value)"/>
                                </td>
                            </tr>                    
                        </table>

                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" id="productInformation">

            </div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
        <div id="Display_cart" class="col-sm-8">
                    <?php
                    
                    ?>

                </div>
        </div>
    </div>
    <?php
    include "Footer.php";
    ?>
