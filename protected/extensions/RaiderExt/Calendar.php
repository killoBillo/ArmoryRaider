<?php
/**
 * Questo widget genera il calendario.
 * @author Marco Chillemi
 */
class Calendar extends CWidget {
	
	public $date;
	public $template; 			// squared o linear, default = squared
	public $emptyDays;			// se emptyDays è true non vengono visualizzati gli ultimi giorni del mese precedente e i primi del successivo

	private $format;			// formato data 'Y-m-d' usato per i calcoli interni al calendario.		
	private $today;				// contiene la data di oggi in formato DateTime
	private $day;				// contiene il giorno della data selezionata (numerico) 
	private $month;				// contiene il mese della data selezionata (numerico)
	private $year;				// contiene l'anno della data selezionata
	private $numDays;			// numero dei giorni del mese (es: marzo 31)
	private $firstDay;			// rappresentazione numerica del primo giorno del mese (0 = Domenica, 1 = Lunedi, ...)
	
	private $daysLabels;		// utilizzato per memorizzare le label dei nomi dei giorni proviene da CLocale.
	private $monthsLabels;		// utilizzato per memorizzare le label dei mesi dell'anno proviene da CLocale.
	
	private $prevMonth;			// DateTime obj.
	private $nextMonth;			// DateTime obj.
	private $prevMonthLink;		// utilizzato per linkare al mese precedente.
	private $nextMonthLink;		// utilizzato per linkare al mese successivo.
	private $prevMonthLabel;	// la label per il link.
	private $nextMonthLabel;	// la label per il link.
	
	private $weekDay;			// inizialmente imposto $weekDay = $firstDay e poi la utilizzo per calcolare lo scorrere dei giorni.
	private $event;				// contiene l'array di model degli eventi.
	private $dayX;				// tiene traccia del giorno che stiamo ciclando.
	private $selected;			// contiene la data del giorno selezionato, se ne è stato selezionato uno.

	private $class;				// utilizzato per assegnare la classe al giorno (es: 'today', 'prev-month-day', 'next-month-day'). 
	private $labelDay;			// utilizzato per stampare la label del giorno nell'html.	
	private $labelNum;			// utilizzato per stampare la label del numero del giorno nell'html.
	private $link;				// l'href del link del giorno, generato dal metodo $this->getLinkHref().
	private $html;				// utilizzato come contenitore di tutto l'html che viene visualizzato a video.
	

		
	public function init() {
		$this->date 	= new DateTime($this->date);
		$this->today 	= new DateTime();
		$this->html 	= '';
		
		if(!isset($this->template))
			$this->template = 'squared'; 
		
		if(!isset($this->emptyDays))
			$this->emptyDays = false;
		
		$this->day 		= intval($this->date->format('d'));
		$this->month 	= intval($this->date->format('m'));
		$this->year 	= intval($this->date->format('Y'));
		$this->numDays	= $this->date->format('t');  	// Number of days in the given month, 28 through 31
		$this->firstDay = date("w",mktime(0, 0, 0, $this->month, 1, $this->year)); // RAPPRESENTAZIONE NUMERICA DEL PRIMO GIORNO DEL MESE (1 = LUNEDI, 2 = MARTEDI, 3 = MERCOLEDI...)
		$this->format 	= 'Y-m-d';
		
		/**
		 * istanzio un oggetto della classe CLocale che utilizzo
		 * per ricavarmi i nomi dei mesi e dei giorni della settimana 
		 * localizzati nella lingua in uso.
		 */ 
		$locale = Yii::app()->getLocale();
		$this->daysLabels = $locale->getWeekDayNames('abbreviated');
        $this->monthsLabels = $locale->getMonthNames();
        
        
        /**
         * Istanzio le variabili per gestire i link al mese precedente e successivo
         */
		$this->prevMonth 	 = new DateTime(date($this->format, mktime(0,0,0, $this->month -1, 1, $this->year)));
		$this->nextMonth 	 = new DateTime(date($this->format, mktime(0,0,0, $this->month +1, 1, $this->year)));
		$this->prevMonthLink = CHtml::encode(Yii::app()->controller->createUrl('/site/index', array('date'=>$this->prevMonth->format($this->format))));
		$this->nextMonthLink = CHtml::encode(Yii::app()->controller->createUrl('/site/index', array('date'=>$this->nextMonth->format($this->format))));
		$this->prevMonthLabel = $this->monthsLabels[intval($this->prevMonth->format('m'))]." ".$this->prevMonth->format('Y');
		$this->nextMonthLabel = $this->monthsLabels[intval($this->nextMonth->format('m'))]." ".$this->nextMonth->format('Y');       
		
        
		// controllo se è stato selezionato un giorno(e se non mi trovo sul controller site e sull'action index), in tal caso inizializzo la var $this->selected.
		if(isset($_GET['date'])) 
			$this->selected = new DateTime($_GET['date']);
		elseif(isset($_GET['day']))
			$this->selected = new DateTime($_GET['day']);

			
        
		// Controllo che tipo di template è stato richiesto per il calendario.
		if($this->template == 'squared') {
			$this->getSquaredCalendar();
		}elseif($this->template == 'linear') {
			$this->getLinearCalendar(); // da implementare.
		}
		
		
		echo $this->html;
    }
	
	
	
	
	
