<?php include 'header.php' ?>

<div class="hero">
<div class="site-header">Sometimes / <br>Never</div>
<p class="subhead">hashing out the little details <br>by hand
in the usa </p>
<img id="hero-img-1" src="bench1.jpg" alt="stool">
<img id="hero-img-2" src="bench2.jpg" alt="stool">
</div>

<div class="featured-container">
    <div class="featured">
<h2>featured item:</h2>
<?php

// credentials
require_once 'credentials.php';

//connect to the db

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

// write out our query

$query = "SELECT * FROM product ORDER BY RAND() LIMIT 1";
$result = $conn->query($query);
if(!$result) die($conn->error);

// output our results

$rows = $result->num_rows;

while($row = $result->fetch_assoc()) {
    // print_r($row);
    print("<h3>" . $row["product_name"] . "</h3>");
    print('<a href="product.php?product_id='.$row["product_id"].'\"><img src="' . $row["image_id"] . '" alt="photo of ' . $row["product_name"] . '" style="max-width: 40vw;"></a>');
    
    
}

//additional queries

// close db connection

$result->close();
$conn->close();
?>
</div>
</div>
<div class="email-signup">
<h2>Let's stay in touch</h2>
<h3>we'll send occasional updates about our work</h3>
<p>privacy policy:
<ul><li>we don't have time to spam you</li>
<li>we don't even know how to sell your data</li>
</ul>


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
require_once 'credentials.php';

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
</html>