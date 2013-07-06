<?php
/* @var $this FactionController */
/* @var $model Faction */

$this->breadcrumbs=array(
	'Factions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Faction', 'url'=>array('index')),
	array('label'=>'Create Faction', 'url'=>array('create')),
	array('label'=>'Update Faction', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Faction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Faction', 'url'=>array('admin')),
);
?>

<h1>View Faction #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'icon',
	),
)); ?>
