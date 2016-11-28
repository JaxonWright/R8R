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
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// sql to create table
$sql = "CREATE TABLE Movies (
MovieID int PRIMARY KEY, 
Name VARCHAR(30),
Description VARCHAR(500),
PosterURL VARCHAR(100)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table Movies created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn). "<br>";
}

// sql to create table
$sql = "CREATE TABLE Ratings (
UserID int,
MovieID int,
Rating double,
PRIMARY KEY (UserID, MovieID)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table Ratings created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn). "<br>";
}

// sql to create table
$sql = "CREATE TABLE Users (
UserID int NOT NULL AUTO_INCREMENT,
Username VARCHAR(30) UNIQUE,
Password VARCHAR(30),
PRIMARY KEY (UserID)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table Users created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn). "<br>";
}
mysqli_close($conn);
?>