<?php
/* @var $this UserattributesController */
/* @var $model Userattributes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'userattributes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guildrole_id'); ?>
		<?php echo $form->textField($model,'guildrole_id'); ?>
		<?php echo $form->error($model,'guildrole_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'portrait'); ?>
		<?php echo $form->textField($model,'portrait',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'portrait'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'second_email'); ?>
		<?php echo $form->textField($model,'second_email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'second_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'site_URL'); ?>
		<?php echo $form->textField($model,'site_URL',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'site_URL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_login'); ?>
		<?php echo $form->textField($model,'last_login'); ?>
		<?php echo $form->error($model,'last_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'locale'); ?>
		<?php echo $form->textField($model,'locale',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'locale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'timezone'); ?>
		<?php echo $form->textField($model,'timezone',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'timezone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->