<?php
/**
 * 
 * Questo widget visualizza a video gli ultimi eventi sulla dashboard.
 * @author Marco Chillemi
 *
 */
class DashboardEvents extends CWidget {
	
	public $events;
	public $size = 'mini';					// [mini | normal | full] grandezza e numero dettagli, 'mini' di default, usata nella homepage dashboard
	
	private $html = '';
	private $params = array();
	
//	private $_assetsUrl;
	
	/**
	 * $this->events mi arriva dalla vista.
	 */
	public function init() {
		foreach ($this->events as $k=>$model) {
			// Recupero i model di event, raidleader, raid e characters
			$event 							= $model->getEvent();
			$raidleader 					= $model->getRaidleader();
			$raid 							= $model->getRaid();
			$this->params['charEvent']		= $model->getCharEvent();
			$this->params['characters']		= $model->getCharacters();
			
			/**
			 * Init variabili varie
			 */
			//var di stile, pari o dispari ?! :)
			$this->params['class ']			= $k&1 ? 'odd' : 'even';
			
			//event
			$this->params['id'] 			= $event['id'];
			$this->params['event_dateTime']	= new DateTime($event['event_date']);
			$this->params['event_date']		= Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($this->params['event_dateTime']->format('Y-m-d'), 'yyyy-MM-dd'), 'full', null );
			$this->params['event_hour']		= $this->params['event_dateTime']->format('H:i');
			$this->params['creation_date']	= new DateTime($event['creation_date']);
			$this->params['event_crDate']	= Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($this->params['creation_date']->format('Y-m-d'), 'yyyy-MM-dd'), 'full', null ); 
			$this->params['description']	= $event['description'];
			
			//raidleader info
			$this->params['username']		= $raidleader['username'];
			$this->params['name'] 			= $raidleader['name'];
			$this->params['surname']		= $raidleader['surname'];
			$this->params['userGuildRole']	= Guildrole::model()->findByPk($raidleader->profile->guildrole_id)->label;
			$this->params['userImgSize'] 	= array('height'=>30, 'width'=>30);
			$this->params['userImgFolder']	= $raidleader['id'];  //strtolower(preg_replace('/[\s]+/','_',$raidleader['username']));
			$this->params['portrait'] 		= ($raidleader['portrait_URL']) ? $this->params['userImgFolder'].'/thumb50x50-'.$raidleader['portrait_URL'] : 'thumb50x50-unknown.jpg';
            //raidleader mobile
            $this->params['userImgSize-mobile'] = array('height'=>64, 'width'=>64);
            $this->params['portrait-mobile']    = ($raidleader['portrait_URL']) ? $this->params['userImgFolder'].'/thumb64x64-'.$raidleader['portrait_URL'] : 'thumb64x64-unknown.jpg';

			//raid info
			$this->params['raidid']			= $raid['id'];
			$this->params['raidImg']		= $raid['img'];
			$this->params['raidName']		= $raid['name'];
			$this->params['playerNum']		= $raid['number_of_players'];
			$this->params['raidLevel']		= $raid['level'];
			$this->params['raidColor']		= !empty($raid['color'])? $raid['color'] : 'orange';
			$this->params['raidType']		= !empty($raid['type'])? $raid['type'] : 'Normal';
			$this->params['isHeroic']		= $raid['is_heroic'];
			$this->params['raidImgFolder']	= $raid['id']; //strtolower(preg_replace('/[\s]+/','_',$raid['name']));
			$this->params['raidIcon'] 		= $this->params['isHeroic'] ? 'eroic-icon' : 'normal-icon';
			$this->params['raidDescription']= $raid->description;
			$this->params['members']		= count($this->params['charEvent']).' / '.$this->params['playerNum'];
            $this->params['raidImgSize']    = array('height'=>360, 'width'=>640);
            //raid mobile
            $this->params['raidImgSize-mobile']     = array('height'=>200, 'width'=>100);
            $this->params['raidImg-mobile']         = 'thumb200x100-' . $this->params['raidImg'];

			// calcolo gli utenti iscritti disponibili e non disponibili
			$this->params['available'] 		= 0;
			$this->params['unavailable'] 	= 0;
			foreach ($this->params['charEvent'] as $k1=>$model) {
				if($model->available_flag)
					$this->params['available']++;
				else
					$this->params['unavailable']++;
			}

