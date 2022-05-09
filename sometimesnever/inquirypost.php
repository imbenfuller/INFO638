$tableName = $_POST['tableName']; 
$question = $_POST['question']; 
$answer = $_POST['answer']; 
 
// IMPORTANT: check if the posted data is one allowed tables  
// to prevent SQL Injection 
$allowedTables = array('tblComputer', 'tblAccounting', 'tblEconomics'); 
 
if(in_array($tableName, $allowedTables)) 
{ 
	// the table name will be replaced here: 
	$sql = "INSERT INTO $tableName (question, answer) VALUES(?,?)"; 
 
	$dbh = new PDO("mysql:host=localhost;dbname=mydbname;","user","pass");	 
 
	$sth = $dbh->prepare($sql); 
 
	$result = $sth->execute(array($question, $answer)); 
} 
else 
{ 
	die('table not allowed'); 
} 