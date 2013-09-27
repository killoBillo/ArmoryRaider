<?php

	Yii::app()->clientScript->registerScript('closeCalendar', "
		$( document ).ready(function() {
			$('#main-calendar').hide();
			$('.show-calendar').show();
		});
	");
	
	$assetsUrl = Yii::app()->getAssetManager()->getPublishedUrl(RaiderFunctions::getImagesFolderPath());
	
	
	
	$html = "<div class='row-fluid'>";
		$html.= "<div class='span12'>";

		foreach ($users as $k=>$user) {
			$userImgFolder = strtolower(preg_replace('/[\s]+/','_',$user->username));
			$portrait = ($user->portrait_URL) ? $userImgFolder.'/thumb50x50-'.$user->portrait_URL : 'thumb50x50-unknown.jpg';
			
			// genero HTML utente
			$html.= "<div class='user-widget'>";
				$html.= "<div class='pull-left'>";
					$html.= CHtml::image($assetsUrl.'/user/'.$portrait, 'portrait of '.$user->username, array('height'=>50, 'width'=>50, 'class'=>'img-polaroid'));
				$html.= "</div>";
				
				$html.= "<div class='user-data pull-left'>";
					$html.= "<div class='username'>".$user->username."</div>";
					$html.= "<div class='user-info'>".$user->name." ".$user->surname."</div>";
				$html.= "</div><!-- /user-data -->";
				
				$html.= "<div class='clearbox clearfix'></div>";
			$html.= "</div><!-- /userWidget -->";
			// fine HTML utente
			
			$html.= "<div class='span11 offset1'>";	
			foreach ($chars[$k] as $k1=>$model) {
    			//recupero le info sul personaggio
				$character = new RaiderCharacter($model->id);
				
				// preparo qualche variabile
				$charArmoryUrl = $character->getCharacter()->armory_URL;
				$guildArmoryUrl = $character->getGuild()->URL;
								
				// genero HTML per ogni personaggio
				$html.= "<div class='character char-roster'>";
					$html.= "<div class='pull-left'>";
						$html.= "<img class='img-rounded' src='".$character->getCharacter()->portrait_URL."' height='40' width='40' alt='portrait of ".$character->getCharacter()->name."'>";
					$html.= "</div>";	
					
					$html.= "<div class='pg-data pull-left'>";
						$html.= "<div class='pg-name'>".CHtml::link($character->getCharacter()->name, $charArmoryUrl, array('class'=>'tooltip-link', 'title'=>Yii::t('locale', 'Character armory page')))."</div>";
						$html.= "<div class='pg-info' style='color: ".$character->getClass()->color."'>".$character->getClass()->name." ".$character->getRace()->name.", ".$character->getCharacter()->level." - [ ".$character->getCharacter()->item_level." ]</div>";
						$html.= "<div class='pg-guild'>".CHtml::link($character->getGuild()->name, $guildArmoryUrl, array('class'=>'tooltip-link', 'title'=>Yii::t('locale', 'Guild armory page')))."</div>";
					$html.= "</div>";	

					$html.= "<div class='clearfix'></div>";
				$html.= "</div><!-- /character -->";
				// fine HTML personaggio
			};
			$html.= "</div><!-- /span11 -->";
		};
		
		$html.= "</div><!-- /span12 -->";
	$html.= "</div><!-- /row-fluid -->";
	
	echo $html;
?>