<?php
/**
 * @author Martin Quirke <quirke88@gmail.com>
 * @copyright Martin Quirke 2015
 **/

class SoccerSeasons {
	//Get API Urls
	public function getApiUri($type) {
		$apiUrl = "http://api.football-data.org/alpha";
		$apiCalls = array(
					"leagues" => $apiUrl."/soccerseasons/",
					"fixtures" => $apiUrl."/fixtures/",
					"teams" => $apiUrl."/teams/"
		);
		return $apiCalls[$type];
	}
	
	//Get JSON data of all leagues
	public function getLeagues() {
		$opts = array(
 	 		'http'=>array(
   			'method'=>"GET",
    	 		'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  				)
		);

		$context = stream_context_create($opts);
		$s = file_get_contents($this->getApiUri("leagues"),false, $context);
		$allLeagues = json_decode($s, true);

		return $allLeagues;
	}
	
	//Get a league from league value
	public function getLeague($leagueCode){
		$league[] =array();
		$allLeagues = $this->getLeagues();
		for($i=0; $i<sizeof($allLeagues); $i++){
				$code=$allLeagues[$i]['league'];
				if($code == $leagueCode){
					$league = $allLeagues[$i];
				}
		}	
		return $league;
	}
	
 	//Get Teams from within a league
	public function getTeamsFromLeague($leagueCode){
		
		$opts = array(
 	 		'http'=>array(
   			'method'=>"GET",
    	 		'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  				)
		);

		$context = stream_context_create($opts);
		$listTeam = array();
		$league = $this->getLeague($leagueCode);
		$teamApi = $league['_links']['teams']['href'];
		$s = file_get_contents($teamApi, false, $context);
		$allTeams = json_decode($s,true);
		for($i=0; $i<sizeof($allTeams['teams']); $i++){
					$team=$allTeams['teams'][$i]['name'];
					$listTeam[] = $team;	
         }
 		if(sizeof($listTeam)>0){
			sort($listTeam);
		}
		
		return $listTeam;
	}
	
	//Return Todays Fixtures
	public function getTodaysFixtures(){
		$opts = array(
 	 		'http'=>array(
   			'method'=>"GET",
    	 		'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n"
  				)
		);
		$context = stream_context_create($opts);
		$s = file_get_contents("http://api.football-data.org/alpha/fixtures?timeFrame=n1",false, $context);
		$todaysFixtures = json_decode($s, true);
		$fixtures = $todaysFixtures['fixtures'];
		return $fixtures;
	}
}
?>
