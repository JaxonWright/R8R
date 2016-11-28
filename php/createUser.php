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

    $id = 1;
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    
    
    $sql = "INSERT INTO Users(Username, Password)
        VALUES('$userName', '$password')";
    
    #echo $sql.'<br>';
    if (mysqli_query($conn, $sql)) {
        echo "Success";
    } else {
        echo mysqli_error($conn);
    }
?>