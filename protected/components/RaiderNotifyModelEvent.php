<?php
class RaiderNotifyModelEvent {
	
	
	
	
	
	
	public function notify($event) {
		$model = $event->model;
		Yii::log("\n\n\n" . 'E\' stato avviato un nuovo evento di tipo: ' . ($model->eventType), CLogger::LEVEL_INFO);
	}
	
	
} 
?>