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
    <div id='header-wrapper'></div>
	<?php
		include("SoccerSeasons.php");
		$SoccerSeasons = new SoccerSeasons();
		$leagues = $SoccerSeasons->getLeagues();
	?>
   <div id='left-wrapper'>
     
    	<?php
			for($i=0; $i<sizeof($leagues); $i++){
				$league=substr($leagues[$i]['caption'], 0, -7);
				$code=$leagues[$i]['league'];
       		echo "<a href='teams.php?league=".$code."'>".$league."</a></br>";
			}	
		?>
   </div>
  </body>

</html>