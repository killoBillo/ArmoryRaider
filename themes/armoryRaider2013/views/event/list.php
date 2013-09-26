<?php
/* @var $this EventController */
/* @var $model Event */
?>


<h1><?php echo Yii::t('locale', 'Events list'); ?></h1>
<br>
<?php 
	$html = "<div class='row-fluid'>";
		$html.= "<div class='span11'>";
	
		if(!empty($models)) {
			//disegno la tabella
			$html.= "<table class='table table-hover table-bordered'>";
				$html.= "<thead>";
					$html.= "<tr>";
						$html.= "<th><i class='icon-calendar'></i> ".Yii::t('locale', 'Event Date')."</th>";
						$html.= "<th><i class='icon-time'></i> ".Yii::t('locale', 'Event Hour')."</th>";
						$html.= "<th><i class='icon-legal'></i> ".Yii::t('locale', 'Raid')."</th>";
						$html.= "<th><i class='icon-group'></i> ".Yii::t('locale', 'Raid Leader')."</th>";
						$html.= "<th><i class='icon-link'></i> ".Yii::t('locale', 'Link')."</th>";
					$html.= "</tr>";
				$html.= "</thead>";
				$html.= "<tbody>";
			
				foreach ($models as $k=>$model) {
					$eventDate 	= new DateTime($model->event_date);
					$dateString = $eventDate->format('Y-m-d');
					$hourString = $eventDate->format('H:i');					
					$raid = Raid::model()->findByPk($model->raid_id);
					$raidleader = User::model()->findByPk($model->raid_leader_id);
					
					$html.= "<tr class='success'>";
						$html.= "<td>".Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($dateString, 'yyyy-mm-dd'), 'full', null )."</td>";
						$html.= "<td>$hourString</td>";
						$html.= "<td>".$raid->name."</td>";
						$html.= "<td>".$raidleader->name." ".$raidleader->surname."</td>";
						$html.= "<td><i class='icon-link'></i> ".CHtml::link(Yii::t('locale', 'Show'), array('event/show&id='.$model->id))."</td>";
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