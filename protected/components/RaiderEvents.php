<?php 
class RaiderEvents {
	
	private $event;
//	private $data;
//	public $lastEvents;

	/**
	 * Mi creo e popolo il model event con i model: 
	 * user,
	 * raid,
	 * characterEvent,
	 * character.
	 * 
	 * Praticamente in questo oggetto ho tutte le informazioni riguardanti un singolo evento,
	 * dall'id a tutti i partecipanti iscritti, disponibili e non.
	 * 
	 * getLastEvents() è un metodo statico che mi torna un array, $lastEvents, di oggetti RaiderEvents.

	 * @param Event $id
	 */
	function __construct($id = null) {
		if(isset($id))
			$this->event =  Event::model()->findByPk($id);
		else
			$this->event = new Event();


		$this->event->raidleader 	= $this->event->users;
		$this->event->raid 			= $this->event->raids;
		$this->event->charEvent 	= $this->event->characterEvents;			
		
		// se ci sono sottoscrizioni al raid, recupero i dati dei PG iscritti
		if(isset($this->event->raidleader) && isset($this->event->raid) && !empty($this->event->charEvent)) {
			$chars = array();
			foreach ($this->event->characterEvents as $k=>$model) {
				$chars[] = new RaiderCharacter($model->char_id);
			}
			$this->event->characters = $chars;			
		}
	}
	
	
	
	/**
	 * Questa funzione restituisce un array di oggetti RaiderEvents
	 * la uso per passare i valori a ext.RaiderEvents.DashBoardEvents
	 * NB: è un metodo statico.
	 *  
	 * (che verrà modificata con l'uso della tabella dashboard, 
	 * pero' posso utilizzarlo per visualizzare gli ultimi eventi, o un range di
	 * tempo, ad esempio gli ultimi 10 giorni).
	 * 
	 * @param $numEvents = numero di eventi da visualizzare sulla dashboard.
	 */
	public static function getLastEvents($numEvents = null) {
		$data = new DateTime();
		$lastEvents = array();
		
		
		if(!isset($numEvents)) {
			$eventModel = Event::model()->findAll(
												array(
													'order'=>'event_date ASC', 
													'condition'=>'event_date > :date', 
													'params'=>array(':date'=>$data->format('Y-m-d H:i:s'))
												)
			);
		} else {
			$eventModel = Event::model()->findAll(
												array(
													'order'=>'event_date ASC', 
													'condition'=>'event_date > :date', 
													'params'=>array(':date'=>$data->format('Y-m-d H:i:s')), 
													'limit'=>$numEvents,
												)
			);
		}
			
			
		
		foreach ($eventModel as $k=>$model) {
			$lastEvents[] = new self($model->id);
		}
		
		
		return $lastEvents;
	}
	
	
	
	
	
	
	// ritorna l'array degli attributi
	public function getEvent() {
		return $this->event->attributes;
	}
	
	// ritorna tutto l'oggetto CActiveRecord
	public function getEventModel() {
		return $this->event;
	}
	
	public function getRaidleader() {
		return $this->event->raidleader;
	}
	
	public function getRaid() {
		return $this->event->raid;
	}
	
	public function getCharEvent() {
		return $this->event->charEvent;
	}
	
	public function getCharacters() {
		return $this->event->characters;
	}
	
}
?>