	private function getSquaredCalendar() {
		$this->html.= "<div id='main-calendar' class='calendario squared lite-shadow'>";
			
			// tools per la selezione di altre date.
			$this->html.= "<div class='calendar-tools'>";
				$this->html.= "<div class='choose-date pull-left btn-groupd'>";
				$this->html.= CHtml::beginForm(array('site/index'), 'get', array('id'=>'choose-date-form', 'class'=>'form-inline'));
					$this->html.= '<input id="input-date" class="hide" size="7" type="text" value="'.$this->year.'-'.$this->month.'" readonly="" name="date">';
					$this->html.= CHtml::submitButton(
										Yii::t('locale','Go'),
										array(
											'id'=>'date-submit',
											'name'=>null,
											'class'=>'hide'
										)
									); 				
				$this->html.= CHtml::endForm();
				$this->html.= '<a href="#" class="btn small" id="dpMonths" data-date="'.$this->year.'-'.$this->month.'" data-date-format="yyyy-mm" data-date-viewmode="years" data-date-minviewmode="months"><i class="icon-calendar"></i> '.Yii::t('locale', 'Select date').'</a>';
				$this->html.= "</div><!-- choose-date -->";
				
				$this->html.= "<div class='nav-calendar pull-right btn-group'>";
					$this->html.= "<a class='btn prev-month float-left' href='".$this->prevMonthLink."'>".$this->prevMonthLabel."</a>";
					$this->html.= "<a class='btn next-month float-right' href='".$this->nextMonthLink."'>".$this->nextMonthLabel."</a>";
				$this->html.= "</div><!-- /nav-calendar -->";			
				
				$this->html.="<div class='clearbox clearfix'></div>";				
			$this->html.= "</div><!-- /calendar-tools -->";
			
			$this->html.= "<div class='viewport-calendario'>";
				$this->html.= $this->getHtmlCalendarHeader();
				$this->html.= "<ul class='mese'>";
			
			/**
			 * se il mese non inizia dal lunedi 
			 * allora visualizzo anche gli ultimi giorni del mese precedente.
			 */ 
			if($this->firstDay != 1) {
				$this->getPrevMonthLastDays();
			}
			
			// Inizializzo $this->weekDay.
			$this->weekDay 	= $this->firstDay;
						
			for ($i = 1; $i <= $this->numDays; $i++) {
				// calcolo la data del giorno che viene ciclato.
				$this->dayX = new DateTime("$this->year-$this->month-$i");
				// verifico se la data passata è oggi.
				$isToday = ($this->dayX->format('Y-m-d') == $this->today->format('Y-m-d')) ? true : false ;
				// recupero gli eventi (o l'evento) del giorno.
				$this->event = $this->getEvents();
				// preparo i link
				$this->link = $this->getLinkHref();
				
				// calcolo la label del giorno (nome del giorno della settimana o "oggi") e la classe da assegnare all'<li>
				if($isToday){
					$this->labelDay = Yii::t('locale', 'today');
					$this->class = 'today ';
				}else{
					$this->labelDay = $this->daysLabels[$this->weekDay];
					$this->class = '';
				}
				
				// controllo se oggi è domenica per gestire la classe.
				if($this->weekDay == 0)
					$this->class.='sunday ';
					
				/*
				 * controllo se è stato selezionato un giorno
				 * e se il giorno che sto ciclando è il giorno selezionato
				 * assegno la classe "selected".
				 */
				if(isset($this->selected)) {
					if($this->dayX->format('Y-m-d') == $this->selected->format('Y-m-d'))
						$this->class.='selected ';
				}
				
				// imposto la label del numero del giorno
				$this->labelNum = $this->dayX->format('d');
				
				// se è lunedi mando a capo i giorni
				if($this->weekDay == 1)
					$this->html.= "<li class='clearbox clearfix'></li>";
					
				// recupero l'html del giorno
				$this->html.= $this->getHtmlDay();
				
				/**
				 *  se weekDay ha superato il 6 (sabato) lo resetto a 0 (domenica)
				 *  altrimenti lo incremento di 1.
				 */
				$this->weekDay = ($this->weekDay >= 6) ? 0 : $this->weekDay+1;
			}
			
			/**
			 * se il mese non finisce con domenica 
			 * allora visualizzo anche i primi giorni del mese successivo.
			 */ 
			if($this->weekDay != 1) {
				$this->getNextMonthFirstDays();
			}

			
				$this->html.= "</ul>";
				$this->html.= "<div class='clearbox clearfix'></div>";
			$this->html.= "</div><!-- /viewport-calendario -->";	

			$this->html.= "<div class='close-calendar'>".Yii::t('locale','hide calendar')." <i class='icon-eye-close'></i></div>";
		$this->html.= "</div>";
		
		$this->html.= "<div class='show-calendar hide float-right'><i class='icon-eye-open'></i> ".Yii::t('locale','show calendar')."</div>";
		$this->html.= "<div class='clearbox clearfix'></div>";
	}
	
	
	
	
	
	
	
	
	
	
	/**
	 * Questa funzione si occupa di stampare i giorni precedenti all'inizio del mese
	 * cioè gli ultimi giorni del mese precedente.
	 */
	private function getPrevMonthLastDays() {
		/**
		 * creo un DateTime e lo valorizzo passando solamente anno e mese, 
		 * in modo da non incorrere nel bug dei mesi con 31 giorni, 
		 * infatti se chiedo il mese precedente al 31 marzo, 
		 * non esistendo il 31 febbraio mi torna come data il 2 marzo.
		 */ 
		$date = new DateTime($this->date->format('Y-m'));

		// sottraggo 1 mese alla data;
		$prevMonth = $date->sub(new DateInterval('P1M'));		
		
		// calcolo quanti giorni ha il nuovo mese
		$numDays  = $prevMonth->format('t');
		
		// calcolo quanti giorni del mese precedente devo visualizzare
		$daysToRecover = ($this->firstDay == 0) ? 6 : $this->firstDay-1; 
		
		/**
		 * imposto una variabile a 1 e la incremento durante il ciclo 
		 * per recuperare le label dei giorni della settimana.
		 */ 
		$this->weekDay = 1;
		
		/**
		 * imposto la classe, se $this->emptyDays è true, nascondo i box
		 * assegnando la classe "invisible".
		 */
		if($this->emptyDays)  
			$this->class = 'prev-month-day invisible ';
		else 
			$this->class = 'prev-month-day ';
			
		 
		for ($i = $numDays-$daysToRecover+1; $i <= $numDays; $i++) {
			// calcolo la data del giorno che viene ciclato
			$this->dayX = new DateTime($prevMonth->format('Y')."-".$prevMonth->format('m')."-".$i);
			
			// imposto le label
			$this->labelDay = $this->daysLabels[$this->weekDay];
			$this->labelNum = $i;
			
			// recupero l'html
			$this->html.= $this->getHtmlDay();
			
			// incremento il giorno
			$this->weekDay++;
		}
	}
	
	
	
	
	
	
	
	
	
