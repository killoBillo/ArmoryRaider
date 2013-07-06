<?php
/* @var $this GuildController */
/* @var $model Guild */

$this->breadcrumbs=array(
	'Guilds'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Guild', 'url'=>array('index')),
	array('label'=>'Create Guild', 'url'=>array('create')),
	array('label'=>'View Guild', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Guild', 'url'=>array('admin')),
);
?>

<h1>Update Guild <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>