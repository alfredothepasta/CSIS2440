<?php
include APPROOT . "/app/views/Classexercises/CE13/DataBaseConnection.php";
$action = $data['action'];
$productId = $data['productId'];

switch ($action) {
    case "Add":
        $_SESSION['cart'][$productId] ++; // Adds one of the selected items to the cart
        break;
    case "Remove":
        $_SESSION['cart'][$productId] --; // Removes one of the selected items from the cart
        if ($_SESSION['cart'][$productId] <= 0) unset($_SESSION['cart'][$productId]);
        break;
    case "Empty":
        unset($_SESSION['cart']);
        break;
}
//print_r($_SESSION);
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Space Station Market</title>

        <script>
            function productInfo(key) {
                //creates the datafile with query string
                var data_file = "CE14CartInfo?info=" + key;
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
        include APPROOT . '/app/views/includes/stylelinks.php';
        include APPROOT . '/app/views/Classexercises/CE14/Header.php';
        include APPROOT . '/app/views/includes/navbar.php';
        ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div>

                </div></div>
            <div class="col-sm-8">
                <form action="#" method="Post">
                    <div >
                        <span class="text">Please Select a product:</span>
                            <select id="Select_Product" name="Select_Product" class="select">
                                <?php
                                $search = "SELECT ResName, idResources FROM CSIS2440.Resources order by ResName";
                                $return = $con->query($search);

                                if(!$return) {
                                    $message = "Whole query: " . $search;
                                    echo $message;
                                    die('Invalid query: ' . mysqli_error());
                                }

                                while ($row = mysqli_fetch_array($return)) {
                                    if ($row['idResources'] == $productId) {
                                        echo "<option value='" . $row['idResources'] . "' selected='selected'>" . $row['ResName'] . "</option>\n";
                                    } else {
                                        echo  "<option value='" . $row['idResources'] . "'>" . $row['ResName'] . "</option>\n";
                                    }
                                }
                                ?>
                            </select>
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
        <br>
        <div class="row">
            <div class="col-sm-2"></div>
        <div id="Display_cart" class="col-sm-8">
                    <?php
                    if(!empty($_SESSION['cart'])) {
                        echo "<table border='1' cellpadding='3' width='640px'><tr><th>Name</th><th>Quantity</th><th>Price</th>"
                            . "<th width='80px'>Line Cost</th></tr>";

                        foreach ($_SESSION['cart'] as $productId => $quantity) {
                            // var_dump($productId);
                            $sql = "SELECT ResName, ResPPU FROM CSIS2440.Resources WHERE idResources = " . $productId;
                            $result = $con->query($sql);

                            if(mysqli_num_rows($result) > 0){
                                list($name, $price) = mysqli_fetch_row($result);

                                $lineCost = $price * $quantity; // line cost
                                $total = $total + $lineCost; //add to the total cost
                                echo "<tr>";
                                //show this info in the table cells
                                echo "<td align='Left' width='450px'>$name</td>";
                                echo "<td align='center' width='75px'>$quantity</td>";

                                echo "<td align='center' width='75px'>"  . money_format('%(#8n', $price) . "</td>";

                                echo "<td align='center'>" . money_format('%(#8n', $lineCost) . "</td>";

                                echo "</tr>";
                            }
                        }

                        echo "<tr>";
                        echo "<td colspan='3' align='right'>Total:</td>";
                        echo "<td align='right'>" . money_format('%(#8n', $total) . "</td>";
                        echo "</tr>";
                        echo "</table>";
                    } else {
                        echo "You suck";
                    }

                    echo "</table>";
                    ?>

                </div>
        </div>
    </div>
    <?php
    include APPROOT . '/app/views/Classexercises/CE14/Footer.php';
    include APPROOT . '/app/views/includes/footer.php';
    ?>
