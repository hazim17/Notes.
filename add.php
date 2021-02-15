<?PHP 

//connect to function.php
require './function.php';

//check if the submit button has been clicked or not; if it's been clicked then the data will be send to database
if(isset($_POST["submit"])) {

    var_dump($_POST);

    //value form function.php
    //to check if the data success to added
    //if there's an error, it'll return int(-1); if no error return int(1)
    if(add($_POST) > 0) {
        echo "
            <script>
                alert('Succsess to add data to database');
                //for redirect to index.php
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Fail to add data to database');
                //for redirect to index.php
                document.location.href = 'index.php';
            </script>
        ";
        echo "<br>";
        echo mysqli_error($conn);
    }
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
    <title>Add Notes</title>
</head>
<body>
    <h1>Add Notes</h1>

    <form action="" method="post">
    <ul>
        <li>
            <label for="title">Title: </label>
            <input type="text" name="title" id="title">
        </li>
        <li>
            <label for="content">Content: </label>
            <input type="text" name="content" id="content">
        </li>
        <li>
            <button type="submit" name="submit">Add!</button>
        </li>
    </ul>
    </form>
    
</body>
</html>