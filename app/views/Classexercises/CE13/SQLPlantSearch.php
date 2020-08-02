<?php

require_once 'DataBaseConnection.php';

// function to print distance 
function PlanetDistance($x1, $y1, $z1, $x2, $y2, $z2) {
    $dist = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2) + pow($z2 - $z1, 2) * 1.0);
    return $dist;
}
//use Get to get variables

//Query first planet

//query second planet

//lets print everything out
