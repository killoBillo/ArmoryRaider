<?php
/* @var $this GuildroleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Guildroles',
);

$this->menu=array(
	array('label'=>'Create Guildrole', 'url'=>array('create')),
	array('label'=>'Manage Guildrole', 'url'=>array('admin')),
);
?>

<h1>Guildroles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
