<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'raid_id'); ?>
		<?php echo $form->textField($model,'raid_id'); ?>
		<?php echo $form->error($model,'raid_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'raid_leader_id'); ?>
		<?php echo $form->textField($model,'raid_leader_id'); ?>
		<?php echo $form->error($model,'raid_leader_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_date'); ?>
		<?php echo $form->textField($model,'event_date'); ?>
		<?php echo $form->error($model,'event_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
		<?php echo $form->error($model,'creation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->