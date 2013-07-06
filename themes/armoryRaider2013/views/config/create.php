<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
	'Configs'=>array('index'),
	'Create',
);

$this->layout = '//layouts/column2';
?>

<h1><?php echo Yii::t('locale', 'Armory Raider Configuration'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>