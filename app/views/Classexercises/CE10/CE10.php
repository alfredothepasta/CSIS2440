<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="<?php echo '/public/js/ErrorHandler.js'?>" type="text/javascript"></script>
    <script>
        onerror = errorHandler;
        console.log("stuff");
    </script>
    <?php include APPROOT . "/app/views/includes/stylelinks.php"; ?>
    <title>Document</title>
</head>
<body>
<?php include APPROOT . "/app/views/includes/navbar.php"; ?>
<div class="container">

        <label>On</label> <input type="radio" value="On" checked id="ECOn" name="EC">
        <label>Off</label> <input type="radio" value="Off" id="ECOff" name="EC">Engine Coolant<br>
        <input type="number" name="Burn" id="Burn" min="1" max="100">Fuel Burn Time In launch (1-100%)<br>
        <input type="text" name="Code" id="Code">Code
        <button id="Launch" name="Launch" onclick="return TakeOff();">Launch</button>

    <div>
        <ul id="status">

        </ul>
    </div>
</div>

</body>
</html>
