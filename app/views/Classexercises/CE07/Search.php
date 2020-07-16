<?php
//write the search statment
$search = "SELECT * FROM `Planets` WHERE PlanetName like '%" . $name . "%' "
. "ORDER BY PlanetName";
$return = $con->query($search);

if (!$return) {
    $message = "Whole query " . $search;
    echo $message;
    die('Invalid query: ' . mysqli_error($con));
}
echo "<table><th>Name</th><th width='10%'>X,Y,Z</th><th>Description</th><th>Faction</th>"
 . "<th>Station</th>";
while ($row = $return->fetch_assoc()) {
    // can't stand reading assoc arrays in my echo strings
    $name = $row['PlanetName'];
    $x = $row['PosX'];
    $y = $row['PosY'];
    $z = $row['PosZ'];
    $desc = $row['Description'];
    $faction = $row['Faction'];
    // set it to yes or no, I didn't use a varchar in my db
    $active = ($row['Active'] == 1)? 'Y': 'N';

    //
    echo "<tr><td>$name</td>"
        . "<td style = 'text-align: center;'>$x ,$y ,$z</td>"
        . "<td>$desc</td>"
        . "<td>$faction</td>"
        . "<td>$active</td></tr>";
}
echo "</table>";
