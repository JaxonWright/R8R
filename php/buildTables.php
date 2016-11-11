<?php
//mysql -p -h cis.gvsu.edu -u teitsmch
$servername = "cis.gvsu.edu";
$username = "teitsmch";
$password = "teitsmch0925";
$dbname = "teitsmch";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// sql to create table
$sql = "CREATE TABLE Movies (
MovieID int NOT NULL, 
Name VARCHAR(30),
Desc VARCHAR(500),
PosterURL VARCHAR(100),
PRIMARY KEY (MovieID)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table Movies created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn). "<br>";
}

// sql to create table
$sql = "CREATE TABLE Ratings (
UserID int NOT NULL,
MovieID int NOT NULL,
Rating int,
PRIMARY KEY(UserID, MovieID)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table Ratings created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn). "<br>";
}

// sql to create table
$sql = "CREATE TABLE Users (
UserID int PRIMARY KEY, 
Username VARCHAR(30),
Password VARCHAR(30),
PRIMARY KEY(UserID)
)";
if (mysqli_query($conn, $sql)) {
    echo "Table Users created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn). "<br>";
}
mysqli_close($conn);
?>