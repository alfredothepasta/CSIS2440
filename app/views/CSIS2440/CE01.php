
    <?php
    include '../includes/head.php';
    include '../includes/navbar.php';
    // here we have some variables
    echo("<div class=\"container\">");
    $helloWorld = "Hello World";
    $name = "Alex Reed";
    $age = "old enough to know better.";
    echo("<p>$helloWorld!</p>");
    echo("<p>My name is: $name</p>");
    echo("<p>Age: $age</p>");
    echo(__DIR__);
    print("Here's a print command.");
    echo("</div>");
    include '../includes/footer.php';
    ?>

</body>
</html>