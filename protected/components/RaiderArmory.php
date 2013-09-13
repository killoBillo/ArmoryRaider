<?php 

/**
 * 
 * Utilizzo questa classe per crearmi un oggetto
 * che contenga tutti i model di cui ho bisogno per la creazione di un nuovo 
 * character già popolati con i dati che recupero dall'armory tramite wowarmoryapi.
 * 
 * Posso utilizzarlo in fase di creazione/aggiornamento di un character, ed anche in fase di 
 * iscrizione al raid se volessi aggiornare automaticamente i dati del character che si sta
 * iscrivendo.
 * 
 * NB: Ho scelto di passare lo userid del proprietario del pg, in quanto in fase di modifica
 * voglio dare la possibilità ai raidleader di cambiare il proprietario del pg, nel caso in cui
 * qualcuno avesse abbinato al proprio account il pg di qualcun altro (i pg sono UNIVOCI nel model Character, vedi regola 'unique' su attributo 'name').
 * @author Marco
 *
 */
class RaiderArmory {
	
	private $model;
	
	private $name;
	private $realm;
	private $region;
	private $isValid;
	
	
	
	function __construct($id = null) {
		if(!$id) {
			/**
			 * Preparo i model se nn ricevo nessun id.
			 */
			$this->model							= new Character();
			$this->model->character_has_role		= array();
			$this->model->character_has_spec		= array();
			
			$this->model->user_id					= Yii::app()->user->id;
		}else{
			$this->model							= Character::model()->findByPk($id);
			$this->model->character_has_role		= $this->mergeModels(CharacterHasRole::model()->findAll('character_id = :char_id', array(':char_id'=>$id)), 'role_id');
			$this->model->character_has_spec		= $this->mergeModels(CharacterHasSpec::model()->findAll('character_id = :char_id', array(':char_id'=>$id)), 'spec_id');
		}
		
		$this->isValid = false;
	}
	
	
	public function getCharacter(){
		// Load the class and define the realm and region 
		$armory = new BattlenetArmory($this->region, $this->realm);       
		$armory->useCache(FALSE);
      	
		// Get the character object. Will return FALSE if the
		// character could not be found or character is frozen.
		$character = $armory->getCharacter($this->name);
		$this->isValid = $character->isValid();
		
		if($this->isValid){
			/**
			 * Per comodità mi recupero dal db le info sulla gilda.
			 * NB: popolo prima il model principale, cioè $this->model == Character;
			 */ 
			$guildName = $character->getGuild();
			$guild = Guild::model()->findByAttributes(array('name'=>$guildName['name']));
			
			// se non trovo la gilda, salvo automaticamente il model della nuova gilda su DB (per personaggi non di gilda che si iscrivono ai raid)
			if(empty($guild)) {
				// recupero la nuova gilda dall'armory
				$newGuild = $character->getGuild();
				$newGuild = $armory->getGuild($newGuild['name'], $newGuild['realm']);
				
				// recupero dati sulla gilda
				$guildData = $newGuild->getData();
				
				// se $guildData['side'] è 0 = ally, 1 = orda
				$faction = ($guildData['side']) ? 2 : 1 ;
				
				// url all'armory di gilda
				$guildArmoryUrl = "http://battle.net/wow/guild/".$guildData['realm']."/".$guildData['name']."/";
				
				// creo array di attributi, popolando soltanto quelli che riesco ad ottenere dall'armory
				$attributes = array(
					'realm'=>$guildData['realm'],
					'name'=>$guildData['name'],
					'faction_id'=>$faction,	
					'URL'=>$guildArmoryUrl,			
				);
				
				// creo il model da salvare.
				$guild = new Guild();
				
				//imposto gli attributi
				$guild->setAttributes($attributes);

				//salvo il model, se va male, tiro un'eccezione
				if(!$guild->save())
					throw new Exception(Yii::t('locale', 'an error has occured, contact the system admin'));
			}
			
			// memorizzo alcuni valori che mi servono più avanti
	        $spec1 		  = $character->getActiveTalents();
	        $spec2 		  = $character->getInactiveTalents();
	        $gear 		  = $character->getGear(); 
	        $thumbnailurl = $character->getThumbnailURL();
	        
	        // sistemo alcuni valori prendendo le label che mi servono
	        $gear 		= $gear['averageItemLevel']."/".$gear['averageItemLevelEquipped'];
	        $armory_url = "http://battle.net/wow/character/$guild->realm/$this->name/simple";
	        
	        // workaround per getFaction() per monk, torna false, probabile bug nelle api, aperto ticket allo sviluppatore.
	        if(is_numeric($character->getFaction())){
	        	$faction_id = $character->getFaction();
	        }elseif(!$character->getFaction()){
	        	if($character->getFactionName() == "alliance")
	        		$faction_id  = 1;
	        	else
	        		$faction_id = 2;
	        }
			
			// Creo un array di attributi con i dati recuperati dall'armory
			$attributes = array(
				'class_id'		=>Classe::model()->findByAttributes(array('name'=>$character->getClassName()))->id,
				'race_id'		=>Race::model()->findByAttributes(array('name'=>$character->getRaceName()))->id,
				'gender_id'		=>$character->getGender(),
				'faction_id'	=>$faction_id, //$character->getFaction(),
				'guild_id'		=>$guild->id,
				'name'			=>$this->name,
				'level'			=>$character->getLevel(),
				'title'			=>$character->getCurrentTitle(),
				'item_level'	=>$gear,
				'portrait_URL'	=>$thumbnailurl,
				'armory_URL'	=>$armory_url,
				'is_main'		=>0,
						
			);
			
			$this->model->attributes = $attributes;
						
			/**
			 * Ora popolo gli array di model secondari
			 */
			$arrayOfSpecs = array();
			if(isset($spec1['spec']['name'])) {
	        	$spec1 = Spec::model()->findByAttributes(array('name'=>$spec1['spec']['name']));
	        	$arrayOfSpecs[0] = new CharacterHasSpec();
	        	$arrayOfSpecs[0]->setAttribute('spec_id', $spec1->id);
	        }
	        
			if(isset($spec2['spec']['name'])) {			// Sistemare bug mancanza build spec 'Guardian' per il dudu orso. Verificare altre mancanze.
	        	$spec2 = Spec::model()->findByAttributes(array('name'=>$spec2['spec']['name']));
	        	$arrayOfSpecs[1] = new CharacterHasSpec();
	        	$arrayOfSpecs[1]->setAttribute('spec_id', $spec2->id);
	        }
	        
	        $this->model->character_has_spec = $this->mergeModels($arrayOfSpecs, 'spec_id');
	        
		}else{
			return false;
		}// EOIF if($character->isValid()
		
	}//EOFunction getCharacter()
	
	
	
	
	
	
	
