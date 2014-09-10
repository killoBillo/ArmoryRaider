<?php
/* @var $this CharacterEventController */
/* @var $model CharacterEvent */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'character-event-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id'); ?>
		<?php echo $form->error($model,'event_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'char_id'); ?>
		<?php echo $form->textField($model,'char_id'); ?>
		<?php echo $form->error($model,'char_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'available_flag'); ?>
		<?php echo $form->textField($model,'available_flag'); ?>
		<?php echo $form->error($model,'available_flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'holder_flag'); ?>
		<?php echo $form->textField($model,'holder_flag'); ?>
		<?php echo $form->error($model,'holder_flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment_date'); ?>
		<?php echo $form->textField($model,'comment_date'); ?>
		<?php echo $form->error($model,'comment_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->