	/**
	 * Questa funzione si occupa di generare il codice dei primi giorni del 
	 * mese successivo, se il mese non finisce di domenica.
	 */
	private function getNextMonthFirstDays() {
		/**
		 * creo un DateTime e lo valorizzo passando solamente anno e mese, 
		 * in modo da non incorrere nel bug dei mesi con 31 giorni, 
		 * infatti se chiedo il mese precedente al 31 marzo, 
		 * non esistendo il 31 febbraio mi torna come data il 2 marzo.
		 */ 
		$date = new DateTime($this->date->format('Y-m'));

		// aggiungo 1 mese alla data;
		$nextMonth = $date->add(new DateInterval('P1M'));	

		// calcolo quanti giorni ha il nuovo mese
		$numDays  = $nextMonth->format('t');
		
		// calcolo quanti giorni del mese precedente devo visualizzare
		$daysToRecover = 7 - $this->weekDay+1; 
		
		// imposto la classe;
		/**
		 * imposto la classe, se $this->emptyDays � true, nascondo i box 
		 * assegnando la classe "invisible".
		 */
		if($this->emptyDays)  
			$this->class = 'next-month-day invisible ';
		else 
			$this->class = 'next-month-day ';		
		

		for ($i = 1; $i <= $daysToRecover; $i++) {
			// calcolo la data del giorno che viene ciclato
			$this->dayX = new DateTime($nextMonth->format('Y')."-".$nextMonth->format('m')."-".$i);
			
			// imposto le label
			$this->labelDay = $this->daysLabels[$this->weekDay];
			$this->labelNum = $i;
			
			// recupero l'html
			$this->html.= $this->getHtmlDay();			
			
			/**
			 *  se weekDay ha superato il 6 (sabato) lo resetto a 0 (domenica)
			 *  altrimenti lo incremento di 1.
			 */
			$this->weekDay = ($this->weekDay >= 6) ? 0 : $this->weekDay+1;
		}
	}
	
	
	
	
	
	
	
	
	
