<?PHP 
//connect to function.php
require './function.php';

//get id from index.php from databases
$fromid = $_GET["id"];


//delete function from function.php
if(delete($fromid) > 0) {
    echo "
    <script>
        alert('Succsess to delete data');
        //for redirect to index.php
        document.location.href = 'index.php';
    </script>
";
} else {
    echo "
        <script>
            alert('Fail to delete data');
            //for redirect to index.php
            //document.location.href = 'index.php';
        </script>
    ";
    error_log('error');
};



?>