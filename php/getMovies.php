<?php
//mysql -p -h cis.gvsu.edu -u teitsmch
// $servername = "cis.gvsu.edu";
// $username = "teitsmch";
// $password = "teitsmch0925";
// $dbname = "teitsmch";
    
$servername = getenv('IP');
$username = getenv('C9_USER');
$password = "";
$dbname = "c9";
//$dbport = 3306;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//header("Access-Control-Allow-Origin: *");
if (!$conn){
	die('Could not connect: '. mysql_error());
}

$sql="SELECT * FROM Movies";

$resultSet = mysqli_query($conn, $sql);
if (!$resultSet) { // add this check.
    die('Invalid query: ' . mysql_error());
}
//appeand each record to our result array
$retVal=array();
while ($row = mysqli_fetch_assoc($resultSet)){
	$retVal[]=$row;
}

//encode the array as JSON
echo json_encode($retVal);
?>