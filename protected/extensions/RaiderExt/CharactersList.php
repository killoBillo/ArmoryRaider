<?php
/**
 * 
 * Questo widget visualizza a video la lista di tutti i PG dell'utente.
 * @author Marco Chillemi
 *
 */
class CharactersList extends CWidget {
	
	public $userid;
	private $html = '';	

	
	// $userid mi arriva dalla vista
	public function init() {
		$this->html.= "<div class='my-characters'>";
			$this->html.= "<div class='title'><i class='icon-user'></i> ".Yii::t('locale', 'My characters')."</div>";
		
		// recupero la lista dei personaggi dell'utente loggato
		$characters = Character::model()->findAll('user_id = :userid', array(':userid'=>$this->userid));

    	if(!empty($characters)) {
    		
			
    		foreach ($characters as $k=>$model) {
    			//recupero le info sul personaggio
				$character = new RaiderCharacter($model->id);
				
				// preparo qualche variabile
				$charArmoryUrl = $character->getCharacter()->armory_URL;
				$guildArmoryUrl = $character->getGuild()->URL;
				
				
				// genero l'html per ogni personaggio
				$this->html.= "<div class='character'>";
					$this->html.= "<div class='pull-left'>";
						$this->html.= "<img class='img-rounded' src='".$character->getCharacter()->portrait_URL."' height='40' width='40' alt='portrait of ".$character->getCharacter()->name."'>";
					$this->html.= "</div>";	
					
					$this->html.= "<div class='pg-data pull-left'>";
						$this->html.= "<div class='pg-name'>".CHtml::link($character->getCharacter()->name, $charArmoryUrl, array('class'=>'tooltip-link', 'title'=>Yii::t('locale', 'Character armory page')))."</div>";
						$this->html.= "<div class='pg-info' style='color: ".$character->getClass()->color."'>".$character->getClass()->name." ".$character->getRace()->name.", ".$character->getCharacter()->level." - [ ".$character->getCharacter()->item_level." ]</div>";
						$this->html.= "<div class='pg-guild'>".CHtml::link($character->getGuild()->name, $guildArmoryUrl, array('class'=>'tooltip-link', 'title'=>Yii::t('locale', 'Guild armory page')))."</div>";
					$this->html.= "</div>";	

					$this->html.= "<div class='btn-group pull-right'>";
						$this->html.= "<a class='btn btn-mini dropdown-toggle' data-toggle='dropdown' href='#'><span class='caret'></span></a>";
						$this->html.= "<ul class='dropdown-menu'>";
							$this->html.= "<li><a href='".CHtml::encode($charArmoryUrl)."'><i class='icon-screenshot'></i> ".Yii::t('locale', 'Character armory page')."</a></li>";
							$this->html.= "<li><a href='".$guildArmoryUrl."'><i class='icon-share'></i> ".Yii::t('locale', 'Guild armory page')."</a></li>";
							$this->html.= "<li class='divider'></li>";
							$this->html.= "<li><a href='".Yii::app()->createUrl('character/confirmDelete',array('id'=>$character->getCharacter()->id))."'><i class='icon-trash'></i> ".Yii::t('locale', 'Delete character')."</a></li>";
						$this->html.= "</ul>";	
					$this->html.= "</div>";
					
					$this->html.= "<div class='clearfix'></div>";
				$this->html.= "</div><!-- /character -->";						
			}

			
    	}else
    		$this->html.= "<div class='alert'>".Yii::t('locale', '<h5>No characters found</h5>Create a character using the button below \'Add Character\'.')."</div>";
    	
    	
    		
    	// pulsante "aggiungi personaggio" 
    	$this->html.= "<a class='btn btn-small' href='".Yii::app()->createUrl('Character/create')."'>".Yii::t('locale', 'Add Character')."</a>";

    	// chiudo il div che racchiude tutto
    	$this->html.= "</div><!-- /my-characters -->";
    	
    	echo $this->html;
    }
    
    
}
?>