<?php
Class D3Career {
	private $region;
	private $battletagName;
	private $battletagCode;	
	private $apiUrl;
	
	private $career;
	private $isValid;	
	
	function __construct($region, $battletagName, $battletagCode, $apiUrl){
		$this->setRegion($region);
		$this->setBattletagName($battletagName);
		$this->setBattletagCode($battletagCode);
		$this->setApiUrl($apiUrl);		
		$this->setHost('http://'.$this->region.'.battle.net'.$this->apiUrl.$this->battletagName.'-'.$this->battletagCode.'/');
			
		$this->init();	
	}
	
	private function init() {
		// $json = @file_get_contents($this->host);
		$json = @file_get_contents('http://localhost/armoryraider/z/career.json');
		
		if($json) {
			$this->setCareer(json_decode($json, true));
			$this->setIsValid(true);
		}else{
			$this->setIsValid(false);
		}
	}
	
	public function isValid() {
		return $this->isValid;
	}
	
	public function getCharacter($arrayKey) {
		if(array_key_exists($arrayKey, $this->career['heroes']))
			return new D3Character($this->career['heroes'][$arrayKey]['id'], $this->region, $this->battletagName, $this->battletagCode, $this->apiUrl);
		else 
			return false;
	}
	
	public function getAllCharacters() {
		if(is_array($this->career) && array_key_exists('heroes', $this->career)) {
			$heroes = array();
			foreach ($this->career['heroes'] as $k=>$hero) {
				$heroes[] = new D3Character($this->career['heroes'][$k]['id'], $this->region, $this->battletagName, $this->battletagCode, $this->apiUrl);
			}
			
			return $heroes;
		}else{
			return false;
		}
	}
	
	public function getBattleTag() {
		return $this->career['battleTag'];
	}

	public function getTimePlayed() {
		return $this->career['timePlayed'];
	}
	
	public function getKills() {
		return $this->career['kills'];
	}	
	
	public function getProgression() {
		return $this->career['progression'];
	}
	
	public function getHardcoreProgression() {
		return $this->career['hardcoreProgression'];
	}

	public function getLastUpdate() {
		$date = new DateTime;
		return $date->setTimeStamp($this->career['lastUpdated']);
	}
	

	 
	/**
	 * SETTERS
	 */
	private function setRegion($region) {
		$this->region = $region;
	}
	private function setBattletagName($battletagName) {
		$this->battletagName = $battletagName;
	}
	private function setBattletagCode($battletagCode) {
		$this->battletagCode = $battletagCode;
	}
	private function setApiUrl($apiUrl) {
		$this->apiUrl = $apiUrl;
	}	
	private function setHost($host) {
		$this->host = $host;
	}
	private function setIsValid($bool) {
		$this->isValid = $bool;
	}	
	private function setCareer($careerArray) {
		$this->career = $careerArray;
	}
}
?>