	/**
	 * Con questa funzione recupero i model Event del giorno
	 */
	private function getEvents() {
		return Event::model()->findAll('event_date like :event_date', array(':event_date'=>$this->dayX->format($this->format).'%'));
	}
	
	
	
	
	/**
	 * Questa funzione mi restituisce l'html da inserire nel div ".event-icons".
	 */
	private function getHtmlIcons() {
		$html = '';
		$isHeroic = false;
		$isNormal = false;
		$numEvents = 0;
		
	
		if(!empty($this->event)) {
			
			foreach ($this->event as $k=>$model) {
				$numEvents++;
				$raid = Raid::model()->findByPk($model->raid_id);

				if(!empty($raid)) {
					if($raid->is_heroic)
						$isHeroic = true;
					else
						$isNormal = true;
				}
				
			}
			
		} 
		
		// stampo le icone delle "coroncine"
		if($isHeroic)
			$html.= "<span class='event-icon heroic float-left'></span>";
		
		if($isNormal)
			$html.= "<span class='event-icon  normal float-left'></span>";

			
		// stampo le icone di notifica ed il contenuto del popover (tooltip)	
		if($numEvents) {
			$html.= "<span class='notify-icon '>$numEvents";
				$html.= "<div class='popover-content'>";
					$html.= $this->getPopoverHtmlContent();
				$html.= "</div><!-- /popover-content -->";
			$html.= "</span><!-- /notify-icon -->";
		}
		
		return $html.= "<span class='clearbox clearfix'></span>";		
	}
	
	
	
	
	
	
	/**
	 * Stampo il contenuto dei popover
	 */
	private function getPopoverHtmlContent() {
		
		$html = '<ul class="popover-notifier">';
		
		foreach ($this->event as $k=>$event) {
			$raiderEvent = new RaiderEvents($event->id);
			$assetsUrl = Yii::app()->getAssetManager()->getPublishedUrl(RaiderFunctions::getImagesFolderPath());
			$raidName = $raiderEvent->getRaid()->name;
			$raidImg = $raiderEvent->getRaid()->img;
			$raidImgFolder	= $raiderEvent->getRaid()->id;      //strtolower(preg_replace('/[\s]+/','_',$raidName));
			$imgUrl = $assetsUrl.'/raid/'.$raidImgFolder.'/thumb30x30-'.$raidImg;
			$raidHour = new DateTime($raiderEvent->getEventModel()->event_date);
			$raidLeader = $raiderEvent->getRaidleader()->username;			
			
			$html.= "<li class='popover-row'>";
				$html.= "<div class='raid-name'>$raidName</div>";
				$html.= "<div class='clearbox clearfix'></div>";
				$html.= "<div class='pull-left'>".CHtml::image($imgUrl, 'image of '.$raidName, array('height'=>30, 'width'=>30))."</div>";
				$html.= "<div class='pull-left popover-raidinfo'>";
					$html.= "<div class='raidleader-name'>Raidleader: $raidLeader</div>";
					$html.= "<div class='raid-time'>".Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($this->dayX->format('Y-m-d'), 'yyyy-mm-dd'), 'long', null ).' '.Yii::t('locale', 'hour')." ".$raidHour->format('H:i')."</div>";
				$html.= "</div>";
				
				$html.= "<div class='clearbox clearfix'></div>";
			$html.= "</li><!-- /popover-row -->";
			
			if(!$k&1 && $k+1!=count($this->event))
				$html.= "<li class='divider'></li>";
		}
		
