<?php

$update = "UPDATE `Planets` SET `Active`= 1 ";//write the update statment
if ($desc != "A short description of the planet") {
    $update .= ", `Description` = '$desc' ";//add the description
}
$update .= "WHERE (`PlanetName` = '$name')";//add the where clause
$success = $con->query($update);
if($success == FALSE){
    $failmess = "Whole Query " . $update . "<br>";
    echo $failmess;
    die('Invalid query: ' . mysqli_error($con));
} else {
    echo "$name's description was update. <br>";
}
