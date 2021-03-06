<?php
/**
 * Master class for the battle.net D3 armory
 * @author: Marco Chillemi
 * @copyright: Copyright (c) 2014, Marco Chillemi, http://www.killodesign.com
 * @version: 1.0
 * 
 * Blizzard API Resource: http://blizzard.github.io/d3-api-docs/
 */
 
require_once 'D3Career.Class.php';
require_once 'D3Character.Class.php';
require_once 'D3Item.Class.php';
 
 	
Class D3BattlenetArmory {
	private $region;
	private $battletagName;
	private $battletagCode;
	private $apiUrl = '/api/d3/profile/';
	private $version = '1.0';
	
	function __construct($region, $battletagName, $battletagCode) {
		$this->region 			= $region;
		$this->battletagName 	= $battletagName;
		$this->battletagCode 	= $battletagCode;
	}
	
	/**
	 * Retrieve the character profile from the armory and returns an object
	 */
	public function getCharacter($heroId) {
		return new D3Character($heroId, $this->region, $this->battletagName, $this->battletagCode, $this->apiUrl);	
	}
	
	/**
	 * Retrieve the career profile from the armory and returns an object
	 */		
	public function getCareer() {
		return new D3Career($this->region, $this->battletagName, $this->battletagCode, $this->apiUrl);
	}
	
	/**
	 * Returns the PHP API version
	 */
	public function getVersion() {
		return $this->version;
	}	
}   
?>