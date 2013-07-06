<?php 
class RaiderActiveRecord extends CActiveRecord {
	
	/**
	 * Variabili utilizzate in RaiderEvents per fornire informazioni sugli evento/i pianificato/i.
	 * Es: visualizzazione del raid, lista ultimi 5 eventi, info sulla dashboard, ecc... 
	 */
	public $raidleader;
	public $raid;
	public $characters;
	public $charEvent;
	
	/**
	 * Variabili utilizzate in RaiderArmory per fornire informazioni sul character.
	 */
	public $character_has_role;
	public $character_has_spec;
	
	/**
	 * variabile img utilizzata nei model raid e user, per l'upload delle img
	 */
	public $img;
	
	/**
	 * variabile eventType utilizzata per riconoscere il tipo di evento
	 */
	public $eventType;
	
	

	/**
	 * Customizzo il metodo beforeSave() per effettuare
	 * il salvataggio dell'immagine e crearne i thumbnails.
	 * @see CActiveRecord::beforeSave()
	 */
	public function beforeSave(){
//		var_dump($this->img, gettype($this->img), $this->img && gettype($this->img) == 'object' && get_class($this->img) == 'CUploadedFile');exit;
		if($this->img && gettype($this->img) == 'object' && get_class($this->img) == 'CUploadedFile') {

			// creo la cartella se non esiste ancora.
			if (!is_dir(RaiderFunctions::getImagesFolderPath($this)))
				mkdir(RaiderFunctions::getImagesFolderPath($this)); 
			
			// se l'img viene salvata correttamente, creo i thumbnails	
			if ($this->img->saveAs(RaiderFunctions::getImagesFolderPath($this).'\\'.$this->img->name)) {
				/**
				 * creo i thumbnails con phpThumb.
				 * - thumb dim: 640x360px per i raid in dashboard,
				 * - thumb dim: 30x30px per i raid info nei popover,
				 * 
				 * - thumb dim: 30x30 per i portrait del raid leader in dashboard,
				 * - thumb dim  50x50 per i portrait dell'utente nella sidebar
				 */ 
				
				if(get_class($this) == 'Raid') {
					RaiderFunctions::thumbGen(
						640,
						360,
						RaiderFunctions::getImagesFolderPath($this).'\\'.$this->img->name
					);					
					RaiderFunctions::thumbGen(
						30,
						30,
						RaiderFunctions::getImagesFolderPath($this).'\\'.$this->img->name
					);
				}elseif(get_class($this) == 'User') {
					RaiderFunctions::thumbGen(
						30,
						30,
						RaiderFunctions::getImagesFolderPath($this).'\\'.$this->img->name
					);

					RaiderFunctions::thumbGen(
						50,
						50,
						RaiderFunctions::getImagesFolderPath($this).'\\'.$this->img->name 
					);							
				}
					
			}
			
			// forzo la ripubblicazione degli assets (tutta la cartella images)
			Yii::app()->getAssetManager()->publish(RaiderFunctions::getImagesFolderPath(), false, -1, true);
		}
		
		return parent::beforeSave();		
	}
	
	
	/**
	 * Gestisco qualsiasi tipo di evento qui,
	 * così evito di dover creare 2 funzioni per ogni model 
	 * che genera eventi.
	 */
    public function addEvent($model) {
        $event = new RaiderModelEvent();
        $event->model = $model;
        $this->onNewEvent($event);

        return $event->isValid;
    }
    public function onNewEvent($event) {
        $this->raiseEvent('onNewEvent', $event);
    }
    	
} 
?>
