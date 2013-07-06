<?php
/* @var $this GuildroleController */
/* @var $model Guildrole */

$this->breadcrumbs=array(
	'Guildroles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Guildrole', 'url'=>array('index')),
	array('label'=>'Create Guildrole', 'url'=>array('create')),
	array('label'=>'Update Guildrole', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Guildrole', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Guildrole', 'url'=>array('admin')),
);
?>

<h1>View Guildrole #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'label',
	),
)); ?>
