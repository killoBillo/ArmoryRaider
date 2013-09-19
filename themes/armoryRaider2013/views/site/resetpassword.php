<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Reset Password';
$this->breadcrumbs=array(
	'reset password',
);
?>

<?php if(Yii::app()->user->hasFlash('resetpsw_err')): ?>
	<div class="alert alert-danger">
		<?php echo Yii::app()->user->getFlash('resetpsw_err'); ?>
	</div>
<?php endif; ?>

<?php 
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'resetpassword-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array(
				'class'=>'form-signin'
			),
		)); 
?>
		<h2 class="form-signin-heading"><?php echo Yii::t('locale', 'Reset your password'); ?></h2>
	
		<?php echo $form->emailField($model, 'email', array('class'=>'input-block-level', 'placeholder'=>Yii::t('locale', 'Email *'))); ?>
		
		<div class="btn-group">
			<?php echo CHtml::submitButton(Yii::t('locale', 'Send'), array('class'=>'btn')); ?>
			<?php echo CHtml::link(Yii::t('locale', 'Back to login'), Yii::app()->createUrl('/site/login'), array('class'=>'btn'));?>
		</div>
		
		
<?php $this->endWidget(); ?>
