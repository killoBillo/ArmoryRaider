<?php
/* @var $this CharacterController */
/* @var $model Character */

$this->breadcrumbs=array(
	'Characters'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1><?php echo Yii::t('locale', 'Update Character').' <small>'.$model->name.'</small>'; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>