	private function mergeModels($array, $attribute){
		if(!empty($array)){
			$class = get_class($array[0]);
			$modelPrincipale = new $class;
			$arrAttributes = array();
			
			foreach ($array as $k=>$model) {
				$arrAttributes[] = $model->$attribute;
			}
			
			$modelPrincipale->$attribute = $arrAttributes;
			return $modelPrincipale;
		}
	}
	
	
	
	
	
	
	/**
	 * SETTERS
	 */
	public function setRegion($region) {
		$this->region = $region;
	}
	
	
	public function setNameRealm($name, $realm) {
		$this->name = $name;
		$this->realm = $realm;
	}
	
	
	public function setRoles($model) {
		$this->model->character_has_role = $model;
	}
	
	
	
	/**
	 * GETTERS
	 */
	public function getModel() {
		return $this->model;
	}
	
	public function isValid() {
		return $this->isValid;
	}
	
	public function getCharacterRole() {
		return $this->model->character_has_role;
	}
	
	public function getCharacterSpec() {
		return $this->model->character_has_spec;
	}
	
	
	public function saveModel() {
		return $this->model->save();
//		if($this->model->save())
//			return true;
//		else 
//			return $this->model->getErrors();
	}
	
	


	
	
	
	public function saveSubModels() {
		$attributes = array(
			'character_has_role'=>'role_id',
			'character_has_spec'=>'spec_id',
		);
		$ok = true;
		
		foreach ($attributes as $model=>$attribute) {
			$this->model->$model->character_id = $this->model->id;
			
			$attributeArray = $this->model->$model->$attribute;
			foreach ($attributeArray as $v) {
//				$this->model->$model->isNewRecord = true;
				$this->model->$model->$attribute = $v;
				if(!($this->model->$model->save() && $ok))
					$ok = false;
			}
			
			$this->model->$model->$attribute = $attributeArray;
		}
		
		return $ok;
	}
	
	
	
	

}
?>