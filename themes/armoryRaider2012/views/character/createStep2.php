<?php
/* @var $this CharacterController */
/* @var $model Character */

$this->breadcrumbs=array(
	'Characters'=>array('index'),
	'Create Step 2',
);

$this->menu=array(
	array('label'=>'List Character', 'url'=>array('index')),
	array('label'=>'Manage Character', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('locale', 'Create Character: step 2 of 2'); ?></h1>

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
		<?php echo $form->labelEx($model,'role_id'); ?>
		<?php echo $form->checkBoxList($model, 'role_id', CHtml::listData(Role::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'role_id'); ?>
	</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>