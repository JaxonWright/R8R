include(tmdb.php);

$tmdb_xml = new TMDb('fb8c9a3a6abeffc783e765d89f824ab9', TMDb::XML);
$title = $_POST['Frozen'];
$sml_movies_result = $tmdb_xml->sear