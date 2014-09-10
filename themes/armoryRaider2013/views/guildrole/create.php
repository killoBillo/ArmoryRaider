<?php
/* @var $this GuildroleController */
/* @var $model Guildrole */

$this->breadcrumbs=array(
	'Guildroles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Guildrole', 'url'=>array('index')),
	array('label'=>'Manage Guildrole', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('locale', 'Create Guild role'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>