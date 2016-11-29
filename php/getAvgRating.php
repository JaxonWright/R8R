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
    
    $count = 0;
    $total = 0;
    $avg = -1;
    $movieID = $_POST['movieID'];
    
    $sql = "SELECT * FROM Ratings WHERE MovieID = $movieID";
    $results = mysqli_query($conn, $sql);
    if (!$results) {
        die('Invalid query: '.mysql_error());
    }
    while ($row = mysqli_fetch_assoc($results)) {
        $count++;
        $total += $row['Rating'];
    }
    if ($count != 0) {
        $avg = $total/$count;
    }
    //-1 means we do not have a rating
    echo $avg;
    //echo 4.5;
?>