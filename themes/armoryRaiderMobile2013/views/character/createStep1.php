<?php
/* @var $this CharacterController */
/* @var $model Character */

$this->breadcrumbs=array(
	'Characters'=>array('index'),
	'Create Step One',
);

$realm = Config::model()->findByPk(1)->armory_realm;
?>

<h1 class="form-heading"><?php echo Yii::t('locale', 'Create Character <small>step 1 of 2</small>'); ?></h1>

<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'character-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'htmlOptions'=>array(
			'class'=>'standard-form span5'
		),	
	)); 
?>

	<?php echo $form->textField($model,'name', array('class'=>'input-block-level', 'placeholder'=>'Name *')); ?>
	<?php echo $form->error($model,'name'); ?>

	<?php echo $form->textField($model,'realm', array('class'=>'input-block-level', 'placeholder'=>$realm, 'value'=>$realm)); ?>
	<?php echo $form->error($model,'realm'); ?>

	<?php echo CHtml::submitButton(Yii::t('locale', 'Send'), array('class'=>'btn')); ?>


<?php $this->endWidget(); ?>
