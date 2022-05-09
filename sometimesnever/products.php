<?php include 'header.php' ?>
<div class="productdescription">
    <h1>All Products</h1>
</div>
<div class="productgridcontainer">
<?php

// credentials
require_once 'credentials.php';

//connect to the db

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

// write out our query

$query = "SELECT * FROM product ORDER BY date_added";
$result = $conn->query($query);
if(!$result) die($conn->error);

// output our results

$rows = $result->num_rows;

// declare output




if ($rows > 0) {
while($row = $result->fetch_assoc()) {
    $productcard = '<a class="product-card" href="product.php?product_id='.$row["product_id"].'\">
<img src="'.$row["image_id"] . '" alt="photo of ' . $row["product_name"] . '"></a>';
    echo $productcard;
}
}


// <a href="/INFO638/sometimesnever/product.php?product_id='.$row["product_id"].'\">' .  

// close db connection

$result->close();
$conn->close();
?>
</div>
        
        


    </body>
    
</html>