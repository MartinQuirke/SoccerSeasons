<!doctype html>

<html lang="en">
  
  
  <head>
		<meta charset="utf-8"/>
    	<meta name="google" content="notranslate" />

		<title>Soccer Seasons</title>
		<meta name="description" content="Soccer Seasons"/>
		<meta name="author" content="SitePoint"/>
		
		<link rel="stylesheet" href="style.css"></link>
 	   <script src="//code.jquery.com/jquery-1.10.2.js"></script>
 		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
 		<script>
 			 $(function() {
  				  $( "#accordion" ).accordion({
        				active: false,
        				collapsible: true        
        			}
        			);
  			 });
  		</script>
       
  </head>
  <body>
    <div id='header-wrapper'></div>
	<?php
		include("SoccerSeasons.php");
		$SoccerSeasons = new SoccerSeasons();
		$leagues = $SoccerSeasons->getLeagues();
	?>
   <div id='left-wrapper'>
     <ul id="accordion">
    	<?php
			for($i=0; $i<sizeof($leagues); $i++){
				$league=substr($leagues[$i]['caption'], 0, -7);
				$code=$leagues[$i]['league'];
		 ?>
       <li>
         <h3>
         <?php 
				//echo "<a href='teams.php?league=".$code."'>'".$league."</a>"	
				echo $league;
			?>
       </h3>
         <div>
           
           <ul>
         <?php	
				$teams = $SoccerSeasons->getTeamsFromLeague($code);
				for($j=0; $j<sizeof($teams); $j++){
						echo "<li>".$teams[$j]."</li>";
				}
			?>
           </ul>
          
         </div>
       </li>
      <?php
			}
		?>
       </ul>
   </div>
  </body>

</html>