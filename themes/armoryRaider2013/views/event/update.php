<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$raid = Raid::model()->findByPk($model->raid_id);
?>

<h4><?php echo Yii::t('locale', 'Update event').' <small>'.$raid->name.' - '.Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($model->event_date, 'yyyy-mm-dd'), 'full', null ).'</small> '; ?></h4>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>