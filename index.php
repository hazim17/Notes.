<?PHP 

//connect to function.php
require './function.php';

//query function from function.php
$data = query("SELECT * FROM posts");


//for search logic
//if search button clicked
if(isset($_POST["search"])) {
    //the name 'serach' is the same from "name" in button tag
    $data = searching($_POST["keyword"]); //$searching is a function from dbh2.inc.php
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/utilities.css">
    <title>Notes. | Personal Notes</title>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="container flex">
            <h1 class="logo">Notes.</h1>
            <ul>
                <!-- Add text -->
                <li><a href="add.php">Add Notes</a></li>
            </ul>
        </div>
    </div>

    <!-- Search Data -->
    <form action="" method="post">
        <input type="text" name="keyword" size="30" autofocus placeholder="type something" autocomplete="off">
        <button type="submit" name="search">Search!</button>
    </form>
    <br><br>

    <!-- Showcase -->
    <?PHP $i = 1; ?>
    <?PHP foreach($data as $datum): ?>
        <div class="container flex-wrap">
            <div class="card">
                <ul>
                    <li>
                        <h3><?= $datum["title"]?></h3>
                    </li>
                    <li>
                        <p><?= $datum["content"]?></p>
                    </li>
                    <li>
                        <a href="edit.php?id=<?= $datum["id"]; ?>">Edit</a>
                    </li>
                    <li>
                        <a href="delete.php?id=<?= $datum["id"]; ?>" onclick="return confirm('are you sure?')">Delete</a>
                        <!-- return confirm('..'); it'll return boolean(true or false) -->
                    </li>
                </ul>
                <hr>
            </div>
        </div>
    <?PHP $i++; ?>
    <?PHP endforeach; ?>
    
</body>
</html>