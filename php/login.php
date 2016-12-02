<?php
    // $servername = "cis.gvsu.edu";
    // $username = "teitsmch";
    // $password = "teitsmch0925";
    // $dbname = "teitsmch";
    
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $dbname = "c9";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $userID = -1;
    $inputUserName = $_POST['userName'];
    $inputPassword = $_POST['password'];
    
    $sql = "SELECT * FROM Users WHERE Username = '$inputUserName'";
    $result = mysqli_query($conn, $sql);
    
    if(!$result){
        //do nothing
    } else {
        $row = mysqli_fetch_assoc($result);
        if($row["Password"] === $inputPassword){
            $userID = $row["UserID"];
        }
    }
    //-1 means we do not have a matching password/username
    echo $userID;
?>