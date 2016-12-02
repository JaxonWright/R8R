<?php
    // $servername = "cis.gvsu.edu";
    // $username = "teitsmch";
    // $password = "teitsmch0925";
    // $dbname = "teitsmch";

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $dbname = "c9";
    define("DUPLICATE_KEY", 1062);

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $rating = $_POST['rating'];
    $movieID = $_POST['movieID'];
    $userID = $_POST['userID'];
    
    $sql = "INSERT INTO Ratings(UserID, MovieID, Rating)
            VALUES($userID, $movieID, $rating)";
    
    if (mysqli_query($conn, $sql)) {
        echo $rating;
    } else if (mysqli_errno($conn) == DUPLICATE_KEY){
        $sql = "UPDATE Ratings SET Rating = $rating 
        WHERE MovieID = $movieID AND UserID= $userID";
        if (mysqli_query($conn, $sql)) {
            echo $rating;
        } else {
            echo mysqli_error($conn);
        }
    } else {
        echo mysqli_error($conn);
    }
?>