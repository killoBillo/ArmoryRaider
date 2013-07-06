<?php
/* @var $this CharacterController */
/* @var $model Character */

$this->breadcrumbs=array(
	'Characters'=>array('index'),
	'Manage',
);

	Yii::app()->clientScript->registerScript('search', "
		$('.search-button').click(function(){
			$('.search-form').toggle();
			return false;
		});
		$('.search-form form').submit(function(){
			$.fn.yiiGridView.update('character-grid', {
				data: $(this).serialize()
			});
			return false;
		});
	");
	
	/**
	 * creo l'array delle columns, lo gestisco qui perchè
	 * voglio che l'admin possa cancellare i PG, ma non possa il raidleader
	 */ 
	$columns = array(
				'id',
				'user_id'=>array(
					'header'=>'User',
					'value'=>'User::model()->findByPk($data->user_id)->username',
				),
				'class_id'=>array(
					'header'=>'Class',
					'value'=>'Classe::model()->findByPk($data->class_id)->name',
				),
				'race_id'=>array(
					'header'=>'Race',
					'value'=>'Race::model()->findByPk($data->race_id)->name',
				),
				/*'gender_id',*/
				/*'faction_id',*/
				/*'guild_id',*/
				'name',
				'level',
				'title',
				'item_level',
				/*'portrait_URL',*/
				/*'armory_URL',*/
				/*'is_main',*/
			);

	// se l'utente è admin può anche cancellare i PG.
	if(RaiderFunctions::isAdmin())
		$columns[] = array(
						'class'=>'CButtonColumn',
						'template'=>'{delete}{update}',
					);
	else
 		$columns[] = array(
					'class'=>'CButtonColumn',
					'template'=>'{update}',
				);
	
?>



<h1><?php echo Yii::t('locale', 'Manage Characters'); ?></h1>

<div class='well'>

	<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
	<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
	</div><!-- search-form -->

	<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'character-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
	 	'ajaxUpdate'=>false,
		'columns'=>$columns,
	)); 
	?>
</div><!-- /well -->
