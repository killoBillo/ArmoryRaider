<?php
/* @var $this GuildController */
/* @var $model Guild */
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
		<?php echo $form->label($model,'realm'); ?>
		<?php echo $form->textField($model,'realm',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tag'); ?>
		<?php echo $form->textField($model,'tag',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guild_master_id'); ?>
		<?php echo $form->textField($model,'guild_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'faction_id'); ?>
		<?php echo $form->textField($model,'faction_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'URL'); ?>
		<?php echo $form->textField($model,'URL',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'img'); ?>
		<?php echo $form->textField($model,'img',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->