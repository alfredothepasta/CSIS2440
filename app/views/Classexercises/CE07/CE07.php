<!DOCTYPE html>
<?php
//get post and connect to DB
require_once APPROOT . '/app/views/Classexercises/CE07/DataBaseConnection.php';
//print_r($_POST);
$sneaky = $data['sneaky'];
$name = $data['name'];
$x = $data['posx'];
$y = $data['posy'];
$z = $data['posz'];
$desc = $data['desc'];
$faction = $data['faction'];
$action = $data['action'];

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Planet Form</title>
        <!-- Custom fonts for this theme -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <?php   include APPROOT . '/app/views/includes/stylelinks.php' ?>

        <!-- Theme CSS -->

        <link href="../../../css/freelancer.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <?php   include APPROOT . '/app/views/includes/navbar.php' ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8"><header class="h2">Make a New Planet</header></div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    Planets currently in DB
                    <?php
                    //this should work if the database is connedted properly
                    $search = "SELECT PlanetName FROM CSIS2440.Planets Order By PlanetName";

                    $return = $con->query($search);

                    if (!$return) {
                        $message = "Whole query " . $search;
                        echo $message;
                        die('Invalid query: ' . mysqli_error($con));
                    }
                    echo "<table><th>Name</th>";
                    while ($row = $return->fetch_assoc()) {
                        echo "<tr><td>" . $row['PlanetName'] . "</td></tr>";
                    }
                    echo "</table>";
                    ?>
                </div>
                <div class="col-sm-8">
                    <form method = "post" action = "CE07" class="form-horizontal">
                        <div class="form-group">
                            <?php
                            if (isset($_POST['Submit']) || $sneaky == 1) {
                                //do the task we need to do using a switch
                                print("<fieldset>");
                                switch ($action) {
                                    case "Insert":
                                        include APPROOT .  '/app/views/Classexercises/CE07/Add.php';
                                        break;
                                    case"Update":
                                        include APPROOT .  '/app/views/Classexercises/CE07/Update.php';
                                        break;
                                    case"Search":
                                        include APPROOT .  '/app/views/Classexercises/CE07/Search.php';
                                        break;
                                    default: print("Something is wrong");
                                }
                                print<<<HTML
                                <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="UnSubmit">Submit</label>
  <div class="col-md-4">
    <input id="submit" name="UnSubmit" class="btn btn-primary" type="submit"></input>
  </div>
</div>
    <input type='hidden' value=0 name='sneaky'></input></fieldset>
HTML;
                            } else {
                                //Yeah no his way was FUGLY
                                include APPROOT . '/app/views/Classexercises/CE07/form.php';

                            }
                            ?>
                        </div>
                    </form>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
        
            <!-- Bootstrap core JavaScript -->
            <script src="../../../vendor/jquery/jquery.min.js" type="text/javascript"></script>
            <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

            <!-- Plugin JavaScript -->
            <script src="../../../vendor/jquery-easing/jquery.easing.min.js" type="text/javascript"></script>

            <!-- Contact Form JavaScript -->
            <script src="../../../js/jqBootstrapValidation.min.js" type="text/javascript"></script>
            <script src="../../../js/contact_me.min.js" type="text/javascript"></script>

            <!-- Custom scripts for this template -->
            <script src="../../../js/freelancer.min.js" type="text/javascript"></script>
<?php   include APPROOT . '/app/views/includes/footer.php' ?>
