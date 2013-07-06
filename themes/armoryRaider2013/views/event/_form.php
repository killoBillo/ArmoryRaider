<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */

	Yii::app()->clientScript->registerScript('timepicker', "
		// timepicker
		$('#timepicker').timepicker({
			minutestep: 15,
			showMeridian: false
		});
		
		//wysihtml5
		$('#description-textarea').wysihtml5({
			image: false
		});
	");
	
	/**
	 * preparo i placeholder di orario e descrizione, in caso di modifica 
	 * dell'evento li popolo con i dati già presenti, altrimenti li imposto alle
	 * 21:00 l'orario e a Yii::t('locale', 'Insert description...') la descrizione
	 */
	$placeholderDescription = (!empty($model->description)) ? $model->description : Yii::t('locale', 'Insert description...');
	$valueDescription = (!empty($model->description)) ? $model->description : '';
	$event_date = new DateTime($model->event_date);
	
	if(!$model->isNewRecord)
		$valueEventHour = $event_date->format('H:i');
	else
		$valueEventHour = '21:00';
?>

<div class="well">
<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'event-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'htmlOptions'=>array(
			'class'=>''
		),
	)); 
?>

		<?php echo $form->labelEx($model,'raid_id'); ?>
		<?php echo $form->dropDownList($model, 'raid_id', CHtml::listData(Raid::model()->findAll('is_active = 1'), 'id', 'name'), array('class'=>'input-large input-block-level'))?>
		<?php echo $form->error($model,'raid_id'); ?>
		
		<?php echo $form->labelEx($model, 'raid_leader_id'); ?>
		<?php echo $form->dropDownList($model, 'raid_leader_id', CHtml::listData(RaiderFunctions::getRaidleaders(), 'id', 'username'), array('class'=>'input-large input-block-level')); ?>
		<?php echo $form->error($model,'raid_leader_id'); ?>		

	<div class="row input-append bootstrap-timepicker">
		<?php echo $form->labelEx($model, Yii::t('locale' ,'event hour')); ?>
		<?php echo CHtml::textField('event_hour', $valueEventHour, array('id'=>'timepicker', 'class'=>'input-small input-block-level', 'style'=>'margin-bottom:10px;')); ?>
		<span class="add-on"><i class="icon-time"></i></span>
	</div>	

		<?php echo $form->hiddenField($model,'event_date'); ?>
		<?php echo $form->error($model,'event_date'); ?>	

		<?php echo $form->hiddenField($model,'creation_date'); ?>
		<?php echo $form->error($model,'creation_date'); ?>

		<?php echo $form->labelEx($model,Yii::t('locale', 'description')); ?>
		<?php echo CHtml::textArea('Event[description]', '', array('id'=>'description-textarea', 'class'=>'input-block-level' , 'style'=>'height:200px;','placeholder'=>$placeholderDescription, 'value'=>$valueDescription)); ?>
		<?php echo $form->error($model,'description'); ?>

		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('locale', 'Create') : Yii::t('locale', 'Save'), array('class'=>'btn')); ?>

	<?php $this->endWidget(); ?>


<!-- Bootstrap timepicker sources -->
<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap-timepicker.css">
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap-timepicker.min.js"></script>

<!-- Bootstrap wysihtml5 sources -->
<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap-wysihtml5.css">
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/wysihtml5-0.3.0.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap-wysihtml5.js"></script>

</div><!-- /well -->