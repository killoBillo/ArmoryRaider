<?php
/* @var $this FactionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Factions',
);

$this->menu=array(
	array('label'=>'Create Faction', 'url'=>array('create')),
	array('label'=>'Manage Faction', 'url'=>array('admin')),
);
?>

<h1>Factions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
