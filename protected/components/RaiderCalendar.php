<?php 
/**
 * Deprecato, usare ext.RaiderExt.Calendar
 */
class RaiderCalendar {
	private $data;
	private $format;
	private $day;
	private $year;
	private $month;
	private $html;
	private $event;
	private $daysLabels;
	private $monthsLabels;
	private $oggi;
	private $period;
	
	
	function __construct(DateTime $data = NULL, Int $period = NULL) {
		if(empty($data)) {
			$this->data		=	$this->oggi		= new DateTime();
		}else {
			$this->data			= $data;
			$this->oggi			= new DateTime();
		}
		
		/**
		 * $period � il valore di quanti mesi precedenti e successivi all'attuale devono
		 * essere aggiunti al calendario.
		 * NB: con $period = 1 il calendario sar� di 3 mesi.
		 */
		$this->period = (empty($period))? 1 : $this->period = $period;
			
		$this->format 		= "Y-m-d";
		$this->day 			= $this->data->format('d');
		$this->month 		= $this->data->format('m');
		$this->year 		= $this->data->format('Y');
		
		$this->html 		= "";

		/**
		 * istanzio un oggetto della classe CLocale che utilizzo
		 * per ricavarmi i nomi dei mesi e dei giorni della settimana 
		 * localizzati nella lingua in uso.
		 */ 
		$locale = Yii::app()->getLocale();
		$this->daysLabels = $locale->getWeekDayNames('abbreviated');
        $this->monthsLabels = $locale->getMonthNames();

	} // EOConstruct

	
	/**
	 * 
	 * la funzione che genera il calendario.
	 * il risultato della sua esecuzione � in $this->html.
	 */
	private function init(DateTime $data = NULL ){
		if (empty($data)) {
			$data = new DateTime($this->data->format($this->format));
		}else {
			$this->day 			= $data->format('d');
			$this->month 		= $data->format('m');
			$this->year 		= $data->format('Y');			
		}
		
		/**
		 * Configuro qualche variabile utile alla costruzione del calendario.
		 * $num_days 		= numero di giorni nel mese.
		 * $first_day 		= rappresentazione numerica del primo giorno del mese (1 = lunedi, 2 = martedi, ... , 0 = domenica)
		 * 
		 * possibili aggiunte:
		 * $precedente = mktime(0, 0, 0, $m -1, 1, $y);
		 * $successivo = mktime(0, 0, 0, $m +1, 1, $y);
		 */
    	$num_days = $data->format('t');
        $firstDay = date("w",mktime(0, 0, 0, $this->month, 1, $this->year)); // RAPPRESENTAZIONE NUMERICA DEL PRIMO GIORNO DEL MESE (1 = LUNEDI, 2 = MARTEDI, 3 = MERCOLEDI...)
        if($firstDay==0) $firstDay = 7;
 
        /**
         * Costruisco la struttura html del calendario. Utilizzerà una lista non ordinata, creo
         * un ciclo uguale al numero dei giorni del mese per crearmi i nodi <li> dei giorni.
         * Userò per convenienza le var $i e $day_num per calcolarmi la label del giorno della settimana
         * e quando il giorno è domenica, poi accedo al model di event per vedere se ho eventi 
         * pianificati per il giorno ciclato.
         * Utilizzerò la variabile $class per stilizzare i nodi <li> e rappresentare a video le
         * informazioni raccolte.
         */
        $this->html.= "<div class='month' data='$this->month.$this->year'>";
        $this->html.= "<div class='calendario'><ul class='timeline'><div class='c_label'>".$this->monthsLabels[$this->month-0]."</div>";
        $i = $firstDay;
        for ($j = 1; $j <= $num_days; $j++)
        {
          //istanzio nuovo oggetto Event
          $this->event = new Event();
		  //se $i � maggiore di 6 la resetto a 0, infatti 0 = domenica, 1 = lunedi, 2 = martedi, ecc
          ($i <= (count($this->daysLabels)-1))? null : $i = 0;
          $day_num = (strlen($j) == 1) ? "0".$j : $j;
          // controllo se il giorno � domenica (indice = 0)
          $giorno = ($i == 0) ? "<span class='domenica'>".$this->daysLabels[$i]."</span>" : $this->daysLabels[$i] ; 
          $class = "";
 
          $dayX = new DateTime("$this->year-$this->month-$j");
          $date_selected = $this->data->format("Y-m-d");
          
          $this->event = $this->event->model()->findAll('event_date like :event_date', array(':event_date'=>$dayX->format($this->format).'%'));
          
          /**
           *  Controllo se ho model con eventi per questo giorno,
           *  se $this->event non � vuoto...
           */
          if (!empty($this->event)) 
          {
          	/**
          	 * ...mi ciclo l'array di model $this->event
          	 * se ho eventi pianificati per questo giorno configuro la var $class
          	 * controllo anche se sono di tipo eroico, eventualmente lo siano configuro
          	 * ancora la var $class.
          	 */
			foreach ($this->event as $model) {
          		$rs_data = DateTime::createFromFormat($this->format." H:i:s", $model->event_date);
          		if($rs_data->format($this->format) == $dayX->format($this->format)){
          			$class.= "event ";
          			$raid = Raid::model()->findByPk($model->raid_id);
          			if(!empty($raid)) {
          				if($raid->is_heroic)
          					$class.= "heroic ";
          			}
          		}
          		
          	}
          }
          /**
           * controllo se il giorno è passato, oggi, o futuro
           * e mi imposto la classe per l'<li>.
           * Per farlo ho bisogno di 2 oggetti DateTime con le date arrotondate
           * al formato Y-d-m, cioè $this->format, altrimenti il calcolo se il giorno
           * è nel passato o nel futuro potrebbe tornare numeri decimali.
           */ 
          $paragon1 = new DateTime($dayX->format($this->format));
          $paragon2 = new DateTime($this->oggi->format($this->format));
          $interval = $paragon1->diff($paragon2);
          
          if($interval->format('%R%a') == 0) {
          	$class.= 'today ';
          }elseif($interval->format('%R%a') < 0) {
          	$class.= 'future ';
          }else{
          	$class.= 'past ';
          }
          
          /**
           * Controllo che il giorno corrente non sia il giorno che è stato selezionato (cliccato).
           * N.B. se non vengono passati valori al costruttore date_selected è oggi.
           */
          if ($dayX->format($this->format) == $date_selected) $class.= "date_selected ";
          
          /**
           * Preparo il link da assegnare ad ogni giorno del mese.
           * Es: ...<a href='$link'>".$day_num."</a>...
           * 
           * NB: creo i link alla pagina di creazione degli eventi soltanto se l'utente è admin e/o raidleader
           * e il giorno non è passato.
           */
          if(!empty($this->event)){
          	$link = '<a href="'.Yii::app()->controller->createUrl('/event/viewDay', array('day'=>$dayX->format($this->format))).'" >'.$day_num.'</a>';
          }elseif(RaiderFunctions::isAdmin() || RaiderFunctions::isRaidleader() && $interval->format('%R%a') <= 0) {
			$link = '<a href="'.Yii::app()->controller->createUrl('/event/create', array('data'=>$dayX->format($this->format))).'" >'.$day_num.'</a>';          	
          }else{
          	$link = $day_num;
          }
          
          /**
           * Costruisco l'html per l'<li> del giorno.
           */
          $this->html.= "<li class='giorno $class' data=".$dayX->format($this->format)."><div class='raid_icon'></div><div class='lettera half'>".$giorno."</div><div class='divisore'></div><div class='numero half'>".$link."</div></li>";
          
          $class = "";
          $i++;
        }
        $this->html.= "<div class='clearbox'></div>";            
        $this->html.= "</ul><!-- /timeline -->";            
        
        $this->html.= "<div class='clearbox'></div>";
        $this->html.= "</div><!-- /calendario -->";       
        $this->html.= "</div><!-- /month-->";        
	}
	
    
	
	
	public function getHtmlCalendar() 
    {
    	$this->init();
        return $this->html;
    } // EOFunction generateCalendarHTML()

    
    /**
     * Recupera tutti i mesi richiesti con $period
     * Es: se $period = 1 recupero 3 mesi, 
     * se siamo a febbraio recuperer� anche gennaio e marzo.
     * 
     * N.B. Da valutarne reale utilit� e funzionamento, 
     * al momento sembra lavorare bene solo con $period = 1.
     * Sarebbe pi� utile piuttosto una funzione che genera un calendario completo
     * di tutto l'anno? ad esempio tutto il 2013 da gennario a dicembre.
     */
    public function getFullHtmlCalendar()
    {
    	$data = new DateTime($this->data->format($this->format)); 
    	for ($i=-$this->period; $i<$this->period+1; $i++) {
			$interval = new DateInterval('P'.abs($i).'M');
			($i < 0)? $data->sub($interval) : $data->add($interval);
			if($i == 0) $data->add(new DateInterval('P1M'));
			$this->init($data);
    	}
    	
    	return $this->html;
    }
    
    
    
    
    public function getDate() {
    	return $this->data;
    }
    
    public function setDate(DateTime $data) {
    	$this->data = $data;
    }
    
    
    
    public function getFormat(){
    	return $this->format;
    }
    
} //EOClass RaiderCalendar



?>