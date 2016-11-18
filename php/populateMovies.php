<DOCTYPE! html>
    <head>
        
    </head>

<body>
    

    include(tmdb.php);

    $tmdb_xml = new TMDb('fb8c9a3a6abeffc783e765d89f824ab9', TMDb::XML);
    $title = $_POST['Frozen'];

    $xml_movies_result = $tmdb_xml->searMovie($title);
    $xml = simplexml_load_string($sml_movies_result);

    echo '<table>';
    echo '<tr>';
    echo '<th>Cover</th>';
    echo '<th>Info</th>';
    
    foreach ($xml->movies->movie as $move)
    {
        $moviename = $movie->name;
        $imdbid = $movie->name;
    }
</body>
</DOCTYPE>