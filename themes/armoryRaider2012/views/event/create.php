<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Event', 'url'=>array('index')),
	array('label'=>'Manage Event', 'url'=>array('admin')),
);

//var_dump(CDateTimeParser::parse($model->event_date, 'yyyy-mm-dd'));
?>


<h1><?php echo Yii::t('locale', 'Create event in date').' '.Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($model->event_date, 'yyyy-mm-dd'), 'long', null ); ?></h1>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>