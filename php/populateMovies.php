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

$key = 'fb8c9a3a6abeffc783e765d89f824ab9';
$api = file_get_contents('http://api.themoviedb.org/3/movie/now_playing?api_key='.$key.'');
$get = json_decode($api,true);


$id = 0;
foreach ($get['results'] as $a)
{
    echo '<br>';
  //  echo '<li><a href="/'.$a['original_title'].'" title="'.$a['original_title'].'"><small>'.$a['original_title'].'</small></a></li>';
    
    //$sql = "INSERT INTO Movies
    //VALUES(" . $id . "," . $a['original_title'] . "," . 'Hello' . "," . 'http://image.tmdb.org/t/p/w185/' . $a['poster_path'] . ")";
    $sql = "INSERT INTO Movies
    VALUES(3, 'title', 'description', 'url')";
    echo $sql;
//    echo var_dump($a);
    if (mysqli_query($conn, $sql)) {
        echo "Inserted row to table<br>";
    } else {
        echo "Error inserting row to table: " . mysqli_error($conn). "<br>";
    }

    
}
?>