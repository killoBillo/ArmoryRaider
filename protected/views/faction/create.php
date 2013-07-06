<?php
/* @var $this FactionController */
/* @var $model Faction */

$this->breadcrumbs=array(
	'Factions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Faction', 'url'=>array('index')),
	array('label'=>'Manage Faction', 'url'=>array('admin')),
);
?>

<h1>Create Faction</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>