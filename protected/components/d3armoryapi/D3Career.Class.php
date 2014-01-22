<?php
Class D3Career {
	
	function __construct($host){
		$this->host = $host;	
		$this->init();	
	}
	
	private function init() {
		$json = @file_get_contents($this->host);
		
		if($json) {
			$this->career = json_decode($json, true);
			$this->isValid = true;
			var_dump($this->career['heroes']);
		}else{
			$this->isValid = false;
		}
	}
	
	public function getAllCharacters() {
		
	}
	
}
?>