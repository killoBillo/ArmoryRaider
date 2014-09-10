<?php
/* @var $this CharacterEventController */
/* @var $model CharacterEvent */
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
		<?php echo $form->label($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'char_id'); ?>
		<?php echo $form->textField($model,'char_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'available_flag'); ?>
		<?php echo $form->textField($model,'available_flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'holder_flag'); ?>
		<?php echo $form->textField($model,'holder_flag'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment_date'); ?>
		<?php echo $form->textField($model,'comment_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->