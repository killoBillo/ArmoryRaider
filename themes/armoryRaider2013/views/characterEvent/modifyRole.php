<?php
/* @var $this CharacterEventController */
/* @var $model CharacterEvent */
/* @var $form CActiveForm */
?>
<h4><?php echo Yii::t('locale', 'Change role'); ?></h4>

<div class='well'>
<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'character-event-form',
		'enableAjaxValidation'=>false,
			'htmlOptions'=>array(
				'class'=>''
			),
	)); 
?>

		<?php echo $form->errorSummary($model, NULL, NULL, array('class'=>'alert alert-error')); ?>

		<?php echo $form->labelEx($model,'role_id'); ?>
		<?php echo $form->dropDownList($model, 'role_id', CHtml::listData(Role::model()->findAll(), 'id', 'name'), array('class'=>'input-large input-block-level', 'options' => array('2'=>array('selected'=>true))))?>
		<?php echo $form->error($model,'description'); ?>		

		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('locale', 'Sign up') : Yii::t('locale', 'Update'), array('class'=>'btn')); ?>

<?php $this->endWidget(); ?>
</div><!-- /well -->
