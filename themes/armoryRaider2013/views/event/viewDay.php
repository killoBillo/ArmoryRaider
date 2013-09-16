<?php
/* @var $this EventController */
/* @var $model Event */
Yii::app()->clientScript->registerCoreScript('jquery');

$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Create',
);
?>


<h1><?php echo Yii::t('locale', 'Events planned').' <small>'.Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($date, 'yyyy-mm-dd'), 'full', null ).'</small>'; ?></h1>
<br>
<?php 
	$this->widget('ext.RaiderExt.DashboardEvents',array(
		'events'=>$events,
		'size'=>'normal',
	));
	
	// se raidleader, aggiungo pulsante "add event"
	if(RaiderFunctions::isRaidleader())
		echo CHtml::link(Yii::t('locale', 'Add another event'), array('event/create', 'date'=>$date), array('class'=>'btn btn-primary'));
?>