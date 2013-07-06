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
	<p>
		You cannot edit a character this way, because almost each setting is related to WOW Armory.
		<br />
		<strong>But </strong>... you can change the character owner if you are a Raid Leader!!! Just in case somebody stole someone else's character.
	</p>
	<?php echo $form->errorSummary($model, $model->character_has_spec, $model->character_has_role); ?>

	<div class="row" style='padding:30px;'>
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', 'username')); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
	
	<p>Summary of the whole data</p>
	
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'level', array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'item_level'); ?>
		<?php echo $form->textField($model,'item_level',array('size'=>10,'maxlength'=>10,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'item_level'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'class_id'); ?>
		<?php echo $form->dropDownList($model, 'class_id', CHtml::listData(Classe::model()->findAll(), 'id', 'name'), array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'class_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'race_id'); ?>
		<?php echo $form->dropDownList($model, 'race_id', CHtml::listData(Race::model()->findAll(), 'id', 'name'), array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'race_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender_id'); ?>
		<?php echo $form->dropDownList($model, 'gender_id', CHtml::listData(Gender::model()->findAll(), 'id', 'name'), array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'gender_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'faction_id'); ?>
		<?php echo $form->dropDownList($model, 'faction_id', CHtml::listData(Faction::model()->findAll(), 'id', 'name'), array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'faction_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guild_id'); ?>
		<?php echo $form->dropDownList($model, 'guild_id', CHtml::listData(Guild::model()->findAll(), 'id', 'name'), array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'guild_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'portrait_URL'); ?>
		<?php echo $form->textField($model,'portrait_URL',array('size'=>60,'maxlength'=>255, 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'portrait_URL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'armory_URL'); ?>
		<?php echo $form->textField($model,'armory_URL',array('size'=>60,'maxlength'=>255, 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'armory_URL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_main'); ?>
		<?php echo $form->dropDownList($model, 'is_main', array('0'=>'No', '1'=>'Yes'), array('disabled'=>'disabled'));		//echo $form->textField($model,'is_main'); ?>
		<?php echo $form->error($model,'is_main'); ?>
	</div>
	
	<h2>Spec Info</h2>
	<div class="row">
		<?php echo $form->labelEx($model->character_has_spec,'spec_id'); ?>
		<?php echo $form->checkBoxList(
						$model->character_has_spec, 
						'spec_id', 
						CHtml::listData(Spec::model()->findAllByPk($model->character_has_spec->spec_id), 'id', 'name'), 
						array('disabled'=>'disabled')
		); ?>
		<?php echo $form->error($model->character_has_spec,'spec_id'); ?>
	</div>
	
	<h2>Role info</h2>
	<div class="row">
		<?php echo $form->labelEx($model->character_has_role,'role_id'); ?>
		<?php echo $form->checkBoxList($model->character_has_role, 'role_id', CHtml::listData(Role::model()->findAll(), 'id', 'name'), array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model->character_has_role,'role_id'); ?>
	</div>	
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->