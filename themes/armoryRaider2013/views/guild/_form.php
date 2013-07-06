<?php
/* @var $this GuildController */
/* @var $model Guild */
/* @var $form CActiveForm */

$config = Config::model()->findAll();
$realm = $config[0]->armory_realm;
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guild-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model, NULL, NULL, array('class'=>'alert alert-error')); ?>
	
<div class='row-fluid'>
	<div class="span5">
		<div class='well'>	
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45, 'class'=>'input-block-level')); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>

		<div class='well'>	
			<?php echo $form->labelEx($model,'realm'); ?>
			<?php echo $form->textField($model,'realm',array('size'=>45,'maxlength'=>45, 'class'=>'input-block-level', 'value'=>$realm)); ?>
			<?php echo $form->error($model,'realm'); ?>
		</div>
		
		<div class='well'>	
			<?php echo $form->labelEx($model,'guild_master_id'); ?>
			<?php echo $form->dropDownList($model, 'guild_master_id', CHtml::listData(User::model()->findAll(), 'id', 'username'), array('class'=>'input-block-level'));							//$form->textField($model,'guild_master_id'); ?>
			<?php echo $form->error($model,'guild_master_id'); ?>
		</div>
		
		<div class='well'>	
			<?php echo $form->labelEx($model,'faction_id'); ?>
			<?php echo $form->dropDownList($model, 'faction_id', CHtml::listData(Faction::model()->findAll(), 'id', 'name'), array('size'=>2, 'class'=>'input-block-level'));							//echo $form->textField($model,'faction_id'); ?>
			<?php echo $form->error($model,'faction_id'); ?>
		</div>
		
		<div class='well'>	
			<?php echo $form->labelEx($model,'URL'); ?>
			<?php echo $form->textField($model,'URL',array('size'=>60,'maxlength'=>255, 'class'=>'input-block-level')); ?>
			<?php echo $form->error($model,'URL'); ?>
		</div>

		<?php //echo $form->labelEx($model,'tag'); ?>
		<?php //echo $form->textField($model,'tag',array('size'=>45,'maxlength'=>45, 'class'=>'input-block-level')); ?>
		<?php //echo $form->error($model,'tag'); ?>
		
		<?php //echo $form->labelEx($model,'img'); ?>
		<?php //echo $form->textField($model,'img',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'img'); ?>
	</div><!-- /span5 -->

	<div class='span5 well'>
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('locale', 'Create') : Yii::t('locale', 'Save'), array('class'=>'btn btn-success')); ?>
	</div><!-- /span5 -->
</div><!-- /row-fluid -->

<?php $this->endWidget(); ?>