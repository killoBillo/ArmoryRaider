<?php
/* @var $this UserattributesController */
/* @var $model Userattributes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guildrole_id'); ?>
		<?php echo $form->textField($model,'guildrole_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'portrait'); ?>
		<?php echo $form->textField($model,'portrait',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'second_email'); ?>
		<?php echo $form->textField($model,'second_email',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_URL'); ?>
		<?php echo $form->textField($model,'site_URL',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_login'); ?>
		<?php echo $form->textField($model,'last_login'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'locale'); ?>
		<?php echo $form->textField($model,'locale',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timezone'); ?>
		<?php echo $form->textField($model,'timezone',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->