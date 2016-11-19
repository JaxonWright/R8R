<?php
$key = 'fb8c9a3a6abeffc783e765d89f824ab9';
$api = file_get_contents('http://api.themoviedb.org/3/movie/now_playing?api_key='.$key.'');
$get = json_decode($api,true);

foreach ($get['results'] as $a)
{
    echo var_dump($a);
    echo '<br>';
    echo '<li><a href="/'.$a['original_title'].'" title="'.$a['original_title'].'"><small>'.$a['original_title'].'</small></a></li>';
}
?>