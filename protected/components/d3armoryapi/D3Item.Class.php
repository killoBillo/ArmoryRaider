<?php
Class D3Item {
	private $region;
	private $battletagName;
	private $battletagCode;	
	private $apiUrl = '/api/d3/data/';
	private $itemData;
		
	private $item;
	private $isValid;
	
	private $iconsUrl = 'http://media.blizzard.com/d3/icons/items/large/';	
	

	function __construct($itemData, $region, $charClass, $charGender){
		$this->setItemData($itemData);
		$this->setRegion($region);
		$this->charClass = $charClass;
		$this->charGender = $charGender;
		$this->setHost('http://'.$this->region.'.battle.net'.$this->apiUrl.$this->itemData);
		
		$this->init();
	}
	
	private function init() {
		// $json = @file_get_contents($this->host);
		$json = @file_get_contents('http://localhost/armoryraider/z/item.json');
		
		if($json) {
			$this->setItem(json_decode($json, true));
			$this->setIsValid(is_array($this->item));
		}else{
			$this->setIsValid(false);
		}
	}
	
	
	public function getName() {
		return $this->item['name'];
	}
	
	private function getIcon() {
		return $this->item['icon'];
	}
	
	public function getIconUrl() {
		return $this->iconsUrl.$this->getIcon().'_'.$this->charClass.'_'.$this->charGender.'.png';
	}	
	
	public function getDPS() {
		return $this->item['dps'];
	}
	
	public function getAttributes() {
		return $this->item['attributes'];
	}
	
	public function getColor() {
		return $this->item['displayColor'];
	}
	
	public function getItemLevel() {
		return $this->item['itemLevel'];
	}
	
	public function getRequiredLevel() {
		return $this->item['requiredLevel'];
	}
	
	public function getAttacksPerSecond() {
		return $this->item['attacksPerSecond'];
	}
	
	
	
	/**
	 * SETTERS
	 */
	private function setItemData($itemData) {
		$this->itemData = $itemData;
	}
	private function setRegion($region) {
		$this->region = $region;
	}
	private function setHost($host) {
		$this->host = $host;
	}	 
	private function setIsValid($bool) {
		$this->isValid = $bool;
	}
	private function setItem($itemArray) {
		$this->item = $itemArray;
	}	
}	
?>