<?PHP 

//connect to database
$conn = mysqli_connect("localhost", "root", "", "keepclone");

//Take data from database / query from database
function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $saveData = [];
    while($row = mysqli_fetch_assoc($result)) {
        $saveData[] = $row;
    }
    
    return $saveData;
}

//Add - remove data (insert and delete)
function add($data) {
    global $conn;

    //take data from add.php
    //make it secure, add htmlspecialchars, it'll return as a pure string
    $title = htmlspecialchars($data["title"]);
    $content = htmlspecialchars($data["content"]);

    //query for insert data
    $addingData = "INSERT INTO posts VALUES ('', '$title', '$content', '');";
    mysqli_query($conn, $addingData);

    //return value 1 or -1 from mysqli_affected_rows
    return mysqli_affected_rows($conn);
}


function delete($fromid) {
    global $conn;

    //query delete data
    $delData = "DELETE FROM posts WHERE id=$fromid;";
    mysqli_query($conn, $delData);

    //return value 1 or -1 from mysqli_affected_rows
    return mysqli_affected_rows($conn);
}


//searching data
function searching($key) {
    $querysearch = "SELECT * FROM posts
                        WHERE
                    title LIKE '%$key%'
                    OR
                    content LIKE '%$key%'
                    ";
    //The % means that you can just type a part for the name and it'll work and return the data you want

    return query($querysearch); //'query' here is from query function above
}


//edit data
function edit($theData) {
    global $conn;

    //take data from the form (edit.php), after you edited it
    //And make it secure; so when te user try to input html tag it will come out as pure string

    $id = $theData["id"]; //you don't need htmlspecialcars because you don't change it
    $title = htmlspecialchars($theData["title"]);
    $content = htmlspecialchars($theData["content"]);

    //Query to Insert Data
    $editData = "UPDATE posts SET
                    title = '$title',
                    content = '$content'
                WHERE id = $id;
                ";
    //You get the $id in that query from inisde this function. You get $data from page edit.php. In that page, edit.php, you call 'edit' function 

    //so it's like overwriting the data
    mysqli_query($conn, $editData);

    //return value 1 or -1 from mysqli_affected_rows
    return mysqli_affected_rows($conn);
}


?>