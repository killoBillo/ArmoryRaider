<?php
/* @var $this CharacterEventController */
/* @var $model CharacterEvent */

$this->breadcrumbs=array(
	'Character Events'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CharacterEvent', 'url'=>array('index')),
	array('label'=>'Create CharacterEvent', 'url'=>array('create')),
	array('label'=>'View CharacterEvent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CharacterEvent', 'url'=>array('admin')),
);
?>

<h1>Update CharacterEvent <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>