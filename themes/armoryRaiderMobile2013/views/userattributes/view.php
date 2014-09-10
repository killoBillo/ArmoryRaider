<?php
/* @var $this UserattributesController */
/* @var $model Userattributes */

$this->breadcrumbs=array(
	'Userattributes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Userattributes', 'url'=>array('index')),
	array('label'=>'Create Userattributes', 'url'=>array('create')),
	array('label'=>'Update Userattributes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Userattributes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Userattributes', 'url'=>array('admin')),
);
?>

<h1>View Userattributes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'guildrole_id',
		'portrait',
		'second_email',
		'phone_number',
		'site_URL',
		'last_login',
		'locale',
		'timezone',
	),
)); ?>
