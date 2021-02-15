<?PHP 

//connect to function.php
require './function.php';


//we're using GET, so get the id from the url
$fromid = $_GET["id"];


//Query data from database, posts table; use query function from function.php
//this query is just to show the data in the form, not query for edit the data
$data = query("SELECT * FROM posts WHERE id=$fromid")[0];
//why we add [0], because $data return a numeric array then assoc array inside that numeric array. So because it's only return one array, you can just add [0], so you can easily use assoc array right away.


//check if the submit button has been clicked or not; if it's clicked then the edited data will be send to the database
if( isset($_POST["submit"]) ) {
    //value from function.php
    //To check if the data if success to edited
    //if there's an error, it'll return int(-1); if no error rturn int(1)
    if ( edit($_POST) > 0 ) {
        echo "
            <script>
                alert('Succsess to edit data to database');
                //for redirect to index.php
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Fail to edit data to database');
                //for redirect to index.php
                document.location.href = 'index.php';
            </script>
        ";
        echo "<br>";
        echo mysqli_error($conn);
    };
};

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
    <title>Notes. | Edit</title>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="container flex">
            <h1 class="logo">Edit Notes.</h1>
        </div>
    </div>

   <form action="" method="post">
        <input type="hidden" name="id" value="<?= $data["id"]?>">
        <ul>
            <li>
                <!-- Just for reminder, 'for' should same with 'id'; and 'name' should be the same with the one inside table of a database -->
                <label for="title">Title: </label>
                <input type="text" name="title" id="title" required value="<?= $data["title"]?>">
            </li>
            <li>
                <label for="content">Content:</label>
                <input type="text" name="content" id="content" required value="<?= $data["content"]?>">
            </li>
            <li>
                <button type="submit" name="submit">Edit!</button>
            </li>
        </ul>
   </form>

    
</body>
</html>