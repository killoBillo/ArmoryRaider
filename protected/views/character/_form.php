<?php
/* @var $this CharacterController */
/* @var $model Character */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'character-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class_id'); ?>
		<?php echo $form->textField($model,'class_id'); ?>
		<?php echo $form->error($model,'class_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'race_id'); ?>
		<?php echo $form->textField($model,'race_id'); ?>
		<?php echo $form->error($model,'race_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender_id'); ?>
		<?php echo $form->textField($model,'gender_id'); ?>
		<?php echo $form->error($model,'gender_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'faction_id'); ?>
		<?php echo $form->textField($model,'faction_id'); ?>
		<?php echo $form->error($model,'faction_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guild_id'); ?>
		<?php echo $form->textField($model,'guild_id'); ?>
		<?php echo $form->error($model,'guild_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'char_name'); ?>
		<?php echo $form->textField($model,'char_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'char_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item_level'); ?>
		<?php echo $form->textField($model,'item_level',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'item_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'portrait_URL'); ?>
		<?php echo $form->textField($model,'portrait_URL',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'portrait_URL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'armory_URL'); ?>
		<?php echo $form->textField($model,'armory_URL',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'armory_URL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_main'); ?>
		<?php echo $form->textField($model,'is_main'); ?>
		<?php echo $form->error($model,'is_main'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->