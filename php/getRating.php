<?php
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $dbname = "c9";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $rating = 0;
    $movieID = $_POST['movieID'];
    $userID = $_POST['userID'];
    
    $sql = "SELECT * FROM Ratings WHERE MovieID = $movieID AND UserID = $userID";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);{
            $rating = $row["Rating"];
        }
    }
    //0 means we do not have a rating
    echo $rating;
    //echo 4.5;
?>