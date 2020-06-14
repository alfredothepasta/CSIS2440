
    <?php
    include '../app/views/includes/head.php';
    include '../app/views/includes/navbar.php';
    // here we have some variables
    echo("<div class=\"container\">");
    $helloWorld = "Hello World";
    $name = "Alex Reed";
    $age = "old enough to know better.";
    echo("<p>$helloWorld!</p>");
    echo("<p>My name is: $name</p>");
    echo("<p>Age: $age</p>");
    print("Here's a print command.");
    echo("</div>");
    include '../app/views/includes/footer.php';
    ?>

</body>
</html>