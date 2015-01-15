<?php
/**
 * @package Soccer Api
 * @author Martin Quirke <quirke88@gmail.com>
 * @copyright Martin Quirke 2015
 * @version 0.1
 **/
class SoccerSeasons {
	public function getApiUri($type) {
		$apiUrl = "http://api.football-data.org/alpha";
		$apiCalls = array(
					"leagues" => $apiUrl."/soccerseasons/",
					"fixtures" => $apiUrl."/fixtures/",
					"teams" => $apiUrl."/teams/"
		);
		return $apiCalls[$type];
	}
	public function getLeagues() {
		$s = file_get_contents($this->getApiUri("leagues"));
		$allLeagues = json_decode($s, true);
		
		return $allLeagues;
	}
}
?>