<?php
/**
 * 
 * Utilizzo questa classe per recuperare tutte le informazioni su un personaggio
 * ed averle a disposizione in un unico oggetto.
 * 
 * La utilizzo sicuramente in RaiderExt.CharactersList
 * @author Marco
 *
 */
Class RaiderCharacter {
	
	private $character;
	
	function __construct($id) {
		$this->character 			= Character::model()->findByPk($id);
		$this->character->guild 	= Guild::model()->findByPk($this->character->guild_id);
		$this->character->class 	= Classe::model()->findByPk($this->character->class_id);
		$this->character->race 		= Race::model()->findByPk($this->character->race_id);
		$this->character->gender 	= Gender::model()->findByPk($this->character->gender_id);
		$this->character->faction 	= Faction::model()->findByPk($this->character->faction_id);
		
		return $this->character;
	}
	
	
	
	
	/* Getters */
	public function getCharacter() {
		return $this->character;
	}
	
	public function getGuild() {
		return $this->character->guild;
	}
	
	public function getClass() {
		return $this->character->class;
	}	
	
	public function getRace() {
		return $this->character->race;
	}	

	public function getGender() {
		return $this->character->gender;
	}		
	
	public function getFaction() {
		return $this->character->faction;
	}		
}
?>