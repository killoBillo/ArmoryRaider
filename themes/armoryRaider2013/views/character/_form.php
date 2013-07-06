<?php
/* @var $this CharacterController */
/* @var $model Character */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'character-form',
		'enableAjaxValidation'=>false,
	)); 
?>

	<p class='alert alert-info'>
		<?php 
			echo Yii::t('locale', 'You cannot edit a character this way, because almost each setting is related to WOW Armory.<br /><strong>But </strong>... you can change the character owner if you are a Raid Leader!!! Just in case somebody stoles someone else\'s character.');
		?>
	</p>
	
	<?php echo $form->errorSummary($model, $model->character_has_spec, $model->character_has_role); ?>
	
	<div class='row-fluid'>
		<div class='span5 well'>
			<div class="row">
				<h4><?php echo Yii::t('locale', 'Modify the character owner'); ?></h4>
			</div>		
			<div class="row alert alert-success">
				<?php echo $form->labelEx($model,'user_id'); ?>
				<?php echo $form->dropDownList($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', 'username')); ?>
				<?php echo $form->error($model,'user_id'); ?>
			</div>
		</div><!-- /span5 -->
		
		<div class='span5 well'>	
			<div class="row">
				<h4><?php echo Yii::t('locale', 'Summary of the whole data'); ?></h4>
			</div>
			
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model,'name'); ?>
				<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45,'disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'name'); ?>
			</div>
		
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model,'level'); ?>
				<?php echo $form->textField($model,'level', array('disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'level'); ?>
			</div>
				
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model,'title'); ?>
				<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'title'); ?>
			</div>
			
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model,'item_level'); ?>
				<?php echo $form->textField($model,'item_level',array('size'=>10,'maxlength'=>10,'disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'item_level'); ?>
			</div>	
		
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model,'class_id'); ?>
				<?php echo $form->dropDownList($model, 'class_id', CHtml::listData(Classe::model()->findAll(), 'id', 'name'), array('disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'class_id'); ?>
			</div>
		
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model,'race_id'); ?>
				<?php echo $form->dropDownList($model, 'race_id', CHtml::listData(Race::model()->findAll(), 'id', 'name'), array('disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'race_id'); ?>
			</div>
		
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model,'gender_id'); ?>
				<?php echo $form->dropDownList($model, 'gender_id', CHtml::listData(Gender::model()->findAll(), 'id', 'name'), array('disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'gender_id'); ?>
			</div>
		
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model,'faction_id'); ?>
				<?php echo $form->dropDownList($model, 'faction_id', CHtml::listData(Faction::model()->findAll(), 'id', 'name'), array('disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'faction_id'); ?>
			</div>
		
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model,'guild_id'); ?>
				<?php echo $form->dropDownList($model, 'guild_id', CHtml::listData(Guild::model()->findAll(), 'id', 'name'), array('disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'guild_id'); ?>
			</div>
		
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model,'portrait_URL'); ?>
				<?php echo $form->textField($model,'portrait_URL',array('size'=>60,'maxlength'=>255, 'disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'portrait_URL'); ?>
			</div>
		
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model,'armory_URL'); ?>
				<?php echo $form->textField($model,'armory_URL',array('size'=>60,'maxlength'=>255, 'disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'armory_URL'); ?>
			</div>
		
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model,'is_main'); ?>
				<?php echo $form->dropDownList($model, 'is_main', array('0'=>'No', '1'=>'Yes'), array('disabled'=>'disabled'));		//echo $form->textField($model,'is_main'); ?>
				<?php echo $form->error($model,'is_main'); ?>
			</div>
			
			<h5>Spec Info</h5>
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model->character_has_spec,'spec_id'); ?>
				<?php echo $form->checkBoxList(
								$model->character_has_spec, 
								'spec_id', 
								CHtml::listData(Spec::model()->findAllByPk($model->character_has_spec->spec_id), 'id', 'name'), 
								array('disabled'=>'disabled')
				); ?>
				<?php echo $form->error($model->character_has_spec,'spec_id'); ?>
			</div>
			
			<h5>Role info</h5>
			<div class="row alert alert-warning">
				<?php echo $form->labelEx($model->character_has_role,'role_id'); ?>
				<?php echo $form->checkBoxList($model->character_has_role, 'role_id', CHtml::listData(Role::model()->findAll(), 'id', 'name'), array('disabled'=>'disabled')); ?>
				<?php echo $form->error($model->character_has_role,'role_id'); ?>
			</div>	
		</div><!-- /span5 -->	
		
		<div class='span2 well'>
			<div class="row">
				<?php echo CHtml::submitButton($model->isNewRecord ?  Yii::t('locale', 'Create') : Yii::t('locale', 'Save'), array('class'=>'btn btn-success')); ?>
			</div>
		</div><!-- /span2 -->
	</div><!-- /row-fluid -->

<?php $this->endWidget(); ?>

</div><!-- form -->