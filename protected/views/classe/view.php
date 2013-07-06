<?php
/* @var $this ClasseController */
/* @var $model Classe */

$this->breadcrumbs=array(
	'Classes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Classe', 'url'=>array('index')),
	array('label'=>'Create Classe', 'url'=>array('create')),
	array('label'=>'Update Classe', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Classe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Classe', 'url'=>array('admin')),
);
?>

<h1>View Classe #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'color',
		'name',
		'icon',
	),
)); ?>
