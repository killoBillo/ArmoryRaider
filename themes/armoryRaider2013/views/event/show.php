<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$raidName 	= $event[0]->getRaid()->name;
$eventDate 	= new DateTime($event[0]->getEventModel()->event_date);
$dateString = $eventDate->format('Y-m-d');
$hourString = $eventDate->format('H:i');
?>


<h1><?php echo "<span class='uppercase'>$raidName</span> <small>".Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($dateString, 'yyyy-mm-dd'), 'full', null )." ".Yii::t('locale', 'hour')." $hourString</small>" ;?></h1>

<?php 
	$this->widget('ext.RaiderExt.DashboardEvents',array(
		'events'=>$event,
		'size'=>'full',
	));
?>