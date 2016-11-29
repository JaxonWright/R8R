<html>
    <h2>Now Showing</h2>
    <!--<a href="/#movie" class="btn btn-raised primary" >LOAD MOVIE</a>-->
    <?php
        $json = include('./php/getMovies.php');
        $array = json_decode($json, true);
        
        foreach($array as $item) {
            //echo "<div class='well well-sm col-sm-2' style='margin: 8px 8px 8px 8px; padding: 0px 0px 0px 0px'>";
            echo "  <a href='#movie?id=".$item['MovieID']."'>"."<img class='poster' src='".$item['PosterURL']."' width='190px' height='274px'/></a>";
            //echo "</div>";
        }
    ?>
</html>