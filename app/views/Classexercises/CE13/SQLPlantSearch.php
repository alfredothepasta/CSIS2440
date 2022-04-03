<?php

require_once APPROOT . '/app/views/Classexercises/CE13/DataBaseConnection.php';


// function to print distance 
function PlanetDistance($x1, $y1, $z1, $x2, $y2, $z2)
{
    $dist = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2) + pow($z2 - $z1, 2) * 1.0);
    return $dist;
}

//use Get to get variables
$shipSpeed = $_GET['speed'];
$planetID1 = $_GET['ID1'];
$planetID2 = $_GET['ID2'];

//Query first planet
$sql1 = "SELECT * FROM CSIS2440.Planets where idPlanets = " . $planetID1;
$return = $con->query($sql1);

if (!$return) {
    $message = "Whole query " . $sql1;
    echo $message;
    die ('Invalid query: ' . mysqli_error($con));
}

while ($row = $return->fetch_assoc()) {
    $planetName1 = $row['PlanetName'];
    $x1 = $row['PosX'];
    $y1 = $row['PosY'];
    $z1 = $row['PosZ'];
    $desc1 = $row['Description'];
    $faction1 = $row['Faction'];
    $active1 = ($row['Active'] == 1)? "Y": "N";
}

//query second planet
$sql2 = "SELECT * FROM CSIS2440.Planets where idPlanets = " . $planetID2;
$return = $con->query($sql2);

if (!$return) {
    $message = "Whole query " . $sql2;
    echo $message;
    die ('Invalid query: ' . mysqli_error($con));
}

while ($row = $return->fetch_assoc()) {
    $planetName2 = $row['PlanetName'];
    $x2 = $row['PosX'];
    $y2 = $row['PosY'];
    $z2 = $row['PosZ'];
    $desc2 = $row['Description'];
    $faction2 = $row['Faction'];
    $active2 = ($row['Active'] == 1)? "Y": "N";
}

//lets print everything out
echo <<<HTML
<div class='row'>
    <div class='col-md-offset-1 col-md'>
        <table class="table">
            <th width="10%">Name</th>
            <th width='15%'>X,Y,Z</th>
            <th width="70%">Description</th>
            <th>Station</th>
            <tr>
                <td>$planetName1</td>
                <td>$x1, $y1, $z1</td>
                <td>$desc1</td>
                <td>$active1</td>
            </tr>
            <tr>
                <td>$planetName2</td>
                <td>$x2, $y2, $z2</td>
                <td>$desc2</td>
                <td>$active2</td>
            </tr>
        </table>
    </div>
</div>     
<hr>       
HTML;

if($active1 != "N" && $active2 != "N") {
    $dist = PlanetDistance($x1, $y1, $z1, $x2, $y2, $z2);
    print("<div class='row'><div class='col-xs-12'><p>Going from $planetName1 to $planetName2 will be a long trip.</p>");
    printf("<p>The distance is: %.2f</p>", $dist);
    printf("<p>The time it should take is: %.2f cycles.</p></div></div>", $dist / $shipSpeed);
} else {
    print("\n<div class='row'><div class='col-xs-12'>"
        . "<p>One of the planets does not have a station, you cannot travel there.</p></div></div>");
}


//</table></div></div>"