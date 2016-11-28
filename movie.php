<html>
    <?php
        $id = $_GET['id'];
        $resultjson = include('./php/getMovie.php');
        $array = json_decode($resultjson, true);
        foreach($array as $item) {
            echo "<div class='row'>
        			<div class='col-md-3'>
        		        <div class='well well-sm' style='margin: 8px 65px 8px 8px; padding: 0px 0px 0px 0px'>";
        	echo           "<img id='poster' alt='poster' src='".$item['PosterURL']."' width='190px' height='274px'/>
        	            </div>
        			</div>
        			<div class='col-md-7'>";
        	echo       "<h3 id='title'>".$item['Name']."</h3>
        				<p id='description'>";
        	echo           $item['Description'];				
        	echo	    "</p>
        			</div>
        			<div class='col-md-2'>
        			   <div class='panel panel-default'>
        			      <div class='panel-heading'>
        					 <h3 class='panel-title'>IMDb Rating</h3>
        				   </div>
        				   <div class='panel-body' id='imdbRating'>";
        				    include_once('./php/imdb.class.php');
        		            $oIMDB = new IMDB($item['Name']);
                            if ($oIMDB->isReady) {
                                echo "<center><p class='lead'><strong>".$oIMDB->getRating()."</strong>/10</p></center>";
                            } else {
                                echo "<h1><strong>N/A</strong></h1>";
                            }
        	echo		  "</div>
        			   </div>
        			   <div id='userRating' class='panel panel-primary hidden'>
        			      <div class='panel-heading'>
        					<h3 class='panel-title'>Your Rating</h3>
        				  </div>
        			      <div class='panel-body' id='userRating'>
        			        <div id='rateYo'></div>
        			      </div>
        			   </div>
        		    </div>
        		 </div>";
        }
     ?>
     <script>
        var firstLoad = true;
        var url = window.location.href;
        var movieID = url.substring(url.lastIndexOf('=')+1);
        console.log("MovieID= " +movieID);
        var uid;
        $(document).ready(function(){
            if (localStorage["uid"] && localStorage["username"]) {
                uid = localStorage["uid"];
                $("#userRating").removeClass("hidden");
                getRating(uid, movieID);
            }
        });
        
        //User Rating Stars
        $(function () {
          $("#rateYo").rateYo({
            starWidth: "25px",
            normalFill: "#A0A0A0",
            halfStar: true
          });
        });
        
        // Setter
        $("#rateYo").rateYo("option", "onSet", function () {
            if (firstLoad) {
                firstLoad = false;
            } else {
                var rating = $("#rateYo").rateYo("option", "rating");
                console.log("rating changed");  
                setRating(uid, movieID, rating);
            }
        });
        
        function getRating(user, movie) {
            $.ajax({
				type: "POST",
                url: "php/getRating.php",
                data: {
                    userID: user,
                    movieID: movie
                },
                dataType: "text"
            }).done(function (data){
                if (data != 0) {
                    console.log("This movie was previously rated "+data);
                    $("#rateYo").rateYo("option", "rating", data);
                } else {
                    console.log("This movie has not been rated");
                    firstLoad = false;
                }
            }).fail(function (xhr, status, error){
                console.log("Error getting rating");
                console.log(xhr);
                console.log(status);
                console.log(error);
            });	
        }
        
        function setRating(user, movie, rating) {
            $.ajax({
				type: "POST",
                url: "php/rateMovie.php",
                data: {
                    userID: user,
                    movieID: movie,
                    rating: rating
                },
                dataType: "text"
            }).done(function (data){
                console.log("movie rated "+data);
            }).fail(function (xhr, status, error){
                console.log("Error setting rating");
                console.log(xhr);
                console.log(status);
                console.log(error);
            });	
        }
     </script>
</html>