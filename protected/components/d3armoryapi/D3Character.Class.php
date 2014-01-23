<?php
Class D3Character {
	private $region;
	private $battletagName;
	private $battletagCode;	
	private $apiUrl;
		
	private $character;
	private $isValid;
	
	private $characterUrl 	= '.battle.net/d3/profile/';	
	private $iconsUrl 		= 'http://media.blizzard.com/d3/icons/skills/64/';
	private $portraitUrl	= 'http://media.blizzard.com/d3/icons/portraits/64/';
	private $itemsUrl		= 'http://media.blizzard.com/d3/icons/items/large/';
	
	function __construct($heroId, $region, $battletagName, $battletagCode, $apiUrl){
		$this->setHeroId($heroId);
		$this->setRegion($region);
		$this->setBattletagName($battletagName);
		$this->setBattletagCode($battletagCode);
		$this->setApiUrl($apiUrl);		
		$this->setHost('http://'.$this->region.'.battle.net'.$this->apiUrl.$this->battletagName.'-'.$this->battletagCode.'/hero/'.$this->heroId);
		
		$this->init();
	}
	
	private function init() {
		// $json = @file_get_contents($this->host);
		$json = @file_get_contents('http://localhost/armoryraider/z/hero.json');
		
		if($json) {
			$this->setCharacter(json_decode($json, true));
			$this->setIsValid(true);
		}else{
			$this->setIsValid(false);
		}
	}
	
	
	public function getName() {
		return $this->character['name'];
	}
	
	public function getClass() {
		return $this->character['class'];
	}
	
	public function getGender() {
		return $this->character['gender'];
	}	
	
	public function getLevel() {
		return $this->character['level'];
	}	
	
	public function getParagonLevel() {
		return $this->character['paragonLevel'];
	}	
	
	public function isHardcore() {
		return $this->character['hardcore'];
	}	
	
	public function getSkills() {
		return $this->character['skills'];
	}
	
	public function getItems() {
		return $this->character['items'];
	}

	public function getPortraitUrl() {
		$class = $this->getClass();
		$gender = ($this->character['gender']) ? 'female' : 'male';
		return $this->portraitUrl.$class.'_'.$gender.'.png';
	}
	
	public function getCharacterUrl() {
		return 'http://'.$this->region.$this->characterUrl.$this->battletagName.'-'.$this->battletagCode.'/hero/'.$this->character['id'];
	}



	
	/**
	 * SETTERS
	 */
	private function setHeroId($heroId) {
		$this->heroId = $heroId;
	}
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
	private function setCharacter($characterArray) {
		$this->character = $characterArray;
	}
}
?>