<?php
include_once APPROOT . "/app/views/includes/head.php";
include_once APPROOT . "/app/views/includes/navbar.php";
?>
<div class="container">
    <h2>Please select one of our items: </h2>
    <form class="" action="#">
        <div class="row">
            <div class="form-group col-10">
                <select id="product" class="form-control form-control-lg">
                    <option value="--">--</option>
                    <?php
                    foreach ($data['Products'] as $product){
                        echo "<option value='". $product->ProductID ."'> " . $product->Name . " | $" .$product->Price . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-2">
                <button value="View" align="right" class="btn btn-lg btn-secondary" onclick="return getProductInfo()">View</button>
            </div>
        </div>
        <div id="productInfo">

        </div>
        <div class="row form-group">
            <button class="btn btn-lg btn-primary" value="Add" onclick="return getCart('Add')">Add To Cart</button>
            &nbsp;
            <button class="btn btn-lg btn-primary" value="Remove" onclick="return getCart('Remove')">Remove From Cart</button>
            &nbsp;
            <button class="btn btn-lg btn-primary" value="Empty" onclick="return getCart('Empty')">Clear Shopping Cart</button>
        </div>
    </form>
    <div id="cart">
    </div>

</div>
<script src="/public/js/ECommerceCatalogue.js"></script>
<script>getCart()</script>
<?php

include_once APPROOT . "/app/views/includes/footer.php";
