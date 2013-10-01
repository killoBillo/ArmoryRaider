<?php
	$assetsUrl = Yii::app()->getAssetManager()->getPublishedUrl(RaiderFunctions::getImagesFolderPath());
	$html = "";
	
	$html.= "<h1>".Yii::t('locale', 'Guild Roster')."</h1>";
	
	foreach ($users as $k=>$user) {
		$userImgFolder = strtolower(preg_replace('/[\s]+/','_',$user->username));
		$portrait = ($user->portrait_URL) ? $userImgFolder.'/thumb50x50-'.$user->portrait_URL : 'thumb50x50-unknown.jpg';
		$guildRole = $user->profile->guildrole;
		
		// genero HTML utente
		$html.= "<div class='user-widget well'>";
			$html.= "<div class='pull-left'>";
				$html.= CHtml::image($assetsUrl.'/user/'.$portrait, 'portrait of '.$user->username, array('height'=>30, 'width'=>30, 'class'=>'img-polaroid'));
			$html.= "</div>";
			
			$html.= "<div class='user-data pull-left'>";
				$html.= "<div class='username'>".$user->username."<br><small>".$user->name." ".$user->surname." [ ".$guildRole->label." ]</small></div>";
			$html.= "</div><!-- /user-data -->";
			
			$html.= "<div class='clearbox clearfix'></div>";
		$html.= "</div><!-- /userWidget -->";
		// fine HTML utente
		
		$html.= "<table class='table table-hover shadow table-white'>";
			$html.= "<thead>";
				$html.= "<tr>";
					$html.= "<th> ".Yii::t('locale', 'Img')."</th>";
					$html.= "<th> ".Yii::t('locale', 'Name')."</th>";
					$html.= "<th> ".Yii::t('locale', 'Class')."</th>";
					$html.= "<th> ".Yii::t('locale', 'Race')."</th>";
					$html.= "<th> ".Yii::t('locale', 'Level')."</th>";
					$html.= "<th> ".Yii::t('locale', 'Item Level')."</th>";
					$html.= "<th> ".Yii::t('locale', 'Guild')."</th>";
				$html.= "</tr>";
			$html.= "</thead>";
			$html.= "<tbody>";
			
			if(!empty($chars[$k])) {
				foreach ($chars[$k] as $k1=>$model) {
	    			//recupero le info sul personaggio
					$character = new RaiderCharacter($model->id);
					// preparo qualche variabile
					$charArmoryUrl = $character->getCharacter()->armory_URL;
					$guildArmoryUrl = $character->getGuild()->URL;
									
					// genero HTML per ogni personaggio
					$html.= "<tr>";
						$html.= "<td><img class='img-polaroid' src='".$character->getCharacter()->portrait_URL."' height='20' width='20' alt='portrait of ".$character->getCharacter()->name."'></td>";
						$html.= "<td>".CHtml::link($character->getCharacter()->name, $charArmoryUrl, array('class'=>'tooltip-link', 'title'=>Yii::t('locale', 'Character armory page')))."</td>";
						$html.= "<td style='color: ".$character->getClass()->color."'>".$character->getClass()->name."</td>";
						$html.= "<td>".$character->getRace()->name."</td>";
						$html.= "<td>".$character->getCharacter()->level."</td>";
						$html.= "<td>".$character->getCharacter()->item_level."</td>";
						$html.= "<td>".CHtml::link($character->getGuild()->name, $guildArmoryUrl, array('class'=>'tooltip-link', 'title'=>Yii::t('locale', 'Guild armory page')))."</td>";
					$html.= "</tr>";					
					// fine HTML personaggio
				};
			}else{
				// genero HTML se non vengono trovati personaggi
				$html.= "<tr class='warning'>";
					$html.= "<td colspan='100%'>".Yii::t('locale', 'No characters found')."</td>";
				$html.= "</tr>";
				// fine HTML per nessun personaggio
			}
			
			$html.= "</tbody>";				
		$html.= "</table>";
	};
		
	echo $html;
?>