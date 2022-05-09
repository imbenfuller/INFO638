<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">

    </head>
    
    <body>
        <div class="menulinks">
            <div id="menu1">
        <a href="index.php"><h1>Sometimes/Never</h1></a>
</div>  
<div id="menu2">
        <a class="menu2" href="products.php"><h1>Products</h1></a>
</div>
<div id="menu3">
        <a class="menu3" href="studio.php"><h1>Studio</h1></a>
</div>
        </div>

        <div class="email-signup-1">
        <h2>Stay in the know</h2>


<?php
// sanitization

function sanitizeString ($var) {

    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}
function sanitizeMySQL($connection, $var) {
    $var = sanatizeString($var);
    $var = $connection->real_escape_string($var);
    return $var;
}
?>
<form action="index.php" method="POST">
<input type="text" name="email" placeholder="email address"><input type="submit" value="join email list">
</form>

<?php

//check if form was submitted

if (isset($_POST['email']) and !empty($_POST['email'])) {
    $email = $_POST['email'];
    echo "<meta http-equiv='refresh' content='0'>";




// credentials
require_once 'index.php';

//connect to the db

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

//query 

$query = "INSERT INTO `customer`(`f_name`, `l_name`, `email`, `subscribed`) VALUES (NULL, NULL, '$email', '1')";


// run query

$result = $conn->query($query);
if(!$result) die($conn->error);
if($result) print("Email added successfully");
}


// output




// close db connection



?>
</div>

</body>