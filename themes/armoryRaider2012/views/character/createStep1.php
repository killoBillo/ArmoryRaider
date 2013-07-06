<?php
/* @var $this CharacterController */
/* @var $model Character */

$this->breadcrumbs=array(
	'Characters'=>array('index'),
	'Create Step One',
);

$this->menu=array(
	array('label'=>'List Character', 'url'=>array('index')),
	array('label'=>'Manage Character', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('locale', 'Create Character: step 1 of 2'); ?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'character-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'realm'); ?>
		<?php echo $form->textField($model,'realm'); ?>
		<?php echo $form->error($model,'realm'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('send'); ?>
	</div>


<?php $this->endWidget(); ?>
</div><!-- form -->