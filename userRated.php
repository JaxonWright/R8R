<html>
    <h2>Your Ratings</h2>
    <!--<a href="/#movie" class="btn btn-raised primary" >LOAD MOVIE</a>-->
    <?php
        $UserID = $_GET['userid'];
        $json = include('./php/getUserRatings.php');
        $array = json_decode($json, true);
        
        foreach($array as $item) {
            //echo "<div class='well well-sm col-sm-2' style='margin: 8px 8px 8px 8px; padding: 0px 0px 0px 0px'>";
            echo "
                        <a class='posterWithRating' href='#movie?id=".$item['MovieID']."'>
                            <img class='poster' src='".$item['PosterURL']."' width='190px' height='274px'></img>
                            <p class='overlay'>".$item['Rating']."</p>
                        </a>";
                        
            //echo "</div>";
        }
    ?>
</html>