		$html.= "</ul>";
			
		return $html;
	}
	
	
	
	
	/**
	 * Con questa funzione recupero il link href
	 * da passare al "quadrato" del giorno.
	 */	
	private function getLinkHref() {
	      /**
           * Preparo il link da assegnare ad ogni giorno del mese.
           * NB: creo i link alla pagina di creazione degli eventi soltanto se l'utente � admin e/o raidleader
           * e il giorno non � passato
           */
 		  $interval = $this->dayX->diff($this->today);		
		  
 		  /**
 		   *  notare l'encode del link tramite CHtml::encode() altrimenti il carattere & (di &date)
 		   *  non viene accettato dallo standard XHML, quindi con l'encode lo sostituisco con 
 		   *  l'html entity &amp;
 		   */
          if(!empty($this->event)){
          	$link = "href='".CHtml::encode(Yii::app()->controller->createUrl('/event/viewDay', array('date'=>$this->dayX->format($this->format))))."'";
          }elseif(RaiderFunctions::isAdmin() || RaiderFunctions::isRaidleader() && $interval->format('%R%a') <= 0) {
			$link = "href='".CHtml::encode(Yii::app()->controller->createUrl('/event/create', array('date'=>$this->dayX->format($this->format))))."'";          	
          }else{
          	$link = '';
          }

          return $link;
	}
	
	
	
	
	
	
	
	
	/**
	 * Con questa funzione genero l'html di ogni singolo "quadrato/giorno".
	 */
	private function getHtmlDay() {
		$html ="<li class='giorno span2 shadow $this->class' data-date='".$this->dayX->format($this->format)."'>";
			$html.= "<a $this->link>";
				$html.= "<span class='day-label'>".$this->labelDay."</span>";
				$html.= "<span class='num-label'>".$this->labelNum."</span>";
				$html.= "<span class='event-icons'>".$this->getHtmlIcons()."</span>";
			$html.= "</a>";
		$html.="</li>";	

		return $html;
	}
	
	
	
	
	
	/**
	 * Ritorna la lista html di tutti i mesi dell'anno localizzati nella lingua corrente
	 */
	private function getFullHtmlMonthsList() {
		$html = "<ul>";
		foreach ($this->monthsLabels as $k=>$month) {
			$html.= "<li>$month</li>";
		}
		$html.= "</ul>";
		
		return $html;
	}
	
	

	
	/**
	 * Ritorna la lista html degli ultimi 11 anni, 5 precedenti e 5 successivi a quello selezionato
	 */
	private function getFullHtmlYearsList() {
		$html = "<ul>";
		for ($i = -5; $i <= 5; $i++) {
			$year = date('Y', mktime(0,0,0, $this->month, 1, $this->year + $i));
	    	$html.= "<li>$year</li>";
		}
		$html.= "</ul>";
		
		return $html;
	}	
	
	
	
	
	private function getHtmlCalendarHeader() {
		$html = "<div class='month'>";
			$html.= "<h2><small>".$this->year." </small>".$this->monthsLabels[$this->month]."</h2>";
//			$html.= "<h5>".$this->monthsLabels[$this->month]." ".$this->year."</h5>";
//			$html.= "<h4>".$this->year."</h4>";
		$html.= "</div>";
		
//		$html.= "<div class='nav-calendar float-right'>";
//			$html.= "<a class='prev-month float-left' href='".$this->prevMonthLink."'>".$this->prevMonthLabel."</a>";
//			$html.= "<a class='next-month float-right' href='".$this->nextMonthLink."'>".$this->nextMonthLabel."</a>";
//		$html.= "</div>";			
//		
//		$html.="<div class='clearbox clearfix'></div>";

		return $html;
	}
}
?>