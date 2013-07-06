<?php
/* @var $this RaidController */
/* @var $model Raid */

$this->breadcrumbs=array(
	'Raids'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Raid', 'url'=>array('index')),
	array('label'=>'Create Raid', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('raid-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('locale', 'Manage Raids'); ?></h1>

<div class='well'>
	<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
	<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->
	
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'raid-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'id',
			'name',
			'level',
			'img',
			'number_of_players',
			'description',
			/*
			'color',
			'is_heroic',
			'is_active',
			*/
			array(
				'class'=>'CButtonColumn',
				'template'=>'{delete}{update}',
			),
		),
	)); 
	?>
</div><!-- /well -->
