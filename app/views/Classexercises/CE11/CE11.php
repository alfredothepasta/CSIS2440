<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo '/public/js/ShipClass.js'?>" type="text/javascript"></script>
    <script>

        ships = [
            {"name": "Crate",
                "speed": 1.8,
                "HardPoints": 2,
                "Cargo": 10,
                "Cost": 2500,
                "image": "crate.jpg"},
            {"name": "Lightening",
                "speed": 4.3,
                "HardPoints": 4,
                "Cargo": 2,
                "Cost": 60000,
                "image": "lightening.jpg"},
            {"name": "Starliner",
                "speed": 2.4,
                "HardPoints": 12,
                "Cargo": 100,
                "Cost": 100000,
                "image": "starliner.jpg"},
            {"name": "VD Tug",
                "speed": 1.4,
                "HardPoints": 10,
                "Cargo": 250,
                "Cost": 8000,
                "image": "VDTug.jpg"},
            {"name": "Biel-Corp II",
                "speed": 1.3,
                "HardPoints": 20,
                "Cargo": 5,
                "Cost": 15000,
                "image": "Biel-CorII.jpg"},
            {"name": "VD Behemoth",
                "speed": 0.5,
                "HardPoints": 20,
                "Cargo": 75,
                "Cost": 25000,
                "image": "VDBehemoth.jpg"}
        ];
    </script>
    <?php include APPROOT . '/app/views/includes/stylelinks.php'?>
</head>
<body>

<?php include APPROOT . '/app/views/includes/navbar.php'?>

<div class="container">
    <div>
        <select id="shipsoftheline" onchange="GetShip(this.value)" >
            <option value="--">--</option>
        </select>
    </div>
    <div id="display">
    </div>
</div>

<script>
    // var is the worst way to init a variable.
    let shipDrpDn = document.getElementById('shipsoftheline');

    for (i = 0; i < ships.length; i++){
        shipDrpDn.innerHTML += "<option value='" + i +"'>" + ships[i].name + "</option>";
    }

    function GetShip(theShipID) {
        console.log(theShipID);
        if (theShipID != "--") {
            // The video dudes lack of good practice in his formatting is driving me NUTS. PICK A CASE AND STICK TO IT.
            newShip = new Ship(ships[theShipID].name, ships[theShipID].speed, ships[theShipID].HardPoints,
                ships[theShipID].Cargo, ships[theShipID].Cost, ships[theShipID].image);
            newShip.displayShip(document.getElementById('display'));
        } else {
            document.getElementById('display').innerHTML = "";
        }
    }

</script>
<?php include APPROOT . '/app/views/includes/footer.php'?>
