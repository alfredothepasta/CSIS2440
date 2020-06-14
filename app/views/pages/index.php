<?php echo $_GET['url'];?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css\bootstrap\bootstrap.css">
</head>

<?php include '../app/views/includes/navbar.php'; ?>
<br>
<header>
    <div class="container text-center">
        <h1 class="h1">Alex's Website</h1>
    </div>
</header>

<section>
    <div class="container">
        <br>
<!--            A nice picture of me looking like a jackass     -->
        <div class="card w-50 text-center mx-auto">
            <img src="img/photos/Headshot.jpg" alt="" class="card-img">
        </div>
    </div>
</section>
<br>
<article class="container">
    <div class="row justify-content-md-center">
        <div class="col-md"></div>
        <div class="col-md-8">
            <p>My name is Alex Reed, welcome to my working website&trade; for CSIS2440! This pages will serve to
            navigate you to all of the assignments and stuff for the course! Of course this whole thing is going to be
                completely torn down in a bit, I plan on replacing it with an MVC framework (completed) and creating my own theme
                in bootstrap (WIP). You've probably already noticed I entirely scrapped the index file from the default server.
                My interests include:</p>
            <ul>
                <li>Skiing</li>
                <li>Gaming</li>
                <li>Rock Climbing</li>
                <li>Suffering (hence why I'm in school)</li>
            </ul>
            <p>You want to know my favorite book? Good luck, I don't know which book I would call my "favorite", but
            here's a list of a bunch of books I consider among my favories:</p>
            <ul>
                <li>Ender's Game</li>
                <li>The Hobbit</li>
                <li>Dragonflight</li>
            </ul>
            <p>And a favorite movie? I'll just cheap out here and say The Princess Bride.</p>
        </div>
        <div class="col-md"></div>
    </div>
</article>
<?php include '../app/views/includes/footer.php' ?>
