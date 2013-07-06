<?php
/* @var $this ClasseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Classes',
);

$this->menu=array(
	array('label'=>'Create Classe', 'url'=>array('create')),
	array('label'=>'Manage Classe', 'url'=>array('admin')),
);
?>

<h1>Classes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
