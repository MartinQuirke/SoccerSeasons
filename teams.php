<!doctype html>

<html lang="en">  
  <head>
		<meta charset="utf-8"/>

		<title>Soccer Seasons</title>
		<meta name="description" content="Soccer Seasons"/>
		<meta name="author" content="SitePoint"/>
		
		<link rel="stylesheet" href="style.css"></link>
       
  </head>
  <body>
    <div id='header-wrapper'>
      
      <?php
			include("SoccerSeasons.php");
			$SoccerSeasons = new SoccerSeasons();	
			$teams = $SoccerSeasons->getTeamsFromLeague($_GET['league']);
			
		?>
    </div>
      
      	<div id='left-wrapper'>
    		 	<?php
					print_r($teams['teams']."</br>");
				?>
    			
   		</div>
  </body>

</html>