<?php
/* @var $this UserattributesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Userattributes',
);

$this->menu=array(
	array('label'=>'Create Userattributes', 'url'=>array('create')),
	array('label'=>'Manage Userattributes', 'url'=>array('admin')),
);
?>

<h1>Userattributes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
