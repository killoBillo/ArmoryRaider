<?php
/* @var $this CharacterController */
/* @var $model Character */

$this->breadcrumbs=array(
	'Characters'=>array('index'),
	'Create Step 2',
);
?>

<h1 class="form-heading"><?php echo Yii::t('locale', 'Create Character <small>step 2 of 2</small>'); ?></h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'character-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array(
		'class'=>'standard-form span5'
	),		
)); ?>

	<label class="checkbox">
		<?php echo CHtml::checkBox('CharacterHasRole[role_id][]', '', array('value'=>'1'))?>
		Tank
	</label>
	
	<label class="checkbox">
		<?php echo CHtml::checkBox('CharacterHasRole[role_id][]', '', array('value'=>'2'))?>
		Healer
	</label>
	
	<label class="checkbox">
		<?php echo CHtml::checkBox('CharacterHasRole[role_id][]', '', array('value'=>'3'))?>
		DPS Melee
	</label>
	
	<label class="checkbox">
		<?php echo CHtml::checkBox('CharacterHasRole[role_id][]', '', array('value'=>'4'))?>
		DPS Ranged
	</label>

	<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('locale', 'Create') : Yii::t('locale', 'Save'), array('class'=>'btn')); ?>

<?php $this->endWidget(); ?>