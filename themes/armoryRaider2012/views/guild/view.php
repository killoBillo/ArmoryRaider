<?php
/* @var $this GuildController */
/* @var $model Guild */

$this->breadcrumbs=array(
	'Guilds'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Guild', 'url'=>array('index')),
	array('label'=>'Create Guild', 'url'=>array('create')),
	array('label'=>'Update Guild', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Guild', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Guild', 'url'=>array('admin')),
);
?>

<h1>View Guild #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'realm',
		'name',
		'tag',
		'guild_master_id',
		'faction_id',
		'URL',
		'img',
	),
)); ?>
