<?php
/* @var $this RaidController */
/* @var $model Raid */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'raid-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); echo $model->getScenario();?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number_of_players'); ?>
		<?php echo $form->textField($model,'number_of_players'); ?>
		<?php echo $form->error($model,'number_of_players'); ?>
	</div>

	<?php if($model->isNewRecord) { ?>
	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->fileField($model, 'img')				//echo $form->textField($model,'img',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>
	<?php } else {?>
	<div class="row">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->textField($model,'img',array('class'=>'change-img', 'disabled'=>'disabled')); ?>
		<?php echo $form->fileField($model, 'img', array('class'=>'change-img', 'style'=>'display:none;')); ?>
		<?php echo CHtml::link('cambia immagine','',array('class'=>'change-img-link', 'onclick'=>'javascript:$(".change-img").toggle(200)')); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>
	<?php } ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'is_heroic'); ?>
		<?php echo $form->checkBox($model, 'is_heroic'); //$form->textField($model,'is_heroic'); ?>
		<?php echo $form->error($model,'is_heroic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->checkBox($model, 'is_active'); //$form->textField($model,'is_active'); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php $this->widget('application.extensions.redactorjs.Redactor', array('toolbar'=>'mini', 'model' => $model, 'attribute' => 'description')); //$form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<!--
	<div class="row">
		<?php echo $form->labelEx($model,'color'); ?>
		<?php echo $form->textField($model,'color',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'color'); ?>
	</div>
	-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->