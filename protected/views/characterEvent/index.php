<?php
/* @var $this CharacterEventController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Character Events',
);

$this->menu=array(
	array('label'=>'Create CharacterEvent', 'url'=>array('create')),
	array('label'=>'Manage CharacterEvent', 'url'=>array('admin')),
);
?>

<h1>Character Events</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
