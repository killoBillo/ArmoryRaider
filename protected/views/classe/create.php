<?php
/* @var $this ClasseController */
/* @var $model Classe */

$this->breadcrumbs=array(
	'Classes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Classe', 'url'=>array('index')),
	array('label'=>'Manage Classe', 'url'=>array('admin')),
);
?>

<h1>Create Classe</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>