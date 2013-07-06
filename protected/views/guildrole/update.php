<?php
/* @var $this GuildroleController */
/* @var $model Guildrole */

$this->breadcrumbs=array(
	'Guildroles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Guildrole', 'url'=>array('index')),
	array('label'=>'Create Guildrole', 'url'=>array('create')),
	array('label'=>'View Guildrole', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Guildrole', 'url'=>array('admin')),
);
?>

<h1>Update Guildrole <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>