<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'config-form',
		'enableAjaxValidation'=>false,
	));
	
	// configuro il placeholder per il brand
	$brandPlaceholder = (!empty($model->brand)) ? $model->brand : "ArmoryRaider"; 

?>

	<?php echo $form->errorSummary($model, NULL, NULL, array('class'=>'alert alert-error')); ?>

<div class='row-fluid'>
	<div class='span5'>
		<div class='well'>
			<?php echo $form->labelEx($model, 'timezone'); ?>
			<?php echo $form->dropDownList($model, 'timezone', $this->timezones, array('class'=>'input-block-level')); ?>
			<?php echo $form->error($model,'timezone'); ?>
		</div>

		<div class='well'>
			<?php echo $form->labelEx($model, 'locale'); ?>
			<?php echo $form->dropDownList($model, 'locale', RaiderFunctions::getLocaleArray(), array('class'=>'input-block-level')); ?>
			<?php echo $form->error($model,'locale'); ?>
		</div>
		
		<div class='well'>
			<?php echo $form->labelEx($model,'armory_region'); ?>
			<?php echo $form->dropDownList($model, 'armory_region', array('eu'=>'Europe', 'us'=>'America'), array('class'=>'input-block-level')); ?>
			<?php //echo $form->textField($model,'armory_region',array('size'=>45,'maxlength'=>45, 'class'=>'input-block-level')); ?>
			<?php echo $form->error($model,'armory_region'); ?>
		</div>
		
		<div class='well'>
			<?php echo $form->labelEx($model,'armory_realm'); ?>
			<?php echo $form->textField($model,'armory_realm',array('size'=>45,'maxlength'=>45, 'class'=>'input-block-level')); ?>
			<?php echo $form->error($model,'armory_realm'); ?>
		</div>
		
		<div class='well'>
			<?php echo $form->labelEx($model,'brand'); ?>
			<?php echo $form->textField($model,'brand',array('size'=>45,'maxlength'=>45, 'class'=>'input-block-level', 'placeholder'=>$brandPlaceholder, 'value'=>$brandPlaceholder)); ?>
			<?php echo $form->error($model,'brand'); ?>
		</div>
		<?php //echo $form->labelEx($model,'debug_mode'); ?>
		<?php //echo $form->textField($model,'debug_mode',array('size'=>45,'maxlength'=>45)); ?>
		<?php //echo $form->error($model,'debug_mode'); ?>

		<?php //echo $form->labelEx($model,'event_notification_active'); ?>
		<?php //echo $form->textField($model,'event_notification_active',array('size'=>45,'maxlength'=>45)); ?>
		<?php //echo $form->error($model,'event_notification_active'); ?>

		<?php //echo $form->labelEx($model,'welcome_message'); ?>
		<?php //echo $form->textArea($model,'welcome_message',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'welcome_message'); ?>

		<?php //echo $form->labelEx($model,'template'); ?>
		<?php //echo $form->textField($model,'template',array('size'=>45,'maxlength'=>45)); ?>
		<?php //echo $form->error($model,'template'); ?>
	</div>
	
	<div class='span5 well'>
		<?php echo CHtml::submitButton(Yii::t('locale', 'Save'), array('class'=>'btn btn-success')); ?>
	</div>
</div>
	

<?php $this->endWidget(); ?>