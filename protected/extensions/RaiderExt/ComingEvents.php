<?php 
/**
 * 
 * Questo widget visualizza la lista degli ultimi eventi.
 * @author Marco Chillemi
 *
 */
class ComingEvents extends CWidget {
	
	public $numEvents;
	private $html = '';
	
	public function init() {
		$this->html.= "<div class='my-events'>";
			$this->html.= "<div class='title'><i class='icon-time'></i> ".sprintf(Yii::t('locale', 'Coming %s events'), $this->numEvents)."</div>";
		
		$events = RaiderEvents::getLastEvents($this->numEvents);
		

		if(!empty($events)) {
			
			foreach ($events as $k=>$event) {
				$isAlreadyMember = RaiderFunctions::isAlreadyMember($event->getEventModel()->id);
				
				$date = new DateTime($event->getEventModel()->event_date);
				$this->html.= "<div class='event'>";
					$this->html.= "<div class='event-title'>".$event->getRaid()->name."</div>";

					$this->html.= "<div class='event-date'>".Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($date->format('Y-m-d'), 'yyyy-mm-dd'), 'full', null )." ".Yii::t('locale', 'hour')." ".$date->format('H:i')."</div>";
					
					$this->html.= "<div class='event-links'>";	
						$this->html.= "<div class='pull-left'><a class='btn btn-mini' href='".Yii::app()->createUrl('event/show', array('id'=>$event->getEventModel()->id))."'>".Yii::t('locale', 'Show')."</a></div>";
						// stampo il pulsante di iscrizione solo se se non iscritti, altrimenti lo stampo disabled 
						if(!$isAlreadyMember) 
							$this->html.= "<div class='pull-left'><a class='btn btn-mini' href='".Yii::app()->createUrl('characterEvent/signup', array('id'=>$event->getEventModel()->id))."'>".Yii::t('locale', 'Sign up')."</a></div>";
						else 
							$this->html.= "<div class='pull-left'><a class='btn btn-mini disabled' href=''>".Yii::t('locale', 'Sign up')."</a></div>";
						$this->html.= "<div class='clearbox clearfix'></div>";
					$this->html.= "</div><!-- /event-link -->";
				
				$this->html.= '</div><!-- /event -->';
			}
			
		}else
			$this->html.= "<div class='alert alert-warning'>".Yii::t('locale', 'No events planned')."</div>";
		
		$this->html.= "</div><!-- /my_events -->";
		
		echo $this->html;
	}	
}
?>