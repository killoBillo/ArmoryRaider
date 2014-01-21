<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$raidName 	= $event[0]->getRaid()->name;
$raidType	= !empty($event[0]->getRaid()->type)? $event[0]->getRaid()->type : 'Normal';
$eventDate 	= new DateTime($event[0]->getEventModel()->event_date);
$dateString = $eventDate->format('Y-m-d');
$hourString = $eventDate->format('H:i');
?>


<h1><?php echo "<span class='uppercase'>$raidName</span> <span class='label label-warning normal-weight float-left'>$raidType</span> <small>".Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($dateString, 'yyyy-MM-dd'), 'full', null )." ".Yii::t('locale', 'hour')." $hourString</small>" ;?></h1>
<div class="clearfix clearbox"></div>

<?php 
	$this->widget('ext.RaiderExt.DashboardEvents',array(
		'events'=>$event,
		'size'=>'full',
	));
?>