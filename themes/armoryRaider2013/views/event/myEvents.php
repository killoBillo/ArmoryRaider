<?php
/* @var $this EventController */
/* @var $model Event */
?>


<h1><?php echo Yii::t('locale', 'Events I Attended'); ?></h1>
<br>
<?php 
	$assetsURL = Yii::app()->getAssetManager()->getPublishedUrl(RaiderFunctions::getImagesFolderPath());
	
	$html = "<div class='row-fluid'>";
		$html.= "<div class='span11'>";
	
		if(!empty($models)) {
			//disegno la tabella
			$html.= "<table class='table table-hover shadow'>";
				$html.= "<thead>";
					$html.= "<tr>";
						$html.= "<th><i class='icon-user'></i> ".Yii::t('locale', 'Character')."</th>";					
						$html.= "<th><i class='icon-calendar'></i> - <i class='icon-time'></i> ".Yii::t('locale', 'Date Time')."</th>";
						$html.= "<th><i class='icon-legal'></i> ".Yii::t('locale', 'Raid')."</th>";
						$html.= "<th><i class='icon-shield'></i> ".Yii::t('locale', 'Role')."</th>";
						$html.= "<th><i class='icon-group'></i> ".Yii::t('locale', 'R.L.')."</th>";
						$html.= "<th><i class='icon-link'></i> ".Yii::t('locale', 'Link')."</th>";
					$html.= "</tr>";
				$html.= "</thead>";
				$html.= "<tbody>";
			
				foreach ($models as $k=>$model) {
					$eventDate 	= new DateTime($model->event_date);
					$dateString = $eventDate->format('Y-m-d');
					$hourString = $eventDate->format('H:i');					
					$raid = Raid::model()->findByPk($model->raid_id);
					$raidImgFolder = strtolower(preg_replace('/[\s]+/','_',$raid->name));
					$char_event = CharacterEvent::model()->findByAttributes(array("event_id"=>$model->id));
					$role = Role::model()->findByPk($char_event->role_id)->name;
					$char = Character::model()->findByPk($char_event->char_id);
					$raidleader = User::model()->findByPk($model->raid_leader_id);
					
					$html.= "<tr>";
						$html.= "<td><img class='img-polaroid' src='".$char->portrait_URL."' height='20' width='20' alt='portrait of ".$char->name."'> ".$char->name."</td>";
						$html.= "<td>".Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($dateString, 'yyyy-mm-dd'), 'medium', null )." - ".$hourString."</td>";
						$html.= "<td>".CHtml::image($assetsURL.'/raid/'.$raidImgFolder.'/thumb40x40-'.$raid->img, 'Image of '.$raid->name, array('height'=>20, 'width'=>20, 'class'=>'img-polaroid'))." ".$raid->name."</td>";
						$html.= "<td>".$role."</td>";
						$html.= "<td>".$raidleader->username."</td>";
						$html.= "<td>".CHtml::link(Yii::t('locale', 'Show'), array('event/show&id='.$model->id))."</td>";
					$html.= "</tr>";				
				}
			
				$html.= "</tbody>";
			$html.= "</table>"; 
			//fine tabella
		}else{
			$html.= "<div class='alert alert-warning'>".Yii::t('locale', 'No events found')."</div>";
		}
	
		$html.= "</div><!-- /span11 -->";
	$html.= "</div><!-- /row-fluid -->"; 
		
	echo $html;
?>