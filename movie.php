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
        			   <div class='panel panel-default'>
        			      <div class='panel-heading'>
        					<h3 class='panel-title'>Rotton Tomatos</h3>
        			      </div>
        			      <div class='panel-body' id='rtRating'>";
        		            
        	echo         "</div>
        			   </div>
        			   <div class='panel panel-primary'>
        			      <div class='panel-heading'>
        					<h3 class='panel-title'>Your Rating</h3>
        				  </div>
        			      <div class='panel-body' id='imdbRating'></div>
        			   </div>
        		    </div>
        		 </div>";
        }
     ?>
</html>