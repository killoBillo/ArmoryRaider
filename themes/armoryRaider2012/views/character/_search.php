<?php
/* @var $this CharacterController */
/* @var $model Character */
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
		<?php echo $form->label($model,'class_id'); ?>
		<?php echo $form->textField($model,'class_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'race_id'); ?>
		<?php echo $form->textField($model,'race_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender_id'); ?>
		<?php echo $form->textField($model,'gender_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'faction_id'); ?>
		<?php echo $form->textField($model,'faction_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guild_id'); ?>
		<?php echo $form->textField($model,'guild_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'item_level'); ?>
		<?php echo $form->textField($model,'item_level',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'portrait_URL'); ?>
		<?php echo $form->textField($model,'portrait_URL',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'armory_URL'); ?>
		<?php echo $form->textField($model,'armory_URL',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_main'); ?>
		<?php echo $form->textField($model,'is_main'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->