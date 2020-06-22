<?php
/*****************************************
 * Pull stuff from $data
 * Stuff was sanitized in the controller
 *****************************************/
$captainName = $data['CapName'];
$captainName = strtolower($captainName);
$captainName = ucwords($captainName);
$captainAge = $data['CapAge'];
$shipName = $data['ShipName'];
?>
<?php include APPROOT . '/app/views/includes/head.php'; ?>
    <body>
        <?php include APPROOT . '/app/views/includes/navbar.php'; ?>
        <div class="container">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <?php
                        // put your code here
                        print("<p class='title'> Captain $captainName, at the age of $captainAge took over the 
                            illustrious sea vessel, the $shipName. Here is some of his past:</p>");

                        // Pull data from the file and stick it into an array.
                        $earlyLifeItems = explode("\n", file_get_contents(
                                APPROOT . '/app/views/Classexercises/CE04/EarlyYears.txt'));
                        shuffle($earlyLifeItems);

                        // Print his early life
                        print('<p>His younger days began with:</p>
                               <ul>
                                    <li>' . $earlyLifeItems[0] . '</li>
                                    <li>' . $earlyLifeItems[1] . '</li>
                               </ul>');

                        // Grabbing the data for his career
                        $tours = explode("\n",file_get_contents(
                                APPROOT . '/app/views/Classexercises/CE04/Tours.txt'));
                        shuffle($tours);

                        if($captainAge > 25) {
                            $numTours = 4 + ($captainAge - 26);
                        } else {
                            $numTours = floor(($captainAge - 17) / 2);
                        }

                        print('<p> His illustrious career is as follows: </p> <ul>');
                        for($i = 0; $i < $numTours; ++$i){
                            printf("<li>%s</li>", $tours[$i]);
                        }


                        print('</ul>');



                        ?>
                    </div>
                    <div class="col-2"></div>
                </div>
        </div>
<?php include APPROOT . '/app/views/includes/footer.php'; ?>