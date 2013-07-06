<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Manage',
);

	Yii::app()->clientScript->registerScript('search', "
		$('.search-button').click(function(){
			$('.search-form').toggle();
			return false;
		});
		$('.search-form form').submit(function(){
			$.fn.yiiGridView.update('event-grid', {
				data: $(this).serialize()
			});
			return false;
		});
	");
?>

<h1><?php echo Yii::t('locale', 'Manage Events'); ?></h1>

<div class='well'>
	<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
	<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->
	
	<?php 
		$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'event-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'id',
				'raid_id'=>array(
					'header'=>'Raid',
					'type'=>'raw',
					'value'=>'Raid::model()->findByPk($data->raid_id)->name',
				),
				'raid_leader_id'=>array(
					'header'=>'Raidleader',
					'type'=>'raw',
					'value'=>'User::model()->findByPk($data->raid_leader_id)->username',
				),
				'event_date',
				'creation_date',
				'description'=>array(
					'header'=>'description',
					'type'=>'html',
					'value'=>'$data->description',
				),
				array(
					'class'=>'CButtonColumn',
					'template'=>'{delete}{update}',
				),
			),
		)); 
	?>
</div><!-- /well -->
