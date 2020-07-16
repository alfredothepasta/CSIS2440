<!DOCTYPE html>
<?php
/*****************************************************************************************
 * Keepign my methods in a separate file so this doesn't become a horrible wall of text.
 *****************************************************************************************/
require_once APPROOT .  '/app/views/Assignments/AssignmentOne/helperFunctions.php';

/******************************
 * Pull data from $data
 *****************************/
//print_r($data);
$heroName = $data['HeroName'];
$class = $data['Class'];
$race = $data['Race'];
$age = $data['Age'];
$gender = $data['Gender'];
$kingdom = $data['KingdomName'];

$image =  getImgFile($race, $class, $gender);
//echo($image."\n");

$stats = getStats($class);
//print_r($stats);

// get race data and class data
$textBlob = getRaceData($race) . '<hr>' . getClassData($class);

?>
<html>

    <head>

        <meta charset="utf-8">
        <title>A made Adventurer</title>
        <!-- Custom fonts for this theme -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Theme CSS -->

        <link href="../../../css/freelancer.min.css" rel="stylesheet" type="text/css"/>
        <style>
            img {
                height: 250px;
                padding: 3pt;
            }
            p{
                margin-left: 8px;
            }
        </style>
    </head>

    <body>
    <?php include APPROOT . '/app/views/includes/navbar.php'; ?>
        <div id="CharacterSheet" class="container">
            <div class="row">
                <h3 class="Content">The Brave Adventurer</h3>
            </div>
            <div class="row">
                 <div class="col-md-3">
                    <?php
                    foreach($stats as $stat => $value){
                        print("<strong>" . ucwords($stat) . ":&nbsp;</strong>" . $value . "<br>");
                    }
                    ?>
                </div>
                <div class="col-md-5">
                    <?php
                    print("<h3 class='d-flex justify-content-center'>$heroName from $kingdom</h3>");
                    print("<p class='d-flex justify-content-center'><strong>$race $class</strong>&nbsp; At the age of $age </p>");
                    print($textBlob);
                    ?>
                </div>
                <div class="col-md-4">
                    <?php
                    //print image here
                    print('<img src="'.  '/public/img/AssignmentOne/' . $image . '" alt="" class="img">');
                    ?>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript -->
        <script src="../../../../vendor/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="../../../../vendor/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

        <!-- Plugin JavaScript -->
        <script src="../../../../vendor/jquery-easing/jquery.easing.min.js" type="text/javascript"></script>

        <!-- Contact Form JavaScript -->
        <script src="../../../js/jqBootstrapValidation.min.js" type="text/javascript"></script>
        <script src="../../../js/contact_me.min.js" type="text/javascript"></script>

        <!-- Custom scripts for this template -->
        <script src="../../../js/freelancer.min.js" type="text/javascript"></script>
    <?php include '../app/views/includes/footer.php'; ?>
