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
        $(document).ready(function(){
            var url = window.location.href;
            var id = url.substring(url.lastIndexOf('='));
            if (localStorage["uid"] && localStorage["username"]) {
                $("#userRating").removeClass("hidden");
                getRating(localStorage["uid"], id);
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
                //console.log("This movie was rated "+data);
                $("#rateYo").rateYo("option", "rating", data);
            }).fail(function (xhr, status, error){
                console.log("Error getting rating");
                console.log(xhr);
                console.log(status);
                console.log(error);
            });	
        }
     </script>
</html>