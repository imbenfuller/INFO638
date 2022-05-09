<body>
    <?php
require_once 'credentials.php';
include 'header.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['product_id'])) {
	$id = sanitizeMySQL($conn, $_GET['product_id']);
    $query = "SELECT product.product_id, product.product_name, product.image_id, product.description, product.height, product.width, product.depth,
    maker.f_name, maker.l_name,
    medium.medium_name,
    type.type_name
    FROM product
    INNER JOIN maker ON product.maker_id = maker.maker_id
    INNER JOIN medium ON product.medium_id  = medium.medium_id
    INNER JOIN type ON product.type_id = type.type_id
    WHERE product_id='".$id."';";
	$result = $conn->query($query);
	if (!$result) die ("Invalid product id.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No product found with id of $id<br>";
	} else {
	    while($row = $result->fetch_assoc()) {
            echo '<div class="productdetailcontainer"><h1>'.$row['product_name'].'</h1>';
            echo '<div class="productdetails">';
            echo '<img class="productimg" src="'.$row['image_id'].'">';
            echo '<table class="productcol">
            <tr>
              <td class="c1">Name:</td>
              <td>'.$row['product_name'].'</td>
            </tr>
            <tr>
              <td class="c1">Description:</td>
              <td>'.$row['description'].'</td>
            </tr>
            <tr>
              <td class="c1">Artist:</td>
              <td>'.$row['f_name'].' '.$row['l_name'].'</td>
            </tr>
            <tr>
              <td class="c1">Medium:</td>
              <td>'.$row['medium_name'].'</td>
            </tr>
            <tr>
              <td class="c1">Size:</td>
              <td>'.$row['width'].' in x '.$row['height'].' in x '.$row['depth'].' in</td>
            </tr>
            <tr>
            <td class="c1">Inquiry form:</td>
            <td><a href="inquire.php?product_id='.$row["product_id"].'">Inquire</a></td>
          </table></div></div>';
         
		}
	}
} else {
	echo "No pet id passed";
}





function sanitizeString($var)
{
	$var = stripslashes($var);
	$var = strip_tags($var);
	$var = htmlentities($var);
	return $var;
}
function sanitizeMySQL($connection, $var)
{
	$var = sanitizeString($var);
	$var = $connection->real_escape_string($var);
	return $var;
}
?>


</body>



