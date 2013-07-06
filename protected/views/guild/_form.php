<?php
/* @var $this GuildController */
/* @var $model Guild */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guild-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'realm'); ?>
		<?php echo $form->textField($model,'realm',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'realm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tag'); ?>
		<?php echo $form->textField($model,'tag',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guild_master_id'); ?>
		<?php echo $form->textField($model,'guild_master_id'); ?>
		<?php echo $form->error($model,'guild_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'faction_id'); ?>
		<?php echo $form->textField($model,'faction_id'); ?>
		<?php echo $form->error($model,'faction_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'URL'); ?>
		<?php echo $form->textField($model,'URL',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'URL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->textField($model,'img',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->