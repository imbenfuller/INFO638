<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php require_once 'credentials.php';
        include 'header.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
?>
    </head>
    <body>
    <div class="inquiryform">

<?php

    if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
    $query = "SELECT * 
    FROM product
    WHERE product_id=".$id.";";
    $result = $conn->query($query);
    if (!$result) die ("Invalid product id.");
    $rows = $result->num_rows;
    if ($rows == 0) {
        echo "No product found, please try again.";
    } else {
        while($row = $result->fetch_assoc()) {
            echo '<div class="inquiryhead"><h1>Inquire about <br>"'.$row['product_name'].'"</h1></div>';
            echo '<img class="inquiryimg" src="'.$row['image_id'].'" alt="photo of '.$row['image_id'].'">';
        }
    }
    };


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
};
?>

<div class="inquiryform">
<form action="inquire.php?" method="POST">
<label for="f_name">First name:</label><br>
<input type="text" name="f_name"><br>
<label for="l_name">Last name:</label><br>
<input type="text" name="l_name"><br>
<label for="email">Email:</label><br>
<input type="text" name="email"><br>
<label for="email">Inquiry</label><br>
<input type="text" name="inquiry"><br>
<input type="submit" name="submit" placeholder="Send Inquiry">
</form>
</div>


<?php

//check if form was submitted
$id = $_GET['product_id'];

if (isset($_POST['submit']) and !empty($_POST['submit'])) {
    $submit = $_POST['submit'];
    echo "<meta http-equiv='refresh' content='0'>";


// credentials
require_once 'credentials.php';

//connect to the db

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) print("no connection to database");


//declare variables
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$inquiry = $_POST['inquiry'];
$newid = $_POST[$id];


    
//query 
$query1 = "INSERT INTO `inquiry`(`product_id`, `description`, `f_name`, `l_name`, `email`) 
VALUES ('$newid','$inquiry','$f_name','$l_name','$email');";


// run query

$result1 = $conn->query($query1);
if(!$result1) print("Did not work");
if($result1) print("Thank you for your inquiry.");
};

        


?>



                  
</body>
</html>