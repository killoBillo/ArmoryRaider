<?php
/* @var $this UserattributesController */
/* @var $model Userattributes */

$this->breadcrumbs=array(
	'Userattributes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Userattributes', 'url'=>array('index')),
	array('label'=>'Manage Userattributes', 'url'=>array('admin')),
);
?>

<h1>Create Userattributes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>