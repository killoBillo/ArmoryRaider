<?php
/* @var $this GuildroleController */
/* @var $model Guildrole */

$this->breadcrumbs=array(
	'Guildroles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Guildrole', 'url'=>array('index')),
	array('label'=>'Create Guildrole', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('guildrole-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('locale', 'Manage Guild roles'); ?></h1>

<div class='well'>
	<?php echo CHtml::link(Yii::t('locale', 'Add role'), array('guildrole/create'), array('class'=>'btn btn-success'))?>
	
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'guildrole-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'id',
			'label',
			array(
				'class'=>'CButtonColumn',
				'template'=>'{update}',
			),
		),
	)); ?>
</div>
