<?php
/* @var $this CharacterEventController */
/* @var $model CharacterEvent */

$this->breadcrumbs=array(
	'Character Events'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CharacterEvent', 'url'=>array('index')),
	array('label'=>'Manage CharacterEvent', 'url'=>array('admin')),
);
?>

<h1>Create CharacterEvent</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>