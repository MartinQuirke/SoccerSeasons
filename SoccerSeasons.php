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
		$s = file_get_contents($this->getApiUri("leagues"),$context);
		$allLeagues = json_decode($s, true);

		return $allLeagues;
	}
	
	//Get a league from league value
	public function getLeague($leagueCode){
		$allLeagues = $this->getLeagues();
		
		for($i=0; $i<sizeof($allLeagues); $i++){
				$code=$allLeagues[$i]['league'];
				if($code == $leagueCode){
					$league = $allLeagues[$i];
				}
		}	
		return $league;
	}
		
	public function getTeamsFromLeague($leagueCode){
		$league = $this->getLeague($leagueCode);
		$teamApi = $league['_links']['teams']['href'];
		$s = file_get_contents($teamApi,$context);
		$allTeams = json_decode($s,true);
		return $allTeams;
	}

}
?>