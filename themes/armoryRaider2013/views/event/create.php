<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Create',
);

//var_dump(CDateTimeParser::parse($model->event_date, 'yyyy-mm-dd'));
?>


<h1><?php echo '<small>'.Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($model->event_date, 'yyyy-mm-dd'), 'full', null ).'</small> '.Yii::t('locale', 'Create event'); ?></h1>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>