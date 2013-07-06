<?php
/* @var $this FactionController */
/* @var $model Faction */

$this->breadcrumbs=array(
	'Factions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Faction', 'url'=>array('index')),
	array('label'=>'Create Faction', 'url'=>array('create')),
	array('label'=>'View Faction', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Faction', 'url'=>array('admin')),
);
?>

<h1>Update Faction <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>