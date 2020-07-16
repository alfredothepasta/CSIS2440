<?php
//write your insert statment
$insert = "INSERT INTO Planets (PlanetName, PosX, PosY, PosZ, Description, Faction) "
        . "VALUES ('$name', '$x', '$y', '$z', '$desc', '$faction')";
//echo $insert;
$success = $con->query($insert);

if($success == FALSE){
    $failmess = "Whole Query " . $insert . "<br>";
    echo $failmess;
    die('Invalid query: ' . mysqli_error($con));

} else {
    echo "$name was added.<br>";
}
