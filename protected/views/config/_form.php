<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'config-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'timezone'); ?>
		<?php echo $form->textField($model,'timezone',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'timezone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'locale'); ?>
		<?php echo $form->textField($model,'locale',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'locale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'armory_region'); ?>
		<?php echo $form->textField($model,'armory_region',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'armory_region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'armory_realm'); ?>
		<?php echo $form->textField($model,'armory_realm',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'armory_realm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'brand'); ?>
		<?php echo $form->textField($model,'brand',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'brand'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debug_mode'); ?>
		<?php echo $form->textField($model,'debug_mode',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'debug_mode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_notification_active'); ?>
		<?php echo $form->textField($model,'event_notification_active',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'event_notification_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'welcome_message'); ?>
		<?php echo $form->textArea($model,'welcome_message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'welcome_message'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'template'); ?>
		<?php echo $form->textField($model,'template',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'template'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->