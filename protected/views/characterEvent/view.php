<?php
/* @var $this CharacterEventController */
/* @var $model CharacterEvent */

$this->breadcrumbs=array(
	'Character Events'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CharacterEvent', 'url'=>array('index')),
	array('label'=>'Create CharacterEvent', 'url'=>array('create')),
	array('label'=>'Update CharacterEvent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CharacterEvent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CharacterEvent', 'url'=>array('admin')),
);
?>

<h1>View CharacterEvent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'event_id',
		'char_id',
		'available_flag',
		'holder_flag',
		'comment',
		'comment_date',
	),
)); ?>
