<?php
/* @var $this EventController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Events',
);

$this->menu=array(
	array('label'=>'Create Event', 'url'=>array('create')),
	array('label'=>'Manage Event', 'url'=>array('admin')),
);
?>

<h3 class="title">Events</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
