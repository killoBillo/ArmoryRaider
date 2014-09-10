<?php
/* @var $this EventController */
/* @var $model Event */
?>


<h1><?php echo Yii::t('locale', 'Events list'); ?></h1>
<br>
<?php
	$assetsURL = Yii::app()->getAssetManager()->getPublishedUrl(RaiderFunctions::getImagesFolderPath());
	 
	$html = "<div class='row-fluid'>";
		$html.= "<div class='span11'>";
	
		if(!empty($models)) {
			//disegno la tabella
			$html.= "<table class='table table-hover shadow table-white'>";
				$html.= "<thead>";
					$html.= "<tr class='alert alert-error'>";
						$html.= "<th><i class='icon-calendar'></i> ".Yii::t('locale', 'Event Date')."</th>";
						$html.= "<th><i class='icon-time'></i> ".Yii::t('locale', 'Event Hour')."</th>";
						$html.= "<th><i class='icon-legal'></i> ".Yii::t('locale', 'Raid')."</th>";
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
					$raidImgFolder = $raid->id;                                         //strtolower(preg_replace('/[\s]+/','_',$raid->name));
					$raidleader = User::model()->findByPk($model->raid_leader_id);
					
					$html.= "<tr>";
						$html.= "<td>".Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($dateString, 'yyyy-MM-dd'), 'full', null )."</td>";
						$html.= "<td>$hourString</td>";
						$html.= "<td>".CHtml::image($assetsURL.'/raid/'.$raidImgFolder.'/thumb40x40-'.$raid->img, 'Image of '.$raid->name, array('height'=>20, 'width'=>20, 'class'=>'img-polaroid'))." ".$raid->name."</td>";
						$html.= "<td>".$raidleader->username."</td>";
						$html.= "<td>".CHtml::link(Yii::t('locale', 'Show'), array('event/show?id='.$model->id))."</td>";
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