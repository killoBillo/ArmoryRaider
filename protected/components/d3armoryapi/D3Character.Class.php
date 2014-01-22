<?php
Class D3Character {
	
	private $iconsUrl 		= 'http://media.blizzard.com/d3/icons/skills/64/';
	private $portraitUrl	= 'http://media.blizzard.com/d3/icons/portraits/64/';
	private $itemsUrl		= 'http://media.blizzard.com/d3/icons/items/large';
	
	function __construct($heroId, $host){
		$this->heroId			= $heroId;
		$this->host 			= $host.'hero/'.$heroId;
		
		$this->init();
	}
	
	private function init() {
		$json = @file_get_contents($this->host);
		
		if($json) {
			$this->character = json_decode($json, true);
			$this->isValid = true;
			var_dump($this->character);
		}else{
			$this->isValid = false;
		}
	}
	
	
}
?>