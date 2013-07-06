<?php
/* @var $this UserattributesController */
/* @var $model Userattributes */

$this->breadcrumbs=array(
	'Userattributes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Userattributes', 'url'=>array('index')),
	array('label'=>'Create Userattributes', 'url'=>array('create')),
	array('label'=>'View Userattributes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Userattributes', 'url'=>array('admin')),
);
?>

<h1>Update Userattributes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>