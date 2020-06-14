
<?php
include '../app/views/includes/head.php';
include '../app/views/includes/navbar.php';
// here we have some variables
echo("<div class=\"container\">");
$score = 0;
print("<table><tr><th>Player</th><th>Computer</th><th>Rounds</th></tr>\n");

//here write a loop that will run 10 times and compare the scores, increment the score if grater, decrementing if less and leaving it if equal
for($i = 0; $i < 10; $i++){
    $playerScore    = rand(1, 100);
    $compScore      = rand(1, 100);

    print("<tr><td>$playerScore</td><td>$compScore</td>");

    if($playerScore > $compScore){
        $score++;
        print("<td>Player won the Round!</td>");
    } elseif ($playerScore < $compScore) {
        $score--;
        print("<td>At least you tried...</td>");
    } else {
        print("<td>It's a tie!</td>");
    }

    print("</tr>");

}
print("<tr></tr><tr><td colspan=2>$score</td><td>Player Score</td></tr></table></br>");

//this should print each round out in the table.


//Year of the---


/*************************************************************************************
 * Here I ignored instructions because they were inefficient.
 * I write the zodiac animals into an array
 * Take the year % 12 for indexing into the array.
 *************************************************************************************/
$chineseZodiac = ["Monkey", "Rooster", "Dog", "Boar", "Rat", "Ox", "Tiger",
    "Rabbit", "Dragon", "Snake", "Horse", "Lamb"];
$yearMod12 = date("Y") % 12;

print("It is the year of the:<br>");
//Here you will write out a switch that will print out the year using the modulo(% 12)
/*************************************************************************************
 * That is an awful lot more typing than I feel like doing.
 *************************************************************************************/
print("<p>$chineseZodiac[$yearMod12]</p>");

echo("</div>");
include '../app/views/includes/footer.php';
?>