<?php
/* @var $this SiteController */
/* @var $model RegisterForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
	'Register',
);


		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'register-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'class'=>'form-signin'
			),		
		)); 
?>

		<h2 class="form-signin-heading"><?php echo Yii::t('locale', 'Register'); ?></h2>
			
		<?php //echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name', array('class'=>'input-block-level', 'placeholder'=>'Name *')); ?>
		<?php echo $form->error($model,'name'); ?>
	
		<?php //echo $form->labelEx($model,'surname'); ?>
		<?php echo $form->textField($model,'surname', array('class'=>'input-block-level', 'placeholder'=>'Surname *')); ?>
		<?php echo $form->error($model,'surname'); ?>

		<?php //echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username', array('class'=>'input-block-level', 'placeholder'=>'Username *')); ?>
		<?php echo $form->error($model,'username'); ?>
	
		<?php //echo $form->labelEx($model,'email'); ?>
		<?php echo $form->emailField($model,'email', array('class'=>'input-block-level', 'placeholder'=>'Email *')); ?>
		<?php echo $form->error($model,'email'); ?>

		<?php //echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', array('class'=>'input-block-level', 'placeholder'=>'Password *')); ?>
		<?php echo $form->error($model,'password'); ?>
	
		<?php //echo $form->labelEx($model,'repeat your password'); ?>
		<?php echo $form->passwordField($model,'verifypassword', array('class'=>'input-block-level', 'placeholder'=>'Password confirm *')); ?>
		<?php echo $form->error($model,'verifypassword'); ?>
		
		<div class="btn-group">
			<?php echo CHtml::submitButton(Yii::t('locale', 'Send'), array('class'=>'btn')); ?>
			<?php echo CHtml::link(Yii::t('locale', 'Back to login'), Yii::app()->createUrl('/site/login'), array('class'=>'btn'));?>
		</div>

<?php $this->endWidget(); ?>
