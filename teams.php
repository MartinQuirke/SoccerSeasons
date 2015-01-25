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
			for($i=0; $i<sizeof($teams['teams']); $i++){
					$team=$teams['teams'][$i]['name'];
					$listTeam[] = $team;	
         }	
			sort($listTeam);
			
		?>
    </div>
      
      	<div id='left-wrapper'>
    		 	<?php
					for($j=0;$j<sizeof($listTeam);$j++){
      print_r($listTeam[$j]."</br>");
					}
				?>
    			
   		</div>
  </body>

</html>