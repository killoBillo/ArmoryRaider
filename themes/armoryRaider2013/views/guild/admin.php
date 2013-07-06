<?php
/* @var $this GuildController */
/* @var $model Guild */

$this->breadcrumbs=array(
	'Guilds'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Guild', 'url'=>array('index')),
	array('label'=>'Create Guild', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$.fn.yiiGridView.update('guild-grid', {
			data: $(this).serialize()
		});
		return false;
	});
");
?>

<h1><?php echo Yii::t('locale', 'Manage Guilds'); ?></h1>

<div class='well'>
	<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
	<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->
	
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'guild-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'id',
			'realm',
			'name',
			'tag',
			'guild_master_id',
			'faction_id'=>array(
				'header'=>'faction',
				'value'=>'Faction::model()->findByPk($data->id)->name',
			),
			/*
			'URL',
			'img',
			*/
			array(
				'class'=>'CButtonColumn',
				'template'=>'{update}',
			),
		),
	)); ?>
</div>