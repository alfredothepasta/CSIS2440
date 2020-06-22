<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
/*********************************************************
 * The way I set this up works completely differently.
 * Rather than pass data directly from page to page,
 * $_POST is passed into a controller, which sanitizes
 * input data and passes that data into an associative
 * array called $data, which is passed into this page.
 *********************************************************/
require_once APPROOT . '/app/views/Classexercises/CE03/IncludeMe.php';
// print_r($data);
$theShip = $data['ship'];
//print $theShip;
$departure = $data['departure'];
//print $departure;
$arrival = $data['arrival'];
//print $arrival;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Results</title>
        <!-- Custom fonts for this theme -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <?php include_once APPROOT . '/app/views/includes/stylelinks.php'?>

        <!-- Theme CSS -->
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
    <?php include APPROOT . '/app/views/includes/navbar.php';?>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <h3>Leaving From:
                    <?php
                    print("<br>" . $planets[$departure]["name"] . "</h3>");
                    print("<img src=\"/img/CE03/$departure.jpg\" class=\"img-fluid\" alt=\"planet name\">");
                    ?>
                </div>
                <div class="col-3">
                    <h3>Arriving At:
                        <?php
                        print("<br>" . $planets[$arrival]["name"] . "</h3>");
                        print("<img src=\"/img/CE03/$arrival.jpg\" class=\"img-fluid\" alt=\"planet name\">");
                        ?>
                </div>
                <div class="col-6">
                    <h3>Information</h3>
                    <?php
                    print("<p>You picked the:" . $ships[$theShip]['name'] . ". </p>");
                    // Calculate the distance:
                    $distance = PlanetDistance($planets[$departure]['x'],
                        $planets[$departure]['y'],
                        $planets[$departure]['z'],
                        $planets[$arrival]['x'],
                        $planets[$departure]['y'],
                        $planets[$departure]['z']
                    );
                    //print the name of the ship, the distance using the function and the time it will take using the speed of the ship they picked
                    printf("<p>The distance is: %2f</p>", $distance);
                    printf("<p>The time it will take is: %.2f cycles</p>",
                        ($distance/($ships[$theShip]['speed']))
                    );
                    ?>
                </div>
            </div>
        </div>
    <?php include '../app/views/includes/footer.php'; ?>
