<?php
/* @var $this ClasseController */
/* @var $model Classe */

$this->breadcrumbs=array(
	'Classes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Classe', 'url'=>array('index')),
	array('label'=>'Create Classe', 'url'=>array('create')),
	array('label'=>'View Classe', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Classe', 'url'=>array('admin')),
);
?>

<h1>Update Classe <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>