			// verifico se l'utente è già iscritto al raid con uno dei suoi PG, se si, non gli do la possibilità di iscriversi
			$this->params['isAlreadyMember']= RaiderFunctions::isAlreadyMember($this->params['id']);
			
			// cartella dove sono pubblicati gli assets (Es: "/armoryraider/assets/64fec5e5"), forzo la ripubblicazione degli assets
			$this->params['assetsUrl'] 		= Yii::app()->getAssetManager()->getPublishedUrl(RaiderFunctions::getImagesFolderPath());
			
			/**
			 * Costruisco l'html da visualizzare
			 */
			switch ($this->size) {
				case 'mini':
					$this->getMiniBoxHtml($k);
					break;
				case 'normal':
					$this->getNormalBoxHtml();
					break;
				case 'full':
					$this->getFullBoxHtml();
					break;
                case 'mobile':
                    $this->getMobileMiniBoxHtml();
                    break;
			}
			
			
			
		}   	

		echo $this->html;
    }
    
    
    
    
    /**
     * Questa funzione genera l'html se $this->size == 'mini'
     * HomePage box
     */
    private function getMiniBoxHtml($k) {
        $text = ($this->params['description']) ? $this->params['description'] : $this->params['raidDescription'];
        $this->params['userImgSize']['class'] = 'img-polaroid';

        if($this->params['class ']== 'even')
            $this->html.= "<div class='row-fluid'>";

        $this->html.= "<div class='dashboard-box-mini lite-shadow span6'>";

            $this->html.= "<div class='dashboard-box-mini-header'>";
                $this->html.= "<div class='pull-left'>";
                    $this->html.= CHtml::image($this->params['assetsUrl'].'/user/'.$this->params['portrait'], 'portrait of '.$this->params['username'], $this->params['userImgSize']);
                $this->html.= "</div>";

                $this->html.= "<div class='pull-left post-autor '>";
                    $this->html.= "<div class='dashboard-box-mini-raidleader'>".$this->params['username']."</div>";		//." [ ".$this->params['userGuildRole']." ]</div>";
                    $this->html.= "<div class='dashboard-box-mini-label event-date'><span class='muted'>".Yii::t('locale', 'has created a new event')."</span></div>";
                $this->html.= "</div>";

                $this->html.= "<div class='clearbox clearfix'></div>";
            $this->html.= "</div><!-- /dashboard-box-header -->";

            $this->html.= "<div class='dashboard-box-mini-content'>";
                $this->html.= "<div class='pos-relative'>";
                    $this->html.= "<a href='".Yii::app()->createUrl('event/show', array('id'=>$this->params['id']))."'>" . CHtml::image($this->params['assetsUrl'].'/raid/'.$this->params['raidImgFolder'].'/thumb640x360-'.$this->params['raidImg'], 'image of '.$this->params['raidName'].' raid') . "</a>";
                    if(!empty($text)) $this->html.= "<div class='dashboard-box-mini-text'><i class='icon-comment'></i> $text</div>";
                $this->html.= "</div>";
            $this->html.= "</div>";

            $this->html.= "<div class='dashboard-box-mini-footer'>";
                $this->html.= "<div class='pull-left raid-info'>".$this->params['raidName']." <span class='label label-warning normal-weight'>".$this->params['raidType']."</span><br><small class='muted event-date'>".$this->params['event_date']." ".Yii::t('locale', 'hour')." ".$this->params['event_hour']."</small></div>";
//                $this->html.= "<div class='pull-right'><a class='btn btn-link' href='".Yii::app()->createUrl('event/show', array('id'=>$this->params['id']))."'>".Yii::t('locale', 'Show')."</a></div>";

                $this->html.= "<div class='clearbox clearfix'></div>";
            $this->html.= "</div>";

        $this->html.= "</div><!-- /lite-shadow -->";

        if($this->params['class ']== 'odd' || $k+1 == count($this->events))
            $this->html.= "</div><!-- /row-fluid -->";
	}
	
	
	
    /**
     * Questa funzione genera l'html se $this->size == 'normal'
     */	
    private function getNormalBoxHtml() {
    	$text = ($this->params['description']) ? $this->params['description'] : $this->params['raidDescription'];
		$this->params['userImgSize']['class'] = 'img-polaroid';
		$this->params['userImgSize']['style'] = 'margin-top: 10px;'; 
		
		$this->html.= "<div class='row-fluid'>";
			$this->html.= "<div class='dashboard-box-normal span12'>";
				
				$this->html.= "<div class='dashboard-box-normal-content'>";
					$this->html.= "<div class='row-fluid'>";
					
						$this->html.= "<div class='span5'>".CHtml::image($this->params['assetsUrl'].'/raid/'.$this->params['raidImgFolder'].'/thumb640x360-'.$this->params['raidImg'], 'image of '.$this->params['raidName'].' raid', array('class'=>'img-rounded'))."</div>";					
						
						$this->html.= "<div class='span5'>";
							$this->html.= "<div class='dashboard-box-normal-header'>";
								$this->html.= "<div class='pull-left'>".$this->params['raidName']." <span class='label label-warning normal-weight'>".$this->params['raidType']."</span> <small>".Yii::t('locale', 'hour')." ".$this->params['event_hour']."</small></div>";
								$this->html.= "<div class='pull-right'><i class='icon-fire'></i> <small>".Yii::t('locale', 'Members: ')." ".$this->params['members']."</small></div>";
								$this->html.= "<div class='clearbox clearfix'></div>";
							$this->html.= "</div><!-- /dashboard-box-normal-header -->";
							$this->html.= "<div class='content-text'><blockquote><p>$text</p>".CHtml::image($this->params['assetsUrl'].'/user/'.$this->params['portrait'], 'portrait of '.$this->params['username'], $this->params['userImgSize'])."<small>".$this->params['username'].", ".$this->params['event_crDate']."</small></blockquote></div>";
							
							$this->html.= "<div class='dashboard-box-normal-footer'>";
								$this->html.= "<div class='pull-right'><div class='btn-group'>";
									if(RaiderFunctions::isRaidleader()) { 
										$this->html.= CHtml::link(Yii::t('locale', 'Delete'), array('event/confirmDelete', 'id'=>$this->params['id']), array('class'=>'btn btn-mini'));
										$this->html.= CHtml::link(Yii::t('locale', 'Update'), array('event/update', 'id'=>$this->params['id']), array('class'=>'btn btn-mini'));
									}
									$this->html.= CHtml::link(Yii::t('locale', 'Show'), array('event/show', 'id'=>$this->params['id']), array('class'=>'btn btn-mini'));
									// stampo il pulsante di iscrizione solo se non si è già iscritti neppure con un PG altrimenti stampo il pulsante disabilitato.
									if(!$this->params['isAlreadyMember']) 
										$this->html.= CHtml::link(Yii::t('locale', 'Sign up'), array('characterEvent/signup', 'id'=>$this->params['id']), array('class'=>'btn btn-mini btn-success'));
									else 
										$this->html.= CHtml::link(Yii::t('locale', 'Sign up'), '', array('class'=>'btn btn-mini disabled'));
								$this->html.= "</div></div><!-- /pull-right and btn-group -->";	
								$this->html.= "<div class='clearbox clearfix'></div>";
							$this->html.= "</div><!-- /dashboard-box-normal-footer -->";
						$this->html.= "</div><!-- /lite-shadow -->";
						
						$this->html.= "<div class='clearbox clearfix'></div>";
					$this->html.= "</div><!-- /row-fluid -->";	
				$this->html.= "</div><!-- dashboard-box-normal-content -->";
				
			$this->html.= "</div><!-- /dashboard-box-normal -->";
		$this->html.= "</div><!-- /row-fluid -->";
    }
    
    
    
    /**
     * Questa funzione genera l'html se $this->size == 'full'
     */    
    private function getFullBoxHtml() {
		$this->getCharactersSubscriptions();    	
    	$text = ($this->params['description']) ? $this->params['description'] : $this->params['raidDescription'];
    	$this->params['userImgSize']= array('height'=>64, 'width'=>64);
		$this->params['userImgSize']['class'] = 'img-circle';
		$this->params['userImgSize']['style'] = 'margin-right: 5px;';
		
		$path = $_SERVER['SERVER_NAME'] . '/' . $_SERVER['REQUEST_URI'];		
		
		$this->html.= "<div class='row-fluid'>";
			$this->html.= "<div class='dashboard-box-full span12'>";
					
				$this->html.= "<div class='row-fluid'>";
					$this->html.= "<div class='span8'>";
						$this->html.= "<div class='row-fluid'>";
                            $this->html.= "<div class='span3 uppercase'>";
                                $this->html.= "<div>".CHtml::image($this->params['assetsUrl'].'/user/'.$this->params['portrait-mobile'], 'portrait of '.$this->params['username'], $this->params['userImgSize']).$this->params['username'] . "</div>";       //." [ ".$this->params['userGuildRole']." ]</div>";
                                $this->html.= "<div class='clearbox clearfix'></div>";
                            $this->html.= "</div><!-- /dashboard-box-full-header -->";

							$this->html.= "<div class='span9'>";
								$this->html.= $text;
							$this->html.= "</div><!-- /span9 -->";
						$this->html.= "</div><!-- /row-fluid -->";
					$this->html.= "</div><!-- /span8 -->";
					
					$this->html.= "<div class='span4'>";
                        $this->html.= "<div class='dashboard-box-full-header'>";
                            $this->html.= "<div class='raid-infos'><small><i class='icon-fire'></i> ".Yii::t('locale', 'Members: ')." ".$this->params['members']."</small></div>";
                            $this->html.= "<div class='raid-infos'><small><i class='icon-ok-sign'></i> ".Yii::t('locale', 'Available: ')." ".$this->params['available']."</small></div>";
                            $this->html.= "<div class='raid-infos'><small><i class='icon-ban-circle'></i> ".Yii::t('locale', 'Unavailable: ')." ".$this->params['unavailable']."</small></div>";
                            $this->html.= "<div class='clearbox clearfix'></div>";
                            // stampo il pulsante di iscrizione solo se non si è già iscritti neppure con un PG.
                            if(!$this->params['isAlreadyMember']) $this->html.= "<div>".CHtml::link(Yii::t('locale', 'Sign up'), array('characterEvent/signup', 'id'=>$this->params['id']), array('class'=>'btn btn-success display-block'))."</div>";
                        $this->html.= "</div><!-- /dashboard-box-full-header -->";

						$this->html.= CHtml::image($this->params['assetsUrl'].'/raid/'.$this->params['raidImgFolder'].'/thumb640x360-'.$this->params['raidImg'], 'image of '.$this->params['raidName'].' raid');
						if(RaiderFunctions::isRaidleader()) {
							$this->html.= "<div class='row-fluid'>";
								$this->html.= "<div class='span12 dashboard-box-full-header'>";
									$this->html.= CHtml::link(Yii::t('locale', 'Add another event'), array('event/create', 'date'=>$this->params['event_dateTime']->format('Y-m-d')), array('class'=>'btn btn-mini'))." ";
									$this->html.= CHtml::link(Yii::t('locale', 'Delete'), array('event/confirmDelete', 'id'=>$this->params['id']), array('class'=>'btn btn-mini'))." ";
									$this->html.= CHtml::link(Yii::t('locale', 'Update'), array('event/update', 'id'=>$this->params['id']), array('class'=>'btn btn-mini'));
								$this->html.= "</div><!-- /span12 -->";
							$this->html.= "</div><!-- /row-fluid -->";	
						}						
					$this->html.= "</div><!-- /span4 -->";					
				$this->html.= "</div><!-- /row-fluid -->";

				$this->html.= "<div class='row-fluid'>";	
					$this->html.= "<div class='span8'>";

						$this->html.= "<div class='row-fluid'>";
							$this->html.= "<div class='span3'>";
								$this->html.= "<div class='alert alert-info'><i class='icon-bookmark'></i> ".Yii::t('locale', 'Tank')."</div>";							
							$this->html.= "</div>";
							
							$this->html.= "<div class='span9'>";
								$this->html.= !empty($this->params['htmlTank']) ? $this->params['htmlTank'] : "<div class='alert alert-warning'>".Yii::t('locale', 'No tanks joined the event')."</div>";
							$this->html.= "</div>";
						$this->html.= "</div><!-- /row-fluid -->";									
						
						$this->html.= "<div class='row-fluid'>";
							$this->html.= "<div class='span3'>";
								$this->html.= "<div class='alert alert-info'><i class='icon-bookmark'></i> ".Yii::t('locale', 'Healer')."</div>";							
							$this->html.= "</div>";
														
							$this->html.= "<div class='span9'>";
								$this->html.= !empty($this->params['htmlHealer']) ? $this->params['htmlHealer'] : "<div class='alert alert-warning'>".Yii::t('locale', 'No healers joined the event')."</div>";
							$this->html.= "</div>";	
						$this->html.= "</div><!-- /row-fluid -->";								
						
						$this->html.= "<div class='row-fluid'>";
							$this->html.= "<div class='span3'>";
								$this->html.= "<div class='alert alert-info'><i class='icon-bookmark'></i> ".Yii::t('locale', 'DPS Melee')."</div>";							
							$this->html.= "</div>";
														
							$this->html.= "<div class='span9'>";
								$this->html.= !empty($this->params['htmlMelee']) ? $this->params['htmlMelee'] : "<div class='alert alert-warning'>".Yii::t('locale', 'No DPS Melee joined the event')."</div>";
							$this->html.= "</div>";									
						$this->html.= "</div><!-- /row-fluid -->";
						
						$this->html.= "<div class='row-fluid'>";
							$this->html.= "<div class='span3'>";
								$this->html.= "<div class='alert alert-info'><i class='icon-bookmark'></i> ".Yii::t('locale', 'DPS Ranged')."</div>";							
							$this->html.= "</div>";
														
							$this->html.= "<div class='span9'>";
								$this->html.= !empty($this->params['htmlRanged']) ? $this->params['htmlRanged'] : "<div class='alert alert-warning'>".Yii::t('locale', 'No DPS Ranged joined the event')."</div>";
							$this->html.= "</div>";									
						$this->html.= "</div><!-- /row-fluid -->";

						$this->html.= "<div class='row-fluid unavailable'>";
							$this->html.= "<div class='span3'>";
								$this->html.= "<div class='alert alert-error'><i class='icon-bookmark'></i> ".Yii::t('locale', 'Unavailable')."</div>";							
							$this->html.= "</div>";
														
							$this->html.= "<div class='span9'>";
								$this->html.= !empty($this->params['htmlUnavailable']) ? $this->params['htmlUnavailable'] : "<div class='alert alert-warning'>".Yii::t('locale', 'No unavailable users')."</div>";
							$this->html.= "</div>";									
						$this->html.= "</div><!-- /row-fluid -->";						
						
					$this->html.= "</div><!-- /span8 -->";
					
					// Social Networks links
					$this->html.= "<div class='span4'>";
						$this->html.= "<button class='btn btn-mini btn-facebook' onclick='javascript:window.open(\"http://www.facebook.com/share.php?u=$path\", \"\", \"menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\");return false;'><i class='icon-facebook'></i> | Post to Facebook</button> ";
					$this->html.= "</div><!-- /span4 -->";
					$this->html.= "<div class='span4'>";
						$this->html.= "<button class='btn btn-mini btn-twitter' onclick='javascript:window.open(\"http://twitter.com/home?status=$path\", \"\", \"menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\");return false;'><i class='icon-twitter'></i> | Post to Twitter</button> ";
					$this->html.= "</div><!-- /span4 -->";
					$this->html.= "<div class='span4'>";						
						$this->html.= "<button class='btn btn-mini btn-google-plus' onclick='javascript:window.open(\"https://plus.google.com/share?url=$path\", \"\", \"menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\");return false;'><i class='icon-google-plus'></i> | Post to Google Plus</button>";
					$this->html.= "</div><!-- /span4 -->";
					
				$this->html.= "</div><!-- /row-fluid -->";
				
			$this->html.= "</div><!-- /dashboard-box-full -->";
		$this->html.= "</div><!-- /row-fluid -->";
    }
    
    
    
    
    
    private function getCharactersSubscriptions() {
    	$this->params['htmlTank'] 		= '';
    	$this->params['htmlHealer']		= '';
    	$this->params['htmlMelee'] 		= '';
    	$this->params['htmlRanged'] 	= '';
    	$this->params['htmlUnavailable']= '';
    	
    	foreach ($this->params['charEvent'] as $k=>$charEventModel) {
	    	foreach ($this->params['characters'] as $k1=>$raiderCharObj) {
    			$roleName = $charEventModel->role->name;
    			
    			// controllo se il character che sto ciclando è quello corretto, per evitare entrate doppie.
    			if($charEventModel->char_id == $raiderCharObj->getCharacter()->id) {
    				// controllo se il pg è stato iscritto come disponibile o non disponibile
	    			if($charEventModel->available_flag)
		    			switch ($roleName) {
		    				case 'Tank':
		    					$this->params['htmlTank'].= $this->getCharacterHtml($k, $k1);
		    					break;	
		    				case 'Healer':
		    					$this->params['htmlHealer'].= $this->getCharacterHtml($k, $k1);
		    					break;
		    				case 'DPS Melee':
		    					$this->params['htmlMelee'].= $this->getCharacterHtml($k, $k1);
		    					break;    					
		    				case 'DPS Ranged':
		    					$this->params['htmlRanged'].= $this->getCharacterHtml($k, $k1);
		    					break;     					
		    			}
		    		else {
		    				$this->params['htmlUnavailable'].= $this->getCharacterHtml($k, $k1);
		    		}
    			}
	    	}    		
    	}
    }
    
    
    /**
     * Questa funzione si occupa di generare l'html per i characters
     * utilizzata nella generazione dei boxFull
     */
    private function getCharacterHtml($k, $k1) {
    	$charEvent = $this->params['charEvent'][$k];
    	$character = $this->params['characters'][$k1];
    	
    	// preparo qualche variabile
		$charArmoryUrl = $character->getCharacter()->armory_URL;
		$guildArmoryUrl = $character->getGuild()->URL;
		
		// preparo il nome del PG, se è impostato un title, uso quello
		$pgName = (isset($character->getCharacter()->title)) ? $character->getCharacter()->title : $character->getCharacter()->name ;
		
		// se il pg è selezionato aggiungo una classe al div principale per evidenziarlo
		if($charEvent->holder_flag)
			$holderClass = 'alert alert-success ';
		else
			$holderClass = '';
		
		// genero l'html per ogni personaggio
		$html = "<div class='$holderClass character dashboard-character'>";
			$html.= "<div class='pull-left'>";
				$html.= "<img class='img-rounded' src='".$character->getCharacter()->portrait_URL."' height='40' width='40' alt='portrait of ".$character->getCharacter()->name."'>";
			$html.= "</div>";	
			
			$html.= "<div class='pg-data pull-left'>";
				$html.= "<div class='pg-name'>".CHtml::link($pgName, $charArmoryUrl, array('class'=>'tooltip-link', 'title'=>Yii::t('locale', 'Character armory page')))."</div>";
				$html.= "<div class='pg-info' style='color: ".$character->getClass()->color."'>".$character->getClass()->name." ".$character->getRace()->name.", ".$character->getCharacter()->level." - [ ".$character->getCharacter()->item_level." ]</div>";
				$html.= "<div class='pg-guild'>".CHtml::link($character->getGuild()->name, $guildArmoryUrl, array('class'=>'tooltip-link', 'title'=>Yii::t('locale', 'Guild armory page')))."</div>";
			$html.= "</div>";
			
			// visualizzo il menù con le opzioni solo se l'utente loggato è il proprietario del PG oppure un raid leader oppure l'admin
			if(RaiderFunctions::isMinePg($character->getCharacter()->id) || RaiderFunctions::isRaidleader() || RaiderFunctions::isAdmin()) {
				$html.= "<div class='btn-group pull-right'>";
					$html.= "<a class='btn btn-mini dropdown-toggle' data-toggle='dropdown' href='#'><span class='caret'></span></a>";
					$html.= "<ul class='dropdown-menu'>";
						// visualizzo il link per accettare l'utente tra i partecipanti solo se si è raidleader o admin
						if(RaiderFunctions::isRaidleader() || RaiderFunctions::isAdmin()) {
							$html.= "<li><a href='".Yii::app()->createUrl('characterEvent/toggleHolder', array('id'=>$charEvent->id))."'>";
							$html.= ($charEvent->holder_flag) ? "<i class='icon-thumbs-down'></i> ".Yii::t('locale', 'No more holder')."</a></li>" : "<i class='icon-thumbs-up'></i> ".Yii::t('locale', 'Set as holder')."</a></li>" ;
						}
						$html.= "<li><a href='".Yii::app()->createUrl('characterEvent/toggleAvailable', array('id'=>$charEvent->id))."'>";
						$html.= ($charEvent->available_flag) ? "<i class='icon-ban-circle'></i> ".Yii::t('locale', 'Set as unavailable')."</a></li>" : "<i class='icon-ok-sign'></i> ".Yii::t('locale', 'Set as available')."</a></li>";
						$html.= "<li><a href='".Yii::app()->createUrl('characterEvent/modifyComment', array('id'=>$charEvent->id))."'><i class='icon-pencil'></i> ".Yii::t('locale', 'Edit comment')."</a></li>";
						$html.= "<li class='divider'></li>";
						$html.= "<li><a href='".Yii::app()->createUrl('characterEvent/modifyRole', array('id'=>$charEvent->id))."'><i class='icon-bullseye'></i> ".Yii::t('locale', 'Change role')."</a></li>";
						$html.= "<li class='divider'></li>";
						$html.= "<li><a href='".Yii::app()->createUrl('characterEvent/delete',array('id'=>$charEvent->id))."'><i class='icon-trash'></i> ".Yii::t('locale', 'Delete subscription')."</a></li>";
					$html.= "</ul>";	
				$html.= "</div>";
			}
		
			$html.= "<div class='clearfix'></div>";
			
			// se è stato scritto un commento, lo inserisco nell'html
			if(!empty($charEvent->comment)) {
				$html.= "<div class='pg-comment'>";
					$html.= "<i class='icon-comment'></i> <small>".Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($charEvent->comment_date, 'yyyy-MM-dd'), 'full', null )."</small><br>$charEvent->comment";
				$html.= "</div>";			
			}
			
		$html.= "</div><!-- /character -->";
		
		return $html;
    }



    /**
     * Questa funzione si occupa di generare i box della dashboard per il template mobile.
     * Questa funzione genera l'html se $this->size == 'mobile'
     */
    private function getMobileMiniBoxHtml() {
        $text = ($this->params['description']) ? $this->params['description'] : $this->params['raidDescription'];
        $this->params['userImgSize-mobile']['class'] = 'img-circle';
        $this->params['raidImgSize-mobile']['class'] = 'img-circle';

        $this->html.= "<div class='row-fluid'>";
            $this->html.= "<div class='dashboard-box-mobile-mini lite-shadow span12'>";
                $this->html.= "<div class='dashboard-box-mini-header'>";
                    $this->html.= "<div class='pull-left'>";
//                        $this->html.= "<a href='".Yii::app()->createUrl('event/show', array('id'=>$this->params['id']))."'>" . CHtml::image($this->params['assetsUrl'].'/raid/'.$this->params['raidImgFolder']."/".$this->params['raidImg-mobile'], 'image of '.$this->params['raidName'].' raid', $this->params['raidImgSize-mobile']) . "</a>";
                        $this->html.= "<a href='".Yii::app()->createUrl('event/show', array('id'=>$this->params['id']))."'>" . CHtml::image($this->params['assetsUrl'].'/raid/'.$this->params['raidImgFolder'].'/'.$this->params['raidImg-mobile'], 'image of '.$this->params['raidName'].' raid', $this->params['raidImgSize-mobile']) . "</a>";
                    $this->html.= "</div>";

                    $this->html.= "<div class='pull-left post-autor'>";
                        $this->html.= "<div class='dashboard-box-mini-raidleader'>".$this->params['raidName']." <span class='label label-warning normal-weight'>".$this->params['raidType']."</span></div>";
                        $this->html.= "<div class='dashboard-box-mini-label event-date'><small class='muted event-date'>".$this->params['event_date']." ".Yii::t('locale', 'hour')." ".$this->params['event_hour']."</small></div>";
                    $this->html.= "</div>";

                    $this->html.= "<div class='clearbox clearfix'></div>";
                $this->html.= "</div><!-- /dashboard-box-mini-header' -->";

            if(!empty($text)) {
                $this->html.= "<div class='dashboard-box-mobile-mini-content'>";
                    $this->html.= "<div class='dashboard-box-mobile-mini-raid-text-summary'>";
                        $this->html.= RaiderFunctions::summary($text, 50);
                    $this->html.= "</div><!-- /mobile-raid-text-summary -->";
                $this->html.= "</div><!-- /dashboard-box-mobile-mini-content -->";

                $this->html.= "<div><span class='muted'>- <i class='icon icon-bullhorn'></i></span> <span class='small muted'>".$this->params['username']."</span></div>";		//." [ ".$this->params['userGuildRole']." ]</div>";
            }
                $this->html.= "<div class='dashboard-box-mini-header'>";
                    $this->html.= "<div><a class='btn btn-success display-block' href='".Yii::app()->createUrl('event/show', array('id'=>$this->params['id']))."'>" . Yii::t('locale', 'View') . "</a></div>";
                $this->html.= "</div><!-- /dashboard-box-mini-header' -->";

            $this->html.= "</div><!-- /dashboard-box-mobile-mini span12 -->";

            $this->html.= "<div class='clearfix'></div>";
        $this->html.= "</div><!-- /row-fluid -->";
    }
}
?>